<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Servicios</title>
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
                <li><a href="/HOPE/vistas/Nosotros.php">Nosotros</a></li>
                <li class="active"><a href="#">Servicios</a></li>
                <li><a href="/HOPE/vistas/donación.php">Donación</a></li>
                <li><a href="/HOPE/vistas/contacto.php">Calendario</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="/HOPE/vistas/usuario.php"><span class="glyphicon glyphicon-user"></span>Usuario</a></li>
                <li><a href="/HOPE/includes/logout.php"><span class="glyphicon glyphicon-log-in"></span> Cerrar sesión</a></li>
            </ul>
        </div>
    </nav>
    <div class="tit">
        <h2 id="Sobre">Servicios</h2>
    </div>
    <div class="regis-sup">
        <h2>Registro</h2>
        <div class="cont-reg1">
            <a href="#modal1"><button>Registrar</button></a>
        </div>
    </div>
    <div id="modal1" class="modalmask">
        <div class="modalbox movedown">
            <a href="#close" title="Close" class="close">X</a>
            <div class="titulo">
                <h3>Registro de persona s/n hogar</h3>
            </div>
            <div class="formulario">
                <form action="" method="post">
                    <div class="input-superior">
                        <label>Nombre: <br><input type="text" name="nombre" id="name" placeholder="Nombres"></label>
                        <label>Apellidos: <br><input type="text" name="apellido" id="apellido" placeholder="Apellidos"></label>
                    </div>
                    <div class="input-intermedio">
                        <label>Curp: <input type="text" name="curp" id="curp" placeholder="Curp"></label>
                    </div>
                    <div class="input-inferior">
                        <label>¿Presenta alguna enfermedad?: <br>
                            <input type="radio" name="enfermedad" id="Si" value="Si"> Si
                            <input type="radio" name="enfermedad" id="No" value="No"> No
                            <br>
                        </label>
                        <label>Indique la enfermedad en caso de tenerla <input type="text" name="tipoenfermedad" id="tipoenfermedad"></label>
                        <label>¿Tiene Familia?: <br>
                            <input type="radio" name="familiares" id="Si" value="Si"> Si
                            <input type="radio" name="familiares" id="No" value="No"> No
                            <br>
                        </label>
                    </div>
                    <div class="botones">
                        <button type="submit" class="guardar">Guardar</button>
                        <button type="button" class="cancelar" onclick="location.href='/HOPE/vistas/servicios.php'">Cancelar</button>
                    </div>
                    <?php
                    require_once($_SERVER['DOCUMENT_ROOT'] . '/HOPE/includes/DB.php');

                    $db = new DB();
                    $pdo = $db->connect();

                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        // Obtén los datos del formulario y verifica que existan
                        $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : '';
                        $apellido = isset($_POST['apellido']) ? $_POST['apellido'] : '';
                        $curp = isset($_POST['curp']) ? $_POST['curp'] : '';
                        $enfermedad = isset($_POST['enfermedad']) ? $_POST['enfermedad'] : '';
                        $tipoenfermedad = isset($_POST['tipoenfermedad']) ? $_POST['tipoenfermedad'] : '';
                        $fam = isset($_POST['familiares']) ? $_POST['familiares'] : '';

                        // Verifica que los campos no estén vacíos
                        if (!empty($nombre) && !empty($apellido) && !empty($curp)) {
                            try {
                                // Prepara la consulta SQL para insertar los datos
                                $stmt = $pdo->prepare("INSERT INTO persona_sin_hogar (nombre, apellidos, curp, enfermedades, tipo_enfermedad, familiares) VALUES (:nombre, :apellido, :curp, :enfermedad, :tipoenfermedad, :familiares)");
                                $stmt->bindParam(':nombre', $nombre);
                                $stmt->bindParam(':apellido', $apellido);
                                $stmt->bindParam(':curp', $curp);
                                $stmt->bindParam(':enfermedad', $enfermedad);
                                $stmt->bindParam(':tipoenfermedad', $tipoenfermedad);
                                $stmt->bindParam(':familiares', $fam);

                                // Ejecuta la consulta
                                if ($stmt->execute()) {
                                    echo "<p class='success-message'>Datos guardados correctamente</p>";
                                } else {
                                    echo "<p class='error-message'>Error al guardar los datos</p>";
                                }
                            } catch (PDOException $e) {
                                echo "<p class='error-message'>Error: " . $e->getMessage() . "</p>";
                            }
                        } else {
                            echo "<p class='error-message'>Por favor, completa todos los campos.</p>";
                        }
                    }
                    ?>
                </form>
            </div>
        </div>
    </div>
    
    <div class="regis-inf">
        <h2>Nuestros Recursos</h2>
        <table class="recursos-table">
            <thead>
                <tr>
                    <th>N°</th>
                    <th>Recurso</th>
                </tr>
            </thead>
            <tbody>
                <?php
                require_once($_SERVER['DOCUMENT_ROOT'] . '/HOPE/includes/DB.php');
                $db = new DB();
                $pdo = $db->connect();
                
                // Obtener datos de la tabla
                $sql = "SELECT * FROM recursos";
                $stmt = $pdo->query($sql);

                if ($stmt->rowCount() > 0) {
                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        echo "<tr>
                                <td>{$row['id']}</td>
                                <td>{$row['nombre']}</td>
                            </tr>";
                    }
                } else {
                    echo "<tr><td colspan='2'>No hay recursos disponibles</td></tr>";
                }
                ?>
            </tbody>
        </table>
        <br>
        <br>
    </div>
  
    <div class="his">
        <h2>Ubicación de Albergue</h2>
        <div class="fakeimg" style="height: 200px">
          <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d60166.60006546306!2d-98.33548786260793!3d18.9888237097739!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85cfc0e25c1921af%3A0xc2970b792a883c74!2sAlbergue%20IMSS%20SAN%20JOSE!5e0!3m2!1ses!2smx!4v1690738696145!5m2!1ses!2smx"
            width="400"
            height="300"
            style="border: 0"
            allowfullscreen=""
            loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"
          ></iframe>
        </div>
        
    </div>
    <div class="encuesta">
      <br>
      <a href="#modal2"><button>Encuesta De Satisfacción</button></a>
    </div>
    <div id="modal2" class="modalmask">
      <div class="modalbox movedown">
          <a href="#close" title="Close" class="close">X</a>
          <div class="titulo">
              <h3>Encuesta </h3>
          </div>
          <div class="formulario">
    <form action="" method="post">
        <div class="input-superior">
            <label>¿Qué te pareció el servicio? <br><br>
                <input type="radio" name="satisfaccion" id="5" value="5">5
                <input type="radio" name="satisfaccion" id="4" value="4">4
                <input type="radio" name="satisfaccion" id="3" value="3">3
                <input type="radio" name="satisfaccion" id="2" value="2">2
                <input type="radio" name="satisfaccion" id="1" value="1">1
            </label>
        </div>
        <div class="input-intermedio">
            <label>¿En qué podemos mejorar? <br> <input type="text" name="mejorar" id="mejorar"></label>
        </div>
        <div class="input-inferior">
            <label>Puede dejar su comentario <br> <input type="text" name="comentarios" id="comentarios"></label>
        </div>
        <div class="botones">
            <button type="submit" class="guardar">Guardar</button>
            <button type="button" class="cancelar" onclick="location.href='/HOPE/vistas/servicios.php'">Cancelar</button>
        </div>
        <?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/HOPE/includes/DB.php');

$db = new DB();
$pdo = $db->connect();

// Obtén los datos del formulario
$satisfaccion = isset($_POST['satisfaccion']) ? $_POST['satisfaccion'] : '';
$mejorar = isset($_POST['mejorar']) ? $_POST['mejorar'] : '';
$comentarios = isset($_POST['comentarios']) ? $_POST['comentarios'] : '';

// Verifica que todos los campos necesarios estén presentes
if (!empty($satisfaccion)) {
    try {
        // Prepara la consulta SQL para insertar los datos
        $stmt = $pdo->prepare("INSERT INTO encuesta (satisfaccion, mejorar, comentarios) VALUES (:satisfaccion, :mejorar, :comentarios)");
        $stmt->bindParam(':satisfaccion', $satisfaccion);
        $stmt->bindParam(':mejorar', $mejorar);
        $stmt->bindParam(':comentarios', $comentarios);

        // Ejecuta la consulta
        if ($stmt->execute()) {
            echo "<p class='success-message'>Encuesta guardada correctamente.</p>";
        } else {
            echo "<p class='error-message'>Error al guardar la encuesta.</p>";
        }
    } catch (PDOException $e) {
        echo "<p class='error-message'>Error: " . $e->getMessage() . "</p>";
    }
} else {
    echo "<p class='error-message'>Por favor, completa todos los campos requeridos.</p>";
}
?>

    </form>
      </div>
    </div>
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
      <script src="/JS/main.js"></script>
</body>
</html>