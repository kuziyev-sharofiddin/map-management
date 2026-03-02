@extends('layouts.app')

@section('title', 'Dashboard - Undiruv')

@section('page-title', 'Dashboard')

@section('content')
                
                <!-- KPI Statistics Grid -->
                {{-- 
                <div class="stats-grid">
                    <!-- Card 1 (Purple Base) -->
                    <div class="stat-card primary-card decorative-bg">
                        <div class="stat-header">
                            <span class="stat-title">Jami undiruvchilar soni</span>
                            <div class="custom-icon-container">
                                <svg width="42" height="42" viewBox="0 0 42 42" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect x="0.5" y="0.5" width="41" height="41" rx="11.5" fill="white"/>
                                    <svg x="9" y="9" width="24" height="24" viewBox="229 28 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M244.5 35.5C244.5 37.433 242.933 39 241 39C239.067 39 237.5 37.433 237.5 35.5C237.5 33.567 239.067 32 241 32C242.933 32 244.5 33.567 244.5 35.5Z" fill="#7B48FF"/>
                                        <path d="M247 44.5C247 46.433 244.314 48 241 48C237.686 48 235 46.433 235 44.5C235 42.567 237.686 41 241 41C244.314 41 247 42.567 247 44.5Z" fill="#7B48FF"/>
                                        <path d="M236.122 33C236.3 33 236.473 33.0174 236.64 33.0506C236.232 33.7745 236 34.6101 236 35.5C236 36.3683 236.221 37.1848 236.611 37.8964C236.452 37.9258 236.289 37.9413 236.122 37.9413C234.708 37.9413 233.561 36.8351 233.561 35.4706C233.561 34.1061 234.708 33 236.122 33Z" fill="#7B48FF"/>
                                        <path d="M234.447 46.986C233.879 46.3071 233.5 45.474 233.5 44.5C233.5 43.5558 233.857 42.744 234.396 42.0767C232.491 42.2245 231 43.2662 231 44.5294C231 45.8044 232.517 46.8538 234.447 46.986Z" fill="#7B48FF"/>
                                        <path d="M246 35.5C246 36.3683 245.779 37.1848 245.389 37.8964C245.547 37.9258 245.711 37.9413 245.878 37.9413C247.292 37.9413 248.439 36.8351 248.439 35.4706C248.439 34.1061 247.292 33 245.878 33C245.7 33 245.527 33.0174 245.36 33.0506C245.767 33.7745 246 34.6101 246 35.5Z" fill="#7B48FF"/>
                                        <path d="M247.553 46.986C249.483 46.8538 251 45.8044 251 44.5294C251 43.2662 249.509 42.2245 247.604 42.0767C248.143 42.744 248.5 43.5558 248.5 44.5C248.5 45.474 248.12 46.3071 247.553 46.986Z" fill="#7B48FF"/>
                                    </svg>
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
                            <div class="custom-icon-container">
                                <svg width="42" height="42" viewBox="0 0 42 42" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect x="0.5" y="0.5" width="41" height="41" rx="11.5" fill="white"/>
                                    <rect x="0.5" y="0.5" width="41" height="41" rx="11.5" stroke="#EFEFEF"/>
                                    <circle cx="21" cy="15" r="4" fill="#7B48FF"/>
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M25.5 31C23.8501 31 23.0251 31 22.5126 30.4874C22 29.9749 22 29.1499 22 27.5C22 25.8501 22 25.0251 22.5126 24.5126C23.0251 24 23.8501 24 25.5 24C27.1499 24 27.9749 24 28.4874 24.5126C29 25.0251 29 25.8501 29 27.5C29 29.1499 29 29.9749 28.4874 30.4874C27.9749 31 27.1499 31 25.5 31ZM27.468 26.7458C27.6958 26.518 27.6958 26.1487 27.468 25.9209C27.2402 25.693 26.8709 25.693 26.6431 25.9209L24.7222 27.8417L24.3569 27.4764C24.1291 27.2486 23.7598 27.2486 23.532 27.4764C23.3042 27.7042 23.3042 28.0736 23.532 28.3014L24.3097 29.0791C24.5375 29.307 24.9069 29.307 25.1347 29.0791L27.468 26.7458Z" fill="#7B48FF"/>
                                    <path d="M24.4147 22.5074C23.4046 22.1842 22.24 22 21 22C17.134 22 14 23.7909 14 26C14 28.1406 16.9424 29.8884 20.6421 29.9949C20.615 29.8686 20.594 29.7432 20.5775 29.6201C20.4998 29.0424 20.4999 28.3365 20.5 27.586V27.414C20.4999 26.6635 20.4998 25.9576 20.5775 25.3799C20.6639 24.737 20.8705 24.0333 21.4519 23.4519C22.0334 22.8705 22.737 22.6639 23.3799 22.5774C23.6919 22.5355 24.0412 22.5162 24.4147 22.5074Z" fill="#7B48FF"/>
                                </svg>
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
                            <div class="custom-icon-container">
                                <svg width="42" height="42" viewBox="0 0 42 42" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect x="0.5" y="0.5" width="41" height="41" rx="11.5" fill="white"/>
                                <rect x="0.5" y="0.5" width="41" height="41" rx="11.5" stroke="#EFEFEF"/>
                                <circle cx="21" cy="15" r="4" fill="#7B48FF"/>
                                <path d="M24.4147 22.5074C23.4046 22.1842 22.24 22 21 22C17.134 22 14 23.7909 14 26C14 28.1406 16.9424 29.8884 20.6421 29.9949C20.615 29.8686 20.594 29.7432 20.5775 29.6201C20.4998 29.0424 20.4999 28.3365 20.5 27.586V27.414C20.4999 26.6635 20.4998 25.9576 20.5775 25.3799C20.6639 24.737 20.8705 24.0333 21.4519 23.4519C22.0334 22.8705 22.737 22.6639 23.3799 22.5774C23.6919 22.5355 24.0412 22.5162 24.4147 22.5074Z" fill="#7B48FF"/>
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M25.5 31C23.8501 31 23.0251 31 22.5126 30.4874C22 29.9749 22 29.1499 22 27.5C22 25.8501 22 25.0251 22.5126 24.5126C23.0251 24 23.8501 24 25.5 24C27.1499 24 27.9749 24 28.4874 24.5126C29 25.0251 29 25.8501 29 27.5C29 29.1499 29 29.9749 28.4874 30.4874C27.9749 31 27.1499 31 25.5 31ZM24.3569 25.532C24.1291 25.3042 23.7598 25.3042 23.532 25.532C23.3042 25.7598 23.3042 26.1291 23.532 26.3569L24.675 27.5L23.532 28.6431C23.3042 28.8709 23.3042 29.2402 23.532 29.468C23.7598 29.6958 24.1291 29.6958 24.3569 29.468L25.5 28.325L26.6431 29.468C26.8709 29.6958 27.2402 29.6958 27.468 29.468C27.6958 29.2402 27.6958 28.8709 27.468 28.6431L26.325 27.5L27.468 26.3569C27.6958 26.1291 27.6958 25.7598 27.468 25.532C27.2402 25.3042 26.8709 25.3042 26.6431 25.532L25.5 26.675L24.3569 25.532Z" fill="#7B48FF"/>
                                </svg>
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
                            <div class="custom-icon-container">
                                <svg width="42" height="42" viewBox="0 0 42 42" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect x="0.5" y="0.5" width="41" height="41" rx="11.5" fill="white"/>
                                <rect x="0.5" y="0.5" width="41" height="41" rx="11.5" stroke="#EFEFEF"/>
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M21 12C16.5678 12 13 15.7029 13 20.2389C13 22.4908 13.8783 24.9032 15.2835 26.757C16.6854 28.6066 18.6944 30 21 30C23.3056 30 25.3146 28.6066 26.7165 26.757C28.1217 24.9032 29 22.4908 29 20.2389C29 15.7029 25.4322 12 21 12ZM18.1657 19.6154C18.1657 18.035 19.4347 16.7538 21 16.7538C22.5653 16.7538 23.8343 18.035 23.8343 19.6154C23.8343 21.1958 22.5653 22.4769 21 22.4769C19.4347 22.4769 18.1657 21.1958 18.1657 19.6154ZM21 17.8615C20.0406 17.8615 19.2629 18.6468 19.2629 19.6154C19.2629 20.584 20.0406 21.3692 21 21.3692C21.9594 21.3692 22.7371 20.584 22.7371 19.6154C22.7371 18.6468 21.9594 17.8615 21 17.8615Z" fill="#7B48FF"/>
                                </svg>
                            </div>
                        </div>
                        <div class="stat-value-area">
                            <span class="stat-number">10</span><span class="stat-label">/ta</span>
                        </div>
                    </div>
                </div>
                --}}

                <!-- Top Rankings Section -->
                <div class="rankings-section">
                    <div class="rankings-header">
                        <h2>Top (5) reyting undiruvchilar</h2>
                        
                        <!-- Dropdown filter placeholder -->
                        <div class="calendar-dropdown-container">
                            <div class="date-filter" id="dateFilterBtn">
                                <svg class="calendar-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                                    <line x1="16" y1="2" x2="16" y2="6"></line>
                                    <line x1="8" y1="2" x2="8" y2="6"></line>
                                    <line x1="3" y1="10" x2="21" y2="10"></line>
                                </svg>
                                <span id="selectedDateText">Fevral 2026</span>
                                <svg class="chevron-icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <polyline points="6 9 12 15 18 9"></polyline>
                                </svg>
                            </div>
                            
                            <!-- Dropdown Menu -->
                            <div class="calendar-dropdown-menu" id="calendarDropdownMenu">
                                <div class="dropdown-months">
                                    <div class="dropdown-item" data-month="Yanvar">Yanvar</div>
                                    <div class="dropdown-item active" data-month="Fevral">Fevral</div>
                                    <div class="dropdown-item" data-month="Mart">Mart</div>
                                    <div class="dropdown-item" data-month="Aprel">Aprel</div>
                                    <div class="dropdown-item" data-month="May">May</div>
                                    <div class="dropdown-item" data-month="Iyun">Iyun</div>
                                    <div class="dropdown-item" data-month="Iyul">Iyul</div>
                                    <div class="dropdown-item" data-month="Avgust">Avgust</div>
                                    <div class="dropdown-item" data-month="Sentyabr">Sentyabr</div>
                                    <div class="dropdown-item" data-month="Oktyabr">Oktyabr</div>
                                    <div class="dropdown-item" data-month="Noyabr">Noyabr</div>
                                    <div class="dropdown-item" data-month="Dekabr">Dekabr</div>
                                </div>
                                <div class="dropdown-years">
                                    <div class="dropdown-year-header" id="yearDropdownBtn">
                                        <span id="selectedYearHeader">2026</span>
                                        <svg class="chevron-icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="6 9 12 15 18 9"></polyline></svg>
                                    </div>
                                    <div class="dropdown-year-list">
                                        <div class="dropdown-item" data-year="2011">2011</div>
                                        <div class="dropdown-item" data-year="2012">2012</div>
                                        <div class="dropdown-item" data-year="2013">2013</div>
                                        <div class="dropdown-item" data-year="2014">2014</div>
                                        <div class="dropdown-item" data-year="2015">2015</div>
                                        <div class="dropdown-item" data-year="2016">2016</div>
                                        <div class="dropdown-item" data-year="2017">2017</div>
                                        <div class="dropdown-item" data-year="2018">2018</div>
                                        <div class="dropdown-item" data-year="2019">2019</div>
                                        <div class="dropdown-item" data-year="2020">2020</div>
                                        <div class="dropdown-item" data-year="2021">2021</div>
                                        <div class="dropdown-item" data-year="2022">2022</div>
                                        <div class="dropdown-item" data-year="2023">2023</div>
                                        <div class="dropdown-item" data-year="2024">2024</div>
                                        <div class="dropdown-item" data-year="2025">2025</div>
                                        <div class="dropdown-item active" data-year="2026">2026</div>
                                    </div>
                                </div>
                            </div>
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
                                <img src="{{ asset('assets/images/undiruv-rasm.svg') }}" class="row-avatar" alt="Avatar">
                                <span>Avazbek Olimov</span>
                            </div>
                            <div class="col-region">Farg'ona</div>
                            <div class="col-stat">
                                <svg viewBox="988 118 126 32" class="sparkline stroke-green" preserveAspectRatio="none">
                                    <path d="M989 143.493C989 143.493 997.084 129.712 1005.57 129.522C1012.96 129.356 1014.24 139.153 1021.63 139.501C1031.79 139.98 1031.57 123.696 1041.71 123.035C1055 122.17 1052.01 146.792 1065.31 147.485C1079.98 148.251 1076.77 119.28 1091.41 120.54C1102.62 121.504 1113 139.501 1113 139.501" fill="none" stroke-width="1.5" stroke-linecap="round"/>
                                    <path d="M989 143.493C989 143.493 997.084 129.712 1005.57 129.522C1012.96 129.356 1014.24 139.153 1021.63 139.501C1031.79 139.98 1031.57 123.696 1041.71 123.035C1055 122.17 1052.01 146.792 1065.31 147.485C1079.98 148.251 1076.77 119.28 1091.41 120.54C1102.62 121.504 1113 139.501 1113 139.501" fill="none" stroke="#45BF84" stroke-width="4" stroke-linecap="round" opacity="0.2" transform="translate(0, 3)"/>
                                </svg>
                            </div>
                        </div>

                        <!-- Row 2: Yellow -->
                        <div class="table-row row-yellow">
                            <div class="col-num">02</div>
                            <div class="col-fio">
                                <img src="{{ asset('assets/images/undiruv-rasm.svg') }}" class="row-avatar" alt="Avatar">
                                <span>Botir Qodirov</span>
                            </div>
                            <div class="col-region">Andijon</div>
                            <div class="col-stat">
                                <svg viewBox="988 187 126 32" class="sparkline stroke-yellow" preserveAspectRatio="none">
                                    <path d="M989 212.493C989 212.493 997.084 198.712 1005.57 198.522C1012.96 198.356 1014.24 208.153 1021.63 208.501C1031.79 208.98 1031.57 192.696 1041.71 192.035C1055 191.17 1052.01 215.792 1065.31 216.485C1079.98 217.251 1076.77 188.28 1091.41 189.54C1102.62 190.504 1113 208.501 1113 208.501" fill="none" stroke-width="1.5" stroke-linecap="round"/>
                                    <path d="M989 212.493C989 212.493 997.084 198.712 1005.57 198.522C1012.96 198.356 1014.24 208.153 1021.63 208.501C1031.79 208.98 1031.57 192.696 1041.71 192.035C1055 191.17 1052.01 215.792 1065.31 216.485C1079.98 217.251 1076.77 188.28 1091.41 189.54C1102.62 190.504 1113 208.501 1113 208.501" fill="none" stroke="#B7BF45" stroke-width="4" stroke-linecap="round" opacity="0.2" transform="translate(0, 3)"/>
                                </svg>
                            </div>
                        </div>

                        <!-- Row 3: Orange -->
                        <div class="table-row row-orange">
                            <div class="col-num">03</div>
                            <div class="col-fio">
                                <img src="{{ asset('assets/images/undiruv-rasm.svg') }}" class="row-avatar" alt="Avatar">
                                <span>Ozodbek Nazarbekov</span>
                            </div>
                            <div class="col-region">Qo'qon</div>
                            <div class="col-stat">
                                <svg viewBox="988 256 126 32" class="sparkline stroke-orange" preserveAspectRatio="none">
                                    <path d="M989 281.493C989 281.493 997.084 267.712 1005.57 267.522C1012.96 267.356 1014.24 277.153 1021.63 277.501C1031.79 277.98 1031.57 261.696 1041.71 261.035C1055 260.17 1052.01 284.792 1065.31 285.485C1079.98 286.251 1076.77 257.28 1091.41 258.54C1102.62 259.504 1113 277.501 1113 277.501" fill="none" stroke-width="1.5" stroke-linecap="round"/>
                                    <path d="M989 281.493C989 281.493 997.084 267.712 1005.57 267.522C1012.96 267.356 1014.24 277.153 1021.63 277.501C1031.79 277.98 1031.57 261.696 1041.71 261.035C1055 260.17 1052.01 284.792 1065.31 285.485C1079.98 286.251 1076.77 257.28 1091.41 258.54C1102.62 259.504 1113 277.501 1113 277.501" fill="none" stroke="#D49859" stroke-width="4" stroke-linecap="round" opacity="0.2" transform="translate(0, 3)"/>
                                </svg>
                            </div>
                        </div>

                        <!-- Row 4: Gray -->
                        <div class="table-row row-gray">
                            <div class="col-num">04</div>
                            <div class="col-fio">
                                <img src="{{ asset('assets/images/undiruv-rasm.svg') }}" class="row-avatar" alt="Avatar">
                                <span>Ortiq Otajonov</span>
                            </div>
                            <div class="col-region">Namangan</div>
                            <div class="col-stat">
                                <svg viewBox="988 325 126 32" class="sparkline stroke-gray" preserveAspectRatio="none">
                                    <path d="M989 350.493C989 350.493 997.084 336.712 1005.57 336.522C1012.96 336.356 1014.24 346.153 1021.63 346.501C1031.79 346.98 1031.57 330.696 1041.71 330.035C1055 329.17 1052.01 353.792 1065.31 354.485C1079.98 355.251 1076.77 326.28 1091.41 327.54C1102.62 328.504 1113 346.501 1113 346.501" fill="none" stroke-width="1.5" stroke-linecap="round"/>
                                    <path d="M989 350.493C989 350.493 997.084 336.712 1005.57 336.522C1012.96 336.356 1014.24 346.153 1021.63 346.501C1031.79 346.98 1031.57 330.696 1041.71 330.035C1055 329.17 1052.01 353.792 1065.31 354.485C1079.98 355.251 1076.77 326.28 1091.41 327.54C1102.62 328.504 1113 346.501 1113 346.501" fill="none" stroke="#807B89" stroke-width="4" stroke-linecap="round" opacity="0.2" transform="translate(0, 3)"/>
                                </svg>
                            </div>
                        </div>
                        
                        <!-- Row 5: Gray -->
                        <div class="table-row row-gray">
                            <div class="col-num">05</div>
                            <div class="col-fio">
                                <img src="{{ asset('assets/images/undiruv-rasm.svg') }}" class="row-avatar" alt="Avatar">
                                <span>Mirza Azizov</span>
                            </div>
                            <div class="col-region">Toshkent</div>
                            <div class="col-stat">
                                <svg viewBox="988 394 126 32" class="sparkline stroke-gray" preserveAspectRatio="none">
                                    <path d="M989 419.493C989 419.493 997.084 405.712 1005.57 405.522C1012.96 405.356 1014.24 415.153 1021.63 415.501C1031.79 415.98 1031.57 399.696 1041.71 399.035C1055 398.17 1052.01 422.792 1065.31 423.485C1079.98 424.251 1076.77 395.28 1091.41 396.54C1102.62 397.504 1113 415.501 1113 415.501" fill="none" stroke-width="1.5" stroke-linecap="round"/>
                                    <path d="M989 419.493C989 419.493 997.084 405.712 1005.57 405.522C1012.96 405.356 1014.24 415.153 1021.63 415.501C1031.79 415.98 1031.57 399.696 1041.71 399.035C1055 398.17 1052.01 422.792 1065.31 423.485C1079.98 424.251 1076.77 395.28 1091.41 396.54C1102.62 397.504 1113 415.501 1113 415.501" fill="none" stroke="#807B89" stroke-width="4" stroke-linecap="round" opacity="0.2" transform="translate(0, 3)"/>
                                </svg>
                            </div>
                        </div>

                    </div>
                </div>

@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const statCards = document.querySelectorAll('.stat-card');

            // Track the card that is permanently active (default: first card)
            let activeCard = statCards[0];

            statCards.forEach(card => {
                // On hover: hide active card's purple, show purple on hovered card
                card.addEventListener('mouseenter', () => {
                    if (card !== activeCard) {
                        // Temporarily remove primary style from active card
                        activeCard.classList.remove('primary-card');
                        activeCard.classList.remove('decorative-bg');
                    }
                });

                // On leave: restore active card's purple
                card.addEventListener('mouseleave', () => {
                    if (card !== activeCard) {
                        activeCard.classList.add('primary-card');
                        activeCard.classList.add('decorative-bg');
                    }
                });

                // On click: permanently set this card as the active one
                card.addEventListener('click', () => {
                    // Clear styles from all
                    statCards.forEach(c => {
                        c.classList.remove('primary-card');
                        c.classList.remove('decorative-bg');
                    });
                    // Set clicked card as new active
                    activeCard = card;
                    card.classList.add('primary-card');
                    card.classList.add('decorative-bg');
                });
            });

            // Date Filter Dropdown Logic
            const dateFilterBtn = document.getElementById('dateFilterBtn');
            const calendarDropdownMenu = document.getElementById('calendarDropdownMenu');
            const selectedDateText = document.getElementById('selectedDateText');
            const selectedYearHeader = document.getElementById('selectedYearHeader');
            
            let currentMonth = 'Fevral';
            let currentYear = '2026';

            if(dateFilterBtn) {
                dateFilterBtn.addEventListener('click', (e) => {
                    e.stopPropagation();
                    calendarDropdownMenu.classList.toggle('show');
                });
            }

            document.addEventListener('click', (e) => {
                if (calendarDropdownMenu && !calendarDropdownMenu.contains(e.target) && !dateFilterBtn.contains(e.target)) {
                    calendarDropdownMenu.classList.remove('show');
                }
            });

            const monthItems = document.querySelectorAll('.dropdown-months .dropdown-item');
            monthItems.forEach(item => {
                item.addEventListener('click', () => {
                    monthItems.forEach(m => m.classList.remove('active'));
                    item.classList.add('active');
                    currentMonth = item.dataset.month;
                    updateSelectedDate();
                });
            });

            const yearItems = document.querySelectorAll('.dropdown-year-list .dropdown-item');
            yearItems.forEach(item => {
                item.addEventListener('click', () => {
                    yearItems.forEach(y => y.classList.remove('active'));
                    item.classList.add('active');
                    currentYear = item.dataset.year;
                    selectedYearHeader.textContent = currentYear;
                    updateSelectedDate();
                });
            });

            function updateSelectedDate() {
                selectedDateText.textContent = `${currentMonth} ${currentYear}`;
            }
        });
    </script>
@endpush
