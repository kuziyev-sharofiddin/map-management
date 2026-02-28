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
            // Toggle type attribute
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);

            // Toggle icons
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
        // Set initial value if empty when focused
        phoneInput.addEventListener('focus', function () {
            if (this.value === '') {
                this.value = '+998 ';
            }
        });

        // Format on input
        phoneInput.addEventListener('input', function (e) {
            let value = this.value;

            // Allow deleting the prefix if needed (though we try to keep it)
            if (value.length < 5 && e.inputType === 'deleteContentBackward') {
                // If they deleted part of the prefix, let them, but it'll validate to false
                return;
            }

            // Ensure prefix
            if (!value.startsWith('+998')) {
                // If they pasted a number starting with 998, or just typed a number
                const digitsOnly = value.replace(/\D/g, '');
                if (digitsOnly.startsWith('998')) {
                    value = digitsOnly;
                } else if (digitsOnly.length > 0) {
                    value = '998' + digitsOnly;
                } else {
                    value = '+998 ';
                }
            } else {
                // Extract just the digits after 998
                value = '998' + value.substring(4).replace(/\D/g, '');
            }

            // Format appropriately
            let formattedValue = '';

            if (value.length > 0) {
                formattedValue = '+';

                // Add Country Code
                if (value.length >= 3) {
                    formattedValue += value.substring(0, 3);
                } else {
                    formattedValue += value;
                }

                // Add Operator Code
                if (value.length > 3) {
                    formattedValue += ' (' + value.substring(3, 5);
                }

                // Add Closing parenthesis
                if (value.length >= 5) {
                    formattedValue += ') ';
                }

                // Add first 3 digits
                if (value.length > 5) {
                    formattedValue += value.substring(5, 8);
                }

                // Add first hyphen
                if (value.length >= 8) {
                    formattedValue += '-';
                }

                // Add next 2 digits
                if (value.length > 8) {
                    formattedValue += value.substring(8, 10);
                }

                // Add second hyphen
                if (value.length >= 10) {
                    formattedValue += '-';
                }

                // Add final 2 digits
                if (value.length > 10) {
                    formattedValue += value.substring(10, 12);
                }
            }

            this.value = formattedValue;
        });

        // Prevent moving cursor before the prefix
        phoneInput.addEventListener('keydown', function (e) {
            const cursorPosition = this.selectionStart;
            // Prevent backspace deleting prefix
            if (e.key === 'Backspace' && cursorPosition <= 5) {
                e.preventDefault();
            }
        });
    }

    // ----------------------------------------------------------------------
    // Basic Client-Side Validation (UI showcase)
    // ----------------------------------------------------------------------
    const loginForm = document.getElementById('loginForm');

    if (loginForm) {
        loginForm.addEventListener('submit', function (e) {
            e.preventDefault();

            let isValid = true;

            // Validate Phone
            const phoneGroup = document.getElementById('phone-group');
            const phoneError = document.getElementById('phone-error');
            // Complete format: +998 (XX) XXX-XX-XX length is 19 characters
            if (!phoneInput.value || phoneInput.value.length < 19) {
                phoneGroup.classList.add('has-error');
                phoneError.textContent = "Iltimos, telefon raqamni to'liq kiriting";
                isValid = false;
            } else {
                phoneGroup.classList.remove('has-error');
            }

            // Validate Password
            const passwordGroup = document.getElementById('password-group');
            const passwordError = document.getElementById('password-error');
            if (!passwordInput.value) {
                passwordGroup.classList.add('has-error');
                passwordError.textContent = "Parolni kiritish shart";
                isValid = false;
            } else if (passwordInput.value.length < 6) {
                passwordGroup.classList.add('has-error');
                passwordError.textContent = "Parol kamida 6ta belgi bo'lishi kerak";
                isValid = false;
            } else {
                passwordGroup.classList.remove('has-error');
            }

            // Only submit if valid (Since this is UI only, just console log)
            if (isValid) {
                const btn = document.getElementById('submitBtn');
                const originalText = btn.innerHTML;

                btn.disabled = true;
                btn.innerHTML = 'Yuklanmoqda...';

                // Simulate network request
                setTimeout(() => {
                    console.log('Form validated successfully!');
                    console.log('Phone:', phoneInput.value);
                    // Reset UI
                    btn.disabled = false;
                    btn.innerHTML = originalText;

                    // Note: actual form submission would happen here in real app
                    // this.submit();
                }, 1000);
            }
        });

        // Clear errors on input
        if (phoneInput) {
            phoneInput.addEventListener('input', function () {
                document.getElementById('phone-group').classList.remove('has-error');
            });
        }

        if (passwordInput) {
            passwordInput.addEventListener('input', function () {
                document.getElementById('password-group').classList.remove('has-error');
            });
        }
    }
});
