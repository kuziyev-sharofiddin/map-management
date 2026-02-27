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
    <link href="{{ asset('assets/css/dashboard.css') }}?v={{ time() }}" rel="stylesheet">
</head>
<body>
    <div class="dashboard-layout">
        
        <!-- Sidebar Navigation -->
        <aside class="sidebar">
            <div class="sidebar-header">
                <div class="logo">
                    <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M16.6249 0.965305C18.9449 -0.339494 21.1716 -0.319557 23.4482 1.01316C24.5347 1.64957 25.6782 2.20781 26.7958 2.80027C26.8269 2.81719 26.8617 2.8321 26.8906 2.85202C27.0341 2.94882 27.265 3.03255 27.1796 3.22409C27.0861 3.43448 26.8526 3.33674 26.6923 3.2778C25.7651 2.93817 24.9034 3.16329 24.0663 3.52487C23.6155 3.71969 23.1834 3.95131 22.7548 4.18308C18.2618 6.61887 13.7425 9.01314 9.15814 11.3091C8.49377 11.6416 7.83718 11.9876 7.26068 12.4389C6.73428 12.8505 6.46133 13.3654 6.35443 13.9907C6.18418 14.9876 6.26308 15.9801 6.27533 16.978C6.30204 19.2408 6.26582 21.5052 6.2558 23.769C6.2547 24.0687 6.27429 24.3708 6.25092 24.6684C6.11744 26.3628 6.88408 27.5339 8.58393 28.3471C11.6765 29.8268 14.7033 31.4165 17.6923 33.061C19.2307 33.9071 20.7062 33.9381 22.2412 33.0981C23.1225 32.6157 24.0095 32.142 24.8994 31.6723C24.8527 32.028 24.8271 32.3908 24.8271 32.7593C24.8271 34.4769 25.3502 36.0725 26.246 37.395C25.3464 37.8802 24.4484 38.3686 23.5458 38.8491C22.8437 39.2225 22.1013 39.5161 21.3369 39.7807C20.1881 40.1773 19.1197 39.9941 18.0478 39.5815C16.5394 39.001 15.1755 38.1888 13.7929 37.4135C10.2996 35.4534 6.63936 33.7558 3.06928 31.9155C0.979772 30.8385 -0.0156935 29.3139 0.000917094 27.1909C0.0176144 24.9101 0.0283965 22.6289 0.0272843 20.3481C0.0261702 17.7516 -0.00575944 15.1537 0.000917094 12.5571C0.00538754 10.7928 0.71445 9.34523 2.45209 8.39109C2.76821 8.21727 3.06471 8.01187 3.38861 7.85202C7.85708 5.64308 12.3023 3.39704 16.6249 0.965305ZM27.7744 5.53366C29.1112 4.96524 30.4604 4.93205 31.8017 5.50632C33.7799 6.35156 35.6751 7.33023 37.5253 8.38327C39.2307 9.35441 39.9921 10.765 39.9921 12.5444V19.8364H39.9951L39.998 19.8384C39.998 22.1191 39.9945 24.4004 39.999 26.6811C39.9997 27.1435 39.9714 27.6045 39.916 28.063C38.5372 26.0662 36.3047 24.7068 33.7451 24.5102C33.7461 24.0217 33.7262 23.5334 33.7216 23.0434C33.6971 20.5629 33.7347 18.0816 33.7392 15.601C33.7403 15.1527 33.6905 14.7037 33.6816 14.2553C33.639 12.2435 30.9875 11.1514 29.3066 11.6176C28.4951 11.8425 27.7901 12.2407 27.081 12.6313C24.3448 14.1379 21.5404 15.5363 18.7363 16.937C17.6286 17.4905 16.7284 18.1704 16.4902 19.3843C16.3389 20.1583 16.5341 20.8015 17.124 21.3569C17.8164 22.0083 18.6867 22.4199 19.5839 22.7895C19.9778 22.9523 20.1053 22.8184 20.1054 22.4341C20.1055 21.0415 20.6942 19.8211 22.1142 19.0718C24.2717 17.9328 26.4439 16.814 28.6103 15.687C28.706 15.6371 28.8022 15.5854 28.9023 15.5425C29.569 15.2538 30.001 15.4456 30.0634 16.1098C30.1146 16.6552 30.1074 17.209 30.0751 17.7563C29.9783 19.3708 30.038 20.9847 30.0859 22.5991C30.0937 22.8658 30.0813 23.1322 30.0869 23.3989C30.1047 24.221 29.8474 24.8863 29.289 25.4135C28.8663 25.6335 28.4649 25.8884 28.0888 26.1753C25.8855 27.2833 23.6947 28.4138 21.5283 29.5786C20.4597 30.1529 19.4597 30.1051 18.4345 29.5718C16.8949 28.7705 15.3638 27.9531 13.8242 27.1518C13.1028 26.7762 12.3747 26.4097 11.6367 26.06C10.4244 25.4866 9.87514 24.5764 9.90619 23.3686C9.94181 21.9879 10.0426 20.6087 9.97357 19.226C9.9324 18.3951 9.93619 17.5619 9.89838 16.7309C9.83827 15.4212 10.415 14.4551 11.7206 13.8276C12.8973 13.2622 14.0568 12.6664 15.2089 12.061C18.9862 10.0758 22.755 8.07846 26.5312 6.09226C26.9296 5.88252 27.3559 5.71145 27.7744 5.53366Z" fill="#7B48FF"/>
                        <ellipse cx="33.2378" cy="32.8998" rx="6.44409" ry="6.78348" fill="#7B48FF"/>
                        <path d="M33.5349 31.8688C33.2103 31.8701 32.892 31.9591 32.6138 32.1264C32.3356 32.2937 32.1077 32.5331 31.9543 32.8192C32.3835 33.2192 32.9483 33.4416 33.5349 33.4416C34.1215 33.4416 34.6863 33.2192 35.1155 32.8192C34.9614 32.5337 34.7334 32.2948 34.4553 32.1276C34.1772 31.9604 33.8594 31.871 33.5349 31.8688Z" fill="white"/>
                        <path d="M33.5349 31.5652C33.6979 31.5652 33.8572 31.5169 33.9927 31.4264C34.1282 31.3358 34.2338 31.2071 34.2962 31.0566C34.3586 30.906 34.3749 30.7403 34.3431 30.5805C34.3113 30.4206 34.2328 30.2738 34.1176 30.1586C34.0024 30.0433 33.8555 29.9649 33.6957 29.9331C33.5359 29.9013 33.3702 29.9176 33.2196 29.98C33.069 30.0423 32.9403 30.1479 32.8498 30.2834C32.7593 30.419 32.7109 30.5783 32.7109 30.7412C32.7109 30.8494 32.7323 30.9566 32.7737 31.0566C32.8151 31.1565 32.8758 31.2474 32.9523 31.3239C33.0288 31.4004 33.1196 31.4611 33.2196 31.5025C33.3196 31.5439 33.4267 31.5652 33.5349 31.5652Z" fill="white"/>
                        <path d="M36.753 30.912C36.6608 30.1857 36.3263 29.5118 35.8035 28.9993C35.2806 28.4868 34.6002 28.1657 33.8722 28.088C33.7584 28.088 33.6446 28.0712 33.5308 28.0712C32.7272 28.0701 31.9525 28.371 31.3602 28.9141C30.7466 29.4696 30.3685 30.2386 30.3035 31.0637C30.2385 31.8889 30.4913 32.7076 31.0103 33.3523C31.0103 33.3523 31.023 33.3713 31.0293 33.384L33.0566 37.5777C33.1 37.6677 33.1679 37.7437 33.2526 37.7968C33.3372 37.85 33.4351 37.8782 33.535 37.8782C33.6349 37.8782 33.7328 37.85 33.8175 37.7968C33.9021 37.7437 33.97 37.6677 34.0134 37.5777L36.0407 33.384L36.0597 33.3523C36.3336 33.0132 36.5363 32.6223 36.6554 32.2029C36.7745 31.7836 36.8078 31.3445 36.753 30.912ZM35.2968 33.0025L35.2821 33.0194C35.0549 33.2524 34.7834 33.4376 34.4835 33.5641C34.1836 33.6905 33.8615 33.7557 33.5361 33.7557C33.2106 33.7557 32.8885 33.6905 32.5886 33.5641C32.2888 33.4376 32.0172 33.2524 31.7901 33.0194L31.7711 33.0004C31.4383 32.6546 31.2145 32.2186 31.1277 31.7466C31.0408 31.2746 31.0947 30.7875 31.2826 30.3458C31.4704 29.9042 31.7841 29.5276 32.1844 29.2629C32.5847 28.9982 33.054 28.857 33.534 28.857C34.0139 28.857 34.4832 28.9982 34.8835 29.2629C35.2839 29.5276 35.5975 29.9042 35.7854 30.3458C35.9733 30.7875 36.0271 31.2746 35.9403 31.7466C35.8534 32.2186 35.6296 32.6546 35.2968 33.0004V33.0025Z" fill="white"/>
                    </svg>
                    <span>Undiruv</span>
                </div>
                <button class="collapse-sidebar" aria-label="Collapse Sidebar">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M15 18l-6-6 6-6"/>
                    </svg>
                </button>
            </div>

            <nav class="sidebar-nav">
                <a href="/dashboard" class="nav-item active">
                    <svg class="nav-icon" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <rect x="3" y="3" width="7" height="7" rx="1.5"></rect>
                        <rect x="14" y="3" width="7" height="7" rx="1.5"></rect>
                        <rect x="14" y="14" width="7" height="7" rx="1.5"></rect>
                        <rect x="3" y="14" width="7" height="7" rx="1.5"></rect>
                    </svg>
                    <span>Dashboard</span>
                </a>
                <a href="#" class="nav-item">
                    <svg class="nav-icon" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M12 1.25C9.37665 1.25 7.25 3.37665 7.25 6C7.25 8.62335 9.37665 10.75 12 10.75C14.6234 10.75 16.75 8.62335 16.75 6C16.75 3.37665 14.6234 1.25 12 1.25ZM8.75 6C8.75 4.20507 10.2051 2.75 12 2.75C13.7949 2.75 15.25 4.20507 15.25 6C15.25 7.79493 13.7949 9.25 12 9.25C10.2051 9.25 8.75 7.79493 8.75 6Z" fill="currentColor"/>
                        <path d="M18 3.25C17.5858 3.25 17.25 3.58579 17.25 4C17.25 4.41421 17.5858 4.75 18 4.75C19.3765 4.75 20.25 5.65573 20.25 6.5C20.25 7.34427 19.3765 8.25 18 8.25C17.5858 8.25 17.25 8.58579 17.25 9C17.25 9.41421 17.5858 9.75 18 9.75C19.9372 9.75 21.75 8.41715 21.75 6.5C21.75 4.58285 19.9372 3.25 18 3.25Z" fill="currentColor"/>
                        <path d="M6.75 4C6.75 3.58579 6.41421 3.25 6 3.25C4.06278 3.25 2.25 4.58285 2.25 6.5C2.25 8.41715 4.06278 9.75 6 9.75C6.41421 9.75 6.75 9.41421 6.75 9C6.75 8.58579 6.41421 8.25 6 8.25C4.62351 8.25 3.75 7.34427 3.75 6.5C3.75 5.65573 4.62351 4.75 6 4.75C6.41421 4.75 6.75 4.41421 6.75 4Z" fill="currentColor"/>
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M12 12.25C10.2157 12.25 8.56645 12.7308 7.34133 13.5475C6.12146 14.3608 5.25 15.5666 5.25 17C5.25 18.4334 6.12146 19.6392 7.34133 20.4525C8.56645 21.2692 10.2157 21.75 12 21.75C13.7843 21.75 15.4335 21.2692 16.6587 20.4525C17.8785 19.6392 18.75 18.4334 18.75 17C18.75 15.5666 17.8785 14.3608 16.6587 13.5475C15.4335 12.7308 13.7843 12.25 12 12.25ZM6.75 17C6.75 16.2242 7.22169 15.4301 8.17338 14.7956C9.11984 14.1646 10.4706 13.75 12 13.75C13.5294 13.75 14.8802 14.1646 15.8266 14.7956C16.7783 15.4301 17.25 16.2242 17.25 17C17.25 17.7758 16.7783 18.5699 15.8266 19.2044C14.8802 19.8354 13.5294 20.25 12 20.25C10.4706 20.25 9.11984 19.8354 8.17338 19.2044C7.22169 18.5699 6.75 17.7758 6.75 17Z" fill="currentColor"/>
                        <path d="M19.2674 13.8393C19.3561 13.4347 19.7561 13.1787 20.1607 13.2674C21.1225 13.4783 21.9893 13.8593 22.6328 14.3859C23.2758 14.912 23.75 15.6352 23.75 16.5C23.75 17.3648 23.2758 18.088 22.6328 18.6141C21.9893 19.1407 21.1225 19.5217 20.1607 19.7326C19.7561 19.8213 19.3561 19.5653 19.2674 19.1607C19.1787 18.7561 19.4347 18.3561 19.8393 18.2674C20.6317 18.0936 21.2649 17.7952 21.6829 17.4532C22.1014 17.1108 22.25 16.7763 22.25 16.5C22.25 16.2237 22.1014 15.8892 21.6829 15.5468C21.2649 15.2048 20.6317 14.9064 19.8393 14.7326C19.4347 14.6439 19.1787 14.2439 19.2674 13.8393Z" fill="currentColor"/>
                        <path d="M3.83935 13.2674C4.24395 13.1787 4.64387 13.4347 4.73259 13.8393C4.82132 14.2439 4.56525 14.6439 4.16065 14.7326C3.36829 14.9064 2.73505 15.2048 2.31712 15.5468C1.89863 15.8892 1.75 16.2237 1.75 16.5C1.75 16.7763 1.89863 17.1108 2.31712 17.4532C2.73505 17.7952 3.36829 18.0936 4.16065 18.2674C4.56525 18.3561 4.82132 18.7561 4.73259 19.1607C4.64387 19.5653 4.24395 19.8213 3.83935 19.7326C2.87746 19.5217 2.0107 19.1407 1.36719 18.6141C0.724248 18.088 0.25 17.3648 0.25 16.5C0.25 15.6352 0.724248 14.912 1.36719 14.3859C2.0107 13.8593 2.87746 13.4783 3.83935 13.2674Z" fill="currentColor"/>
                    </svg>
                    <span>Undiruvchilar</span>
                </a>
            </nav>
        </aside>

        <!-- Main Content Area -->
        <main class="main-content">
            
            <!-- Top Header -->
            <header class="dashboard-header">
                <h1 class="page-title">Dashboard</h1>
                
                <div class="user-profile">
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
                            <span>Fevral 2026</span>
                            <svg class="chevron-icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
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
                                <svg viewBox="0 0 100 30" class="sparkline stroke-green">
                                    <path d="M0,20 Q10,5 20,20 T40,20 T60,20 T80,10 T100,20" fill="none" stroke-width="1.5" stroke-linecap="round"/>
                                    <path d="M0,20 Q10,5 20,20 T40,20 T60,20 T80,10 T100,20" fill="none" stroke="#10B981" stroke-width="4" stroke-linecap="round" opacity="0.2" transform="translate(0, 3)"/>
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
                                    <path d="M0,20 Q10,15 20,25 T40,15 T60,25 T80,10 T100,25" fill="none" stroke-width="1.5" stroke-linecap="round"/>
                                    <path d="M0,20 Q10,15 20,25 T40,15 T60,25 T80,10 T100,25" fill="none" stroke="#F59E0B" stroke-width="4" stroke-linecap="round" opacity="0.2" transform="translate(0, 3)"/>
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
                                    <path d="M0,25 Q10,10 20,20 T40,25 T60,15 T80,25 T100,10" fill="none" stroke-width="1.5" stroke-linecap="round"/>
                                    <path d="M0,25 Q10,10 20,20 T40,25 T60,15 T80,25 T100,10" fill="none" stroke="#F97316" stroke-width="4" stroke-linecap="round" opacity="0.2" transform="translate(0, 3)"/>
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
                                    <path d="M0,20 Q10,15 20,20 T40,20 T60,10 T80,25 T100,20" fill="none" stroke-width="1.5" stroke-linecap="round"/>
                                    <path d="M0,20 Q10,15 20,20 T40,20 T60,10 T80,25 T100,20" fill="none" stroke="#9CA3AF" stroke-width="4" stroke-linecap="round" opacity="0.2" transform="translate(0, 3)"/>
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
                                    <path d="M0,25 Q10,5 20,25 T40,15 T60,25 T80,15 T100,25" fill="none" stroke-width="1.5" stroke-linecap="round"/>
                                    <path d="M0,25 Q10,5 20,25 T40,15 T60,25 T80,15 T100,25" fill="none" stroke="#9CA3AF" stroke-width="4" stroke-linecap="round" opacity="0.2" transform="translate(0, 3)"/>
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
