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

        if ($token) {
            /** @var \Illuminate\Http\Client\Response $response */
            $response = Http::timeout(10)->withToken($token)->post("{$this->baseUrl}/branches/branch-list", [
                'search' => null
            ]);
            
            if ($response->successful() && $response->json('status')) {
                $branches = $response->json('data') ?? [];
                
                // Tanlangan filial nomini topish
                if ($selectedBranch) {
                    $found = collect($branches)->firstWhere('branch_guid', $selectedBranch);
                    if ($found) {
                        $selectedBranchName = data_get($found, 'name', 'Barchasi (Filiallar)');
                    }
                }
            }
        }

        return view('undiruvchilar.index', compact('branches', 'selectedBranch', 'selectedBranchName', 'isActive', 'selectedStatusName', 'selectedDate', 'selectedDateText'));
    }

    public function map()
    {
        return view('undiruvchilar.map');
    }
}
