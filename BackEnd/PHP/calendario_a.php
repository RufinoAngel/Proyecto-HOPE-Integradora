<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "albergue";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $action = $_POST['action'] ?? '';

    if ($action == 'upload_calendar' && isset($_FILES['calendarFile'])) {
        $file = $_FILES['calendarFile'];
        $target_dir = "/HOPE/Assets/";
        $target_file = $target_dir . basename($file["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Check if file is a valid image
        $check = getimagesize($file["tmp_name"]);
        if ($check !== false) {
            $uploadOk = 1;
        } else {
            echo "El archivo no es una imagen.";
            $uploadOk = 0;
        }

        // Check file size
        if ($file["size"] > 500000) {
            echo "El archivo es demasiado grande.";
            $uploadOk = 0;
        }

        // Allow certain file formats
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
            echo "Solo se permiten archivos JPG, JPEG, y PNG.";
            $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "El archivo no se ha subido.";
        // If everything is ok, try to upload file
        } else {
            if (move_uploaded_file($file["tmp_name"], $target_file)) {
                echo "El archivo ". htmlspecialchars(basename($file["name"])) . " ha sido subido.";
            } else {
                echo "Hubo un error al subir tu archivo.";
            }
        }
    }

    if ($action == 'update_calendar' && isset($_FILES['updateCalendarFile'])) {
        $file = $_FILES['updateCalendarFile'];
        $target_dir = "/HOPE/Assets/";
        $target_file = $target_dir . basename($file["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Check if file is a valid image
        $check = getimagesize($file["tmp_name"]);
        if ($check !== false) {
            $uploadOk = 1;
        } else {
            echo "El archivo no es una imagen.";
            $uploadOk = 0;
        }

        // Check file size
        if ($file["size"] > 500000) {
            echo "El archivo es demasiado grande.";
            $uploadOk = 0;
        }

        // Allow certain file formats
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
            echo "Solo se permiten archivos JPG, JPEG, y PNG.";
            $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "El archivo no se ha subido.";
        // If everything is ok, try to upload file
        } else {
            if (move_uploaded_file($file["tmp_name"], $target_file)) {
                echo "El archivo ". htmlspecialchars(basename($file["name"])) . " ha sido actualizado.";
            } else {
                echo "Hubo un error al actualizar tu archivo.";
            }
        }
    }
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calendario</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="/HOPE/CSS/modal.css" />
    <link rel="icon" href="/HOPE/Assets/logo-removebg-preview.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style>
        .calendar-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 20px;
        }
        .calendar-view {
            flex: 1;
        }
        .admin-actions {
            margin-top: 20px;
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
                <li><a href="/HOPE/vistas/nosotros_a.php">Usuarios</a></li>
                <li><a href="/HOPE/vistas/servicios_a.php">Servicios</a></li>
                <li><a href="/HOPE/vistas/registro.php">Registro</a></li>
                <li><a href="/HOPE/vistas/donacion_a.php">Donación</a></li>
                <li class="active"><a href="">Calendario</a></li>
                <li><a href="/HOPE/vistas/eventos.php">Eventos</a></li>
                <li><a href="/HOPE/vistas/inventario_a.php">Inventario</a></li>
                <li><a href="/HOPE/vistas/homeless.php">Homeless</a></li>
                <li><a href="/HOPE/vistas/personal.php">Personal</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="/HOPE/vistas/usuario_admin.php"><span class="glyphicon glyphicon-user"></span>Perfil</a></li>
                <li><a href="/HOPE/includes/logout.php"><span class="glyphicon glyphicon-log-in"></span> Cerrar sesión</a></li>
            </ul>
        </div>
    </nav>
    <div class="container">
        <div class="tit">
            <h2 id="Sobre">Calendario de Eventos</h2>
        </div>
        <div class="calendar-container">
            <div class="calendar-view">
                <h2>Vista del Calendario</h2>
                <img src="/HOPE/Assets/95473dd0ea87f68fca7dcb023a705f72.jpg" alt="Calendario">
            </div>
            <div class="admin-actions">
                <h2>Gestión del Calendario</h2>
                <form action="" method="POST" enctype="multipart/form-data">
                    <h3>Subir Nuevo Calendario</h3>
                    <div class="form-group">
                        <label for="calendarFile">Selecciona el archivo del calendario</label>
                        <input type="file" id="calendarFile" name="calendarFile" class="form-control" required>
                    </div>
                    <input type="hidden" name="action" value="upload_calendar">
                    <button type="submit" class="btn btn-primary">Subir Calendario</button>
                </form>
                <br>
                <form action="" method="POST" enctype="multipart/form-data">
                    <h3>Actualizar Calendario</h3>
                    <div class="form-group">
                        <label for="updateCalendarFile">Selecciona el nuevo archivo del calendario</label>
                        <input type="file" id="updateCalendarFile" name="updateCalendarFile" class="form-control" required>
                    </div>
                    <input type="hidden" name="action" value="update_calendar">
                    <button type="submit" class="btn btn-secondary">Actualizar Calendario</button>
                </form>
            </div>
        </div>
    </div>
    <footer class="footer">
        <div class="footer-section">
            <h3>Historias</h3>
            <p>Ayuda a las personas refugiadas</p>
            <button>Ver Historias</button>
        </div>
        <div class="footer-section">
            <h3>Contacta</h3>
            <p>info@hogaresperanza.com</p>
            <button>Contactar</button>
        </div>
        <div class="footer-section">
            <h3>Redes Sociales</h3>
            <button>Facebook</button>
            <button>Instagram</button>
            <button>Twitter</button>
        </div>
    </footer>
</body>
</html>
