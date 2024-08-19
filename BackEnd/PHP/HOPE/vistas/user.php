<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Usuario</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="/HOPE/CSS/styles.css" />
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
          <li class="active"><a href="#">Home</a></li>
          <li><a href="/HOPE/vistas/Nosotros.php">Nosotros</a></li>
          <li><a href="/HOPE/vistas/servicios.php">Servicios</a></li>
          <li><a href="/HOPE/vistas/donación.php">Donación</a></li>
          <li><a href="/HOPE/vistas/contacto.php">Calendario</a></li>

        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li><a href="/HOPE/vistas/usuario.php"><span class="glyphicon glyphicon-user"></span>Usuario</a></li>
          <li><a href="/HOPE/includes/logout.php"><span class="glyphicon glyphicon-log-in"></span> Cerrar sesión</a></li>
        </ul>
      </div>
    </nav>  
    <div class="imgn">
      <div class="container-user">
        <p>
          <i>
            "Ayúdanos a mejorar la condición de vida de aquellos que lo necesitan,
            todos merecemos un lugar calido"</i
          >
        </p>
      </div>
    </div>
   
    <nav class="container-img">
      <img id="alb" src="/HOPE/Assets/albergue.png" alt="" />
    </nav>
    <div class="contenedor-fin">
      <div class="text-inferior">
        <p style="text-align: justify;">
          Se busca no solo proporcionar alivio temporal a las personas sin
          hogar, sino también ofrecerles una vía hacia una vida más digna y
          autosuficiente, facilitando su reintegración en la sociedad. Para ello
          se busca crear una pagina en la que se puedan encontrar albergues o
          casas de acogida que tengan espacio suficiente para nuevos miembros,
          además de implementar apoyos para estas personas, estos apoyos serán
          de tipo capacitación para que estos logren conseguir trabajo para asi
          superarse.
        </p>
      </div>
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
  </body>
</html>
