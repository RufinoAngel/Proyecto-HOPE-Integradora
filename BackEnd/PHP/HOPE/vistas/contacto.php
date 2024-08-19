<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacto</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="/HOPE/CSS/modal.css" />
    <link rel="icon" href="/HOPE/Assets/logo-removebg-preview.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
    <header>
      <img src="/HOPE/Assets/logo-removebg-preview.png" alt="" width="90px" height="85px">
        <h1 id="HP">H</h1>
        <h1 id="OE">O</h1>
        <h1 id="HP">P</h1>
        <h1 id="OE">E</h1>
    </header>
    <nav class="navbar navbar-inverse">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="#">Hogar Esperanza</a>
        </div>
        <ul class="nav navbar-nav">
          <li><a href="/HOPE/vistas/user.php">Home</a></li>
          <li><a href="/HOPE/vistas/Nosotros.php">Nosotros</a></li>
          <li><a href="/HOPE/vistas/servicios.php">Servicios</a></li>
          <li><a href="/HOPE/vistas/donación.php">Donación</a></li>
          <li class="active"><a href="#">Calendario</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
        <li><a href="/HOPE/vistas/usuario.php"><span class="glyphicon glyphicon-user"></span>Usuario</a></li>
          <li><a href="/HOPE/includes/logout.php"><span class="glyphicon glyphicon-log-in"></span> Cerrar sesión</a></li>
        </ul>
      </div>
    </nav> 
    <div class="tit">
        <h2 id="Sobre">Calendario de Eventos </h2>
    </div>
    <div class="container-even">
        <section class="details">
            <h2>Detalles</h2>
            <div class="details-content">
              <ul >1. Actividades de Salud
                Consultas Médicas: Organiza revisiones de salud gratuitas. <br>
                Ejercicio Suave: Ofrece clases de yoga o estiramientos.<br>
                Apoyo Emocional: Realiza sesiones de bienestar mental.<br>
                2. Talleres de Habilidades<br>
                Habilidades Prácticas: Enseña sobre gestión de dinero, redacción de currículums, etc.<br>
                Tecnología Básica: Capacita en el uso de computadoras.<br>
                Desarrollo Personal: Ofrece talleres sobre comunicación y auto-cuidado.<br>
                3. Eventos Comunitarios<br>
                Cenas Compartidas: Organiza comidas en grupo.<br>
                Actividades Recreativas: Planifica noches de cine, juegos o manualidades.<br>
                Celebraciones Especiales: Celebra fechas festivas con decoraciones y comida especial.<br>
              </ul>
            </div>
        </section>
        <div class="calendar">
            <h2>Calendario</h2>
            <div class="calendar-content">
                <img src="/HOPE/Assets/95473dd0ea87f68fca7dcb023a705f72.jpg" alt="" >
            </div>
        </div>
        <div class="participation">
            <h2>Participación</h2>
            <ul>
              1. Residentes<br>
              Participantes: Personas que asisten y disfrutan de los eventos.<br>
              Líderes: Residentes que pueden dirigir actividades o talleres.<br>
              Voluntarios: Residentes que ayudan con la preparación y organización.<br>
              2. Personal del Albergue<br>
              Coordinadores: Encargados de planificar y organizar eventos.<br>
              Facilitadores: Ayudan a llevar a cabo las actividades.<br>
              Cocineros: Preparan comida para eventos como cenas comunitarias.<br>
              3. Voluntarios Externos<br>
              Instructores: Ofrecen talleres y clases (ej. médicos, entrenadores).<br>
              Guías de Excursiones: Ayudan a organizar y coordinar salidas.<br>
            </ul>
        </div>
        <footer class="footer">
          <div class="footer-section">
            <h3>Historias</h3>
            <p>Ayuda a las personas refugiadas</p>
            <button>Ver Historias</button>
          </div>
          <div class="footer-section">
            <h3>Síguenos en las redes sociales</h3>
            <div class="social-icons">
              <i class="bi bi-facebook"></i>
            <i class="bi bi-instagram"></i>
            <i class="bi bi-twitter"></i>
            </div>
          </div>
          <div class="footer-section">
            <h3>Infórmate</h3>
            <p>Si necesitas ayuda no olvides contactarnos o regístrate</p>
            <button>Registrarme</button>
          </div>
          <div class="footer-section">
            <h3>Contáctanos</h3>
            <p><i class="bi bi-telephone-plus"></i> 221 729 0005</p>
            <p><i class="bi bi-telephone-plus"></i> 881 900 1990</p>
          </div>
        </footer>
    <script src="/JS/modal.js"></script>
</body>
</html>