<?php
require_once('../includes/DB.php');

$db = new DB();
$pdo = $db->connect();

$user_id = 3;

$stmt = $pdo->prepare("SELECT nombre, username, correo, telefono FROM registro WHERE id = :id");
$stmt->bindParam(':id', $user_id);
$stmt->execute();
$usuario = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$usuario) {
    echo "Usuario no encontrado.";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['nueva_password'])) {
        $password_actual = $_POST['password_actual'];
        $nueva_password = $_POST['nueva_password'];

        $stmt = $pdo->prepare("SELECT password FROM registro WHERE id = :id");
        $stmt->bindParam(':id', $user_id);
        $stmt->execute();
        $hashed_password = $stmt->fetchColumn();

        if (password_verify($password_actual, $hashed_password)) {
            $hashed_nueva_password = password_hash($nueva_password, PASSWORD_DEFAULT);
            $stmt = $pdo->prepare("UPDATE registro SET password = :password WHERE id = :id");
            $stmt->bindParam(':password', $hashed_nueva_password);
            $stmt->bindParam(':id', $user_id);

            if ($stmt->execute()) {
                echo "Contraseña cambiada correctamente.";
            } else {
                echo "Error al cambiar la contraseña.";
            }
        } else {
            echo "La contraseña actual es incorrecta.";
        }
    }

    if (isset($_POST['nuevo_telefono'])) {
        $nuevo_telefono = $_POST['nuevo_telefono'];

        $stmt = $pdo->prepare("UPDATE registro SET telefono = :telefono WHERE id = :id");
        $stmt->bindParam(':telefono', $nuevo_telefono);
        $stmt->bindParam(':id', $user_id);

        if ($stmt->execute()) {
            echo "Número de teléfono actualizado correctamente.";
        } else {
            echo "Error al actualizar el número de teléfono.";
        }
    }

    if (isset($_POST['nuevo_correo'])) {
        $nuevo_correo = $_POST['nuevo_correo'];

        $stmt = $pdo->prepare("UPDATE registro SET correo = :correo WHERE id = :id");
        $stmt->bindParam(':correo', $nuevo_correo);
        $stmt->bindParam(':id', $user_id);

        if ($stmt->execute()) {
            echo "Correo actualizado correctamente.";
        } else {
            echo "Error al actualizar el correo.";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil de Usuario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" href="/HOPE/Assets/logo-removebg-preview.png" type="image/x-icon">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 20px;
        }

        header {
            text-align: center;
            margin-bottom: 20px;
        }

        h1 {
            color: #333;
        }

        .container-wrapper {
            display: flex;
            align-items: flex-start;
            gap: 20px;
            flex-wrap: wrap;
        }

        .flip-card {
            background-color: transparent;
            width: 300px;
            height: 300px;
            perspective: 1000px;
        }

        .flip-card-inner {
            position: relative;
            width: 100%;
            height: 100%;
            text-align: center;
            transition: transform 0.6s;
            transform-style: preserve-3d;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            border-radius: 10px;
        }
        
        .flip-card:hover .flip-card-inner {
            transform: rotateY(180deg);
        }

        .flip-card-front, .flip-card-back {
            position: absolute;
            width: 100%;
            height: 100%;
            backface-visibility: hidden;
            border-radius: 10px;
        }

        .flip-card-front {
            background-color: #bbb;
            color: black;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .flip-card-front img {
            border-radius: 50%;
            width: 80%;
            height: auto;
        }

        .flip-card-back {
            background-color: #28a745;
            color: white;
            transform: rotateY(180deg);
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .user-card, .form-section {
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            padding: 20px;
            width: 100%;
        }

        .user-card h2, .form-section h2 {
            margin-bottom: 15px;
            color: #444;
            text-align: center;
        }

        .form-section label {
            color: #666;
            font-weight: bold;
            margin-bottom: 5px;
            display: block;
        }

        .form-section input[type="password"],
        .form-section input[type="text"],
        .form-section input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        .form-section input[type="submit"] {
            background-color: #28a745;
            color: white;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .form-section input[type="submit"]:hover {
            background-color: #218838;
        }

        .navbar {
            background-color: #343a40;
            padding:4px
            

        }

        .navbar-brand img {
            width: 30px;
            height: auto;
        }

        .navbar-toggler {
            border-color: rgba(0, 0, 0, 0.1);
        }

        .navbar-nav .nav-link {
            color: white !important;
        }

        .navbar-nav .nav-link:hover {
            color: #f8f9fa !important;
        }

        .btn-regresar  {
            color: white;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            text-align: center;
            display: block;
            margin: 5px 0;
        }
     

        .btn-regresar:hover {
            background-color: #5ec4c4; 
        }

        .btn-cerrar-sesion {
            color: white;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            text-align: center;
            display: block;
            margin: 5px 0;
        }

        .btn-cerrar-sesion:hover {
            background-color: #c82333; 
        }

        .profile-photo {
            display: flex;
            align-items: center;
            height: 300px; 
            flex: 1;
        }

        .profile-photo .flip-card {
            margin: 0 auto;
        }

        .form-sections {
            flex: 2;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><img src="/HOPE/Assets/logo-removebg-preview.png" alt="Logo"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link btn-regresar" href="/HOPE/vistas/user.php">Regresar</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn-cerrar-sesion" href="/HOPE/includes/logout.php">Cerrar Sesión</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <header>
        <h1>Bienvenido, <?php echo isset($usuario['username']) ? htmlspecialchars($usuario['username']) : 'Usuario'; ?></h1>
    </header>

    <div class="container-wrapper">
        <div class="profile-photo">
            <div class="flip-card">
                <div class="flip-card-inner">
                    <div class="flip-card-front">
                        <img src="/HOPE/Assets/perfil2.png" alt="Foto de Perfil">
                    </div>
                    <div class="flip-card-back">
                        <h2><?php echo htmlspecialchars($usuario['nombre']); ?></h2>
                        <p><?php echo htmlspecialchars($usuario['username']); ?></p>
                    </div>
                </div>
            </div>
        </div>

        <div class="form-sections">
            <section class="user-card">
                <h2>Datos del Usuario</h2>
                <p><strong>Nombre:</strong> <?php echo htmlspecialchars($usuario['nombre']); ?></p>
                <p><strong>Username:</strong> <?php echo htmlspecialchars($usuario['username']); ?></p>
                <p><strong>Correo:</strong> <?php echo htmlspecialchars($usuario['correo']); ?></p>
                <p><strong>Teléfono:</strong> <?php echo htmlspecialchars($usuario['telefono']); ?></p>
            </section>

            <section class="form-section">
                <h2>Cambiar Contraseña</h2>
                <form method="POST">
                    <label for="password_actual">Contraseña Actual:</label>
                    <input type="password" id="password_actual" name="password_actual" required>

                    <label for="nueva_password">Nueva Contraseña:</label>
                    <input type="password" id="nueva_password" name="nueva_password" required>

                    <input type="submit" value="Cambiar Contraseña">
                </form>
            </section>

            <section class="form-section">
                <h2>Cambiar Correo</h2>
                <form method="POST">
                    <label for="nuevo_correo">Nuevo Correo:</label>
                    <input type="text" id="nuevo_correo" name="nuevo_correo" value="<?php echo htmlspecialchars($usuario['correo']); ?>" required>

                    <input type="submit" value="Cambiar Correo">
                </form>
            </section>

            <section class="form-section">
                <h2>Cambiar Teléfono</h2>
                <form method="POST">
                    <label for="nuevo_telefono">Nuevo Teléfono:</label>
                    <input type="text" id="nuevo_telefono" name="nuevo_telefono" value="<?php echo htmlspecialchars($usuario['telefono']); ?>" required>

                    <input type="submit" value="Cambiar Teléfono">
                </form>
            </section>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
