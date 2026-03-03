@extends('layouts.auth')

@section('title', 'Xush kelibsiz!')

@section('content')
    <div class="auth-card">
        <div class="auth-card-inner">
            <div class="auth-form-section">
                {{-- session('step') bo'lmasa 1-qadam deb hisoblaymiz --}}
                @php $step = session('step', 1); @endphp

                <div class="auth-form-wrapper">
                    <div class="auth-header">
                        <div class="brand-logo">
                            <img src="{{ asset('assets/images/little_logotip.svg') }}" alt="Logo" class="logo-icon">
                        </div>
                        <h1 class="auth-title">Xush kelibsiz!</h1>
                        <p class="auth-subtitle">
                            @if($step == 1)
                                Xisobingizga kiring.
                            @else
                                @php
                                    $p = session('phone', '');
                                    $formattedPhone = strlen($p) == 9 
                                        ? "+998" . substr($p, 0, 2) . " " . substr($p, 2, 3) . " " . substr($p, 5, 2) . " " . substr($p, 7, 2)
                                        : "+$p";
                                @endphp
                                Tasdiqlash kodi <strong style="color: var(--text-main);">{{ $formattedPhone }}</strong> raqamiga yuborildi.
                            @endif
                        </p>
                    </div>

                    {{-- Xatoliklar uchun bildirishnoma --}}
                    @if($errors->any())
                        <div style="color: var(--error); margin-bottom: 1rem; font-size: 0.9rem; font-weight: 500;">
                            {{ $errors->first() }}
                        </div>
                    @endif

                    <form action="{{ route('login.post') }}" method="POST" class="auth-form">
                        @csrf
                        {{-- Bosqichlarni boshqarish uchun yashirin maydon --}}
                        <input type="hidden" name="step" value="{{ $step }}">

                        {{-- 1-BOSQICH: TELEFON RAQAM --}}
                        @if($step == 1)
                            <div class="form-group @error('phone') has-error @enderror">
                                <label for="phone" class="form-label">Telefon raqam</label>
                                <div class="input-wrapper">
                                    <span class="input-icon">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M13 3.2524C15.1627 2.63619 17.5428 3.14662 19.1981 4.80192C20.8534 6.45723 21.3638 8.8373 20.7476 11M14.9369 5.96407C15.7093 5.81021 16.5991 6.0767 17.2612 6.73883C17.9233 7.40095 18.1898 8.29065 18.0359 9.0631" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M15.1653 20.8835C16.0469 21.0388 16.9531 21.0388 17.8347 20.8835C19.2516 20.6338 20.3929 19.6826 20.786 18.4236L20.8694 18.1565C20.956 17.879 21 17.5919 21 17.3034C21 16.0313 19.8623 15 18.4589 15H14.5411C13.1377 15 12 16.0313 12 17.3034C12 17.5919 12.044 17.879 12.1306 18.1565L12.214 18.4236C12.6071 19.6826 13.7484 20.6338 15.1653 20.8835ZM15.1653 20.8835C9.04195 19.7489 4.25108 14.958 3.1165 8.83468M3.1165 8.83468C2.96117 7.95315 2.96117 7.04686 3.1165 6.16532C3.36618 4.74842 4.31744 3.60713 5.57641 3.21402L5.84345 3.13063C6.12103 3.04396 6.40813 3 6.69661 3C7.96874 3 9.00001 4.13768 9 5.54106L9 9.45894C9.00001 10.8623 7.96874 12 6.69661 12C6.40813 12 6.12103 11.956 5.84345 11.8694L5.57641 11.786C4.31744 11.3929 3.36618 10.2516 3.1165 8.83468Z" stroke="currentColor" stroke-width="1.5"/>
                                        </svg>
                                    </span>
                                    <input type="tel" id="phone" name="phone" class="form-input has-icon-left" placeholder="998901234567" value="{{ old('phone', '+998 ') }}" required autofocus>
                                </div>
                            </div>
                            <button type="submit" class="btn-primary">Davom etish</button>

                        {{-- 2-BOSQICH: SMS OTP --}}
                        @else
                            {{-- Oldingi bosqichdagi raqamni saqlab qolish uchun --}}
                            <input type="hidden" name="phone" value="{{ session('phone') }}">
                            
                            <div class="form-group @error('otp_code') has-error @enderror">
                                <label for="otp_code" class="form-label">Tasdiqlash kodi</label>
                                <div class="input-wrapper">
                                    <input type="text" id="otp_code" name="otp_code" class="form-input text-center" 
                                           placeholder="----" maxlength="4" 
                                           style="letter-spacing: 15px; font-weight: bold; font-size: 1.5rem;" 
                                           required autofocus>
                                </div>
                            </div>
                            <button type="submit" class="btn-primary">Kirish</button>
                            <div style="text-align: center; margin-top: 24px;">
                                <a href="{{ route('login') }}" style="color: #8B5CF6; text-decoration: none; font-size: 16px; font-weight: 500; letter-spacing: 0.3px; transition: color 0.2s ease;" onmouseover="this.style.color='#7C4DFF'" onmouseout="this.style.color='#8B5CF6'">
                                    Raqamni o'zgartirish
                                </a>
                            </div>
                        @endif
                    </form>
                </div>
            </div>

            <div class="auth-graphic-section">
                <div class="graphic-container">
                    <div class="logotip-wrapper">
                        <img src="{{ asset('assets/images/logotip.svg') }}" alt="Undiruv Logo" class="auth-logotip">
                        <div class="logotip-brand">
                            <h2 class="logotip-title">UNDIRUV NAZORAT</h2>
                            <p class="logotip-subtitle">Tizimli yondashuv, yuqori unumdorlik.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection