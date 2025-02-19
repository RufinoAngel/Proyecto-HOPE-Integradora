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
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            margin-top: 20px;
        }
        .table {
            background-color: #ffffff;
            color: #333;
        }
        .table thead {
            background-color: #007bff;
            color: #fff;
        }
        .alert {
            margin-top: 20px;
        }
        .form-container {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }
        .form-container h2 {
            margin-bottom: 20px;
        }
        .btn-custom-primary {
            background-color: #007bff;
            border-color: #007bff;
        }
        .btn-custom-primary:hover {
            background-color: #0056b3;
            border-color: #004085;
        }
        .btn-custom-secondary {
            background-color: #6c757d;
            border-color: #6c757d;
        }
        .btn-custom-secondary:hover {
            background-color: #5a6268;
            border-color: #545b62;
        }
        .button-container {
            display: flex;
            justify-content: space-between;
        }
        .button-container .btn {
            margin-right: 0;
        }
        .button-container .btn:last-child {
            margin-left: 10px;
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
            <li class="active"><a href="#">Inventario</a></li>
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
        <h2 class="text-center">Inventario</h2>

        <?php
        
        
        $conn = new mysqli('localhost', 'root', '', 'albergue');

        if ($conn->connect_error) {
            die("Conexión fallida: " . $conn->connect_error);
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add'])) {
            $nombre = $_POST['nombre'] ?? '';
            $descripcion = $_POST['descripcion'] ?? '';
            $cantidad = $_POST['cantidad'] ?? 0;
            $fecha_adquisicion = $_POST['fecha_adquisicion'] ?? '';
            $ubicacion = $_POST['ubicacion'] ?? '';

            $sql = "INSERT INTO inventario (nombre, descripcion, cantidad, fecha_adquisicion, ubicacion)
                    VALUES ('$nombre', '$descripcion', $cantidad, '$fecha_adquisicion', '$ubicacion')";

            if ($conn->query($sql) === TRUE) {
                echo "<div class='alert alert-success' role='alert'>Artículo agregado exitosamente</div>";
            } else {
                echo "<div class='alert alert-danger' role='alert'>Error al agregar artículo: " . $conn->error . "</div>";
            }
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update'])) {
            $id = $_POST['id'] ?? '';
            $nombre = $_POST['nombre'] ?? '';
            $descripcion = $_POST['descripcion'] ?? '';
            $cantidad = $_POST['cantidad'] ?? 0;
            $fecha_adquisicion = $_POST['fecha_adquisicion'] ?? '';
            $ubicacion = $_POST['ubicacion'] ?? '';

            $sql = "UPDATE inventario SET 
                    nombre='$nombre', 
                    descripcion='$descripcion', 
                    cantidad=$cantidad, 
                    fecha_adquisicion='$fecha_adquisicion', 
                    ubicacion='$ubicacion' 
                    WHERE id=$id";

            if ($conn->query($sql) === TRUE) {
                echo "<div class='alert alert-success' role='alert'>Artículo actualizado exitosamente</div>";
            } else {
                echo "<div class='alert alert-danger' role='alert'>Error al actualizar artículo: " . $conn->error . "</div>";
            }
        }

        if (isset($_GET['delete'])) {
            $id = $_GET['delete'];

            $sql = "DELETE FROM inventario WHERE id = $id";

            if ($conn->query($sql) === TRUE) {
                echo "<div class='alert alert-success' role='alert'>Artículo eliminado exitosamente</div>";
            } else {
                echo "<div class='alert alert-danger' role='alert'>Error al eliminar artículo: " . $conn->error . "</div>";
            }
        }

        $edit_row = null;
        if (isset($_GET['edit'])) {
            $id = $_GET['edit'];

            $sql = "SELECT * FROM inventario WHERE id = $id";
            $result = $conn->query($sql);
            if ($result) {
                $edit_row = $result->fetch_assoc();
            } else {
                echo "<div class='alert alert-danger' role='alert'>Error al obtener datos para editar: " . $conn->error . "</div>";
            }
        }
        ?>

        <h2 class="text-center">Lista de Artículos</h2>
        <table class="table table-dark table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Cantidad</th>
                    <th>Fecha de Adquisición</th>
                    <th>Ubicación</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM inventario";
                $result = $conn->query($sql);

                if ($result) {
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>
                                    <td>{$row['id']}</td>
                                    <td>{$row['nombre']}</td>
                                    <td>{$row['descripcion']}</td>
                                    <td>{$row['cantidad']}</td>
                                    <td>{$row['fecha_adquisicion']}</td>
                                    <td>{$row['ubicacion']}</td>
                                    <td>
                                        <a href='?edit={$row['id']}' class='btn btn-warning btn-sm'>Editar</a>
                                        <a href='?delete={$row['id']}' class='btn btn-danger btn-sm'>Eliminar</a>
                                    </td>
                                </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='7'>No hay artículos en el inventario</td></tr>";
                    }
                } else {
                    echo "<tr><td colspan='7'>Error al obtener artículos: " . $conn->error . "</td></tr>";
                }

                $conn->close();
                ?>
            </tbody>
        </table>

        <div class="form-container">
            <h2><?php echo $edit_row ? 'Editar' : 'Agregar'; ?> Artículo</h2>

            <form method="post" action="">
                <?php if ($edit_row): ?>
                    <input type="hidden" name="id" value="<?php echo htmlspecialchars($edit_row['id']); ?>">
                    <input type="hidden" name="update" value="1">
                <?php else: ?>
                    <input type="hidden" name="add" value="1">
                <?php endif; ?>
                
                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo htmlspecialchars($edit_row['nombre'] ?? ''); ?>" required>
                </div>
                <div class="form-group">
                    <label for="descripcion">Descripción</label>
                    <textarea class="form-control" id="descripcion" name="descripcion"><?php echo htmlspecialchars($edit_row['descripcion'] ?? ''); ?></textarea>
                </div>
                <div class="form-group">
                    <label for="cantidad">Cantidad</label>
                    <input type="number" class="form-control" id="cantidad" name="cantidad" value="<?php echo htmlspecialchars($edit_row['cantidad'] ?? ''); ?>" required>
                </div>
                <div class="form-group">
                    <label for="fecha_adquisicion">Fecha de Adquisición</label>
                    <input type="date" class="form-control" id="fecha_adquisicion" name="fecha_adquisicion" value="<?php echo htmlspecialchars($edit_row['fecha_adquisicion'] ?? ''); ?>">
                </div>
                <div class="form-group">
                    <label for="ubicacion">Ubicación</label>
                    <input type="text" class="form-control" id="ubicacion" name="ubicacion" value="<?php echo htmlspecialchars($edit_row['ubicacion'] ?? ''); ?>">
                </div>
                <button type="submit" class="btn btn-primary"><?php echo $edit_row ? 'Actualizar' : 'Guardar'; ?></button>
                <a href="/HOPE/vistas/inventario.php" class="btn btn-secondary">Cancelar</a>
            </form>
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
