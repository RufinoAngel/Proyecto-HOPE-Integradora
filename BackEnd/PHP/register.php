<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f0f4f8;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            padding: 30px;
            width: 100%;
            max-width: 400px;
        }

        h2 {
            text-align: center;
            color: #0056b3;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            color: #333333;
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"], input[type="password"], input[type="email"],[type="tel"] {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #cccccc;
            box-sizing: border-box;
            transition: border-color 0.3s;
        }

        input[type="text"]:focus, input[type="password"]:focus {
            border-color: #0056b3;
            outline: none;
        }

        .submit-btn {
            width: 100%;
            padding: 10px;
            background-color: #0056b3;
            color: #ffffff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
        }

        .submit-btn:hover {
            background-color: #004494;
        }

        .login-btn {
            width: 95%;
            padding: 10px;
            background-color: #28a745;
            color: #ffffff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            margin-top: 10px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            transition: background-color 0.3s;
        }

        .login-btn:hover {
            background-color: #218838;
        }

        .success-message {
            color: green;
            text-align: center;
            margin-top: 15px;
            font-weight: bold;
        }

        .error-message {
            color: red;
            text-align: center;
            margin-top: 15px;
            font-weight: bold;
        }
    </style>
</head>
<body>

<div class="container">
        <h2>Registro</h2>
        <form method="POST">
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" id="nombre" name="nombre" required>
            </div>
            <div class="form-group">
                <label for="username">Nombre de Usuario</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Contraseña</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="form-group">
                <label for="email">Correo Electrónico</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="phone">Número de Teléfono</label>
                <input type="tel" id="phone" name="phone" required>
            </div>
            <button type="submit" class="submit-btn">Registrar</button>
        </form>

        <?php
        // Conexión a la base de datos
        require_once($_SERVER['DOCUMENT_ROOT'] . '/HOPE/includes/DB.php');
        $db = new DB();
        $pdo = $db->connect();

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : '';
            $username = isset($_POST['username']) ? $_POST['username'] : '';
            $password = isset($_POST['password']) ? $_POST['password'] : '';
            $email = isset($_POST['email']) ? $_POST['email'] : '';
            $phone = isset($_POST['phone']) ? $_POST['phone'] : '';

            if (!empty($nombre) && !empty($username) && !empty($password) && !empty($email) && !empty($phone)) {
                try {
                    $stmt = $pdo->prepare("INSERT INTO registro (nombre, username, password, email, phone) VALUES (:nombre, :username, :password, :email, :phone)");
                    $stmt->bindParam(':nombre', $nombre);
                    $stmt->bindParam(':username', $username);
                    $stmt->bindParam(':password', $password);
                    $stmt->bindParam(':email', $email);
                    $stmt->bindParam(':phone', $phone);

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

        <a href="/HOPE/login.php" class="login-btn">Iniciar Sesión</a>
    </div>
</body>
</html>
