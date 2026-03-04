<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ApiService;
use Exception;

class UndiruvchiController extends Controller
{
    public function __construct(protected ApiService $api)
    {
    }

    public function index(Request $request)
    {
        try {
            $token = session('auth_token');
            $branches = [];
            $selectedBranch = $request->query('branch_guid'); // Tanlangan filial ID si
            // Hozirgi tanlangan filial nomi
            $selectedBranchName = 'Barchasi (Filiallar)';

            $isActive = $request->query('is_active');
            $selectedStatusName = 'Barchasi (Holati)';
            
            if ($isActive === 'true') {
                $selectedStatusName = 'Onlayn';
            } elseif ($isActive === 'false') {
                $selectedStatusName = 'Oflayn';
            }

            $selectedDate = $request->query('date');
            $selectedDateText = 'Sanani tanlang';
            if ($selectedDate) {
                $monthsArr = ['yan', 'fev', 'mar', 'apr', 'may', 'iyn', 'iyl', 'avg', 'sen', 'okt', 'noy', 'dek'];
                $timestamp = strtotime($selectedDate);
                if ($timestamp) {
                    $monthIndex = (int)date('n', $timestamp) - 1;
                    $selectedDateText = date('j', $timestamp) . ' ' . $monthsArr[$monthIndex] . ' ' . date('Y', $timestamp);
                }
            }

            $page = (int) $request->query('page', 0);
            $search = $request->query('search');

            $usersData = [];
            $pagination = [
                'total_count' => 0,
                'page' => $page,
                'page_size' => 10,
                'total_pages' => 0,
                'has_next_page' => false,
                'has_previous_page' => false,
            ];

            if ($token) {
                // Branches from API
                /** @var \Illuminate\Http\Client\Response $response */
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

                // Users from API
                $isActiveApi = null;
                if ($isActive === 'true') {
                    $isActiveApi = "true";
                } elseif ($isActive === 'false') {
                    $isActiveApi = "false";
                }

                $dateApi = null;
                if ($selectedDate) {
                    $timestamp = strtotime($selectedDate);
                    if ($timestamp) {
                        $dateApi = date('Y-m-d', $timestamp);
                    }
                }

                /** @var \Illuminate\Http\Client\Response $usersResponse */
                $usersResponse = $this->api->post("/users", [
                    'search_term' => $search,
                    'is_active' => $isActiveApi,
                    'branch_guid' => $selectedBranch ?: null,
                    'is_stopped' => null,
                    'date' => $dateApi,
                    'start_hour' => null,
                    'end_hour' => null,
                    'min_stopped_minutes' => 0,
                    'page' => $page,
                    'page_size' => 10, // Changed to 10
                ]);

                if ($usersResponse->successful() && $usersResponse->json('status')) {
                    $usersData = $usersResponse->json('data') ?? [];
                    $pagination = [
                        'total_count' => $usersResponse->json('total_count') ?? 0,
                        'page' => $usersResponse->json('page') ?? $page,
                        'page_size' => $usersResponse->json('page_size') ?? 10,
                        'total_pages' => $usersResponse->json('total_pages') ?? 0,
                        'has_next_page' => $usersResponse->json('has_next_page') ?? false,
                        'has_previous_page' => $usersResponse->json('has_previous_page') ?? false,
                    ];
                }
            }

            return view('undiruvchilar.index', compact('branches', 'selectedBranch', 'selectedBranchName', 'isActive', 'selectedStatusName', 'selectedDate', 'selectedDateText', 'usersData', 'pagination'));
        } catch (Exception $e) {
            return back()->with('error', "Kutilmagan xato yuz berdi: " . $e->getMessage());
        }
    }

    public function map(Request $request)
    {
        try {
            $token = session('auth_token');
            $branches = [];
            $selectedBranch = $request->query('branch_guid'); // Tanlangan filial ID si
            $selectedBranchName = 'Barchasi (Filiallar)';

            $isActive = $request->query('is_active');
            $selectedStatusName = 'Barchasi (Holati)';
            
            if ($isActive === 'true') {
                $selectedStatusName = 'Onlayn';
            } elseif ($isActive === 'false') {
                $selectedStatusName = 'Oflayn';
            }

            $selectedDate = $request->query('date');
            $selectedDateText = 'Sanani tanlang';
            if ($selectedDate) {
                $monthsArr = ['yanvar', 'fevral', 'mart', 'aprel', 'may', 'iyun', 'iyul', 'avgust', 'sentyabr', 'oktyabr', 'noyabr', 'dekabr'];
                $timestamp = strtotime($selectedDate);
                if ($timestamp) {
                    $monthIndex = (int)date('n', $timestamp) - 1;
                    $selectedDateText = date('j', $timestamp) . ' ' . $monthsArr[$monthIndex] . ' ' . date('Y', $timestamp);
                }
            }

            $page = (int) $request->query('page', 0);
            $search = $request->query('search');

            // map uchun alohida vaqt
            $startHour = $request->query('start_hour');
            $endHour = $request->query('end_hour');
            $selectedTimeText = 'Vaqtni o\'rnatish';
            if (!empty($startHour) && !empty($endHour)) {
                $selectedTimeText = $startHour . ' - ' . $endHour . ' gacha';
            }

            $usersData = [];
            $pagination = [
                'total_count' => 0,
                'page' => $page,
                'page_size' => 1000,
                'total_pages' => 0,
                'has_next_page' => false,
                'has_previous_page' => false,
            ];

            if ($token) {
                // Branches from API
                /** @var \Illuminate\Http\Client\Response $response */
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

                // Users from API
                $isActiveApi = null;
                if ($isActive === 'true') {
                    $isActiveApi = "true";
                } elseif ($isActive === 'false') {
                    $isActiveApi = "false";
                }

                $dateApi = null;
                if ($selectedDate) {
                    $timestamp = strtotime($selectedDate);
                    if ($timestamp) {
                        $dateApi = date('Y-m-d', $timestamp);
                    }
                }

                /** @var \Illuminate\Http\Client\Response $usersResponse */
                $usersResponse = $this->api->post("/users", [
                    'search_term' => $search,
                    'is_active' => $isActiveApi,
                    'branch_guid' => $selectedBranch ?: null,
                    'is_stopped' => null,
                    'date' => $dateApi,
                    'start_hour' => $startHour,
                    'end_hour' => $endHour,
                    'min_stopped_minutes' => 0,
                    'page' => $page,
                    'page_size' => 1000, 
                ]);

                if ($usersResponse->successful() && $usersResponse->json('status')) {
                    $usersData = $usersResponse->json('data') ?? [];
                    $pagination = [
                        'total_count' => $usersResponse->json('total_count') ?? 0,
                        'page' => $usersResponse->json('page') ?? $page,
                        'page_size' => $usersResponse->json('page_size') ?? 1000,
                        'total_pages' => $usersResponse->json('total_pages') ?? 0,
                        'has_next_page' => $usersResponse->json('has_next_page') ?? false,
                        'has_previous_page' => $usersResponse->json('has_previous_page') ?? false,
                    ];
                }
            }

            return view('undiruvchilar.map', compact('branches', 'selectedBranch', 'selectedBranchName', 'isActive', 'selectedStatusName', 'selectedDate', 'selectedDateText', 'startHour', 'endHour', 'selectedTimeText', 'usersData', 'pagination', 'search'));
        } catch (\Throwable $e) {
            return back()->with('error', "Xarita yuklanishida xatolik yuz berdi: " . $e->getMessage());
        }
    }
}
