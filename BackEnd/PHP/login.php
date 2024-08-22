<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sesiones</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f7f9fc;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.1);
            padding: 30px;
            width: 100%;
            max-width: 400px;
            text-align: center;
        }

        h2 {
            margin-bottom: 20px;
            color: #333333;
            font-size: 24px;
        }

        p {
            margin-bottom: 15px;
            color: #555555;
            font-size: 16px;
            text-align: left;
        }

        input[type="text"], input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border-radius: 5px;
            border: 1px solid #cccccc;
            box-sizing: border-box;
            transition: border-color 0.3s;
        }

        input[type="text"]:focus, input[type="password"]:focus {
            border-color: #0066cc;
            outline: none;
        }

        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #0066cc;
            color: #ffffff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            margin-top: 20px;
            transition: background-color 0.3s;
        }

        input[type="submit"]:hover {
            background-color: #005bb5;
        }

        .error-message {
            color: red;
            font-size: 14px;
            margin-bottom: 15px;
        }

        .register-link {
            margin-top: 20px;
            font-size: 14px;
            color: #555555;
        }

        .register-link a {
            color: #0066cc;
            text-decoration: none;
            font-weight: bold;
        }

        .register-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php
            if(isset($errorLogin)){
                echo "<p class='error-message'>$errorLogin</p>";
            }
        ?>
        <h2>Iniciar sesión</h2>
        <form action="" method="POST">
            <p>Nombre de usuario: <br>
            <input type="text" name="username" required></p>
            <p>Password: <br>
            <input type="password" name="password" required></p>
            <p><input type="submit" value="Iniciar Sesión"></p>
        </form>
        <div class="register-link">
            <p>¿No te has registrado? <a href="/HOPE/vistas/register.php">Hazlo aquí</a></p>
        </div>
    </div>
</body>
</html>
