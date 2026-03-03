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

@stack('scripts')
</body>
</html>
