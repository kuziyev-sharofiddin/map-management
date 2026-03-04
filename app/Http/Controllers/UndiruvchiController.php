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
            $locationLimit = (int) $request->query('location_limit', 1);
            $locationIndex = [];

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

                // ---- Faqat URL da tanlangan userlarni lokatsiyasini olish ----
                // Sidebar da user tanlanganda URL da ?selected_users[]=ID bo'ladi
                $selectedUserIds = array_values(array_filter(
                    array_map('intval', $request->query('selected_users', []))
                ));

                if (!empty($selectedUserIds)) {
                    $locResponse = app(\App\Services\ApiService::class)->client()
                        ->asJson()
                        ->post('http://location-undiruv.garant.uz/api/locations/multiple_users', [
                            'user_ids'   => $selectedUserIds,
                            'date'       => $dateApi ?: date('Y-m-d'),
                            'start_hour' => $startHour ?: null,
                            'end_hour'   => $endHour   ?: null,
                            'limit'      => $locationLimit,
                            'is_active'  => false,
                            'is_stopped' => null,
                        ]);

                    if ($locResponse->successful() && $locResponse->json('status')) {
                        foreach ($locResponse->json('data') ?? [] as $userData) {
                            $uid = $userData['user_id'] ?? $userData['id'] ?? null;
                            if ($uid) {
                                $locationIndex[(string)$uid] = array_map(fn($l) => [
                                    'lat'     => $l['latitude'],
                                    'lng'     => $l['longitude'],
                                    'time'    => $l['recorded_at'] ?? null,
                                    'stopped' => $l['stopped_time'] ?? null,
                                ], $userData['locations'] ?? []);
                            }
                        }
                    }
                }
            }

            return view('undiruvchilar.map', compact(
                'branches', 'selectedBranch', 'selectedBranchName',
                'isActive', 'selectedStatusName',
                'selectedDate', 'selectedDateText',
                'startHour', 'endHour', 'selectedTimeText',
                'usersData', 'pagination', 'search',
                'locationLimit', 'locationIndex'
            ));
        } catch (\Throwable $e) {
            return back()->with('error', "Xarita yuklanishida xatolik yuz berdi: " . $e->getMessage());
        }
    }

    /**
     * Map page AJAX ko'p userlar lokatsiyasini (yo'nalishni) olish
     */
    public function getMultipleLocations(\Illuminate\Http\Request $request)
    {
        try {
            $payload = [
                'user_ids' => $request->json('user_ids', []),
                'date' => $request->json('date'),
                'start_hour' => $request->json('start_hour'),
                'end_hour' => $request->json('end_hour'),
                'limit' => $request->json('limit', 0),
                'is_active' => $request->json('is_active', false) === 'true' || $request->json('is_active', false) === true,
                'is_stopped' => $request->json('is_stopped', null)
            ];

            $response = app(\App\Services\ApiService::class)->client()
                ->post("http://location-undiruv.garant.uz/api/locations/multiple_users", $payload);

            if ($response->successful()) {
                return response()->json($response->json());
            }

            return response()->json(['status' => false, 'message' => 'API Error', 'details' => $response->body()], 400);

        } catch (\Throwable $e) {
            return response()->json(['status' => false, 'message' => 'Tarmoq xatosi: ' . $e->getMessage()], 500);
        }
    }
}
