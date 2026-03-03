/**
 * auth.js - Interactions for authentication pages
 */

document.addEventListener('DOMContentLoaded', function () {

    // ----------------------------------------------------------------------
    // Password Visibility Toggle
    // ----------------------------------------------------------------------
    const toggleBtn = document.getElementById('togglePassword');
    const passwordInput = document.getElementById('password');

    if (toggleBtn && passwordInput) {
        const eyeIcon = toggleBtn.querySelector('.eye-icon');
        const eyeOffIcon = toggleBtn.querySelector('.eye-off-icon');

        toggleBtn.addEventListener('click', function () {
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);

            if (type === 'text') {
                eyeIcon.classList.add('hidden');
                eyeOffIcon.classList.remove('hidden');
            } else {
                eyeIcon.classList.remove('hidden');
                eyeOffIcon.classList.add('hidden');
            }
        });
    }

    // ----------------------------------------------------------------------
    // Phone Number Formatting (+998 (XX) XXX-XX-XX)
    // ----------------------------------------------------------------------
    const phoneInput = document.getElementById('phone');

    if (phoneInput) {
        phoneInput.addEventListener('focus', function () {
            if (this.value === '') {
                this.value = '+998 ';
            }
        });

        phoneInput.addEventListener('input', function (e) {
            let value = this.value;

            // Raqamlardan boshqa barcha belgilarni tozalash
            let digits = value.replace(/\D/g, '');

            // "998" yozilgan taqdirda uni boshidan olib tashlaymiz (faqat qolgan raqamlar bilan ishlash uchun)
            if (digits.startsWith('998')) {
                digits = digits.substring(3);
            }

            // Maksimal uzunlikni cheklash (9 ta raqam)
            digits = digits.substring(0, 9);

            // Yangi formatlangan qiymatni yaratish
            let formattedValue = '+998 ';

            if (digits.length > 0) {
                formattedValue += '(' + digits.substring(0, 2);
            }
            if (digits.length >= 3) {
                formattedValue += ') ' + digits.substring(2, 5);
            }
            if (digits.length >= 6) {
                formattedValue += '-' + digits.substring(5, 7);
            }
            if (digits.length >= 8) {
                formattedValue += '-' + digits.substring(7, 9);
            }

            this.value = formattedValue;
        });

        phoneInput.addEventListener('keydown', function (e) {
            const cursorPosition = this.selectionStart;
            const selectionLength = this.selectionEnd - this.selectionStart;

            // +998 ni o'chirib yuborishning oldini olish (agar matn belgilanmagan bo'lsa)
            if (e.key === 'Backspace' && cursorPosition <= 5 && selectionLength === 0) {
                e.preventDefault();
            }
        });
    }

    // ----------------------------------------------------------------------
    // Form Submit — faqat validatsiya, haqiqiy submit amalga oshadi
    // ----------------------------------------------------------------------
    const loginForm = document.querySelector('.auth-form');

    if (loginForm) {
        loginForm.addEventListener('submit', function (e) {

            // 1-QADAM: Telefon validatsiyasi
            if (phoneInput) {
                const phoneVal = phoneInput.value || '';
                if (phoneVal.length < 19) {
                    e.preventDefault();
                    phoneInput.style.borderColor = 'var(--error, #ef4444)';
                    phoneInput.focus();
                    return;
                }
                phoneInput.style.borderColor = '';
            }

            // OTP validatsiyasi
            const otpInput = document.getElementById('otp_code');
            if (otpInput) {
                const otpVal = otpInput.value.trim();
                if (otpVal.length < 4) {
                    e.preventDefault();
                    otpInput.style.borderColor = 'var(--error, #ef4444)';
                    otpInput.focus();
                    return;
                }
                otpInput.style.borderColor = '';
            }

            // Tugmani yuklanmoqda holatiga o'tkazish
            const btn = loginForm.querySelector('[type="submit"]');
            if (btn) {
                btn.disabled = true;
                btn.textContent = 'Yuklanmoqda...';
            }

            // Haqiqiy forma submit — e.preventDefault() CHAQIRILMAYDI
        });

        // Xatoni tozalash
        if (phoneInput) {
            phoneInput.addEventListener('input', function () {
                this.style.borderColor = '';
            });
        }
    }

});
