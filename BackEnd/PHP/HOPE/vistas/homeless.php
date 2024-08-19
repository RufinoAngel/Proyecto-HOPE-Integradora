
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
            <li><a href="/HOPE/vistas/user_admin.php">Home</a></li>
            <li><a href="/HOPE/vistas/nosotros_a.php">Nosotros</a></li>
            <li><a href="/HOPE/vistas/servicios_a.php">Servicios</a></li>
            <li><a href="/HOPE/vistas/registro.php">Registro</a></li>
            <li><a href="/HOPE/vistas/donacion_a.php">Donación</a></li>
            <li><a href="/HOPE/vistas/calendario_a.php">Calendario</a></li>
            <li><a href="/HOPE/vistas/inventario_a.php">Inventario</a></li>
            <li class="active"><a href="#">Homeless</a></li>
            <li><a href="/HOPE/vistas/personal.php">Personal</a></li>
          </ul>
        <ul class="nav navbar-nav navbar-right">
          <li><a href="/HOPE/vistas/usuario_admin.php"><span class="glyphicon glyphicon-user"></span>Usuario</a></li>
          <li><a href="/HOPE/includes/logout.php"><span class="glyphicon glyphicon-log-in"></span> Cerrar sesión</a></li>
        </ul>
      </div>
    </nav> 
    <div class="tit">
        <h2 id="Sobre">Homeless</h2>
    </div>
    <br><br>
    <?php
// Conectar con la base de datos
$conn = new mysqli('localhost', 'root', '', 'albergue');

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Crear un nuevo registro
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['create'])) {
    $nombre = $_POST['nombre'] ?? '';
    $apellidos = $_POST['apellidos'] ?? '';
    $curp = $_POST['curp'] ?? '';
    $enfermedades = $_POST['enfermedades'] ?? '';
    $tipo_enfermedades = $_POST['tipo_enfermedad'] ?? '';
    $familiares = $_POST['familiares'] ?? '';

    $sql = "INSERT INTO persona_sin_hogar (nombre, apellidos, curp, enfermedades, tipo_enfermedad, familiares)
            VALUES ('$nombre', '$apellidos', '$curp', '$enfermedades', '$tipo_enfermedades', '$familiares')";

    if ($conn->query($sql) === TRUE) {
        echo "<div class='alert alert-success' role='alert'>Nuevo registro creado exitosamente</div>";
    } else {
        echo "<div class='alert alert-danger' role='alert'>Error: " . $conn->error . "</div>";
    }
}

// Actualizar un registro
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update'])) {
    $id = $_POST['id'] ?? '';
    $nombre = $_POST['nombre'] ?? '';
    $apellidos = $_POST['apellidos'] ?? '';
    $curp = $_POST['curp'] ?? '';
    $enfermedades = $_POST['enfermedades'] ?? '';
    $tipo_enfermedades = $_POST['tipo_enfermedad'] ?? '';
    $familiares = $_POST['familiares'] ?? '';

    $sql = "UPDATE persona_sin_hogar SET 
            nombre='$nombre', 
            apellidos='$apellidos', 
            curp='$curp', 
            enfermedades='$enfermedades', 
            tipo_enfermedad='$tipo_enfermedades', 
            familiares='$familiares' 
            WHERE persona_id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "<div class='alert alert-success' role='alert'>Registro actualizado exitosamente</div>";
    } else {
        echo "<div class='alert alert-danger' role='alert'>Error: " . $conn->error . "</div>";
    }
}

// Eliminar un registro
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];

    $sql = "DELETE FROM persona_sin_hogar WHERE persona_id = $id";

    if ($conn->query($sql) === TRUE) {
        echo "<div class='alert alert-success' role='alert'>Registro eliminado exitosamente</div>";
    } else {
        echo "<div class='alert alert-danger' role='alert'>Error: " . $conn->error . "</div>";
    }
}

// Obtener datos para editar
$edit_row = null;
if (isset($_GET['edit'])) {
    $id = $_GET['edit'];

    $sql = "SELECT * FROM persona_sin_hogar WHERE persona_id = $id";
    $result = $conn->query($sql);
    $edit_row = $result->fetch_assoc();
}
?>
    
    <div class="container mt-5">
        <h2><?php echo $edit_row ? 'Editar' : 'Agregar'; ?> Persona Sin Hogar</h2>

        <form method="post" action="">
            <?php if ($edit_row): ?>
                <input type="hidden" name="id" value="<?php echo htmlspecialchars($edit_row['persona_id']); ?>">
                <input type="hidden" name="update" value="1">
            <?php else: ?>
                <input type="hidden" name="create" value="1">
            <?php endif; ?>
            
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo htmlspecialchars($edit_row['nombre'] ?? ''); ?>" required>
            </div>
            <div class="form-group">
                <label for="apellidos">Apellidos</label>
                <input type="text" class="form-control" id="apellidos" name="apellidos" value="<?php echo htmlspecialchars($edit_row['apellidos'] ?? ''); ?>" required>
            </div>
            <div class="form-group">
                <label for="curp">CURP</label>
                <input type="text" class="form-control" id="curp" name="curp" value="<?php echo htmlspecialchars($edit_row['curp'] ?? ''); ?>" required>
            </div>
            <div class="form-group">
                <label for="enfermedades">Enfermedades</label>
                <input type="text" class="form-control" id="enfermedades" name="enfermedades" value="<?php echo htmlspecialchars($edit_row['enfermedades'] ?? ''); ?>">
            </div>
            <div class="form-group">
                <label for="tipo_enfermedades">Tipo de Enfermedades</label>
                <input type="text" class="form-control" id="tipo_enfermedades" name="tipo_enfermedades" value="<?php echo htmlspecialchars($edit_row['tipo_enfermedades'] ?? ''); ?>">
            </div>
            <div class="form-group">
                <label for="familiares">Familiares</label>
                <input type="text" class="form-control" id="familiares" name="familiares" value="<?php echo htmlspecialchars($edit_row['familiares'] ?? ''); ?>">
            </div>
            <button type="submit" class="btn btn-primary"><?php echo $edit_row ? 'Actualizar' : 'Guardar'; ?></button>
            <a href="/HOPE/vistas/user_admin.php" class="btn btn-secondary">Cancelar</a>
        </form>

        <h2 class="mt-5">Lista de Personas Sin Hogar</h2>
        <table class="table table-dark table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>CURP</th>
                    <th>Enfermedades</th>
                    <th>Tipo de Enfermedades</th>
                    <th>Familiares</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM persona_sin_hogar";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>{$row['persona_id']}</td>
                                <td>{$row['nombre']}</td>
                                <td>{$row['apellidos']}</td>
                                <td>{$row['curp']}</td>
                                <td>{$row['enfermedades']}</td>
                                <td>{$row['tipo_enfermedad']}</td>
                                <td>{$row['familiares']}</td>
                                <td>
                                    <a href='/HOPE/vistas/homeless.php?edit={$row['persona_id']}' class='btn btn-warning btn-sm'>Editar</a>
                                    <a href='/HOPE/vistas/homeless.php?delete={$row['persona_id']}' class='btn btn-danger btn-sm'>Eliminar</a>
                                </td>
                            </tr>";
                    }
                } else {
                    echo "<tr><td colspan='8'>No hay registros</td></tr>";
                }

                $conn->close();
                ?>
            </tbody>
        </table>
        
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

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