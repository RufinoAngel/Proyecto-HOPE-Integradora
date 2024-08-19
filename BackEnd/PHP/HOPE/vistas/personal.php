<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personal</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="/HOPE/CSS/styles.css" />
    <link rel="icon" href="/HOPE/Assets/logo-removebg-preview.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        .table {
            background-color: black;
            color: white;
        }
        .table th, .table td {
            color: white;
        }
    </style>
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
            <li><a href="/HOPE/vistas/nosotros_a.php">Nosotros</a></li>
            <li><a href="/HOPE/vistas/servicios_a.php">Servicios</a></li>
            <li><a href="/HOPE/vistas/registro.php">Registro</a></li>
            <li><a href="/HOPE/vistas/donacion_a.php">Donación</a></li>
            <li><a href="/HOPE/vistas/calendario_a.php">Calendario</a></li>
            <li><a href="/HOPE/vistas/inventario_a.php">Inventario</a></li>
            <li><a href="/HOPE/vistas/homeless.php">Homeless</a></li>
            <li class="active"><a href="#">Personal</a></li>
          </ul>
        <ul class="nav navbar-nav navbar-right">
          <li><a href="/HOPE/vistas/usuario_admin.php"><span class="glyphicon glyphicon-user"></span>Usuario</a></li>
          <li><a href="/HOPE/includes/logout.php"><span class="glyphicon glyphicon-log-in"></span> Cerrar sesión</a></li>
        </ul>
      </div>
    </nav> 

    <div class="container">
        <h2>Agregar Encargado</h2>
        <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "albergue";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Conexión fallida: " . $conn->connect_error);
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nombre_completo = isset($_POST['nombre_completo']) ? $_POST['nombre_completo'] : '';
            $telefono = isset($_POST['telefono']) ? $_POST['telefono'] : '';
            $correo = isset($_POST['correo']) ? $_POST['correo'] : '';
            $edad = isset($_POST['edad']) ? $_POST['edad'] : '';

            if ($nombre_completo && $telefono && $correo && $edad) {
                $sql = "INSERT INTO encargado (nombre_completo, telefono, correo, edad) VALUES (?, ?, ?, ?)";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("sssi", $nombre_completo, $telefono, $correo, $edad);

                if ($stmt->execute()) {
                    echo "<div class='alert alert-success'>Encargado agregado exitosamente</div>";
                } else {
                    echo "<div class='alert alert-danger'>Error: " . $stmt->error . "</div>";
                }

                $stmt->close();
            } else {
                echo "<div class='alert alert-warning'>Por favor complete todos los campos.</div>";
            }
        }

        $conn->close();
        ?>

        <form method="POST">
            <div class="form-group">
                <label for="nombre_completo">Nombre Completo:</label>
                <input type="text" class="form-control" id="nombre_completo" name="nombre_completo" required>
            </div>
            <div class="form-group">
                <label for="telefono">Teléfono:</label>
                <input type="text" class="form-control" id="telefono" name="telefono" required>
            </div>
            <div class="form-group">
                <label for="correo">Correo:</label>
                <input type="email" class="form-control" id="correo" name="correo" required>
            </div>
            <div class="form-group">
                <label for="edad">Edad:</label>
                <input type="number" class="form-control" id="edad" name="edad" required>
            </div>
            <button type="submit" class="btn btn-primary">Agregar</button>
        </form>

        <h2>Lista de Encargados</h2>
        <?php
            $conn = new mysqli($servername, $username, $password, $dbname);
            if ($conn->connect_error) {
            die("Conexión fallida: " . $conn->connect_error);
        } 

        $sql = "SELECT nombre_completo, telefono, correo, edad FROM encargado";
        $result = $conn->query($sql);

        if ($result === false) {
            echo "<div class='alert alert-danger'>Error en la consulta: " . $conn->error . "</div>";
        } else {
        if ($result->num_rows > 0) {
            echo "<table class='table'>";
            echo "<thead><tr><th>Nombre Completo</th><th>Teléfono</th><th>Correo</th><th>Edad</th></tr></thead><tbody>";
        while($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row["nombre_completo"]. "</td><td>" . $row["telefono"]. "</td><td>" . $row["correo"]. "</td><td>" . $row["edad"]. "</td></tr>";
        }
        echo "</tbody></table>";
        } else {
        echo "<div class='alert alert-info'>No se encontraron encargados.</div>";
       }
    }

$conn->close();

?>

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
