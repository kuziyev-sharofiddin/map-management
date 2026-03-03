@extends('layouts.app')

@section('title', 'Undiruvchilar - Undiruv')

@section('page-title', 'Undiruvchilar')

@section('content')
<div class="undiruvchilar-container">
    <!-- KPI Statistics Grid -->
    <div class="stats-grid" style="margin-bottom: 24px;">
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
                <span class="stat-title">Filiallar soni</span>
                <div class="custom-icon-container">
                    <svg width="42" height="42" viewBox="0 0 42 42" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect x="0.5" y="0.5" width="41" height="41" rx="11.5" fill="white"/>
                    <rect x="0.5" y="0.5" width="41" height="41" rx="11.5" stroke="#EFEFEF"/>
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M21 12C16.5678 12 13 15.7029 13 20.2389C13 22.4908 13.8783 24.9032 15.2835 26.757C16.6854 28.6066 18.6944 30 21 30C23.3056 30 25.3146 28.6066 26.7165 26.757C28.1217 24.9032 29 22.4908 29 20.2389C29 15.7029 25.4322 12 21 12ZM18.1657 19.6154C18.1657 18.035 19.4347 16.7538 21 16.7538C22.5653 16.7538 23.8343 18.035 23.8343 19.6154C23.8343 21.1958 22.5653 22.4769 21 22.4769C19.4347 22.4769 18.1657 21.1958 18.1657 19.6154ZM21 17.8615C20.0406 17.8615 19.2629 18.6468 19.2629 19.6154C19.2629 20.584 20.0406 21.3692 21 21.3692C21.9594 21.3692 22.7371 20.584 22.7371 19.6154C22.7371 18.6468 21.9594 17.8615 21 17.8615Z" fill="#7B48FF"/>
                    </svg>
                </div>
            </div>
            <div class="stat-value-area">
                <span class="stat-number">40</span><span class="stat-label">/ta</span>
            </div>
        </div>
    </div>

    <!-- Actions Row -->
    <div class="actions-row">
        <!-- Search -->
        <div class="search-box">
            <img src="{{ asset('assets/images/search.svg') }}" class="search-icon" width="20" height="20" alt="Qidiruv">
            <input type="text" placeholder="Qidiruv...">
        </div>

        <div class="filters-and-actions">
            <!-- Filter Filiallar -->
            <div class="status-filter-wrapper" id="branchFilterWrapper" style="margin-right: 12px;">
                <button class="filter-btn" id="branchFilterBtn">
                    <svg width="24" height="24" viewBox="10 10 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M21 12C16.5678 12 13 15.7029 13 20.2389C13 22.4908 13.8783 24.9032 15.2835 26.757C16.6854 28.6066 18.6944 30 21 30C23.3056 30 25.3146 28.6066 26.7165 26.757C28.1217 24.9032 29 22.4908 29 20.2389C29 15.7029 25.4322 12 21 12ZM18.1657 19.6154C18.1657 18.035 19.4347 16.7538 21 16.7538C22.5653 16.7538 23.8343 18.035 23.8343 19.6154C23.8343 21.1958 22.5653 22.4769 21 22.4769C19.4347 22.4769 18.1657 21.1958 18.1657 19.6154ZM21 17.8615C20.0406 17.8615 19.2629 18.6468 19.2629 19.6154C19.2629 20.584 20.0406 21.3692 21 21.3692C21.9594 21.3692 22.7371 20.584 22.7371 19.6154C22.7371 18.6468 21.9594 17.8615 21 17.8615Z" fill="#7B48FF"/>
                    </svg>
                    <span id="branchFilterText" style="max-width: 150px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; display: inline-block; vertical-align: middle;">{{ $selectedBranchName ?? 'Barchasi (Filiallar)' }}</span>
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="flex-shrink: 0;">
                        <polyline points="6 9 12 15 18 9"></polyline>
                    </svg>
                </button>
                
                <div class="custom-status-dropdown" id="branchDropdown" style="max-height: 300px; overflow-y: auto;">
                    <div class="status-item {{ empty($selectedBranch) ? 'active' : '' }}" data-guid="">Barchasi (Filiallar)</div>
                    @if(isset($branches) && is_array($branches))
                        @foreach($branches as $branch)
                            <div class="status-item {{ ($selectedBranch ?? '') == ($branch['branch_guid'] ?? '') ? 'active' : '' }}" data-guid="{{ $branch['branch_guid'] ?? '' }}">{{ $branch['name'] ?? 'Noma\'lum' }}</div>
                        @endforeach
                    @endif
                </div>
            </div>

            <!-- Filter Status -->
            <div class="status-filter-wrapper" id="statusFilterWrapper">
                <button class="filter-btn" id="statusFilterBtn">
                    <img src="{{ asset('assets/images/barchasi.svg') }}" width="20" height="20" alt="Barchasi">
                    <span id="statusFilterText" style="max-width: 150px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; display: inline-block; vertical-align: middle;">{{ $selectedStatusName ?? 'Barchasi (Holati)' }}</span>
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="flex-shrink: 0;">
                        <polyline points="6 9 12 15 18 9"></polyline>
                    </svg>
                </button>
                
                <div class="custom-status-dropdown" id="statusDropdown">
                    <div class="status-item {{ !isset($isActive) ? 'active' : '' }}" data-active="">Barchasi (Holati)</div>
                    <div class="status-item {{ isset($isActive) && $isActive === 'true' ? 'active' : '' }}" data-active="true">Onlayn</div>
                    <div class="status-item {{ isset($isActive) && $isActive === 'false' ? 'active' : '' }}" data-active="false">Oflayn</div>
                </div>
            </div>

            <!-- Date Filter  -->
            <div class="date-filter-wrapper" style="position: relative;">
                <button class="filter-btn date-filter-btn" id="dateFilterBtn">
                    <img src="{{ asset('assets/images/calendar_icon.svg') }}" width="20" height="20" alt="Calendar">
                    <span id="dateFilterText">{{ $selectedDateText ?? 'Sanani tanlang' }}</span>
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <polyline points="6 9 12 15 18 9"></polyline>
                    </svg>
                </button>

                <div class="custom-calendar-dropdown" id="customCalendarDropdown">
                    <div class="calendar-header">
                        <div class="date-range-display" id="calendarDisplayRange" style="font-size: 14px; font-weight: 500;">
                            {{ $selectedDateText ?? 'Sanani tanlang' }}
                        </div>
                        <div class="year-selector" id="yearSelectorBtn">
                            <span id="calendarYearText">2026</span>
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#151515" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <polyline points="6 9 12 15 18 9"></polyline>
                            </svg>
                            <div class="year-dropdown" id="yearDropdown">
                                <!-- Populated by JS -->
                            </div>
                        </div>
                    </div>
                    <div class="calendar-body">
                        <div class="months-sidebar" id="calendarMonths" style="display: none;">
                            <!-- Months populated by JS -->
                        </div>
                        <div class="calendar-grid" style="width: 100%;">
                            <div class="weekdays">
                                <span>Du</span><span>Se</span><span>Cho</span><span>Pa</span><span>Ju</span><span>Sha</span><span>Ya</span>
                            </div>
                            <div class="days-grid" id="calendarDays">
                                <!-- Days populated by JS -->
                            </div>
                        </div>
                    </div>
                    <div class="calendar-footer">
                        <div class="duration-display" id="calendarDuration" style="display: none;">0 kunlik</div>
                        <div class="footer-actions">
                            <button class="reset-btn" id="calendarResetBtn">Qayta tiklash</button>
                            <button class="save-btn" id="calendarSaveBtn">Saqlash</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Barcha filtrlarni tozalash (Faqat parametrlar bo'lganda chiqadi) -->
            @if(request()->hasAny(['branch_guid', 'is_active', 'date']))
            <a href="{{ route('undiruvchilar.index') }}" class="filter-btn" style="text-decoration: none; color: #FF4D4D; border-color: #FF4D4D; display: flex; align-items: center; gap: 6px; box-sizing: border-box;">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M3 12a9 9 0 1 0 9-9 9.75 9.75 0 0 0-6.74 2.74L3 8" />
                    <path d="M3 3v5h5" />
                </svg>
                Tozalash
            </a>
            @endif

            <!-- Xarita Button -->
            <a href="{{ route('undiruvchilar.map') }}" class="primary-btn xarita-btn" style="text-decoration:none;">
                <img src="{{ asset('assets/images/loc.svg') }}" width="20" height="20" alt="Xarita">
                Xarita
            </a>
        </div>
    </div>

    <!-- Data Table -->
    <div class="data-table-container">
        <table class="data-table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>F.I.O</th>
                    <th style="white-space: nowrap;">
                        <div style="display: flex; align-items: center; gap: 6px;">
                            <img src="{{ asset('assets/images/man.svg') }}" width="20" height="20" alt="Jinsi">
                            Jinsi
                        </div>
                    </th>
                    <th style="white-space: nowrap;">
                        <div style="display: flex; align-items: center; gap: 6px;">
                            <img src="{{ asset('assets/images/telefon.svg') }}" width="20" height="20" alt="Telefon">
                            Telefon
                        </div>
                    </th>
                    <th style="white-space: nowrap;">
                        <div style="display: flex; align-items: center; gap: 6px;">
                            <img src="{{ asset('assets/images/ish.svg') }}" width="20" height="20" alt="Ish holati">
                            Ish holati
                        </div>
                    </th>
                    <th style="white-space: nowrap;">
                        <div style="display: flex; align-items: center; gap: 6px;">
                            <img src="{{ asset('assets/images/location.svg') }}" width="20" height="20" alt="Hududlar">
                            Hududlar
                        </div>
                    </th>
                </tr>
            </thead>
           <tbody>
    <!-- Row 1 -->
    <tr>
        <td>1</td>
        <td class="fio-cell">Karimov Jasurbek</td>
        <td class="jinsi-cell">
            <img src="{{ asset('assets/images/erkak.svg') }}" class="gender-icon male" alt="Erkak">
            Erkak
        </td>
        <td>+998 (90) 456-78-12</td>
        <td><span class="status-badge onlayn">Onlayn</span></td>
        <td>Chilonzor 12-mavze</td>
    </tr>

    <!-- Row 2 -->
    <tr>
        <td>2</td>
        <td class="fio-cell">Saidov Bekzod</td>
        <td class="jinsi-cell">
            <img src="{{ asset('assets/images/erkak.svg') }}" class="gender-icon male" alt="Erkak">
            Erkak
        </td>
        <td>+998 (91) 223-11-45</td>
        <td><span class="status-badge oflayn">Oflayn</span></td>
        <td>Yunusobod 4-daha</td>
    </tr>

    <!-- Row 3 -->
    <tr>
        <td>3</td>
        <td class="fio-cell">Tursunov Akmal</td>
        <td class="jinsi-cell">
            <img src="{{ asset('assets/images/erkak.svg') }}" class="gender-icon male" alt="Erkak">
            Erkak
        </td>
        <td>+998 (93) 654-32-10</td>
        <td><span class="status-badge onlayn">Onlayn</span></td>
        <td>Olmazor tumani</td>
    </tr>

    <!-- Row 4 -->
    <tr>
        <td>4</td>
        <td class="fio-cell">Abdullayev Sherzod</td>
        <td class="jinsi-cell">
            <img src="{{ asset('assets/images/erkak.svg') }}" class="gender-icon male" alt="Erkak">
            Erkak
        </td>
        <td>+998 (94) 778-90-22</td>
        <td><span class="status-badge oflayn">Oflayn</span></td>
        <td>Sergeli 6-mavze</td>
    </tr>

    <!-- Row 5 -->
    <tr>
        <td>5</td>
        <td class="fio-cell">Islomov Diyor</td>
        <td class="jinsi-cell">
            <img src="{{ asset('assets/images/erkak.svg') }}" class="gender-icon male" alt="Erkak">
            Erkak
        </td>
        <td>+998 (99) 345-67-89</td>
        <td><span class="status-badge onlayn">Onlayn</span></td>
        <td>Mirzo Ulug‘bek tumani</td>
    </tr>

    <!-- Row 6 -->
    <tr>
        <td>6</td>
        <td class="fio-cell">Qodirov Shaxzod</td>
        <td class="jinsi-cell">
            <img src="{{ asset('assets/images/erkak.svg') }}" class="gender-icon male" alt="Erkak">
            Erkak
        </td>
        <td>+998 (88) 123-45-98</td>
        <td><span class="status-badge oflayn">Oflayn</span></td>
        <td>Bektemir tumani</td>
    </tr>

    <!-- Row 7 -->
    <tr>
        <td>7</td>
        <td class="fio-cell">Raxmonov Farrux</td>
        <td class="jinsi-cell">
            <img src="{{ asset('assets/images/erkak.svg') }}" class="gender-icon male" alt="Erkak">
            Erkak
        </td>
        <td>+998 (95) 567-89-01</td>
        <td><span class="status-badge onlayn">Onlayn</span></td>
        <td>Shayxontohur tumani</td>
    </tr>

    <!-- Row 8 -->
    <tr>
        <td>8</td>
        <td class="fio-cell">Yo‘ldosheva Mohira</td>
        <td class="jinsi-cell">
            <img src="{{ asset('assets/images/ayol.svg') }}" class="gender-icon female" alt="Ayol">
            Ayol
        </td>
        <td>+998 (97) 222-44-66</td>
        <td><span class="status-badge onlayn">Onlayn</span></td>
        <td>Uchtepa tumani</td>
    </tr>

    <!-- Row 9 -->
    <tr>
        <td>9</td>
        <td class="fio-cell">Nazarova Dilnoza</td>
        <td class="jinsi-cell">
            <img src="{{ asset('assets/images/ayol.svg') }}" class="gender-icon female" alt="Ayol">
            Ayol
        </td>
        <td>+998 (90) 111-22-33</td>
        <td><span class="status-badge oflayn">Oflayn</span></td>
        <td>Yakkasaroy tumani</td>
    </tr>

    <!-- Row 10 -->
    <tr>
        <td>10</td>
        <td class="fio-cell">Ergasheva Zilola</td>
        <td class="jinsi-cell">
            <img src="{{ asset('assets/images/ayol.svg') }}" class="gender-icon female" alt="Ayol">
            Ayol
        </td>
        <td>+998 (93) 909-88-77</td>
        <td><span class="status-badge onlayn">Onlayn</span></td>
        <td>Qibray tumani</td>
    </tr>

    <!-- Row 11 -->
    <tr>
        <td>11</td>
        <td class="fio-cell">To‘xtayeva Nigina</td>
        <td class="jinsi-cell">
            <img src="{{ asset('assets/images/ayol.svg') }}" class="gender-icon female" alt="Ayol">
            Ayol
        </td>
        <td>+998 (94) 555-66-77</td>
        <td><span class="status-badge oflayn">Oflayn</span></td>
        <td>Zangiota tumani</td>
    </tr>

    <!-- Row 12 -->
    <tr>
        <td>12</td>
        <td class="fio-cell">Usmonova Shaxnoza</td>
        <td class="jinsi-cell">
            <img src="{{ asset('assets/images/ayol.svg') }}" class="gender-icon female" alt="Ayol">
            Ayol
        </td>
        <td>+998 (91) 888-77-66</td>
        <td><span class="status-badge onlayn">Onlayn</span></td>
        <td>Yangihayot tumani</td>
    </tr>

    <!-- Row 13 -->
    <tr>
        <td>13</td>
        <td class="fio-cell">Rahimova Madina</td>
        <td class="jinsi-cell">
            <img src="{{ asset('assets/images/ayol.svg') }}" class="gender-icon female" alt="Ayol">
            Ayol
        </td>
        <td>+998 (99) 101-20-30</td>
        <td><span class="status-badge oflayn">Oflayn</span></td>
        <td>Bo‘stonliq tumani</td>
    </tr>
</tbody>
        </table>

        <!-- Pagination -->
        <div class="pagination-wrapper">
            <div class="pagination-links">
                <a href="#" class="page-link prev-link">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="15 18 9 12 15 6"></polyline></svg>
                    Orqaga
                </a>
                <a href="#" class="page-number active">1</a>
                <a href="#" class="page-number">2</a>
                <a href="#" class="page-number">3</a>
                <span class="page-dots">...</span>
                <a href="#" class="page-number">20</a>
                <a href="#" class="page-link next-link">
                    Keyingi
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"></polyline></svg>
                </a>
            </div>
            
            <div class="total-records">
                <span>( 600 ) ta undiruvchilar</span>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // KPI Statistics Card Hover Logic
    const statCards = document.querySelectorAll('.stat-card');
    if (statCards.length > 0) {
        let activeCard = statCards[0];
        statCards.forEach(card => {
            card.addEventListener('mouseenter', () => {
                if (card !== activeCard) {
                    activeCard.classList.remove('primary-card');
                    activeCard.classList.remove('decorative-bg');
                }
            });
            card.addEventListener('mouseleave', () => {
                if (card !== activeCard) {
                    activeCard.classList.add('primary-card');
                    activeCard.classList.add('decorative-bg');
                }
            });
            card.addEventListener('click', () => {
                statCards.forEach(c => {
                    c.classList.remove('primary-card');
                    c.classList.remove('decorative-bg');
                });
                activeCard = card;
                card.classList.add('primary-card');
                card.classList.add('decorative-bg');
            });
        });
    }

    const btn = document.getElementById('dateFilterBtn');
    const dropdown = document.getElementById('customCalendarDropdown');
    const monthsContainer = document.getElementById('calendarMonths');
    const daysContainer = document.getElementById('calendarDays');
    const displayRange = document.getElementById('calendarDisplayRange');
    const displayDuration = document.getElementById('calendarDuration');
    const filterText = document.getElementById('dateFilterText');
    const resetBtn = document.getElementById('calendarResetBtn');
    const saveBtn = document.getElementById('calendarSaveBtn');
    
    // Year Selector Elements
    const yearSelectorBtn = document.getElementById('yearSelectorBtn');
    const yearDropdown = document.getElementById('yearDropdown');
    const calendarYearText = document.getElementById('calendarYearText');

    if (!btn || !dropdown) return;

    const months = ['Yanvar', 'Fevral', 'Mart', 'Aprel', 'May', 'Iyun', 'Iyul', 'Avgust', 'Sentyabr', 'Oktyabr', 'Noyabr', 'Dekabr'];
    const shortMonths = ['yan', 'fev', 'mar', 'apr', 'may', 'iyn', 'iyl', 'avg', 'sen', 'okt', 'noy', 'dek'];
    
    let currentYear = new Date().getFullYear();
    const startYear = 2015;
    let startDate = null;
    let endDate = null;

    const initialDateStr = "{{ $selectedDate ?? '' }}";
    if (initialDateStr) {
        startDate = new Date(initialDateStr);
        currentYear = startDate.getFullYear();
    }
    
    calendarYearText.innerText = currentYear;

    // Populate years
    for (let y = startYear; y <= 2026; y++) {
        const yearDiv = document.createElement('div');
        yearDiv.className = 'year-item';
        if (y === currentYear) yearDiv.classList.add('active');
        yearDiv.innerText = y;
        yearDiv.addEventListener('click', (e) => {
            e.stopPropagation();
            currentYear = y;
            calendarYearText.innerText = y;
            yearDropdown.classList.remove('active');
            yearSelectorBtn.classList.remove('active');
            
            // update active year class
            yearDropdown.querySelectorAll('.year-item').forEach(el => el.classList.remove('active'));
            yearDiv.classList.add('active');

            // Re-render calendar for the selected year
            setupCalendar();
            updateRangeClasses();
            updateDisplay();
        });
        yearDropdown.appendChild(yearDiv);
    }

    yearSelectorBtn.addEventListener('click', (e) => {
        e.stopPropagation();
        yearDropdown.classList.toggle('active');
        yearSelectorBtn.classList.toggle('active');
        if (yearDropdown.classList.contains('active')) {
            const activeYear = yearDropdown.querySelector('.active');
            if (activeYear) {
                activeYear.scrollIntoView({ block: 'nearest' });
            }
        }
    });

    // Status Filter Elements
    const statusFilterBtn = document.getElementById('statusFilterBtn');
    const statusDropdown = document.getElementById('statusDropdown');
    const statusFilterText = document.getElementById('statusFilterText');

    // Branch Filter Elements
    const branchFilterBtn = document.getElementById('branchFilterBtn');
    const branchDropdown = document.getElementById('branchDropdown');
    const branchFilterText = document.getElementById('branchFilterText');

    if (branchFilterBtn && branchDropdown) {
        branchFilterBtn.addEventListener('click', (e) => {
            e.stopPropagation();
            branchDropdown.classList.toggle('active');
            branchFilterBtn.classList.toggle('active');
            
            if (statusDropdown) {
                statusDropdown.classList.remove('active');
                statusFilterBtn.classList.remove('active');
            }
        });

        branchDropdown.querySelectorAll('.status-item').forEach(item => {
            item.addEventListener('click', (e) => {
                e.stopPropagation();
                
                branchDropdown.querySelectorAll('.status-item').forEach(el => el.classList.remove('active'));
                item.classList.add('active');
                
                branchFilterText.innerText = item.innerText;
                
                branchDropdown.classList.remove('active');
                branchFilterBtn.classList.remove('active');

                // AJAX emas, to'g'ridan-to'g'ri GET surov
                const branchGuid = item.getAttribute('data-guid') || '';
                const currentUrl = new URL(window.location.href);
                if (branchGuid) {
                    currentUrl.searchParams.set('branch_guid', branchGuid);
                } else {
                    currentUrl.searchParams.delete('branch_guid');
                }
                window.location.href = currentUrl.toString();
            });
        });
    }

    if (statusFilterBtn && statusDropdown) {
        statusFilterBtn.addEventListener('click', (e) => {
            e.stopPropagation();
            statusDropdown.classList.toggle('active');
            statusFilterBtn.classList.toggle('active');

            if (branchDropdown) {
                branchDropdown.classList.remove('active');
                branchFilterBtn.classList.remove('active');
            }
        });

        statusDropdown.querySelectorAll('.status-item').forEach(item => {
            item.addEventListener('click', (e) => {
                e.stopPropagation();
                
                statusDropdown.querySelectorAll('.status-item').forEach(el => el.classList.remove('active'));
                item.classList.add('active');
                
                statusFilterText.innerText = item.innerText;
                
                statusDropdown.classList.remove('active');
                statusFilterBtn.classList.remove('active');

                // AJAX emas, to'g'ridan-to'g'ri GET surov
                const isActive = item.getAttribute('data-active') || '';
                const currentUrl = new URL(window.location.href);
                if (isActive) {
                    currentUrl.searchParams.set('is_active', isActive);
                } else {
                    currentUrl.searchParams.delete('is_active');
                }
                window.location.href = currentUrl.toString();
            });
        });
    }

    // Toggle Dropdown
    btn.addEventListener('click', (e) => {
        e.preventDefault();
        dropdown.classList.toggle('active');
        if (dropdown.classList.contains('active')) {
             if(monthsContainer.querySelector('.active')) {
                 monthsContainer.querySelector('.active').scrollIntoView({block: 'nearest'});
             }
        }
    });

    document.addEventListener('click', (e) => {
        if(!yearSelectorBtn.contains(e.target)) {
            yearDropdown.classList.remove('active');
            yearSelectorBtn.classList.remove('active');
        }
        if(!btn.contains(e.target) && !dropdown.contains(e.target)) {
            dropdown.classList.remove('active');
        }
        if(statusFilterBtn && statusDropdown && !statusFilterBtn.contains(e.target) && !statusDropdown.contains(e.target)) {
            statusDropdown.classList.remove('active');
            statusFilterBtn.classList.remove('active');
        }
        if(branchFilterBtn && branchDropdown && !branchFilterBtn.contains(e.target) && !branchDropdown.contains(e.target)) {
            branchDropdown.classList.remove('active');
            branchFilterBtn.classList.remove('active');
        }
    });

    function setupCalendar() {
        monthsContainer.innerHTML = '';
        daysContainer.innerHTML = '';

        months.forEach((month, index) => {
            const mDiv = document.createElement('div');
            mDiv.className = `month-item`;
            if(index === 0) mDiv.classList.add('active');
            mDiv.innerText = month;
            mDiv.dataset.idx = index;
            mDiv.addEventListener('click', () => {
                const el = daysContainer.querySelector(`[data-grid-month="${index}"]`);
                if(el) {
                    daysContainer.scrollTo({
                        top: el.offsetTop - daysContainer.offsetTop,
                        behavior: 'smooth'
                    });
                }
            });
            monthsContainer.appendChild(mDiv);

            const title = document.createElement('div');
            title.className = 'grid-month-title';
            title.innerText = month;
            title.dataset.gridMonth = index;
            daysContainer.appendChild(title);

            const firstDayIndex = new Date(currentYear, index, 1).getDay();
            const daysInMonth = new Date(currentYear, index + 1, 0).getDate();
            let startDay = firstDayIndex === 0 ? 6 : firstDayIndex - 1;

            for (let i = 0; i < startDay; i++) {
                const empty = document.createElement('div');
                empty.className = 'day-cell empty';
                daysContainer.appendChild(empty);
            }

            for (let i = 1; i <= daysInMonth; i++) {
                const cell = document.createElement('div');
                cell.className = 'day-cell';
                const cellTime = new Date(currentYear, index, i, 0, 0, 0).getTime();
                cell.dataset.time = cellTime;

                const span = document.createElement('span');
                span.innerText = i;
                cell.appendChild(span);

                cell.addEventListener('click', () => {
                    startDate = new Date(cellTime);
                    updateRangeClasses();
                    updateDisplay();
                });

                // Single date logic doesn't need hover
                cell.addEventListener('mouseenter', () => {
                    // Mute hover
                });

                daysContainer.appendChild(cell);
            }
        });

        // Intersection Observer for highlighting sidebar (muted)
        const observer = new IntersectionObserver((entries) => {
            // Do nothing as sidebar is hidden
        }, { root: daysContainer, rootMargin: '0px 0px -80% 0px' });

        document.querySelectorAll('.grid-month-title').forEach(t => observer.observe(t));

        // Scroll to the current month if initial date is set
        if (startDate) {
            setTimeout(() => {
                const initialMonth = startDate.getMonth();
                const el = daysContainer.querySelector(`[data-grid-month="${initialMonth}"]`);
                if(el) {
                    daysContainer.scrollTo({
                        top: el.offsetTop - daysContainer.offsetTop,
                        behavior: 'auto'
                    });
                }
            }, 50);
        }
    }

    daysContainer.addEventListener('mouseleave', () => {
        // Mute range leave
    });

    function updateRangeClasses() {
        const cells = daysContainer.querySelectorAll('.day-cell:not(.empty)');
        const sTime = startDate ? startDate.getTime() : null;

        cells.forEach(cell => {
            const cTime = parseInt(cell.dataset.time);
            cell.classList.remove('selected-start', 'selected-end', 'in-range');

            if (sTime && cTime === sTime) cell.classList.add('selected-start');
        });
    }

    function updateDisplay() {
        if (startDate) {
            const startStr = `${startDate.getDate()} ${shortMonths[startDate.getMonth()]} ${startDate.getFullYear()}`;
            displayRange.innerHTML = startStr;
        } else {
            displayRange.innerHTML = 'Sanani tanlang';
        }
    }

    resetBtn.addEventListener('click', () => {
        startDate = null;
        updateDisplay();
        updateRangeClasses();
        
        // Optionally redirect directly on reset
        // const currentUrl = new URL(window.location.href);
        // currentUrl.searchParams.delete('date');
        // window.location.href = currentUrl.toString();
    });

    saveBtn.addEventListener('click', () => {
        if (startDate) {
            const y = startDate.getFullYear();
            const m = String(startDate.getMonth() + 1).padStart(2, '0');
            const d = String(startDate.getDate()).padStart(2, '0');
            const dateStr = `${y}-${m}-${d}`;
            
            const currentUrl = new URL(window.location.href);
            currentUrl.searchParams.set('date', dateStr);
            window.location.href = currentUrl.toString();
        } else {
            const currentUrl = new URL(window.location.href);
            currentUrl.searchParams.delete('date');
            window.location.href = currentUrl.toString();
        }
    });

    setupCalendar();
    updateDisplay();
});
</script>
@endpush
