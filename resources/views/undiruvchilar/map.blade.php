@extends('layouts.app')

@section('title', 'Xarita - Undiruv')
@section('page-title', 'Undiruvchilar')
@section('body-class', 'map-page')

@push('styles')
<link href="{{ asset('assets/css/map.css') }}?v={{ time() }}" rel="stylesheet">
@endpush

@section('content')

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
                <input type="text" id="mapSearchInput" value="{{ $search ?? '' }}" placeholder="Undiruvchini qidirish..." autocomplete="off">
            </div>

            <div class="map-filter-row">
                <!-- Filter Filiallar -->
                <div class="status-filter-wrapper" id="mapBranchFilterWrapper" style="position: relative; margin-bottom: 8px;">
                    <button class="map-filter-btn" id="mapBranchFilterBtn" style="justify-content: flex-start;">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" style="flex-shrink: 0;">
                            <path d="M20 11.1755C20 15.6907 16.4183 21 12 21C7.58172 21 4 15.6907 4 11.1755C4 6.66029 7.58172 3 12 3C16.4183 3 20 6.66029 20 11.1755Z" fill="#7B48FF"/>
                            <path d="M9.5 10.5C9.5 9.11929 10.6193 8 12 8C13.3807 8 14.5 9.11929 14.5 10.5C14.5 11.8807 13.3807 13 12 13C10.6193 13 9.5 11.8807 9.5 10.5Z" fill="#FFFFFF"/>
                        </svg>
                        <span class="map-filter-btn-label" id="mapBranchFilterText" style="flex: 1; text-align: left; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; display: inline-block; vertical-align: middle;">{{ $selectedBranchName ?? 'Barchasi (Filiallar)' }}</span>
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="map-filter-btn-arrow"><polyline points="6 9 12 15 18 9"/></svg>
                    </button>
                    
                    <div class="custom-calendar-dropdown" id="mapBranchDropdown" style="max-height: 300px; overflow-y: auto; padding: 12px; display: none; margin-top: 8px;">
                        <style>
                            .map-branch-item {
                                padding: 10px 14px;
                                border-radius: 8px;
                                cursor: pointer;
                                font-size: 15px;
                                font-weight: 500;
                                color: #807B89;
                                transition: all 0.2s;
                                margin-bottom: 4px;
                            }
                            .map-branch-item:hover {
                                background: #F9F8FF;
                                color: #151515;
                            }
                            .map-branch-item.active {
                                background: #F4F0FF;
                                color: #7B48FF;
                            }
                        </style>
                        <div class="map-branch-item {{ empty($selectedBranch) ? 'active' : '' }}" data-guid="">Barchasi (Filiallar)</div>
                        @if(isset($branches) && is_array($branches))
                            @foreach($branches as $branch)
                                <div class="map-branch-item {{ ($selectedBranch ?? '') == ($branch['branch_guid'] ?? '') ? 'active' : '' }}" data-guid="{{ $branch['branch_guid'] ?? '' }}">{{ $branch['name'] ?? 'Noma\'lum' }}</div>
                            @endforeach
                        @endif
                    </div>
                </div>

                <div class="date-filter-wrapper" style="position: relative;">
                    <button class="map-filter-btn" id="mapDateFilterBtn">
                        <img src="{{ asset('assets/images/calendar_icon.svg') }}" width="20" height="20" alt="Calendar">
                        <span class="map-filter-btn-label" id="mapDateFilterText">{{ $selectedDateText }}</span>
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="map-filter-btn-arrow"><polyline points="6 9 12 15 18 9"/></svg>
                    </button>

                <div class="custom-calendar-dropdown" id="mapCalendarDropdown">
                    <div class="calendar-header">
                        <div class="date-range-display" id="mapCalendarDisplayRange" style="font-size: 14px; font-weight: 500;">
                            {{ $selectedDateText }}
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
                        <div class="months-sidebar" id="mapCalendarMonths" style="display: none;"></div>
                        <div class="calendar-grid" style="width: 100%;">
                            <div class="weekdays">
                                <span>Du</span><span>Se</span><span>Cho</span><span>Pa</span><span>Ju</span><span>Sha</span><span>Ya</span>
                            </div>
                            <div class="days-grid" id="mapCalendarDays"></div>
                        </div>
                    </div>
                    <div class="calendar-footer">
                        <div class="duration-display" id="mapCalendarDuration" style="display: none;">0 kunlik</div>
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
                        <span class="map-filter-btn-label" id="mapTimeFilterText">{{ $selectedTimeText }}</span>
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

                {{-- DIRECTION SWITCH (Ahamiyatsiz, hozircha zapros ketmaydi) --}}
                <div class="map-switch-wrapper" style="display: flex; align-items: center; justify-content: space-between; padding: 16px; background: #FFF; border: 1px solid #EFEFEF; border-radius: 12px; margin-top: 8px;">
                    <span style="font-size: 16px; font-weight: 500; color: #151515; font-family: 'Inter', sans-serif;">Yo'nalishlar orqali</span>
                    <label class="switch-custom" style="position: relative; display: inline-block; width: 44px; height: 24px; margin: 0;">
                        <input type="checkbox" id="mapDirectionSwitch" style="opacity: 0; width: 0; height: 0;" {{ ($locationLimit ?? 1) === 0 ? 'checked' : '' }}>
                        <span class="slider-custom" style="position: absolute; cursor: pointer; top: 0; left: 0; right: 0; bottom: 0; background-color: #E6E4EA; transition: .3s; border-radius: 24px;"></span>
                        <span class="slider-circle" style="position: absolute; content: ''; height: 20px; width: 20px; left: 2px; bottom: 2px; background-color: white; transition: .3s; border-radius: 50%; box-shadow: 0 1px 3px rgba(0,0,0,0.1);"></span>
                    </label>
                    <style>
                        input:checked + .slider-custom { background-color: #45BF84 !important; }
                        input:checked ~ .slider-circle { transform: translateX(20px); }
                    </style>
                </div>
            </div>
        </div>{{-- /map-top-card --}}

        <div class="map-tabs">
            <button class="map-tab {{ empty($isActive) ? 'active' : '' }}" data-tab="all">Barchasi</button>
            <button class="map-tab {{ ($isActive === 'true') ? 'active' : '' }}" data-tab="true">Onlayn</button>
            <button class="map-tab {{ ($isActive === 'false') ? 'active' : '' }}" data-tab="false">Oflayn</button>
        </div>

        <div class="map-person-list" id="mapPersonList">
            @forelse($usersData ?? [] as $i => $user)
            @php
                $uId = $user['user_id'] ?? $user['id'] ?? null;
                $isUserSelected = in_array($uId, $selectedUserIds ?? []);
                
                // Agar userlar tanlangan bo'lsa va bu user tanlanmagan bo'lsa, uni xaritada umuman chiqarmaymiz
                if (!empty($selectedUserIds) && !$isUserSelected) continue;

                $statusStr = (isset($user['is_active']) && $user['is_active']) ? 'green' : 'orange';
                
                // Haqiqiy lokatsiya bo'yicha marker qo'yamiz.
                // Dummy fallback kerak emas, aks holda hamma diagonal bo'lib qoladi.
                // Lekin agar umuman koordinata bo'lmasa, marker qo'shilmaydi.
                $lat = $user['latitude'] ?? $user['map_location_lat'] ?? null;
                $lng = $user['longitude'] ?? $user['map_location_lng'] ?? null;
                
                // Agar tanlangan user bo'lsa, uning xaritasini $locationIndex dan olamiz (oxirgi joylashuvi)
                if ($isUserSelected && isset($locationIndex[$uId]) && !empty($locationIndex[$uId])) {
                    $lastL = end($locationIndex[$uId]);
                    $lat = $lastL['lat'];
                    $lng = $lastL['lng'];
                }

                if (!$lat || !$lng) continue; // Koordinatasi yo'q odam xaritaga tushmaydi!

                $phone = $user['phone'] ?? '';
                $formattedPhone = $phone;
                if (strlen($phone) >= 9) {
                    $code = substr($phone, -9, 2);
                    $p1 = substr($phone, -7, 3);
                    $p2 = substr($phone, -4, 2);
                    $p3 = substr($phone, -2, 2);
                    $formattedPhone = "+998 ($code) $p1-$p2-$p3";
                }
                
                $imageUrl = !empty($user['image']) ? $user['image'] : 'https://ui-avatars.com/api/?name=' . urlencode($user['name'] ?? 'A') . '&background=7B48FF&color=fff';
            @endphp
            <div class="map-person-item {{ ($i === 0 && empty($selectedUserIds)) || $isUserSelected ? 'active' : '' }}"
                 data-id="{{ $uId }}"
                 data-lat="{{ $lat }}" data-lng="{{ $lng }}"
                 data-name="{{ $user['name'] ?? 'Noma\'lum' }}" data-status="{{ $statusStr }}"
                 data-phone="{{ $formattedPhone }}" data-image="{{ $imageUrl }}">
                <span class="map-person-dot dot-{{ $statusStr }}"></span>
                <span class="map-person-name" style="flex: 1;">{{ $user['name'] ?? 'Noma\'lum' }}</span>
                <img src="{{ asset('assets/images/strelka.svg') }}" width="24" height="24" class="map-person-arrow" alt="Arrow">
            </div>
            @empty
            <div style="padding: 20px; text-align: center; color: #888;">Undiruvchilar topilmadi</div>
            @endforelse
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
<script>
    window.appParams = {
        csrfToken: '{{ csrf_token() }}',
        locationsUrl: '{{ route("undiruvchilar.locations") }}',
        selectedDate: '{{ $selectedDate ?? date("Y-m-d") }}',
        startHour: '{{ $startHour ?? "" }}',
        endHour: '{{ $endHour ?? "" }}'
    };
</script>
<script src="https://api-maps.yandex.ru/2.1/?apikey={{ env('YANDEX_MAPS_API_KEY') }}&lang=uz_UZ" type="text/javascript"></script>
<script>
ymaps.ready(function () {

    var rows     = Array.from(document.querySelectorAll('.map-person-item'));
    var coords   = rows.map(function(r){ return [parseFloat(r.dataset.lat), parseFloat(r.dataset.lng)]; });
    var statuses = rows.map(function(r){ return r.dataset.status; });

    if (coords.length === 0) {
        var map = new ymaps.Map('yandexMap', {
            center: [41.311081, 69.240562], // Toshkent markazi fallback
            zoom: 6,
            controls: [],
            type: 'yandex#map',
        }, {
            suppressMapOpenBlock: true,
        });
    } else {
        var map = new ymaps.Map('yandexMap', {
            center: coords[0],
            zoom: 13,
            controls: [],
            type: 'yandex#map',
        }, {
            suppressMapOpenBlock: true,
        });
    }

    // Custom Zoom Events
    document.getElementById('mapZoomIn').addEventListener('click', function() {
        var z = map.getZoom();
        map.setZoom(z + 1, { smooth: true, duration: 200 });
    });
    
    document.getElementById('mapZoomOut').addEventListener('click', function() {
        var z = map.getZoom();
        map.setZoom(z - 1, { smooth: true, duration: 200 });
    });

    // ---- Route polyline (Removed: was incorrectly connecting all user markers together) ----

        // Custom Marker Layout with Glow
        var MarkerLayout = ymaps.templateLayoutFactory.createClass(
            '<div style="cursor: pointer; width: 44px; height: 44px; margin-top: -22px; margin-left: -22px; border-radius: 50%; box-shadow: 0 0 16px 4px $[properties.glowColor]; display: flex; align-items: center; justify-content: center; background: #fff; transition: all 0.2s;">' +
                '<img src="$[properties.iconUrl]" style="width: 40px; height: 40px; border-radius: 50%; border: 3px solid $[properties.borderColor]; object-fit: cover; background: #eee;">' +
            '</div>'
        );

        // ---- Active Avatar pin layout (Bigger and glowing) ----
        var activeMarkerLayout = ymaps.templateLayoutFactory.createClass(
            '<div style="cursor: pointer; width: 64px; height: 64px; margin-top: -32px; margin-left: -32px; border-radius: 50%; box-shadow: 0 0 24px 6px $[properties.glowColor]; display: flex; align-items: center; justify-content: center; background: #fff; z-index: 1000; position: relative; transition: all 0.2s;">' +
                '<img src="$[properties.iconUrl]" style="width: 58px; height: 58px; border-radius: 50%; border: 4px solid $[properties.borderColor]; object-fit: cover; background: #eee;">' +
            '</div>'
        );

        // Build custom markers
        var placemarks = [];
        coords.forEach(function(c, i) {
            var color = statuses[i] === 'green' ? '#45BF84' : '#D49859';
            var glowColor = statuses[i] === 'green' ? 'rgba(33, 150, 243, 0.7)' : 'rgba(244, 67, 54, 0.7)'; // Blue for online, Red for offline
            var borderColor = statuses[i] === 'green' ? '#2196F3' : '#F44336';
            var imgUrl = rows[i].dataset.image || 'https://ui-avatars.com/api/?background=random&color=fff&name=' + encodeURIComponent(rows[i].dataset.name.charAt(0));

            // Custom Balloon Layout
            var customBalloonContent = `
                <div style="min-width: 260px; font-family: Inter, sans-serif; padding: 5px 0;">
                    <div style="display:flex; align-items:center; margin-bottom: 16px;">
                        <img src="${imgUrl}" style="width:40px; height:40px; border-radius:10px; margin-right:12px; object-fit: cover;">
                        <div>
                            <div style="font-weight: 600; font-size: 15px; color:#151515; line-height:1.2; margin-bottom: 2px;">${rows[i].dataset.name}</div>
                            <div style="font-size: 13px; color:#807b89;">Undiruvchi</div>
                        </div>
                    </div>
                    
                    <div style="height:1px; background:#F0F0F0; margin: 0 -15px 16px -15px;"></div>
                    
                    <div style="display:flex; flex-direction:column; gap:12px;">
                        <div style="display:flex; justify-content:space-between; align-items:center; font-size: 13px;">
                            <div style="display:flex; align-items:center; color:#807b89; gap:8px;">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#7B48FF" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
                                <span>Telefon:</span>
                            </div>
                            <span style="font-weight: 600; color:#151515;">${rows[i].dataset.phone}</span>
                        </div>
                        
                        <div style="display:flex; justify-content:space-between; align-items:center; font-size: 13px;">
                            <div style="display:flex; align-items:center; color:#807b89; gap:8px;">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#7B48FF" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><circle cx="12" cy="12" r="3"></circle></svg>
                                <span>Status:</span>
                            </div>
                            <span style="font-weight: 600; color:${color};">${statuses[i] === 'green' ? 'Onlayn' : 'Oflayn'}</span>
                        </div>

                        <div style="display:flex; justify-content:space-between; align-items:center; font-size: 13px;">
                            <div style="display:flex; align-items:center; color:#807b89; gap:8px;">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#7B48FF" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
                                <span>Vaqt:</span>
                            </div>
                            <span style="font-weight: 600; color:#151515;">22.01.2026 / 12:00</span>
                        </div>

                        <div style="display:flex; justify-content:space-between; align-items:center; font-size: 13px;">
                            <div style="display:flex; align-items:center; color:#807b89; gap:8px;">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#7B48FF" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><line x1="10" y1="15" x2="10" y2="9"></line><line x1="14" y1="15" x2="14" y2="9"></line></svg>
                                <span>To'xtab turgan vaqt:</span>
                            </div>
                            <span style="font-weight: 600; color:#45BF84;">Noma'lum</span>
                        </div>
                    </div>
                    
                    <div style="height:1px; background:#F0F0F0; margin: 16px -15px 12px -15px;"></div>
                    
                    <div style="display:flex; justify-content:space-between; align-items:center; font-size: 13px;">
                        <div style="display:flex; align-items:center; color:#807b89; gap:6px;">
                            <span>Kordinata:</span>
                            <span style="font-weight: 600; color:#151515; letter-spacing: 0.5px;">${c[0].toFixed(6)} - ${c[1].toFixed(6)}</span>
                        </div>
                        <div style="position:relative; display:flex; align-items:center;">
                            <span id="copyMsg-${i}" style="position:absolute; right:35px; background:#45BF84; color:#fff; font-size:11px; padding:3px 6px; border-radius:4px; opacity:0; transition:opacity 0.3s ease; pointer-events:none; white-space:nowrap; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">Nusxa olindi</span>
                            <div style="cursor:pointer; display:flex; padding: 5px; border-radius: 6px; background: #F5F4F9; transition: background 0.2s;" title="Nusxa olish" onclick="navigator.clipboard.writeText('${c[0].toFixed(6)}, ${c[1].toFixed(6)}').then(() => { var msg = document.getElementById('copyMsg-${i}'); if(msg) { msg.style.opacity='1'; msg.style.transform='translateY(-2px)'; setTimeout(()=>{ msg.style.opacity='0'; msg.style.transform='translateY(0)'; }, 1500); } var t=this; t.style.background='#d1f0e1'; setTimeout(()=>t.style.background='#F5F4F9', 500); })">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#807b89" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path></svg>
                            </div>
                        </div>
                    </div>
                </div>
            `;

            // Ensure initial row active state matches the marker layout (first one active by default)
            var currentLayout = (i === 0) ? activeMarkerLayout : MarkerLayout;
            if (i === 0 && statuses[i]) {
                glowColor = statuses[i] === 'green' ? 'rgba(33, 150, 243, 0.8)' : 'rgba(244, 67, 54, 0.8)';
            }

            var pm = new ymaps.Placemark(c, {
                balloonContentBody: customBalloonContent,
                iconUrl: imgUrl,
                glowColor: glowColor,
                borderColor: borderColor
            }, {
                balloonPanelMaxMapArea: 0,
                hideIconOnBalloonOpen: false,
                balloonOffset: [0, -26],
                iconLayout: currentLayout,
                iconShape: {
                    type: 'Rectangle',
                    coordinates: [[-32, -32], [32, 32]] // Make the clickable area large enough
                },
                zIndex: (i === 0) ? 1000 : 0
            });
            map.geoObjects.add(pm);
            placemarks.push(pm);
        });

        // ---- Location index from server (preloaded, no extra AJAX) ----
        var locationIndex = {!! json_encode($locationIndex ?? []) !!};
        var locationLimit = {{ $locationLimit ?? 1 }};
        var drawnPolylines = {};

        // helper: toggling polyline for a given userId
        function togglePolyline(idx) {
            var userId = rows[idx].dataset.id;
            if (!userId) return;

            console.log('[Polyline] userId:', userId, 'locs:', (locationIndex[userId] || []).length, 'allKeys:', Object.keys(locationIndex));

            if (drawnPolylines[userId]) {
                map.geoObjects.remove(drawnPolylines[userId]);
                delete drawnPolylines[userId];
                return;
            }

            var locs = locationIndex[userId] || [];
            if (locs.length > 1) {
                var lineCoords = locs.map(function(l) { return [l.lat, l.lng]; });
                var poly = new ymaps.Polyline(lineCoords, {}, {
                    strokeColor: statuses[idx] === 'green' ? '#2196F3' : '#F44336',
                    strokeWidth: 4,
                    strokeOpacity: 0.85
                });
                map.geoObjects.add(poly);
                drawnPolylines[userId] = poly;
                // Pan to the last location point
                map.panTo(lineCoords[lineCoords.length - 1], { flying: true, duration: 400 });
            } else {
                console.warn('[Polyline] No location data for userId:', userId);
            }
        }

        // Marker click: toggle polyline + open balloon
        coords.forEach(function(c, i) {
            placemarks[i].events.add('click', function() {
                togglePolyline(i);
                var row = rows[i];
                var pm = placemarks[i];
                var isActive = !pm._drawn; // simple toggle flag
                pm._drawn = !pm._drawn;

                var newGlow = statuses[i] === 'green' ? 'rgba(33, 150, 243, 0.8)' : 'rgba(244, 67, 54, 0.8)';
                pm.options.set('iconLayout', activeMarkerLayout);
                pm.options.set('zIndex', 1000);
                pm.properties.set('glowColor', newGlow);
                pm.balloon.open();
            });
        });

    // ---- Row click: URL orqali navigate ----
    function setActive(idx) {
        var row = rows[idx];
        var userId = row.dataset.id;
        if (!userId) return;

        var currentUrl = new URL(window.location.href);
        // Get current selected_users list from URL
        var selected = currentUrl.searchParams.getAll('selected_users[]');

        if (selected.includes(userId)) {
            // Deselect: remove from list
            currentUrl.searchParams.delete('selected_users[]');
            selected.filter(id => id !== userId).forEach(id => currentUrl.searchParams.append('selected_users[]', id));
        } else {
            // Select: add to list
            currentUrl.searchParams.append('selected_users[]', userId);
        }

        window.location.href = currentUrl.toString();
    }

    // Attach listener to individual rows
    rows.forEach(function(r, i){ r.addEventListener('click', function(){ setActive(i); }); });

    // Listener for Switch: toggle location_limit URL param
    document.getElementById('mapDirectionSwitch').addEventListener('change', function() {
        var currentUrl = new URL(window.location.href);
        currentUrl.searchParams.set('location_limit', this.checked ? '0' : '1');
        window.location.href = currentUrl.toString();
    });

    // ---- Tabs ----
    document.querySelectorAll('.map-tab').forEach(function(tab) {
        tab.addEventListener('click', function() {
            var type = tab.dataset.tab;
            const currentUrl = new URL(window.location.href);
            if(type === 'all') {
                currentUrl.searchParams.delete('is_active');
            } else {
                currentUrl.searchParams.set('is_active', type);
            }
            window.location.href = currentUrl.toString();
        });
    });

    // ---- Search (person filter) ----
    const searchInput = document.getElementById('mapSearchInput');
    let searchTimeout;
    if (searchInput) {
        if (searchInput.value) {
            searchInput.focus();
            const val = searchInput.value;
            searchInput.value = '';
            searchInput.value = val;
        }

        searchInput.addEventListener('input', function() {
            clearTimeout(searchTimeout);
            searchTimeout = setTimeout(() => {
                const currentUrl = new URL(window.location.href);
                if (this.value) {
                    currentUrl.searchParams.set('search', this.value);
                } else {
                    currentUrl.searchParams.delete('search');
                }
                currentUrl.searchParams.delete('page');
                window.location.href = currentUrl.toString();
            }, 800);
        });
    }

    // ---- Branch filter ----
    const branchBtn = document.getElementById('mapBranchFilterBtn');
    const branchDropdown = document.getElementById('mapBranchDropdown');
    const branchFilterText = document.getElementById('mapBranchFilterText');

    if (branchBtn && branchDropdown) {
        branchBtn.addEventListener('click', function(e) {
            e.stopPropagation();
            if (branchDropdown.style.display === 'none' || branchDropdown.style.display === '') {
                branchDropdown.style.display = 'block';
            } else {
                branchDropdown.style.display = 'none';
            }
        });

        document.addEventListener('click', function(e) {
            if (!branchBtn.contains(e.target) && !branchDropdown.contains(e.target)) {
                branchDropdown.style.display = 'none';
            }
        });

        branchDropdown.querySelectorAll('.map-branch-item').forEach(function(item) {
            item.addEventListener('click', function(e) {
                e.stopPropagation();
                
                branchDropdown.querySelectorAll('.map-branch-item').forEach(function(el) { el.classList.remove('active'); });
                item.classList.add('active');
                
                branchFilterText.innerText = item.innerText;
                branchDropdown.style.display = 'none';

                const branchGuid = item.getAttribute('data-guid') || '';
                const currentUrl = new URL(window.location.href);
                if (branchGuid) {
                    currentUrl.searchParams.set('branch_guid', branchGuid);
                } else {
                    currentUrl.searchParams.delete('branch_guid');
                }
                currentUrl.searchParams.delete('page');
                window.location.href = currentUrl.toString();
            });
        });
    }

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

        let startDate = null;
        let currentYear = new Date().getFullYear();
        const startYear = 2015;
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
                            startDate = new Date(cellTime);
                            updateRangeClasses();
                            updateDisplay();
                        });

                        cell.addEventListener('mouseenter', function() {
                            // Mute hover
                        });

                        daysContainer.appendChild(cell);
                    })(d);
                }
            });

            var observer = new IntersectionObserver(function(entries) {
                // Muted sidebar highlighting as sidebar is hidden
            }, { root: daysContainer, rootMargin: '0px 0px -80% 0px' });

            dropdown.querySelectorAll('.grid-month-title').forEach(function(t) { observer.observe(t); });

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

        daysContainer.addEventListener('mouseleave', function() {
            // Mute range leave
        });

        function updateRangeClasses() {
            var cells = daysContainer.querySelectorAll('.day-cell:not(.empty)');
            var sTime = startDate ? startDate.getTime() : null;

            cells.forEach(function(cell) {
                var cTime = parseInt(cell.dataset.time);
                cell.classList.remove('selected-start', 'selected-end', 'in-range');
                if (sTime && cTime === sTime) cell.classList.add('selected-start');
            });
        }

        function updateDisplay() {
            if (startDate) {
                var sStr = startDate.getDate() + ' ' + shortMonths[startDate.getMonth()] + ' ' + startDate.getFullYear();
                displayRange.innerHTML = sStr;
            } else {
                displayRange.innerHTML = 'Sanani tanlang';
            }
        }

        resetBtn.addEventListener('click', function() {
            startDate = null;
            updateDisplay();
            updateRangeClasses();
        });

        saveBtn.addEventListener('click', function() {
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
        
        // Parse current startHour and endHour if available
        const initStartHourStr = "{{ $startHour ?? '12:00' }}";
        const initEndHourStr = "{{ $endHour ?? '16:00' }}";
        
        let timeFrom = { h: parseInt(initStartHourStr.split(':')[0] || '12'), m: parseInt(initStartHourStr.split(':')[1] || '0') };
        let timeTo = { h: parseInt(initEndHourStr.split(':')[0] || '16'), m: parseInt(initEndHourStr.split(':')[1] || '0') };

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
            const sh = pad(timeFrom.h) + ':' + pad(timeFrom.m);
            const eh = pad(timeTo.h) + ':' + pad(timeTo.m);
            const currentUrl = new URL(window.location.href);
            currentUrl.searchParams.set('start_hour', sh);
            currentUrl.searchParams.set('end_hour', eh);
            window.location.href = currentUrl.toString();
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
