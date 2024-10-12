document.addEventListener('DOMContentLoaded', function() {
    const usernameField = document.getElementById('username');
    const passwordField = document.getElementById('password');
    const usernameError = document.getElementById('username-error');
    const passwordError = document.getElementById('password-error');

    function validateUsername() {
        const usernameValue = usernameField.value.trim(); 
        const hasNumbers = /\d/;

        if (usernameValue === '') {
            usernameError.textContent = 'Este campo no puede estar vacío.';
            usernameError.style.color = 'red';
        } else if (hasNumbers.test(usernameValue)) {
            usernameError.textContent = 'Este campo no puede contener números.';
            usernameError.style.color = 'red';
        } else if (usernameValue.length < 4) {
            usernameError.textContent = 'El nombre de usuario debe tener al menos 4 caracteres.';
            usernameError.style.color = 'red';
        } else {
            usernameError.textContent = ''; 
        }
    }

    function validatePassword() {
        const passwordValue = passwordField.value.trim();
        if (passwordValue === '') {
            passwordError.textContent = 'Este campo no puede estar vacío.';
            passwordError.style.color = 'red';
        } else {
            passwordError.textContent = '';
        }
    }

    usernameField.addEventListener('blur', validateUsername);
    passwordField.addEventListener('blur', validatePassword);
});
