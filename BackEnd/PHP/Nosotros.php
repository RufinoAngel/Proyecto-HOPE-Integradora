<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Nosotros</title>
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
          <li><a href="/HOPE/vistas/user.php">Home</a></li>
          <li class="active"><a href="#">Nosotros</a></li>
          <li><a href="/HOPE/vistas/servicios.php">Servicios</a></li>
          <li><a href="/HOPE/vistas/donación.php">Donación</a></li>
          <li><a href="/HOPE/vistas/contacto.php">Calendario</a></li>

        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li><a href="/HOPE/vistas/usuario.php"><span class="glyphicon glyphicon-user"></span>Perfil</a></li>
          <li><a href="/HOPE/includes/logout.php"><span class="glyphicon glyphicon-log-in"></span> Cerrar sesión</a></li>
        </ul>
      </div>
    </nav>  
    <div class="tit">
      <h2 id="Sobre">Sobre Nosotros</h2>
    </div>
    <div class="hist">
      <h2 id="title"> <b>Historia</b></h2>
      <div class="hist-cont">
        <p>
          Este proyecto surge al observar en las calles el aumento de personas
          que no cuentan con un hogar y duermen en las calles, exponiéndose a
          peligros, al clima cambiante, además de que estos no son bien vistos
          en las calles por las demás personas, por ende, nosotros deseamos
          implementar un sistema en el cual podamos registrar a estas personas y
          buscarles un hogar cálido, brindarles comida, baño y ropa decente,
          igualmente se busca que estas personas ayuden en el mismo sitio de
          acogida, ya sea ayudando en las tareas diarias del lugar o teniendo la
          opcortunidad de trabajar de manera externa. Con este proyecto buscamos
          ayudar a los más necesitados y apoyarlos para su reintegración a la
          sociedad.
        </p>
      </div>
    </div>
    <div class="equip">
      <h3 id="title">Equipo</h3>
      <img
        id="organ"
        src="/HOPE/Assets/organigrama.jpg"
        alt=""
      />
    </div>
    <footer class="footer">
      <div class="footer-section">
        <h3>Apoya nuestro trabajo</h3>
        <p>Ayuda a las personas refugiadas</p>
        <button>Donar ahora</button>
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
        <p><i class="bi bi-telephone-plus"></i>221 729 0005</p>
        <p><i class="bi bi-telephone-plus"></i> 881 900 1990</p>
      </div>
    </footer>
  </body>
</html>
