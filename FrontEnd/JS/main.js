document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('registro').addEventListener('submit', function(event) {
        event.preventDefault();

        const username = document.getElementById('username').value;
        const password = document.getElementById('password').value;

        localStorage.setItem(username, password);
        alert('Registro exitoso. Ahora puede iniciar sesión.');
        window.location.href = 'login.html';
    });
});


document.getElementById('login-in').addEventListener('submit', function(event) {
    event.preventDefault();
    const username = document.getElementById('username').value;
    const password = document.getElementById('password').value;
    const storedPassword = localStorage.getItem(username);

    if (storedPassword === password) {
        if (username === 'admin') {
            window.location.href = 'admin.html';
        } else {
            window.location.href = 'user.html';
        }
    } else {
        alert('Nombre de usuario o contraseña incorrectos.');
    }
});

var modal = document.getElementById("myModal");
var btn = document.getElementById("registerBtn");
var span = document.getElementsByClassName("close")[0];
btn.onclick = function() {
    modal.style.display = "block";
}
span.onclick = function() {
    modal.style.display = "none";
}
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}

