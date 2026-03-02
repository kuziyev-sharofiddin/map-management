@extends('layouts.app')

@section('title', 'Xarita - Undiruv')
@section('page-title', 'Undiruvchilar')
@section('body-class', 'map-page')

@push('styles')
<link href="{{ asset('assets/css/map.css') }}?v={{ time() }}" rel="stylesheet">
@endpush

@section('content')

@php
$people = [
    ['name'=>'Karimova Shahlo', 'status'=>'orange', 'lat'=>41.3200, 'lng'=>69.2450],
    ['name'=>'Usmonov Jamshid', 'status'=>'orange', 'lat'=>41.3150, 'lng'=>69.2490],
    ['name'=>'Nodirova Nodiraxon', 'status'=>'orange', 'lat'=>41.3100, 'lng'=>69.2540],
    ['name'=>'Rustamov Alisher', 'status'=>'orange', 'lat'=>41.3050, 'lng'=>69.2590],
    ['name'=>'Otaxonov Murod', 'status'=>'orange', 'lat'=>41.3000, 'lng'=>69.2640],
    ['name'=>'Nodirov Shokirbek',  'status'=>'green',  'lat'=>41.2950, 'lng'=>69.2690],
    ['name'=>'Qosimov Bekzod',  'status'=>'green',  'lat'=>41.2900, 'lng'=>69.2740],
    ['name'=>'Yuldasheva Malika',  'status'=>'green',  'lat'=>41.2850, 'lng'=>69.2790],
    ['name'=>'Ismailov Doston',  'status'=>'green',  'lat'=>41.2800, 'lng'=>69.2840],
    ['name'=>'Tursunova Feruza',  'status'=>'green',  'lat'=>41.2750, 'lng'=>69.2890],
    ['name'=>'Xusanov Jasur',  'status'=>'green',  'lat'=>41.2700, 'lng'=>69.2940],
];
@endphp

<div class="map-page-wrapper">

    {{-- LEFT PANEL --}}
    <div class="map-left-panel">

        {{-- Top card (back + search + filters) --}}
        <div class="map-top-card">
            <div class="map-panel-header">
                <a href="{{ route('undiruvchilar.index') }}" class="map-back-btn">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#151515" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                        <polyline points="15 18 9 12 15 6"></polyline>
                    </svg>
                </a>
                <span class="map-panel-title">Xarita</span>
            </div>

            <div class="map-search-box">
                <img src="{{ asset('assets/images/search.svg') }}" class="search-icon" width="20" height="20" alt="Qidiruv">
                <input type="text" id="mapSearchInput" placeholder="Undiruvchini qidirish...">
            </div>

            <div class="map-filter-row">
                <div class="date-filter-wrapper" style="position: relative;">
                    <button class="map-filter-btn" id="mapDateFilterBtn">
                        <img src="{{ asset('assets/images/calendar_icon.svg') }}" width="20" height="20" alt="Calendar">
                        <span class="map-filter-btn-label" id="mapDateFilterText">Fev 1 - Fev 28 gacha</span>
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="map-filter-btn-arrow"><polyline points="6 9 12 15 18 9"/></svg>
                    </button>

                    <div class="custom-calendar-dropdown" id="mapCalendarDropdown">
                        <div class="calendar-header">
                            <div class="date-range-display" id="mapCalendarDisplayRange">
                                21 oct 2026 - dan / 6 noy 2026-gacha
                            </div>
                            <div class="year-selector" id="mapYearSelectorBtn">
                                <span id="mapCalendarYearText">2026</span>
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#151515" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <polyline points="6 9 12 15 18 9"></polyline>
                                </svg>
                                <div class="year-dropdown" id="mapYearDropdown"></div>
                            </div>
                        </div>
                        <div class="calendar-body">
                            <div class="months-sidebar" id="mapCalendarMonths"></div>
                            <div class="calendar-grid">
                                <div class="weekdays">
                                    <span>Du</span><span>Se</span><span>Cho</span><span>Pa</span><span>Ju</span><span>Sha</span><span>Ya</span>
                                </div>
                                <div class="days-grid" id="mapCalendarDays"></div>
                            </div>
                        </div>
                        <div class="calendar-footer">
                            <div class="duration-display" id="mapCalendarDuration">0 kunlik</div>
                            <div class="footer-actions">
                                <button class="reset-btn" id="mapCalendarResetBtn">Qayta tiklash</button>
                                <button class="save-btn" id="mapCalendarSaveBtn">Saqlash</button>
                            </div>
                        </div>
                    </div>
                </div>
                
                {{-- TIME FILTER --}}
                <div class="time-filter-wrapper" style="position: relative;">
                    <button class="map-filter-btn" id="mapTimeFilterBtn">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M11.9466 2H12.0534C14.2007 1.99999 15.8835 1.99998 17.1966 2.17651C18.5405 2.3572 19.601 2.73426 20.4334 3.56664C21.2657 4.39902 21.6428 5.45951 21.8235 6.80345C22 8.11646 22 9.79929 22 11.9466V12.0534C22 14.2007 22 15.8835 21.8235 17.1966C21.6428 18.5405 21.2657 19.601 20.4334 20.4334C19.601 21.2657 18.5405 21.6428 17.1966 21.8235C15.8835 22 14.2007 22 12.0534 22H11.9466C9.79929 22 8.11646 22 6.80345 21.8235C5.45951 21.6428 4.39902 21.2657 3.56664 20.4334C2.73426 19.601 2.3572 18.5405 2.17651 17.1966C1.99998 15.8835 1.99999 14.2007 2 12.0534V11.9466C1.99999 9.79928 1.99998 8.11646 2.17651 6.80345C2.3572 5.45951 2.73426 4.39902 3.56664 3.56664C4.39902 2.73426 5.45951 2.3572 6.80345 2.17651C8.11646 1.99998 9.79928 1.99999 11.9466 2ZM6.98937 3.55941C5.80016 3.7193 5.08321 4.02339 4.5533 4.5533C4.02339 5.08321 3.7193 5.80016 3.55941 6.98937C3.39683 8.19866 3.39535 9.7877 3.39535 12C3.39535 14.2123 3.39683 15.8013 3.55941 17.0106C3.7193 18.1998 4.02339 18.9168 4.5533 19.4467C5.08321 19.9766 5.80016 20.2807 6.98937 20.4406C8.19866 20.6032 9.7877 20.6047 12 20.6047C14.2123 20.6047 15.8013 20.6032 17.0106 20.4406C18.1998 20.2807 18.9168 19.9766 19.4467 19.4467C19.9766 18.9168 20.2807 18.1998 20.4406 17.0106C20.6032 15.8013 20.6047 14.2123 20.6047 12C20.6047 9.7877 20.6032 8.19866 20.4406 6.98937C20.2807 5.80016 19.9766 5.08321 19.4467 4.5533C18.9168 4.02339 18.1998 3.7193 17.0106 3.55941C15.8013 3.39683 14.2123 3.39535 12 3.39535C9.7877 3.39535 8.19866 3.39683 6.98937 3.55941ZM12 7.5814C12.3853 7.5814 12.6977 7.89376 12.6977 8.27907V11.711L14.8189 13.8323C15.0914 14.1047 15.0914 14.5465 14.8189 14.8189C14.5465 15.0914 14.1047 15.0914 13.8323 14.8189L11.8472 12.8339C11.5784 12.565 11.4439 12.4306 11.3731 12.2597C11.3023 12.0887 11.3023 11.8986 11.3023 11.5184V8.27907C11.3023 7.89376 11.6147 7.5814 12 7.5814Z" fill="#7B48FF"/>
                        </svg>
                        <span class="map-filter-btn-label" id="mapTimeFilterText">12:45 - 00:00 gacha</span>
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="map-filter-btn-arrow"><polyline points="6 9 12 15 18 9"/></svg>
                    </button>

                    {{-- TIME DROPDOWN (Interactive UI mimicking oclock.svg) --}}
                    <div class="time-dropdown" id="mapTimeDropdown" style="display: none;">
                        <div class="time-dropdown-header">Vaqtni o'rnatish</div>
                        <div class="time-dropdown-tabs">
                            <div class="time-tab active" id="timeTabFrom">
                                <span>Dan</span> <span class="time-val" id="timeValFrom">12:00</span>
                            </div>
                            <div class="time-tab" id="timeTabTo">
                                <span>Gacha</span> <span class="time-val" id="timeValTo">16:00</span>
                            </div>
                        </div>

                        <div class="time-picker-body">
                            {{-- Fade overlays --}}
                            <div class="time-picker-fade-top"></div>
                            <div class="time-picker-fade-bottom"></div>
                            {{-- Selection borders --}}
                            <div class="time-picker-select-overlay"></div>

                            <div class="time-wheels">
                                <div class="time-wheel" id="wheelHour">
                                    <div class="wheel-scroller" id="scrollHour">
                                        <!-- Built via JS -->
                                    </div>
                                </div>
                                <div class="time-colon">:</div>
                                <div class="time-wheel" id="wheelMinute">
                                    <div class="wheel-scroller" id="scrollMinute">
                                        <!-- Built via JS -->
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="time-dropdown-footer">
                            <button class="time-btn-cancel" id="timeBtnCancel">Bekor qilish</button>
                            <button class="time-btn-save" id="timeBtnSave">Saqlash</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>{{-- /map-top-card --}}

        <div class="map-tabs">
            <button class="map-tab active" data-tab="all">Barchasi</button>
            <button class="map-tab" data-tab="online">Onlayn</button>
            <button class="map-tab" data-tab="offline">Oflayn</button>
        </div>

        <div class="map-person-list" id="mapPersonList">
            @foreach($people as $i => $p)
            <div class="map-person-item {{ $i === 0 ? 'active' : '' }}"
                 data-lat="{{ $p['lat'] }}" data-lng="{{ $p['lng'] }}"
                 data-name="{{ $p['name'] }}" data-status="{{ $p['status'] }}">
                <span class="map-person-dot dot-{{ $p['status'] }}"></span>
                <span class="map-person-name" style="flex: 1;">{{ $p['name'] }}</span>
                <img src="{{ asset('assets/images/strelka.svg') }}" width="24" height="24" class="map-person-arrow" alt="Arrow">
            </div>
            @endforeach
        </div>

    </div>

    {{-- RIGHT MAP AREA --}}
    <div class="map-right-area">
        
        <!-- Custom Zoom Controls -->
        <div class="map-custom-zoom">
            <div class="zoom-btn" id="mapZoomIn"></div>
            <div class="zoom-btn" id="mapZoomOut"></div>
            <img src="{{ asset('assets/images/plus-minus.svg') }}" alt="Zoom Controls">
        </div>

        <div id="yandexMap"></div>
    </div>

</div>

@endsection

@push('scripts')
<script src="https://api-maps.yandex.ru/2.1/?apikey={{ env('YANDEX_MAPS_API_KEY') }}&lang=uz_UZ" type="text/javascript"></script>
<script>
ymaps.ready(function () {

    var rows     = Array.from(document.querySelectorAll('.map-person-item'));
    var coords   = rows.map(function(r){ return [parseFloat(r.dataset.lat), parseFloat(r.dataset.lng)]; });
    var statuses = rows.map(function(r){ return r.dataset.status; });

    // ---- Init map ----
    var map = new ymaps.Map('yandexMap', {
        center: [40.386, 71.786], // Farg'ona shahri markazi
        zoom: 13,
        controls: [],
        type: 'yandex#map',
    }, {
        suppressMapOpenBlock: true,
    });

    // Custom Zoom Events
    document.getElementById('mapZoomIn').addEventListener('click', function() {
        var z = map.getZoom();
        map.setZoom(z + 1, { smooth: true, duration: 200 });
    });
    
    document.getElementById('mapZoomOut').addEventListener('click', function() {
        var z = map.getZoom();
        map.setZoom(z - 1, { smooth: true, duration: 200 });
    });

    // ---- Route polyline ----
    var polyline = new ymaps.Polyline(coords, {}, {
        strokeColor: '#333333',
        strokeWidth: 2,
        strokeStyle: 'dash',
        strokeOpacity: 0.8,
    });
    map.geoObjects.add(polyline);

    // ---- Dot markers ----
    var placemarks = [];
    coords.forEach(function(c, i) {
        var color = statuses[i] === 'green' ? '#45BF84' : '#D49859';
        var pm = new ymaps.Placemark(c, {
            balloonContent: '<strong>' + rows[i].dataset.name + '</strong>',
        }, {
            iconLayout: 'default#image',
            iconImageHref: 'data:image/svg+xml,' + encodeURIComponent(
                '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16">' +
                '<circle cx="8" cy="8" r="6" fill="' + color + '" stroke="#fff" stroke-width="2"/>' +
                '</svg>'
            ),
            iconImageSize: [16, 16],
            iconImageOffset: [-8, -8],
        });
        map.geoObjects.add(pm);
        placemarks.push(pm);
        pm.events.add('click', function(){ setActive(i); });
    });

    // ---- Avatar pin on first point ----
    var avatarPm = new ymaps.Placemark(coords[0], {}, {
        iconLayout: 'default#image',
        iconImageHref: 'data:image/svg+xml,' + encodeURIComponent(
            '<svg xmlns="http://www.w3.org/2000/svg" width="42" height="52">' +
            '<rect x="1" y="1" width="40" height="40" rx="20" fill="#7B48FF"/>' +
            '<text x="21" y="28" font-family="Arial" font-size="16" fill="white" text-anchor="middle">SN</text>' +
            '<polygon points="21,52 10,38 32,38" fill="#7B48FF"/>' +
            '</svg>'
        ),
        iconImageSize: [42, 52],
        iconImageOffset: [-21, -52],
    });
    map.geoObjects.add(avatarPm);

    // ---- Row click ----
    function setActive(idx) {
        rows.forEach(function(r, i){ r.classList.toggle('active', i === idx); });
        map.panTo(coords[idx], { flying: true, duration: 600 });
        map.setZoom(15, { smooth: true, duration: 400 });
        placemarks[idx].balloon.open();
    }
    rows.forEach(function(r, i){ r.addEventListener('click', function(){ setActive(i); }); });

    // ---- Tabs ----
    document.querySelectorAll('.map-tab').forEach(function(tab) {
        tab.addEventListener('click', function() {
            document.querySelectorAll('.map-tab').forEach(function(t){ t.classList.remove('active'); });
            tab.classList.add('active');
            var type = tab.dataset.tab;
            rows.forEach(function(r) {
                var st = r.dataset.status;
                r.style.display = type === 'all' ? '' : (type === 'online' ? (st === 'green' ? '' : 'none') : (st === 'orange' ? '' : 'none'));
            });
        });
    });

    // ---- Search (person filter) ----
    document.getElementById('mapSearchInput').addEventListener('input', function() {
        var q = this.value.toLowerCase();
        rows.forEach(function(r) {
            r.style.display = (!q || r.dataset.name.toLowerCase().indexOf(q) !== -1) ? '' : 'none';
        });
    });

    // ============================================================
    //  MAP PAGE — Custom Calendar (identical to undiruvchilar page)
    // ============================================================
    (function() {
        const btn = document.getElementById('mapDateFilterBtn');
        const dropdown = document.getElementById('mapCalendarDropdown');
        const monthsContainer = document.getElementById('mapCalendarMonths');
        const daysContainer = document.getElementById('mapCalendarDays');
        const displayRange = document.getElementById('mapCalendarDisplayRange');
        const displayDuration = document.getElementById('mapCalendarDuration');
        const filterText = document.getElementById('mapDateFilterText');
        const resetBtn = document.getElementById('mapCalendarResetBtn');
        const saveBtn = document.getElementById('mapCalendarSaveBtn');
        const yearSelectorBtn = document.getElementById('mapYearSelectorBtn');
        const yearDropdown = document.getElementById('mapYearDropdown');
        const calendarYearText = document.getElementById('mapCalendarYearText');

        if (!btn || !dropdown) return;

        const months = ['Yanvar', 'Fevral', 'Mart', 'Aprel', 'May', 'Iyun', 'Iyul', 'Avgust', 'Sentyabr', 'Oktyabr', 'Noyabr', 'Dekabr'];
        const shortMonths = ['Yan', 'Fev', 'Mar', 'Apr', 'May', 'Iyn', 'Iyl', 'Avg', 'Sen', 'Okt', 'Noy', 'Dek'];

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
            yearDiv.addEventListener('click', function(e) {
                e.stopPropagation();
                currentYear = y;
                calendarYearText.innerText = y;
                yearDropdown.classList.remove('active');
                yearSelectorBtn.classList.remove('active');
                yearDropdown.querySelectorAll('.year-item').forEach(function(el) { el.classList.remove('active'); });
                yearDiv.classList.add('active');
                setupCalendar();
                updateRangeClasses();
                updateDisplay();
            });
            yearDropdown.appendChild(yearDiv);
        }

        yearSelectorBtn.addEventListener('click', function(e) {
            e.stopPropagation();
            yearDropdown.classList.toggle('active');
            yearSelectorBtn.classList.toggle('active');
            if (yearDropdown.classList.contains('active')) {
                var activeYear = yearDropdown.querySelector('.active');
                if (activeYear) activeYear.scrollIntoView({ block: 'nearest' });
            }
        });

        btn.addEventListener('click', function(e) {
            e.preventDefault();
            dropdown.classList.toggle('active');
            if (dropdown.classList.contains('active') && monthsContainer.querySelector('.active')) {
                monthsContainer.querySelector('.active').scrollIntoView({ block: 'nearest' });
            }
        });

        document.addEventListener('click', function(e) {
            if (!yearSelectorBtn.contains(e.target)) {
                yearDropdown.classList.remove('active');
                yearSelectorBtn.classList.remove('active');
            }
            if (!btn.contains(e.target) && !dropdown.contains(e.target)) {
                dropdown.classList.remove('active');
            }
        });

        function setupCalendar() {
            monthsContainer.innerHTML = '';
            daysContainer.innerHTML = '';

            months.forEach(function(month, index) {
                var mDiv = document.createElement('div');
                mDiv.className = 'month-item';
                if (index === 0) mDiv.classList.add('active');
                mDiv.innerText = month;
                mDiv.dataset.idx = index;
                mDiv.addEventListener('click', function() {
                    var el = daysContainer.querySelector('[data-grid-month="' + index + '"]');
                    if (el) {
                        daysContainer.scrollTo({ top: el.offsetTop - daysContainer.offsetTop, behavior: 'smooth' });
                    }
                });
                monthsContainer.appendChild(mDiv);

                var title = document.createElement('div');
                title.className = 'grid-month-title';
                title.innerText = month;
                title.dataset.gridMonth = index;
                daysContainer.appendChild(title);

                var firstDayIndex = new Date(currentYear, index, 1).getDay();
                var daysInMonth = new Date(currentYear, index + 1, 0).getDate();
                var startDay = firstDayIndex === 0 ? 6 : firstDayIndex - 1;

                for (var i = 0; i < startDay; i++) {
                    var empty = document.createElement('div');
                    empty.className = 'day-cell empty';
                    daysContainer.appendChild(empty);
                }

                for (var d = 1; d <= daysInMonth; d++) {
                    (function(dayNum) {
                        var cell = document.createElement('div');
                        cell.className = 'day-cell';
                        var cellTime = new Date(currentYear, index, dayNum, 0, 0, 0).getTime();
                        cell.dataset.time = cellTime;
                        var span = document.createElement('span');
                        span.innerText = dayNum;
                        cell.appendChild(span);

                        cell.addEventListener('click', function() {
                            if (!startDate || (startDate && endDate)) {
                                startDate = new Date(cellTime);
                                endDate = null;
                            } else if (startDate && !endDate) {
                                var cDate = new Date(cellTime);
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

                        cell.addEventListener('mouseenter', function() {
                            if (startDate && !endDate) {
                                hoverDate = new Date(cellTime);
                                updateRangeClasses();
                            }
                        });

                        daysContainer.appendChild(cell);
                    })(d);
                }
            });

            var observer = new IntersectionObserver(function(entries) {
                entries.forEach(function(entry) {
                    if (entry.isIntersecting) {
                        var mIdx = entry.target.dataset.gridMonth;
                        dropdown.querySelectorAll('.month-item').forEach(function(el) { el.classList.remove('active'); });
                        var activeEl = dropdown.querySelector('.month-item[data-idx="' + mIdx + '"]');
                        if (activeEl) {
                            activeEl.classList.add('active');
                            monthsContainer.scrollTo({ top: activeEl.offsetTop - monthsContainer.offsetTop - 50, behavior: 'smooth' });
                        }
                    }
                });
            }, { root: daysContainer, rootMargin: '0px 0px -80% 0px' });

            dropdown.querySelectorAll('.grid-month-title').forEach(function(t) { observer.observe(t); });
        }

        daysContainer.addEventListener('mouseleave', function() {
            if (startDate && !endDate) {
                hoverDate = null;
                updateRangeClasses();
            }
        });

        function updateRangeClasses() {
            var cells = daysContainer.querySelectorAll('.day-cell:not(.empty)');
            var sTime = startDate ? startDate.getTime() : null;
            var eTime = endDate ? endDate.getTime() : null;
            var hTime = hoverDate ? hoverDate.getTime() : null;

            cells.forEach(function(cell) {
                var cTime = parseInt(cell.dataset.time);
                cell.classList.remove('selected-start', 'selected-end', 'in-range');
                if (sTime && cTime === sTime) cell.classList.add('selected-start');
                if (eTime && cTime === eTime) cell.classList.add('selected-end');
                if (sTime && eTime) {
                    if (cTime > sTime && cTime < eTime) cell.classList.add('in-range');
                } else if (sTime && hTime && !eTime) {
                    var min = Math.min(sTime, hTime);
                    var max = Math.max(sTime, hTime);
                    if (cTime > min && cTime < max) cell.classList.add('in-range');
                    if (cTime === hTime) cell.classList.add('selected-end');
                }
            });
        }

        function updateDisplay() {
            if (startDate && endDate) {
                var startStr = startDate.getDate() + ' ' + shortMonths[startDate.getMonth()] + ' ' + startDate.getFullYear();
                var endStr = endDate.getDate() + ' ' + shortMonths[endDate.getMonth()] + ' ' + endDate.getFullYear();
                displayRange.innerHTML = startStr + ' - dan / ' + endStr + '-gacha';
                var diffTime = Math.abs(endDate - startDate);
                var diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24)) + 1;
                displayDuration.innerText = diffDays + ' kunlik';
            } else if (startDate) {
                var sStr = startDate.getDate() + ' ' + shortMonths[startDate.getMonth()] + ' ' + startDate.getFullYear();
                displayRange.innerHTML = sStr;
                displayDuration.innerText = '1 kunlik';
            } else {
                displayRange.innerHTML = '21 oct 2026 - dan / 6 noy 2026-gacha';
                displayDuration.innerText = '16 kunlik';
            }
        }

        resetBtn.addEventListener('click', function() {
            startDate = null;
            endDate = null;
            updateDisplay();
            updateRangeClasses();
        });

        saveBtn.addEventListener('click', function() {
            if (startDate && endDate) {
                var sStr = shortMonths[startDate.getMonth()] + ' ' + startDate.getDate();
                var eStr = shortMonths[endDate.getMonth()] + ' ' + endDate.getDate();
                filterText.innerText = sStr + ' - ' + eStr + ' gacha';
                dropdown.classList.remove('active');
            } else if (startDate) {
                filterText.innerText = shortMonths[startDate.getMonth()] + ' ' + startDate.getDate();
                dropdown.classList.remove('active');
            }
        });

        setupCalendar();
        updateDisplay();
    })();

    // ============================================================
    //  MAP PAGE — Interactive Time Picker Logic
    // ============================================================
    (function() {
        const timeBtn = document.getElementById('mapTimeFilterBtn');
        const timeText = document.getElementById('mapTimeFilterText');
        const timeDropdown = document.getElementById('mapTimeDropdown');
        
        const tabFrom = document.getElementById('timeTabFrom');
        const tabTo = document.getElementById('timeTabTo');
        const valFrom = document.getElementById('timeValFrom');
        const valTo = document.getElementById('timeValTo');
        
        const scrollHour = document.getElementById('scrollHour');
        const scrollMinute = document.getElementById('scrollMinute');
        const wheelHour = document.getElementById('wheelHour');
        const wheelMinute = document.getElementById('wheelMinute');
        
        const btnCancel = document.getElementById('timeBtnCancel');
        const btnSave = document.getElementById('timeBtnSave');

        if (!timeBtn || !timeDropdown) return;

        let activeTab = 'from'; // 'from' or 'to'
        let timeFrom = { h: 12, m: 0 };
        let timeTo = { h: 16, m: 0 };

        // Generate wheel items
        function pad(n) { return n < 10 ? '0'+n : n; }
        
        function buildWheel(container, max) {
            container.innerHTML = '';
            for(let i=0; i<max; i++) {
                let div = document.createElement('div');
                div.className = 'time-wheel-item';
                div.dataset.val = i;
                div.innerText = pad(i);
                container.appendChild(div);
            }
        }
        
        buildWheel(scrollHour, 24);
        buildWheel(scrollMinute, 60);

        function updateWheelSelection(wheel) {
            const items = wheel.querySelectorAll('.time-wheel-item');
            const center = wheel.scrollTop + (wheel.clientHeight / 2);
            
            let closestItem = null;
            let minDiff = Infinity;
            
            items.forEach(item => {
                const itemCenter = item.offsetTop - wheel.offsetTop + (item.clientHeight / 2);
                const diff = Math.abs(center - itemCenter);
                if(diff < minDiff) {
                    minDiff = diff;
                    closestItem = item;
                }
                item.classList.remove('selected');
            });
            
            if(closestItem) {
                closestItem.classList.add('selected');
                let val = parseInt(closestItem.dataset.val);
                if(wheel.id === 'wheelHour') {
                    if(activeTab === 'from') timeFrom.h = val;
                    else timeTo.h = val;
                } else {
                    if(activeTab === 'from') timeFrom.m = val;
                    else timeTo.m = val;
                }
                updateTabText();
            }
        }

        // Scroll event with debounce for smooth selection
        let scrollTimeout;
        wheelHour.addEventListener('scroll', () => {
            clearTimeout(scrollTimeout);
            scrollTimeout = setTimeout(() => updateWheelSelection(wheelHour), 50);
        });
        wheelMinute.addEventListener('scroll', () => {
            clearTimeout(scrollTimeout);
            scrollTimeout = setTimeout(() => updateWheelSelection(wheelMinute), 50);
        });

        function updateTabText() {
            valFrom.innerText = pad(timeFrom.h) + ':' + pad(timeFrom.m);
            valTo.innerText = pad(timeTo.h) + ':' + pad(timeTo.m);
        }

        function setWheelValue(wheel, val) {
            const items = wheel.querySelectorAll('.time-wheel-item');
            let targetItem = wheel.querySelector(`.time-wheel-item[data-val="${val}"]`);
            if(targetItem) {
                // Approximate scroll to center target
                wheel.scrollTop = targetItem.offsetTop - wheel.offsetTop - (wheel.clientHeight/2) + (targetItem.clientHeight/2);
                setTimeout(() => updateWheelSelection(wheel), 10);
            }
        }

        function loadTabValues() {
            if(activeTab === 'from') {
                setWheelValue(wheelHour, timeFrom.h);
                setWheelValue(wheelMinute, timeFrom.m);
            } else {
                setWheelValue(wheelHour, timeTo.h);
                setWheelValue(wheelMinute, timeTo.m);
            }
        }

        // Tabs
        tabFrom.addEventListener('click', () => {
            activeTab = 'from';
            tabFrom.classList.add('active');
            tabTo.classList.remove('active');
            loadTabValues();
        });
        tabTo.addEventListener('click', () => {
            activeTab = 'to';
            tabTo.classList.add('active');
            tabFrom.classList.remove('active');
            loadTabValues();
        });

        // Toggle dropdown
        timeBtn.addEventListener('click', function(e) {
            e.stopPropagation();
            if (timeDropdown.style.display === 'none' || timeDropdown.style.display === '') {
                timeDropdown.style.display = 'block';
                // Initialize positions on open
                setTimeout(loadTabValues, 10);
            } else {
                timeDropdown.style.display = 'none';
            }
        });

        // Buttons
        btnCancel.addEventListener('click', () => {
            timeDropdown.style.display = 'none';
        });

        btnSave.addEventListener('click', () => {
            timeText.innerText = pad(timeFrom.h) + ':' + pad(timeFrom.m) + ' - ' + pad(timeTo.h) + ':' + pad(timeTo.m) + ' gacha';
            timeDropdown.style.display = 'none';
        });

        document.addEventListener('click', function(e) {
            if (!timeBtn.contains(e.target) && !timeDropdown.contains(e.target)) {
                timeDropdown.style.display = 'none';
            }
        });

        timeDropdown.addEventListener('click', function(e) {
            e.stopPropagation();
        });
        
        // Initial setup
        updateTabText();
    })();
});
</script>
@endpush
