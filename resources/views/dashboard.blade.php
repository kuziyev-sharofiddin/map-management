<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard - Undiruv</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Dashboard CSS -->
    <link href="{{ asset('assets/css/dashboard.css') }}" rel="stylesheet">
</head>
<body>
    <div class="dashboard-layout">
        
        <!-- Sidebar Navigation -->
        <aside class="sidebar">
            <div class="sidebar-header">
                <!-- Temporary SVG logo mimicking Figma -->
                <div class="logo">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#7C4DFF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M12 2L2 7l10 5 10-5-10-5z"></path>
                        <path d="M2 17l10 5 10-5M2 12l10 5 10-5"></path>
                    </svg>
                    <span>Undiruv</span>
                </div>
                <button class="collapse-sidebar" aria-label="Collapse Sidebar">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M15 18l-6-6 6-6"/>
                    </svg>
                </button>
            </div>

            <nav class="sidebar-nav">
                <a href="/dashboard" class="nav-item active">
                    <svg class="nav-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <rect x="3" y="3" width="7" height="7"></rect>
                        <rect x="14" y="3" width="7" height="7"></rect>
                        <rect x="14" y="14" width="7" height="7"></rect>
                        <rect x="3" y="14" width="7" height="7"></rect>
                    </svg>
                    <span>Dashboard</span>
                </a>
                <a href="#" class="nav-item">
                    <svg class="nav-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                        <circle cx="9" cy="7" r="4"></circle>
                        <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                        <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                    </svg>
                    <span>Undiruvchilar</span>
                </a>
            </nav>

            <div class="sidebar-footer">
                <a href="/" class="logout-btn">
                    <svg class="nav-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                        <polyline points="16 17 21 12 16 7"></polyline>
                        <line x1="21" y1="12" x2="9" y2="12"></line>
                    </svg>
                    <span>Ilovadan chiqish</span>
                </a>
            </div>
        </aside>

        <!-- Main Content Area -->
        <main class="main-content">
            
            <!-- Top Header -->
            <header class="dashboard-header">
                <h1 class="page-title">Dashboard</h1>
                
                <div class="user-profile">
                    <!-- Temporary admin avatar -->
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
                
                <!-- KPI Statistics Grid -->
                <div class="stats-grid">
                    <!-- Card 1 (Purple Base) -->
                    <div class="stat-card primary-card">
                        <div class="stat-header">
                            <span class="stat-title">Jami undiruvchilar soni</span>
                            <div class="stat-icon-wrapper">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
                                </svg>
                            </div>
                        </div>
                        <div class="stat-value-area">
                            <span class="stat-number">1,200</span><span class="stat-label">/ta</span>
                        </div>
                    </div>

                    <!-- Card 2 -->
                    <div class="stat-card">
                        <div class="stat-header">
                            <span class="stat-title">Onlayn undiruvchilar soni</span>
                            <div class="stat-icon-wrapper outline">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
                                </svg>
                                <!-- Online dot -->
                                <circle cx="19" cy="5" r="3" fill="#10B981" />
                            </div>
                        </div>
                        <div class="stat-value-area">
                            <span class="stat-number">600</span><span class="stat-label">/ta</span>
                        </div>
                    </div>

                    <!-- Card 3 -->
                    <div class="stat-card">
                        <div class="stat-header">
                            <span class="stat-title">Oflayn undiruvchilar soni</span>
                            <div class="stat-icon-wrapper outline">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
                                </svg>
                                <!-- Offline cross markup -->
                                <circle cx="19" cy="5" r="3" fill="#EF4444" />
                            </div>
                        </div>
                        <div class="stat-value-area">
                            <span class="stat-number">600</span><span class="stat-label">/ta</span>
                        </div>
                    </div>

                    <!-- Card 4 -->
                    <div class="stat-card">
                        <div class="stat-header">
                            <span class="stat-title">Hududlar soni</span>
                            <div class="stat-icon-wrapper outline">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                                    <circle cx="12" cy="10" r="3"></circle>
                                </svg>
                            </div>
                        </div>
                        <div class="stat-value-area">
                            <span class="stat-number">10</span><span class="stat-label">/ta</span>
                        </div>
                    </div>
                </div>

                <!-- Top Rankings Section -->
                <div class="rankings-section">
                    <div class="rankings-header">
                        <h2>Top (5) reyting undiruvchilar</h2>
                        
                        <!-- Dropdown filter placeholder -->
                        <div class="date-filter">
                            <svg class="calendar-icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                                <line x1="16" y1="2" x2="16" y2="6"></line>
                                <line x1="8" y1="2" x2="8" y2="6"></line>
                                <line x1="3" y1="10" x2="21" y2="10"></line>
                            </svg>
                            <span>Febral 2026</span>
                            <svg class="chevron-icon" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <polyline points="6 9 12 15 18 9"></polyline>
                            </svg>
                        </div>
                    </div>

                    <div class="rankings-table">
                        <!-- Table Headers -->
                        <div class="table-row table-head">
                            <div class="col-num">#</div>
                            <div class="col-fio">F.I.O</div>
                            <div class="col-region">Hududlar</div>
                            <div class="col-stat">Statistika</div>
                        </div>

                        <!-- Row 1: Green -->
                        <div class="table-row row-green">
                            <div class="col-num">01</div>
                            <div class="col-fio">
                                <img src="https://ui-avatars.com/api/?name=Nodirov+shokirbek&background=random" class="row-avatar" alt="Avatar">
                                <span>Nodirov shokirbek</span>
                            </div>
                            <div class="col-region">Farg'ona</div>
                            <div class="col-stat">
                                <!-- Sparkline placeholder -->
                                <svg viewBox="0 0 100 30" class="sparkline stroke-green">
                                    <path d="M0,20 Q10,5 20,20 T40,20 T60,20 T80,10 T100,20" fill="none" stroke-width="2" stroke-linecap="round"/>
                                </svg>
                            </div>
                        </div>

                        <!-- Row 2: Yellow -->
                        <div class="table-row row-yellow">
                            <div class="col-num">02</div>
                            <div class="col-fio">
                                <img src="https://ui-avatars.com/api/?name=Nodirov+shokirbek&background=random" class="row-avatar" alt="Avatar">
                                <span>Nodirov shokirbek</span>
                            </div>
                            <div class="col-region">Andijon</div>
                            <div class="col-stat">
                                <svg viewBox="0 0 100 30" class="sparkline stroke-yellow">
                                    <path d="M0,20 Q10,15 20,25 T40,15 T60,25 T80,10 T100,25" fill="none" stroke-width="2" stroke-linecap="round"/>
                                </svg>
                            </div>
                        </div>

                        <!-- Row 3: Orange -->
                        <div class="table-row row-orange">
                            <div class="col-num">03</div>
                            <div class="col-fio">
                                <img src="https://ui-avatars.com/api/?name=Nodirov+shokirbek&background=random" class="row-avatar" alt="Avatar">
                                <span>Nodirov shokirbek</span>
                            </div>
                            <div class="col-region">Qo'qon</div>
                            <div class="col-stat">
                                <svg viewBox="0 0 100 30" class="sparkline stroke-orange">
                                    <path d="M0,25 Q10,10 20,20 T40,25 T60,15 T80,25 T100,10" fill="none" stroke-width="2" stroke-linecap="round"/>
                                </svg>
                            </div>
                        </div>

                        <!-- Row 4: Gray -->
                        <div class="table-row row-gray">
                            <div class="col-num">04</div>
                            <div class="col-fio">
                                <img src="https://ui-avatars.com/api/?name=Nodirov+shokirbek&background=random" class="row-avatar" alt="Avatar">
                                <span>Nodirov shokirbek</span>
                            </div>
                            <div class="col-region">Namangan</div>
                            <div class="col-stat">
                                <svg viewBox="0 0 100 30" class="sparkline stroke-gray">
                                    <path d="M0,20 Q10,15 20,20 T40,20 T60,10 T80,25 T100,20" fill="none" stroke-width="2" stroke-linecap="round"/>
                                </svg>
                            </div>
                        </div>
                        
                        <!-- Row 5: Gray -->
                        <div class="table-row row-gray">
                            <div class="col-num">05</div>
                            <div class="col-fio">
                                <img src="https://ui-avatars.com/api/?name=Nodirov+shokirbek&background=random" class="row-avatar" alt="Avatar">
                                <span>Nodirov shokirbek</span>
                            </div>
                            <div class="col-region">Toshkent</div>
                            <div class="col-stat">
                                <svg viewBox="0 0 100 30" class="sparkline stroke-gray">
                                    <path d="M0,25 Q10,5 20,25 T40,15 T60,25 T80,15 T100,25" fill="none" stroke-width="2" stroke-linecap="round"/>
                                </svg>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </main>
    </div>
</body>
</html>
