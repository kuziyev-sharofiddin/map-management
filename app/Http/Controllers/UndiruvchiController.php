<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class UndiruvchiController extends Controller
{
    private string $baseUrl = "http://10.100.104.128:5084/api";

    public function index(Request $request)
    {
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
            $response = Http::timeout(10)->withToken($token)->post("{$this->baseUrl}/branches/branch-list", [
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
            $usersResponse = Http::timeout(10)->withToken($token)->post("{$this->baseUrl}/users", [
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
    }

    public function map()
    {
        return view('undiruvchilar.map');
    }
}
