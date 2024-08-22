<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Servicios</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="/HOPE/CSS/styles2.css" />
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="icon" href="/HOPE/Assets/logo-removebg-preview.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style>
        .recursos-table {
            width: 100%;
            margin: 20px auto;
            border-collapse: collapse;
        }

        .recursos-table th, .recursos-table td {
            padding: 12px;
            text-align: center;
            border: 1px solid #ddd;
        }

        .recursos-table th {
            background-color: #69d2cd;
            color: white;
            text-transform: uppercase;
        }

        .recursos-table td {
            background-color: #f2f2f2;
        }

        .recursos-table .btn {
            display: block;
            width: 100px;
            margin: 5px auto;
        }

        .container {
            background-color: #f9f9f9;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        }

        .container h2 {
            margin-bottom: 20px;
            color: #69d2cd;
        }

        .form-group label {
            font-weight: bold;
        }

        .form-group input, .form-group textarea {
            border-radius: 5px;
        }

        .form-group button {
            background-color: #69d2cd;
            color: white;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            cursor: pointer;
        }

        .form-group button:hover {
            background-color: #58b2a3;
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
            <li class="active"><a href="#">Servicios</a></li>
            <li><a href="/HOPE/vistas/registro.php">Registro</a></li>
            <li><a href="/HOPE/vistas/donacion_a.php">Donación</a></li>
            <li><a href="/HOPE/vistas/calendario_a.php">Calendario</a></li>
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

    <?php
    $conn = new mysqli('localhost', 'root', '', 'albergue');
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add'])) {
        $nombre = $_POST['nombre'] ?? '';
        $descripcion = $_POST['descripcion'] ?? '';

        $sql = "INSERT INTO recursos (nombre, descripcion) VALUES ('$nombre', '$descripcion')";

        if ($conn->query($sql) === TRUE) {
            echo "<div class='alert alert-success' role='alert'>Nuevo recurso agregado exitosamente</div>";
        } else {
            echo "<div class='alert alert-danger' role='alert'>Error: " . $conn->error . "</div>";
        }
    }

    if (isset($_GET['delete'])) {
        $id = $_GET['delete'];
        $sql = "DELETE FROM recursos WHERE id=$id";
        if ($conn->query($sql) === TRUE) {
            echo "<div class='alert alert-success' role='alert'>Recurso eliminado exitosamente</div>";
        } else {
            echo "<div class='alert alert-danger' role='alert'>Error: " . $conn->error . "</div>";
        }
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['edit'])) {
        $id = $_POST['id'] ?? '';
        $nombre = $_POST['nombre'] ?? '';
        $descripcion = $_POST['descripcion'] ?? '';

        $sql = "UPDATE recursos SET nombre='$nombre', descripcion='$descripcion' WHERE id=$id";
        if ($conn->query($sql) === TRUE) {
            echo "<div class='alert alert-success' role='alert'>Recurso actualizado exitosamente</div>";
        } else {
            echo "<div class='alert alert-danger' role='alert'>Error: " . $conn->error . "</div>";
        }
    }
    ?>

    <div class="container mt-5">
        <h2>Nuestros Recursos</h2>
        <table class="recursos-table">
            <thead>
                <tr>
                    <th>N°</th>
                    <th>Recurso</th>
                    <th>Descripción</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM recursos";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>{$row['id']}</td>
                                <td>{$row['nombre']}</td>
                                <td>{$row['descripcion']}</td>
                                <td>
                                    <a href='?edit={$row['id']}' class='btn btn-info'>Editar</a>
                                    <a href='?delete={$row['id']}' class='btn btn-primary'>Eliminar</a>
                                </td>
                            </tr>";
                    }
                } else {
                    echo "<tr><td colspan='4'>No hay recursos disponibles</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <?php
    if (isset($_GET['edit'])) {
        $id = $_GET['edit'];
        $sql = "SELECT * FROM recursos WHERE id=$id";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
    ?>
        <div class="container mt-5">
            <h2>Editar Recurso</h2>
            <form method="post" action="">
                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                <div class="form-group">
                    <label for="nombre">Nombre del Recurso</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $row['nombre']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="descripcion">Descripción del Recurso</label>
                    <textarea class="form-control" id="descripcion" name="descripcion" rows="3" required><?php echo $row['descripcion']; ?></textarea>
                </div>
                <button type="submit" class="btn btn-primary" name="edit">Actualizar</button>
            </form>
        </div>
    <?php
    }
    ?>

<div class="container mt-5">
        <h2>Agregar Recurso</h2>
        <form method="post" action="">
            <div class="form-group">
                <label for="nombre">Nombre del Recurso</label>
                <input type="text" class="form-control" id="nombre" name="nombre" required>
            </div>
            <div class="form-group">
                <label for="descripcion">Descripción del Recurso</label>
                <textarea class="form-control" id="descripcion" name="descripcion" rows="3" required></textarea>
            </div>
            <button type="submit" class="btn">Agregar</button>
        </form>
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
