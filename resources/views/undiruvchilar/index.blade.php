@extends('layouts.app')

@section('title', 'Undiruvchilar - Undiruv')

@section('page-title', 'Undiruvchilar')

@section('content')
<div class="undiruvchilar-container">
    <!-- Actions Row -->
    <div class="actions-row">
        <!-- Search -->
        <div class="search-box">
            <img src="{{ asset('assets/images/search.svg') }}" class="search-icon" width="20" height="20" alt="Qidiruv">
            <input type="text" placeholder="Qidiruv...">
        </div>

        <div class="filters-and-actions">
            <!-- Filter Status -->
            <div class="status-filter-wrapper" id="statusFilterWrapper">
                <button class="filter-btn" id="statusFilterBtn">
                    <img src="{{ asset('assets/images/barchasi.svg') }}" width="20" height="20" alt="Barchasi">
                    <span id="statusFilterText">Barchasi</span>
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <polyline points="6 9 12 15 18 9"></polyline>
                    </svg>
                </button>
                
                <div class="custom-status-dropdown" id="statusDropdown">
                    <div class="status-item active" data-status="barchasi">Barchasi</div>
                    <div class="status-item" data-status="onlayn">Onlayn</div>
                    <div class="status-item" data-status="oflayn">Oflayn</div>
                </div>
            </div>

            <!-- Date Filter  -->
            <div class="date-filter-wrapper" style="position: relative;">
                <button class="filter-btn date-filter-btn" id="dateFilterBtn">
                    <img src="{{ asset('assets/images/calendar_icon.svg') }}" width="20" height="20" alt="Calendar">
                    <span id="dateFilterText">Fev 1 - Fev 28 gacha</span>
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <polyline points="6 9 12 15 18 9"></polyline>
                    </svg>
                </button>

                <div class="custom-calendar-dropdown" id="customCalendarDropdown">
                    <div class="calendar-header">
                        <div class="date-range-display" id="calendarDisplayRange">
                            21 oct 2026 - dan / 6 noy 2026-gacha
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
                        <div class="months-sidebar" id="calendarMonths">
                            <!-- Months populated by JS -->
                        </div>
                        <div class="calendar-grid">
                            <div class="weekdays">
                                <span>Du</span><span>Se</span><span>Cho</span><span>Pa</span><span>Ju</span><span>Sha</span><span>Ya</span>
                            </div>
                            <div class="days-grid" id="calendarDays">
                                <!-- Days populated by JS -->
                            </div>
                        </div>
                    </div>
                    <div class="calendar-footer">
                        <div class="duration-display" id="calendarDuration">0 kunlik</div>
                        <div class="footer-actions">
                            <button class="reset-btn" id="calendarResetBtn">Qayta tiklash</button>
                            <button class="save-btn" id="calendarSaveBtn">Saqlash</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Xarita Button -->
            <button class="primary-btn xarita-btn">
                <img src="{{ asset('assets/images/loc.svg') }}" width="20" height="20" alt="Xarita">
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
    
    let currentYear = 2026;
    const startYear = 2015;
    let startDate = null;
    let endDate = null;
    let hoverDate = null;

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

    if (statusFilterBtn && statusDropdown) {
        statusFilterBtn.addEventListener('click', (e) => {
            e.stopPropagation();
            statusDropdown.classList.toggle('active');
            statusFilterBtn.classList.toggle('active');
        });

        statusDropdown.querySelectorAll('.status-item').forEach(item => {
            item.addEventListener('click', (e) => {
                e.stopPropagation();
                
                // Update active class
                statusDropdown.querySelectorAll('.status-item').forEach(el => el.classList.remove('active'));
                item.classList.add('active');
                
                // Update button text
                statusFilterText.innerText = item.innerText;
                
                // Close dropdown
                statusDropdown.classList.remove('active');
                statusFilterBtn.classList.remove('active');
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
                    if (!startDate || (startDate && endDate)) {
                        startDate = new Date(cellTime);
                        endDate = null;
                    } else if (startDate && !endDate) {
                        const cDate = new Date(cellTime);
                        if (cDate < startDate) {
                            endDate = startDate;
                            startDate = cDate;
                        } else {
                            endDate = cDate;
                        }
                    }
                    updateRangeClasses();
                    updateDisplay();
                });

                cell.addEventListener('mouseenter', () => {
                    if (startDate && !endDate) {
                        hoverDate = new Date(cellTime);
                        updateRangeClasses();
                    }
                });

                daysContainer.appendChild(cell);
            }
        });

        // Intersection Observer for highlighting sidebar
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if(entry.isIntersecting) {
                    const mIdx = entry.target.dataset.gridMonth;
                    document.querySelectorAll('.month-item').forEach(el => el.classList.remove('active'));
                    const activeEl = document.querySelector(`.month-item[data-idx="${mIdx}"]`);
                    if(activeEl) {
                        activeEl.classList.add('active');
                        // Optional: auto scroll sidebar to keep active item in view
                        monthsContainer.scrollTo({
                            top: activeEl.offsetTop - monthsContainer.offsetTop - 50,
                            behavior: 'smooth'
                        });
                    }
                }
            });
        }, { root: daysContainer, rootMargin: '0px 0px -80% 0px' });

        document.querySelectorAll('.grid-month-title').forEach(t => observer.observe(t));
    }

    daysContainer.addEventListener('mouseleave', () => {
        if (startDate && !endDate) {
            hoverDate = null;
            updateRangeClasses();
        }
    });

    function updateRangeClasses() {
        const cells = daysContainer.querySelectorAll('.day-cell:not(.empty)');
        const sTime = startDate ? startDate.getTime() : null;
        const eTime = endDate ? endDate.getTime() : null;
        const hTime = hoverDate ? hoverDate.getTime() : null;

        cells.forEach(cell => {
            const cTime = parseInt(cell.dataset.time);
            cell.classList.remove('selected-start', 'selected-end', 'in-range');

            if (sTime && cTime === sTime) cell.classList.add('selected-start');
            if (eTime && cTime === eTime) cell.classList.add('selected-end');

            if (sTime && eTime) {
                if (cTime > sTime && cTime < eTime) {
                    cell.classList.add('in-range');
                }
            } else if (sTime && hTime && !eTime) {
                const min = Math.min(sTime, hTime);
                const max = Math.max(sTime, hTime);
                if (cTime > min && cTime < max) {
                    cell.classList.add('in-range');
                }
                if (cTime === hTime) {
                    cell.classList.add('selected-end');
                }
            }
        });
    }

    function updateDisplay() {
        if (startDate && endDate) {
            const startStr = `${startDate.getDate()} ${shortMonths[startDate.getMonth()]} ${startDate.getFullYear()}`;
            const endStr = `${endDate.getDate()} ${shortMonths[endDate.getMonth()]} ${endDate.getFullYear()}`;
            displayRange.innerHTML = `${startStr} - dan / ${endStr}-gacha`;
            
            const diffTime = Math.abs(endDate - startDate);
            const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24)) + 1; 
            displayDuration.innerText = `${diffDays} kunlik`;
        } else if (startDate) {
            const startStr = `${startDate.getDate()} ${shortMonths[startDate.getMonth()]} ${startDate.getFullYear()}`;
            displayRange.innerHTML = startStr;
            displayDuration.innerText = `1 kunlik`;
        } else {
            displayRange.innerHTML = '21 oct 2026 - dan / 6 noy 2026-gacha';
            displayDuration.innerText = `16 kunlik`;
        }
    }

    resetBtn.addEventListener('click', () => {
        startDate = null;
        endDate = null;
        updateDisplay();
        updateRangeClasses();
    });

    saveBtn.addEventListener('click', () => {
        if (startDate && endDate) {
            const startStr = `${shortMonths[startDate.getMonth()]} ${startDate.getDate()}`;
            const endStr = `${shortMonths[endDate.getMonth()]} ${endDate.getDate()}`;
            filterText.innerText = `${startStr} - ${endStr} gacha`;
            dropdown.classList.remove('active');
        } else if (startDate) {
            filterText.innerText = `${shortMonths[startDate.getMonth()]} ${startDate.getDate()}`;
            dropdown.classList.remove('active');
        }
    });

    setupCalendar();
    updateDisplay();
});
</script>
@endpush
