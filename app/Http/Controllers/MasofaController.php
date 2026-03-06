<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ApiService;
use Exception;

class MasofaController extends Controller
{
    public function __construct(protected ApiService $api)
    {
    }

    public function index(Request $request)
    {
        // Agar URL da `from_date` yoki `to_date` ko'rsatilmagan bo'lsa, kechagi va bugungi sana bilan redirect qilamiz
        if (!$request->query('from_date') || !$request->query('to_date')) {
            return redirect()->to($request->fullUrlWithQuery([
                'from_date' => date('Y-m-d', strtotime('-1 day')),
                'to_date' => date('Y-m-d')
            ]));
        }

        try {
            $token = session('auth_token');
            $branches = [];
            $selectedBranch = $request->query('branch_guid');
            $selectedBranchName = 'Barchasi (Filiallar)';

            $isActive = $request->query('is_active');
            $selectedStatusName = 'Barchasi (Holati)';
            
            if ($isActive === 'true') {
                $selectedStatusName = 'Onlayn';
            } elseif ($isActive === 'false') {
                $selectedStatusName = 'Oflayn';
            }

            $monthsArr = ['yan', 'fev', 'mar', 'apr', 'may', 'iyn', 'iyl', 'avg', 'sen', 'okt', 'noy', 'dek'];

            $fromDate = $request->query('from_date', date('Y-m-d', strtotime('-1 day')));
            $toDate = $request->query('to_date', date('Y-m-d'));
            
            $startTs = strtotime($fromDate);
            $endTs = strtotime($toDate);

            $selectedDateText = 'Sanani tanlang';
            if ($startTs && $endTs) {
                // e.g: "6 mar 2026 - 6 mar 2026"
                $sDateStr = date('j', $startTs) . ' ' . $monthsArr[(int)date('n', $startTs) - 1] . ' ' . date('Y', $startTs);
                if ($fromDate === $toDate) {
                    $selectedDateText = $sDateStr;
                } else {
                    $eDateStr = date('j', $endTs) . ' ' . $monthsArr[(int)date('n', $endTs) - 1] . ' ' . date('Y', $endTs);
                    $selectedDateText = $sDateStr . ' - ' . $eDateStr;
                }
            }

            $page = (int) $request->query('page', 1);
            $pageSize = (int) $request->query('page_size', 10);
            $search = $request->query('search');

            $usersData = [];
            $pagination = [
                'total_count' => 0,
                'page' => $page,
                'page_size' => $pageSize,
                'total_pages' => 0,
                'has_next_page' => false,
                'has_previous_page' => false,
            ];

            if ($token) {
                // Filiallar ro'yxatini olish
                $response = $this->api->post("/branches/branch-list", [
                    'search' => null
                ]);
                if ($response->successful() && $response->json('status')) {
                    $branches = $response->json('data') ?? [];
                    if ($selectedBranch) {
                        $found = collect($branches)->firstWhere('branch_guid', $selectedBranch);
                        if ($found) {
                            $selectedBranchName = data_get($found, 'name', 'Barchasi (Filiallar)');
                        }
                    }
                }

                $isActiveApi = null;
                if ($isActive === 'true') {
                    $isActiveApi = "true";
                } elseif ($isActive === 'false') {
                    $isActiveApi = "false";
                }

                $fromDateApi = null;
                $toDateApi = null;
                if ($startTs) $fromDateApi = date('Y-m-d', $startTs);
                if ($endTs) $toDateApi = date('Y-m-d', $endTs);

                /** @var \Illuminate\Http\Client\Response $usersResponse */
                $usersResponse = $this->api->post("/users", [
                    'search_term' => $search,
                    'is_active' => $isActiveApi,
                    'branch_guid' => $selectedBranch ?: null,
                    'is_stopped' => null,
                    'from_date' => $fromDateApi,
                    'to_date' => $toDateApi,
                    'start_hour' => null,
                    'end_hour' => null,
                    'min_stopped_minutes' => 0,
                    'page' => $page,
                    'page_size' => $pageSize,
                ]);

                if ($usersResponse->successful() && $usersResponse->json('status')) {
                    $usersData = $usersResponse->json('data') ?? [];
                    $totalCount = $usersResponse->json('total_count') ?? 0;
                    $rPageSize = $usersResponse->json('page_size') ?? 10;
                    $rTotalPages = $usersResponse->json('total_pages');
                    
                    if (empty($rTotalPages) && $rPageSize > 0) {
                        $rTotalPages = ceil($totalCount / $rPageSize);
                    }

                    $pagination = [
                        'total_count' => $totalCount,
                        'page' => $usersResponse->json('page') ?? $page,
                        'page_size' => $rPageSize,
                        'total_pages' => (int) $rTotalPages,
                        'has_next_page' => $usersResponse->json('has_next_page') ?? false,
                        'has_previous_page' => $usersResponse->json('has_previous_page') ?? false,
                    ];

                    // Masofa hisobotlarini olish
                    if (!empty($usersData)) {
                        $userIds = array_map(function($u) {
                            return $u['user_id'] ?? $u['id'];
                        }, $usersData);

                        // Sana formatlarini timezone bilan moslash (masalan API kutayotgandek)
                        // "2026-03-01T00:00:00.000Z"
                        $sdApi = $fromDateApi ? $fromDateApi . 'T00:00:00.000Z' : null;
                        $edApi = $toDateApi ? $toDateApi . 'T23:59:59.999Z' : null;

                        $distanceResponse = $this->api->post("/daily_distance_reports/filter", [
                            'branch_guid' => $selectedBranch ?: null,
                            'user_ids' => null,
                            'start_date' => $sdApi,
                            'end_date' => $edApi
                        ]);
                        // dd([
                        //     'branch_guid' => $selectedBranch ?: null,
                        //     'user_ids' => null,
                        //     'start_date' => $sdApi,
                        //     'end_date' => $edApi
                        // ]);
                        // dd($distanceResponse->json('data'));
                        $distancesMap = [];
                        if ($distanceResponse->successful() && $distanceResponse->json('status')) {
                            $distData = $distanceResponse->json('data') ?? [];
                            foreach ($distData as $dRow) {
                                $uId = $dRow['user_id'] ?? null;
                                if ($uId) {
                                    if (!isset($distancesMap[$uId])) {
                                        $distancesMap[$uId] = 0;
                                    }
                                    $distancesMap[$uId] += (float) ($dRow['total_distance_km'] ?? 0);
                                }
                            }
                        }

                        // Distanceni userlarga qo'shish
                        foreach ($usersData as &$u) {
                            $cId = $u['user_id'] ?? $u['id'];
                            $u['total_distance'] = $distancesMap[$cId] ?? 0;
                        }
                        unset($u);
                    }
                }
            }

            return view('masofalar.index', compact('branches', 'selectedBranch', 'selectedBranchName', 'isActive', 'selectedStatusName', 'fromDate', 'toDate', 'selectedDateText', 'usersData', 'pagination'));
        } catch (Exception $e) {
            return back()->with('error', "Kutilmagan xato yuz berdi: " . $e->getMessage());
        }
    }
}
