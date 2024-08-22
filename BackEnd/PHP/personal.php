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
            background-color: #B9F1D6;
            color: black;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.3);
            margin-top: 20px;
            border: 1px solid #ddd;
        }
        .t
        .table th, .table td {
            color: black;
        }
        .btn-update {
            background-color: #007bff;
            color: white;
        }
        .btn-update:hover {
            background-color: #0056b3;
        }
        .btn-delete {
            background-color: #dc3545;
            color: white;
        }
        .btn-delete:hover {
            background-color: #c82333;
        }
        .update-form {
            display: none;
        }
        .form-container {
            background-color: #f9f9f9;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            margin-top: 20px;
            border: 1px solid #ddd;
        }
        .form-container h2 {
            margin-bottom: 20px;
            color: #333;
        }
        .form-group label {
            color: #333;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #004085;
        }
        .form-control {
            border-radius: 5px;
            box-shadow: inset 0 1px 2px rgba(0,0,0,0.1);
        }
        .form-group input[type="text"], 
        .form-group input[type="email"], 
        .form-group input[type="number"] {
            padding: 10px;
            font-size: 16px;
        }
        .btn-primary {
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 5px;
            color: white;
            border: none;
        }
        .alert {
            margin-top: 10px;
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
            <li><a href="/HOPE/vistas/calendario_a.php">Calendario</a></li>
            <li><a href="/HOPE/vistas/eventos.php">Eventos</a></li>
            <li><a href="/HOPE/vistas/inventario_a.php">Inventario</a></li>
            <li><a href="/HOPE/vistas/homeless.php">Homeless</a></li>
            <li class="active"><a href="#">Personal</a></li>
          </ul>
        <ul class="nav navbar-nav navbar-right">
          <li><a href="/HOPE/vistas/usuario_admin.php"><span class="glyphicon glyphicon-user"></span>Perfil</a></li>
          <li><a href="/HOPE/includes/logout.php"><span class="glyphicon glyphicon-log-in"></span> Cerrar sesión</a></li>
        </ul>
      </div>
    </nav> 

    <div class="container">
        <h2>Lista de Encargados</h2>
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
            if (isset($_POST['add'])) {
                $nombre_completo = $_POST['nombre_completo'] ?? '';
                $telefono = $_POST['telefono'] ?? '';
                $correo = $_POST['correo'] ?? '';
                $edad = $_POST['edad'] ?? '';

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

            if (isset($_POST['update'])) {
                $id = $_POST['id'];
                $nombre_completo = $_POST['nombre_completo'];
                $telefono = $_POST['telefono'];
                $correo = $_POST['correo'];
                $edad = $_POST['edad'];

                $sql = "UPDATE encargado SET nombre_completo=?, telefono=?, correo=?, edad=? WHERE id=?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("sssii", $nombre_completo, $telefono, $correo, $edad, $id);

                if ($stmt->execute()) {
                    echo "<div class='alert alert-success'>Encargado actualizado exitosamente</div>";
                } else {
                    echo "<div class='alert alert-danger'>Error: " . $stmt->error . "</div>";
                }

                $stmt->close();
            }

            if (isset($_POST['delete'])) {
                $id = $_POST['id'];

                $sql = "DELETE FROM encargado WHERE id=?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("i", $id);

                if ($stmt->execute()) {
                    echo "<div class='alert alert-success'>Encargado eliminado exitosamente</div>";
                } else {
                    echo "<div class='alert alert-danger'>Error: " . $stmt->error . "</div>";
                }

                $stmt->close();
            }
        }

        $sql = "SELECT id, nombre_completo, telefono, correo, edad FROM encargado";
        $result = $conn->query($sql);

        if ($result === false) {
            echo "<div class='alert alert-danger'>Error en la consulta: " . $conn->error . "</div>";
        } else {
            if ($result->num_rows > 0) {
                echo "<table class='table'>";
                echo "<thead><tr><th>ID</th><th>Nombre Completo</th><th>Teléfono</th><th>Correo</th><th>Edad</th><th>Acciones</th></tr></thead><tbody>";
                while($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>{$row['id']}</td>
                            <td>{$row['nombre_completo']}</td>
                            <td>{$row['telefono']}</td>
                            <td>{$row['correo']}</td>
                            <td>{$row['edad']}</td>
                            <td>
                                <form method='POST' style='display:inline-block;'>
                                    <input type='hidden' name='id' value='{$row['id']}'>
                                    <button type='submit' name='delete' class='btn btn-delete'>Eliminar</button>
                                </form>
                                <button class='btn btn-update' onclick='fillUpdateForm({$row['id']}, \"{$row['nombre_completo']}\", \"{$row['telefono']}\", \"{$row['correo']}\", {$row['edad']})'>Actualizar</button>
                            </td>
                        </tr>";
                }
                echo "</tbody></table>";
            } else {
                echo "<div class='alert alert-info'>No se encontraron encargados.</div>";
            }
        }

        $conn->close();
        ?>

        <div class="update-form" id="update-form">
            <h2>Actualizar Encargado</h2>
            <form method="POST">
                <input type="hidden" id="update-id" name="id">
                <div class="form-group">
                    <label for="update-nombre_completo">Nombre Completo:</label>
                    <input type="text" class="form-control" id="update-nombre_completo" name="nombre_completo" required>
                </div>
                <div class="form-group">
                    <label for="update-telefono">Teléfono:</label>
                    <input type="text" class="form-control" id="update-telefono" name="telefono" required>
                </div>
                <div class="form-group">
                    <label for="update-correo">Correo:</label>
                    <input type="email" class="form-control" id="update-correo" name="correo" required>
                </div>
                <div class="form-group">
                    <label for="update-edad">Edad:</label>
                    <input type="number" class="form-control" id="update-edad" name="edad" required>
                </div>
                <button type="submit" class="btn btn-primary" name="update">Actualizar</button>
            </form>
        </div>

        <div class="container">
        <div class="form-container">
            <h2>Agregar Encargado</h2>
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
                <button type="submit" class="btn btn-primary" name="add">Agregar</button>
            </form>
        </div>
    </div>

    <script>
        function fillUpdateForm(id, nombre_completo, telefono, correo, edad) {
            document.getElementById('update-form').style.display = 'block';
            document.getElementById('update-id').value = id;
            document.getElementById('update-nombre_completo').value = nombre_completo;
            document.getElementById('update-telefono').value = telefono;
            document.getElementById('update-correo').value = correo;
            document.getElementById('update-edad').value = edad;
        }
    </script>
</body>
</html>
