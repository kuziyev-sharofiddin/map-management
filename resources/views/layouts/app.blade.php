<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Undiruv')</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <!-- Shared Layout CSS from Dashboard -->
    <link href="{{ asset('assets/css/dashboard.css') }}?v={{ time() }}" rel="stylesheet">
    @stack('styles')
</head>
<body class="@yield('body-class')">
    <div class="dashboard-layout">

        <!-- Sidebar Navigation -->
        @include('layouts.sidebar')

        <!-- Main Content Area -->
        <main class="main-content">

            <!-- Top Header -->
            <header class="dashboard-header">
                <h1 class="page-title">@yield('page-title', 'Dashboard')</h1>

                <div class="user-profile">
                    @php
                        $authUser = session('auth.user', []);
                        $userName = $authUser['name'] ?? 'Mehmon';
                        $userRole = $authUser['role'] ?? '';
                        $userImage = $authUser['image'] ?? null;

                        // Initials (SN ← Sharofiddin Kuziev)
                        $nameParts = explode(' ', $userName);
                        $initials = collect($nameParts)->take(2)->map(fn($p) => mb_strtoupper(mb_substr($p, 0, 1)))->implode('');

                        // Rol matnini o'zbek tiliga o'girish
                        $roleLabels = [
                            'admin'            => 'Admin',
                            'shopir_delivery'  => 'Haydovchi',
                            'undiruvchi'       => 'Undiruvchi',
                            'supervisor'       => 'Supervisor',
                            'superadmin'       => 'Super Admin',
                            'client'           => 'Mijoz',
                        ];
                        $roleLabel = $roleLabels[$userRole] ?? ucfirst(str_replace('_', ' ', $userRole));
                    @endphp

                    <div class="avatar">
                        @if($userImage)
                            <img src="{{ $userImage }}" alt="{{ $userName }}">
                        @else
                            <div style="
                                width: 40px; height: 40px; border-radius: 50%;
                                background: linear-gradient(135deg, #7B48FF, #a78bfa);
                                display: flex; align-items: center; justify-content: center;
                                color: #fff; font-weight: 700; font-size: 14px; letter-spacing: 0.5px;
                            ">{{ $initials }}</div>
                        @endif
                    </div>
                    <div class="user-details">
                        <span class="user-name">{{ $userName }}</span>
                        @if($roleLabel)
                            <span class="user-role">{{ $roleLabel }}</span>
                        @endif
                    </div>
                </div>
            </header>

            <div class="content-body">
                @yield('content')
            </div>
        </main>
    </div>

    @if(session('error'))
        <div style="position: fixed; top: 32px; left: 50%; transform: translateX(-50%); z-index: 9999; background: #FFF0F0; border: 1px solid #FFD5D5; color: #E53935; padding: 16px 24px; border-radius: 12px; display: flex; align-items: center; gap: 12px; font-weight: 500; box-shadow: 0 10px 30px rgba(229, 57, 53, 0.15); animation: slideDownAlert 0.4s ease forwards;" id="globalErrorToast">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <circle cx="12" cy="12" r="10"></circle>
                <line x1="12" y1="8" x2="12" y2="12"></line>
                <line x1="12" y1="16" x2="12.01" y2="16"></line>
            </svg>
            <span>{{ session('error') }}</span>
            <button onclick="document.getElementById('globalErrorToast').remove()" style="background:none; border:none; cursor:pointer; color:#E53935; margin-left:16px;">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
            </button>
        </div>
        <style>
            @keyframes slideDownAlert {
                from { top: -20px; opacity: 0; }
                to { top: 32px; opacity: 1; }
            }
        </style>
    @endif

@stack('scripts')
</body>
</html>
