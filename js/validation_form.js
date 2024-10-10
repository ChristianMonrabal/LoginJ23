document.addEventListener('DOMContentLoaded', function() {
    const usernameField = document.getElementById('username');
    const passwordField = document.getElementById('password');
    const usernameError = document.getElementById('username-error');
    const passwordError = document.getElementById('password-error');

    function validateUsername() {
        const usernameValue = usernameField.value.trim(); 
        if (usernameValue === '') {
            usernameError.textContent = 'El campo de usuario no puede estar vacío.';
            usernameError.style.color = 'red';
        } else {
            usernameError.textContent = ''; 
        }
    }

    function validatePassword() {
        const passwordValue = passwordField.value.trim();
        if (passwordValue === '') {
            passwordError.textContent = 'El campo de contraseña no puede estar vacío.';
            passwordError.style.color = 'red';
        } else {
            passwordError.textContent = '';
        }
    }

    usernameField.addEventListener('blur', validateUsername);
    passwordField.addEventListener('blur', validatePassword);
});
