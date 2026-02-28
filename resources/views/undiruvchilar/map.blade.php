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
    ['name'=>'Nodirova Nodiraxon', 'status'=>'orange', 'lat'=>41.3200, 'lng'=>69.2450],
    ['name'=>'Nodirova Nodiraxon', 'status'=>'orange', 'lat'=>41.3150, 'lng'=>69.2490],
    ['name'=>'Nodirova Nodiraxon', 'status'=>'orange', 'lat'=>41.3100, 'lng'=>69.2540],
    ['name'=>'Nodirova Nodiraxon', 'status'=>'orange', 'lat'=>41.3050, 'lng'=>69.2590],
    ['name'=>'Nodirova Nodiraxon', 'status'=>'orange', 'lat'=>41.3000, 'lng'=>69.2640],
    ['name'=>'Nodirov Shokirbek',  'status'=>'green',  'lat'=>41.2950, 'lng'=>69.2690],
    ['name'=>'Nodirov Shokirbek',  'status'=>'green',  'lat'=>41.2900, 'lng'=>69.2740],
    ['name'=>'Nodirov Shokirbek',  'status'=>'green',  'lat'=>41.2850, 'lng'=>69.2790],
    ['name'=>'Nodirov Shokirbek',  'status'=>'green',  'lat'=>41.2800, 'lng'=>69.2840],
    ['name'=>'Nodirov Shokirbek',  'status'=>'green',  'lat'=>41.2750, 'lng'=>69.2890],
    ['name'=>'Nodirov Shokirbek',  'status'=>'green',  'lat'=>41.2700, 'lng'=>69.2940],
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
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#ABABAB" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
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
                <span class="map-person-name">{{ $p['name'] }}</span>
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#CBCBCB" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="map-person-arrow"><polyline points="9 18 15 12 9 6"/></svg>
            </div>
            @endforeach
        </div>

    </div>

    {{-- RIGHT MAP AREA --}}
    <div class="map-right-area">
        <div class="map-overlay-search">
            <img src="{{ asset('assets/images/search.svg') }}" class="search-icon" width="20" height="20" alt="Qidiruv">
            <input type="text" id="mapLocationSearch" placeholder="Manzilni qidirish...">
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
        center: [41.297, 69.270],
        zoom: 13,
        controls: ['zoomControl'],
        type: 'yandex#map',
    }, {
        suppressMapOpenBlock: true,
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

    // ---- Location search (geocoding) ----
    var locationInput = document.getElementById('mapLocationSearch');
    var searchMarker = null;

    function searchLocation(query) {
        if (!query || query.length < 2) return;
        ymaps.geocode(query, { results: 1 }).then(function(res) {
            var firstGeoObject = res.geoObjects.get(0);
            if (!firstGeoObject) return;
            var coords = firstGeoObject.geometry.getCoordinates();
            var name = firstGeoObject.getAddressLine();

            // Remove old search marker
            if (searchMarker) map.geoObjects.remove(searchMarker);

            // Add new marker
            searchMarker = new ymaps.Placemark(coords, {
                balloonContent: name,
            }, {
                preset: 'islands#redDotIcon',
            });
            map.geoObjects.add(searchMarker);
            map.panTo(coords, { flying: true, duration: 600 });
            map.setZoom(15, { smooth: true, duration: 400 });
            searchMarker.balloon.open();
        });
    }

    locationInput.addEventListener('keydown', function(e) {
        if (e.key === 'Enter') {
            e.preventDefault();
            searchLocation(this.value.trim());
        }
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
});
</script>
@endpush
