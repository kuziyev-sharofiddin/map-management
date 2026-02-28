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
                    <div class="avatar">
                        <img src="https://ui-avatars.com/api/?name=Shokirov+Nodir&background=random" alt="Admin Avatar">
                    </div>
                    <div class="user-details">
                        <span class="user-name">Shokirov Nodir</span>
                        <span class="user-role">Admin</span>
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
