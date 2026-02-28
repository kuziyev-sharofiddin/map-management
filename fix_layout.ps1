 = Get-Content resources/views/dashboard.blade.php -Raw
 = .Substring(0, .IndexOf('<div class="content-body">'))
 = .Substring(.IndexOf('</main>'))
$newLayout = $part1 + '<div class="content-body">' + "
                @yield('content')
            </div>
        " + $part2
$newLayout = $newLayout -replace '<title>.*?</title>', '<title>@yield(''title'', ''Undiruv'')</title>'
$newLayout = $newLayout -replace '<!-- Dashboard CSS -->', '<!-- Shared Layout CSS from Dashboard -->'
$newLayout = $newLayout -replace '(<link href="\{\{ asset\(''assets/css/dashboard\.css''\) \}\}\?v=\{\{ time\(\) \}\}["''] rel="stylesheet">)', "$1
    @stack('styles')"
$newLayout = $newLayout -replace '</body>', "@stack('scripts')
</body>"
$newLayout = $newLayout -replace '<h1 class="page-title">Dashboard</h1>', '<h1 class="page-title">@yield(''page-title'', ''Dashboard'')</h1>'
$newLayout = $newLayout -replace '<a href="/dashboard" class="nav-item active">', '<a href="/dashboard" class="nav-item {{ request()->is(''dashboard'') ? ''active'' : '''' }}">'
$newLayout = $newLayout -replace '<a href="#" class="nav-item">', '<a href="/undiruvchilar" class="nav-item {{ request()->is(''undiruvchilar'') ? ''active'' : '''' }}">'
Set-Content "resources/views/layouts/app.blade.php" -Value $newLayout -Encoding UTF8
