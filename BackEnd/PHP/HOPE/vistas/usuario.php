<?php
require_once('../includes/DB.php');

// Instancia la clase DB y conéctate a la base de datos
$db = new DB();
$pdo = $db->connect();

// Asume un ID de usuario (puedes definirlo estáticamente para pruebas)
$user_id = 1; // Cambia esto al ID del usuario que deseas mostrar

// Obtén los datos del usuario
$stmt = $pdo->prepare("SELECT nombre, username FROM registro WHERE id = :id");
$stmt->bindParam(':id', $user_id);
$stmt->execute();
$usuario = $stmt->fetch(PDO::FETCH_ASSOC);

// Si se envió el formulario de cambio de contraseña
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['nueva_password'])) {
    $password_actual = $_POST['password_actual'];
    $nueva_password = $_POST['nueva_password'];

    // Verifica que la contraseña actual sea correcta
    $stmt = $pdo->prepare("SELECT password FROM registro WHERE id = :id");
    $stmt->bindParam(':id', $user_id);
    $stmt->execute();
    $hashed_password = $stmt->fetchColumn();

    if (password_verify($password_actual, $hashed_password)) {
        // Cambia la contraseña
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
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            
        }

        header {
            text-align: center;
            margin-bottom: 20px;
        }

        h1 {
            color: #333;
        }

        .content-wrapper {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 20px;
            max-width: 400px;
            width: 100%;
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
            max-width: 400px;
            width: 100%;
            margin-bottom: 20px;
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

        .container {
            text-align: center;
            margin-top: 20px;
        }

        .container button {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            background-color: #dc3545;
            color: white;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .container button:hover {
            background-color: #c82333;
        }
    </style>
</head>
<body>
    <header>
        <h1>Bienvenido, <?php echo htmlspecialchars($usuario['username']); ?></h1>
    </header>

    <div class="content-wrapper">
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

        <section class="user-card">
            <h2>Datos del Usuario</h2>
            <p><strong>Nombre:</strong> <?php echo htmlspecialchars($usuario['nombre']); ?></p>
            <p><strong>Username:</strong> <?php echo htmlspecialchars($usuario['username']); ?></p>
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
    </div>
    <div class="container">
        <button onclick="location.href='/HOPE/vistas/user.php'">Regresar</button>
    </div>
    <div class="container">
        <button onclick="location.href='/HOPE/includes/logout.php'">Cerrar Sesión</button>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>