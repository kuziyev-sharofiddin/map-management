<!DOCTYPE html>
<html lang="uz">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Tizimga kirish')</title>
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/auth.css') }}">
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>
    <main class="auth-container">
        @yield('content')
    </main>

    <!-- Custom JS -->
    <script src="{{ asset('assets/js/auth.js') }}"></script>
</body>
</html>
