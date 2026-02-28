@extends('layouts.app')

@section('title', 'Undiruvchilar - Undiruv')

@section('page-title', 'Undiruvchilar')

@section('content')
<div class="undiruvchilar-container">
    <!-- Actions Row -->
    <div class="actions-row">
        <!-- Search -->
        <div class="search-box">
            <svg class="search-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <circle cx="11" cy="11" r="8"></circle>
                <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
            </svg>
            <input type="text" placeholder="Qidiruv...">
        </div>

        <div class="filters-and-actions">
            <!-- Filter Barchasi -->
            <button class="filter-btn">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#7B48FF" stroke-width="2">
                   <circle cx="12" cy="12" r="10"></circle>
                   <circle cx="12" cy="12" r="6"></circle>
                   <circle cx="12" cy="12" r="2"></circle>
                </svg>
                <span>Barchasi</span>
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <polyline points="6 9 12 15 18 9"></polyline>
                </svg>
            </button>

            <!-- Date Filter (Mockup for now) -->
            <button class="filter-btn date-filter-btn">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#7B48FF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                    <line x1="16" y1="2" x2="16" y2="6"></line>
                    <line x1="8" y1="2" x2="8" y2="6"></line>
                    <line x1="3" y1="10" x2="21" y2="10"></line>
                </svg>
                <span>Feb 1 - Feb 28 gacha</span>
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <polyline points="6 9 12 15 18 9"></polyline>
                </svg>
            </button>

            <!-- Xarita Button -->
            <button class="primary-btn xarita-btn">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                    <circle cx="12" cy="10" r="3"></circle>
                </svg>
                Xarita
            </button>
        </div>
    </div>

    <!-- Data Table -->
    <div class="data-table-container">
        <table class="data-table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>F.I.O</th>
                    <th>Jinsi</th>
                    <th>Telefon</th>
                    <th>Ish xolati</th>
                    <th>Hududlar</th>
                </tr>
            </thead>
            <tbody>
                <!-- Row 1 -->
                <tr>
                    <td>1</td>
                    <td class="fio-cell">Nodirov shokirbek</td>
                    <td class="jinsi-cell">
                        <img src="{{ asset('assets/images/erkak.svg') }}" class="gender-icon male" alt="Erkak">
                        Erkak
                    </td>
                    <td>+998 (93) 123-45-67</td>
                    <td><span class="status-badge onlayn">Onlayn</span></td>
                    <td>A.Qodiriy ko'chasi</td>
                </tr>
                <!-- Row 2 -->
                <tr>
                    <td>2</td>
                    <td class="fio-cell">Nodirov shokirbek</td>
                    <td class="jinsi-cell">
                        <img src="{{ asset('assets/images/erkak.svg') }}" class="gender-icon male" alt="Erkak">
                        Erkak
                    </td>
                    <td>+998 (93) 123-45-67</td>
                    <td><span class="status-badge onlayn">Onlayn</span></td>
                    <td>A.Qodiriy ko'chasi</td>
                </tr>
                <!-- Row 3 -->
                <tr>
                    <td>3</td>
                    <td class="fio-cell">Nodirov shokirbek</td>
                    <td class="jinsi-cell">
                        <img src="{{ asset('assets/images/erkak.svg') }}" class="gender-icon male" alt="Erkak">
                        Erkak
                    </td>
                    <td>+998 (93) 123-45-67</td>
                    <td><span class="status-badge onlayn">Onlayn</span></td>
                    <td>A.Qodiriy ko'chasi</td>
                </tr>
                <!-- Row 4 -->
                <tr>
                    <td>4</td>
                    <td class="fio-cell">Nodirov shokirbek</td>
                    <td class="jinsi-cell">
                        <img src="{{ asset('assets/images/erkak.svg') }}" class="gender-icon male" alt="Erkak">
                        Erkak
                    </td>
                    <td>+998 (93) 123-45-67</td>
                    <td><span class="status-badge onlayn">Onlayn</span></td>
                    <td>A.Qodiriy ko'chasi</td>
                </tr>
                <!-- Row 5 -->
                <tr>
                    <td>5</td>
                    <td class="fio-cell">Nodirov shokirbek</td>
                    <td class="jinsi-cell">
                        <img src="{{ asset('assets/images/erkak.svg') }}" class="gender-icon male" alt="Erkak">
                        Erkak
                    </td>
                    <td>+998 (93) 123-45-67</td>
                    <td><span class="status-badge onlayn">Onlayn</span></td>
                    <td>A.Qodiriy ko'chasi</td>
                </tr>
                <!-- Row 6 -->
                <tr>
                    <td>6</td>
                    <td class="fio-cell">Nodirov shokirbek</td>
                    <td class="jinsi-cell">
                        <img src="{{ asset('assets/images/erkak.svg') }}" class="gender-icon male" alt="Erkak">
                        Erkak
                    </td>
                    <td>+998 (93) 123-45-67</td>
                    <td><span class="status-badge onlayn">Onlayn</span></td>
                    <td>A.Qodiriy ko'chasi</td>
                </tr>
                <!-- Row 7 -->
                <tr>
                    <td>7</td>
                    <td class="fio-cell">Nodirov shokirbek</td>
                    <td class="jinsi-cell">
                        <img src="{{ asset('assets/images/erkak.svg') }}" class="gender-icon male" alt="Erkak">
                        Erkak
                    </td>
                    <td>+998 (93) 123-45-67</td>
                    <td><span class="status-badge onlayn">Onlayn</span></td>
                    <td>A.Qodiriy ko'chasi</td>
                </tr>
                <!-- Row 8 (Female) -->
                <tr>
                    <td>8</td>
                    <td class="fio-cell">Nodirova Nodiraxon</td>
                    <td class="jinsi-cell">
                        <img src="{{ asset('assets/images/ayol.svg') }}" class="gender-icon female" alt="Ayol">
                        Ayol
                    </td>
                    <td>+998 (93) 123-45-67</td>
                    <td><span class="status-badge oflayn">Oflayn</span></td>
                    <td>A.Qodiriy ko'chasi</td>
                </tr>
                <!-- Row 9 -->
                <tr>
                    <td>9</td>
                    <td class="fio-cell">Nodirova Nodiraxon</td>
                    <td class="jinsi-cell">
                        <img src="{{ asset('assets/images/ayol.svg') }}" class="gender-icon female" alt="Ayol">
                        Ayol
                    </td>
                    <td>+998 (93) 123-45-67</td>
                    <td><span class="status-badge oflayn">Oflayn</span></td>
                    <td>A.Qodiriy ko'chasi</td>
                </tr>
                <!-- Row 10 -->
                <tr>
                    <td>10</td>
                    <td class="fio-cell">Nodirova Nodiraxon</td>
                    <td class="jinsi-cell">
                        <img src="{{ asset('assets/images/ayol.svg') }}" class="gender-icon female" alt="Ayol">
                        Ayol
                    </td>
                    <td>+998 (93) 123-45-67</td>
                    <td><span class="status-badge oflayn">Oflayn</span></td>
                    <td>A.Qodiriy ko'chasi</td>
                </tr>
                <!-- Row 11 -->
                <tr>
                    <td>11</td>
                    <td class="fio-cell">Nodirova Nodiraxon</td>
                    <td class="jinsi-cell">
                        <img src="{{ asset('assets/images/ayol.svg') }}" class="gender-icon female" alt="Ayol">
                        Ayol
                    </td>
                    <td>+998 (93) 123-45-67</td>
                    <td><span class="status-badge oflayn">Oflayn</span></td>
                    <td>A.Qodiriy ko'chasi</td>
                </tr>
                <!-- Row 12 -->
                <tr>
                    <td>12</td>
                    <td class="fio-cell">Nodirova Nodiraxon</td>
                    <td class="jinsi-cell">
                        <img src="{{ asset('assets/images/ayol.svg') }}" class="gender-icon female" alt="Ayol">
                        Ayol
                    </td>
                    <td>+998 (93) 123-45-67</td>
                    <td><span class="status-badge oflayn">Oflayn</span></td>
                    <td>A.Qodiriy ko'chasi</td>
                </tr>
                <!-- Row 13 -->
                <tr>
                    <td>13</td>
                    <td class="fio-cell">Nodirova Nodiraxon</td>
                    <td class="jinsi-cell">
                        <img src="{{ asset('assets/images/ayol.svg') }}" class="gender-icon female" alt="Ayol">
                        Ayol
                    </td>
                    <td>+998 (93) 123-45-67</td>
                    <td><span class="status-badge oflayn">Oflayn</span></td>
                    <td>A.Qodiriy ko'chasi</td>
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
