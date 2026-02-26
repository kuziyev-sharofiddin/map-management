@extends('layouts.auth')

@section('title', 'Xush kelibsiz!')

@section('content')
    <div class="auth-card">
        <div class="auth-card-inner">
            <!-- Left Section: Form -->
            <div class="auth-form-section">
            <div class="auth-form-wrapper">
                <div class="auth-header">
                <!-- Logo -->
                <div class="brand-logo">
                    <img src="{{ asset('assets/images/logo-icon.svg') }}" alt="Logo" class="logo-icon" id="fallback-logo">
                    <!-- SVG fallback if image is missing -->
                    <svg class="placeholder-svg" width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg" style="display: none;">
                        <path d="M15.9385 6.09228L10.3385 9.32296L4.7384 6.09228L10.3385 2.86159L15.9385 6.09228Z" fill="#7C3AED"/>
                        <path d="M10.3385 24.1691V17.7077L4.7384 14.4771V20.9384L10.3385 24.1691Z" fill="#7C3AED"/>
                        <path d="M21.5385 24.1691V17.7077L15.9385 14.4771V20.9384L21.5385 24.1691Z" fill="#7C3AED"/>
                        <path d="M15.9385 28.4769V22.0154L10.3385 18.7847V25.2462L15.9385 28.4769Z" fill="#8B5CF6"/>
                        <path d="M27.1385 22.0154V15.5539L21.5385 12.3232V18.7847L27.1385 22.0154Z" fill="#8B5CF6"/>
                        <path d="M21.5385 18.7847L15.9385 15.5539L10.3385 18.7847L15.9385 22.0154L21.5385 18.7847Z" fill="#A78BFA"/>
                        <path d="M15.9385 12.3232L10.3385 9.09249L4.7384 12.3232L10.3385 15.5539L15.9385 12.3232Z" fill="#A78BFA"/>
                        <path d="M27.1385 12.3232L21.5385 9.09249L15.9385 12.3232L21.5385 15.5539L27.1385 12.3232Z" fill="#A78BFA"/>
                    </svg>
                </div>
                <h1 class="auth-title">Xush kelibsiz!</h1>
                <p class="auth-subtitle">Xisobingizga kiring.</p>
            </div>

            <form action="#" method="POST" class="auth-form" id="loginForm" novalidate>
                @csrf
                
                <!-- Phone Number -->
                <div class="form-group" id="phone-group">
                    <label for="phone" class="form-label">Telefon raqam</label>
                    <div class="input-wrapper">
                        <span class="input-icon">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M13 3.2524C15.1627 2.63619 17.5428 3.14662 19.1981 4.80192C20.8534 6.45723 21.3638 8.8373 20.7476 11M14.9369 5.96407C15.7093 5.81021 16.5991 6.0767 17.2612 6.73883C17.9233 7.40095 18.1898 8.29065 18.0359 9.0631" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M15.1653 20.8835C16.0469 21.0388 16.9531 21.0388 17.8347 20.8835C19.2516 20.6338 20.3929 19.6826 20.786 18.4236L20.8694 18.1565C20.956 17.879 21 17.5919 21 17.3034C21 16.0313 19.8623 15 18.4589 15H14.5411C13.1377 15 12 16.0313 12 17.3034C12 17.5919 12.044 17.879 12.1306 18.1565L12.214 18.4236C12.6071 19.6826 13.7484 20.6338 15.1653 20.8835ZM15.1653 20.8835C9.04195 19.7489 4.25108 14.958 3.1165 8.83468M3.1165 8.83468C2.96117 7.95315 2.96117 7.04686 3.1165 6.16532C3.36618 4.74842 4.31744 3.60713 5.57641 3.21402L5.84345 3.13063C6.12103 3.04396 6.40813 3 6.69661 3C7.96874 3 9.00001 4.13768 9 5.54106L9 9.45894C9.00001 10.8623 7.96874 12 6.69661 12C6.40813 12 6.12103 11.956 5.84345 11.8694L5.57641 11.786C4.31744 11.3929 3.36618 10.2516 3.1165 8.83468Z" stroke="currentColor" stroke-width="1.5"/>
                            </svg>
                        </span>
                        <input type="tel" id="phone" name="phone" class="form-input has-icon-left" placeholder="+998" required>
                    </div>
                    <span class="error-message" id="phone-error">Iltimos, to'g'ri telefon raqam kiriting</span>
                </div>

                <!-- Password -->
                <div class="form-group" id="password-group">
                    <label for="password" class="form-label">Parolingiz</label>
                    <div class="input-wrapper">
                        <span class="input-icon">
                            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                <rect x="4" y="10" width="16" height="11" rx="5" ry="5"></rect>
                                <path d="M8 10V7a4 4 0 0 1 8 0v3"></path>
                                <line x1="12" y1="14" x2="12" y2="16.5"></line>
                            </svg>
                        </span>
                        <input type="password" id="password" name="password" class="form-input has-icon-left has-icon-right" placeholder="Parolingizni kiriting..." required>
                        <button type="button" class="password-toggle" id="togglePassword" aria-label="Parolni ko'rsatish/yashirish">
                            <!-- Eye icon (visible by default) -->
                            <svg class="eye-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                <circle cx="12" cy="12" r="3"></circle>
                            </svg>
                            <!-- Eye Off icon (hidden by default) -->
                            <svg class="eye-off-icon hidden" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24"></path>
                                <line x1="1" y1="1" x2="23" y2="23"></line>
                            </svg>
                        </button>
                    </div>
                    <span class="error-message" id="password-error">Parol kiritilishi shart</span>
                </div>

                <!-- Remember Me -->
                <div class="form-group remember-group">
                    <label class="checkbox-container" for="remember">
                        <input type="checkbox" name="remember" id="remember" checked>
                        <span class="checkmark">
                            <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round">
                                <polyline points="20 6 9 17 4 12"></polyline>
                            </svg>
                        </span>
                        <span class="checkbox-label">Saqlab qolish</span>
                    </label>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="btn-primary" id="submitBtn">
                    Kirish
                </button>
            </form>
            </div>
        </div>

        <!-- Right Section: Graphic -->
        <div class="auth-graphic-section" id="auth-graphic-section">
            <div class="graphic-container">
                <div class="graphic-tilt-wrapper" id="graphic-tilt">
                    <!-- Inner glow/shadows for the 3D effect -->
                    <div class="graphic-base"></div>
                    <div class="graphic-sphere" id="graphic-sphere"></div>
                    
                    <!-- Pin Wrapper for shadow (since clip-path removes shadows) -->
                    <div class="pin-wrapper">
                        <div class="graphic-pin">
                            <div class="pin-hole"></div>
                        </div>
                    </div>
                    
                    <!-- Highlights to make it shiny like the image -->
                    <div class="highlight hl-1"></div>
                    <div class="highlight hl-2"></div>
                    <div class="highlight hl-3"></div>
                </div>
            </div>
        </div>
        </div>
    </div>

    <!-- Earth Drag-to-Spin Interaction Script -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const section = document.getElementById('auth-graphic-section');
            const tiltWrapper = document.getElementById('graphic-tilt');
            const sphere = document.getElementById('graphic-sphere');
            
            if (!section || !tiltWrapper || !sphere) return;
            
            let isDragging = false;
            let startX = 0;
            let startY = 0;
            
            // Texture panning state
            let mapPosX = 0;
            let autoVelocityX = -0.6; 
            
            // 3D Tilt state
            let currentRotateX = 0;
            let currentRotateY = 0;
            let targetRotateX = 0;
            let targetRotateY = 0;
            
            // Render loop for smooth continuous updating
            function animate() {
                if (!isDragging) {
                    mapPosX += autoVelocityX;
                    // Slowly return tilt to center when not interacting
                    targetRotateX *= 0.95;
                    targetRotateY *= 0.95;
                }
                
                // Smooth interpolation for elegant 3D tilt
                currentRotateX += (targetRotateX - currentRotateX) * 0.1;
                currentRotateY += (targetRotateY - currentRotateY) * 0.1;
                
                // Set CSS variables and transforms
                sphere.style.setProperty('--map-pos-x', `${mapPosX}px`);
                tiltWrapper.style.transform = `rotateX(${currentRotateX}deg) rotateY(${currentRotateY}deg)`;
                
                requestAnimationFrame(animate);
            }
            
            // Start the animation loop
            requestAnimationFrame(animate);
            
            // Mouse Drag Events
            section.addEventListener('mousedown', (e) => {
                isDragging = true;
                startX = e.clientX;
                startY = e.clientY;
                section.style.cursor = 'grabbing';
            });
            
            window.addEventListener('mouseup', () => {
                isDragging = false;
                section.style.cursor = '';
            });
            
            window.addEventListener('mousemove', (e) => {
                if (!isDragging) return;
                const dx = e.clientX - startX;
                const dy = e.clientY - startY;
                startX = e.clientX;
                startY = e.clientY;
                
                // Move texture horizontally
                mapPosX += dx * 1.5;
                
                // Add to 3D tilt targets
                targetRotateY += dx * 0.3;
                targetRotateX -= dy * 0.3; // Negative: Dragging down rotates backwards (positive X)
                
                // Clamp rotation to avoid flipping inside out
                targetRotateX = Math.max(-45, Math.min(45, targetRotateX));
                targetRotateY = Math.max(-60, Math.min(60, targetRotateY));
            });

            // Touch Drag Events for Mobile capability
            section.addEventListener('touchstart', (e) => {
                isDragging = true;
                startX = e.touches[0].clientX;
                startY = e.touches[0].clientY;
            }, { passive: true });
            
            window.addEventListener('touchend', () => {
                isDragging = false;
            });
            
            window.addEventListener('touchmove', (e) => {
                if (!isDragging) return;
                const dx = e.touches[0].clientX - startX;
                const dy = e.touches[0].clientY - startY;
                startX = e.touches[0].clientX;
                startY = e.touches[0].clientY;
                
                mapPosX += dx * 1.5;
                
                targetRotateY += dx * 0.4;
                targetRotateX -= dy * 0.4;
                
                targetRotateX = Math.max(-45, Math.min(45, targetRotateX));
                targetRotateY = Math.max(-60, Math.min(60, targetRotateY));
            }, { passive: true });
        });
    </script>
@endsection
