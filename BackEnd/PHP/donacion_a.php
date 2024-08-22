<?php
$servername = "localhost";
$username = "root"; 
$password = "";    
$dbname = "albergue";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$resumen_sql = "SELECT SUM(monto) AS total_recaudado, COUNT(*) AS total_donaciones FROM donaciones";
$resumen_result = $conn->query($resumen_sql);
$resumen = $resumen_result->fetch_assoc();

$listado_sql = "SELECT id, tipo_donacion, nombre, monto, cuenta, cvv, vigencia, productos, tipoRopa, albergue, direccion FROM donaciones ORDER BY id DESC";
$listado_result = $conn->query($listado_sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donación</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="/HOPE/CSS/login.css" />
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
            <li><a href="/HOPE/vistas/user_admin.php">Home</a></li>
            <li><a href="/HOPE/vistas/nosotros_a.php">Usuarios</a></li>
            <li><a href="/HOPE/vistas/servicios_a.php">Servicios</a></li>
            <li><a href="/HOPE/vistas/registro.php">Registro</a></li>
            <li class="active"><a href="/HTML/donacion_a.php">Donación</a></li>
            <li><a href="/HOPE/vistas/calendario_a.php">Calendario</a></li>
            <li><a href="/HOPE/vistas/eventos.php">Eventos</a></li>
            <li><a href="/HOPE/vistas/inventario_a.php">Inventario</a></li>
            <li><a href="/HOPE/vistas/contacto.php">Homeless</a></li>
            <li><a href="/HOPE/vistas/personal.php">Personal</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li><a href="/HOPE/vistas/usuario_admin.php"><span class="glyphicon glyphicon-user"></span>Perfil</a></li>
          <li><a href="/HOPE/includes/logout.php"><span class="glyphicon glyphicon-log-in"></span> Cerrar sesión</a></li>
        </ul>
      </div>
    </nav> 
    
    <div class="container">
        <h2 >Panel de Control de Donaciones</h2>
        <div class="panel panel-default">
            <div class="panel-heading">Resumen de Donaciones</div>
            <div class="panel-body">
                <p>Total Recibido: $<?php echo number_format($resumen['total_recaudado'], 2); ?></p>
                <p>Número de Donaciones: <?php echo $resumen['total_donaciones']; ?></p>
            </div>
        </div>
        
        <h3>Listado de Donaciones</h3>
        <table class="table table-striped">
            <thead>
                <tr>
                <center><th>ID</th></center>
                    <center><th>Tipo de Donación</th></center>
                    <center><th>Nombre</th></center>
                    <center><th>Monto</th></center>
                    <center><th>Cuenta</th></center>
                    <center><th>Vigencia</th></center>
                    <center><th>Productos</th></center>
                    <center><th>Tipo de Ropa</th></center>
                    <center><th>Albergue</th></center>
                    <center><th>Dirección</th><center>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($listado_result->num_rows > 0) {
                    while($row = $listado_result->fetch_assoc()) {
                        echo "<tr>
                            <td>" . htmlspecialchars($row['id']) . "</td>
                            <td>" . htmlspecialchars($row['tipo_donacion']) . "</td>
                            <td>" . htmlspecialchars($row['nombre']) . "</td>
                            <td>$" . number_format($row['monto'], 2) . "</td>
                            <td>" . htmlspecialchars($row['cuenta']) . "</td>
                            <td>" . htmlspecialchars($row['vigencia']) . "</td>
                            <td>" . htmlspecialchars($row['productos']) . "</td>
                            <td>" . htmlspecialchars($row['tipoRopa']) . "</td>
                            <td>" . htmlspecialchars($row['albergue']) . "</td>
                            <td>" . htmlspecialchars($row['direccion']) . "</td>
                        </tr>";
                    }
                } else {
                    echo "<tr><td colspan='11'>No hay donaciones registradas.</td></tr>";
                }
                ?>
            </tbody>
        </table>
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
          <p><i class="bi bi-telephone-plus"></i> 221 729 0005</p>
          <p><i class="bi bi-telephone-plus"></i> 881 900 1990</p>
        </div>
      </footer>
    </body>
</html>