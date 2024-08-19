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
    if (isset($_POST['add_event'])) {
        $title = $_POST['title'];
        $description = $_POST['description'];
        $date = $_POST['date'];
        $time = $_POST['time'];
        $location = $_POST['location'];

        $sql = "INSERT INTO calendario (title, description, date, time, location) VALUES (?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssss", $title, $description, $date, $time, $location);

        if ($stmt->execute()) {
            echo "Evento agregado exitosamente.";
        } else {
            echo "Error: " . $stmt->error;
        }
    } elseif (isset($_POST['update_event'])) {
        $id = $_POST['id'];
        $title = $_POST['title'];
        $description = $_POST['description'];
        $date = $_POST['date'];
        $time = $_POST['time'];
        $location = $_POST['location'];

        $sql = "UPDATE calendario SET title = ?, description = ?, date = ?, time = ?, location = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssssi", $title, $description, $date, $time, $location, $id);

        if ($stmt->execute()) {
            echo "Evento actualizado exitosamente.";
        } else {
            echo "Error: " . $stmt->error;
        }
    }
}

if (isset($_GET['delete_id'])) {
    $id = $_GET['delete_id'];
    $sql = "DELETE FROM calendario WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "Evento eliminado exitosamente.";
    } else {
        echo "Error: " . $stmt->error;
    }
}

$sql = "SELECT * FROM calendario ORDER BY date, time";
$result = $conn->query($sql);

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
            <li class="active"><a href="">Calendario</a></li>
            <li><a href="/HOPE/vistas/inventario_a.php">Inventario</a></li>
            <li><a href="/HOPE/vistas/contacto.php">Homeless</a></li>
            <li><a href="/HOPE/vistas/personal.php">Personal</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
        <li><a href="/HOPE/vistas/usuario_admin.php"><span class="glyphicon glyphicon-user"></span>Usuario</a></li>
        <li><a href="/HOPE/includes/logout.php"><span class="glyphicon glyphicon-log-in"></span> Cerrar sesión</a></li>
        </ul>
      </div>
    </nav>
    <div class="container">
        <h2>Gestión de Eventos</h2>

        <?php if (isset($_GET['edit_id'])): ?>
            <?php
            $id = $_GET['edit_id'];
            $sql = "SELECT * FROM calendario WHERE id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $event = $stmt->get_result()->fetch_assoc();
            ?>
            <h3>Editar Evento</h3>
            <form method="POST" action="manage_events.php">
                <input type="hidden" name="id" value="<?php echo htmlspecialchars($event['id']); ?>">
                <div class="form-group">
                    <label for="title">Título:</label>
                    <input type="text" id="title" name="title" class="form-control" value="<?php echo htmlspecialchars($event['title']); ?>" required>
                </div>
                <div class="form-group">
                    <label for="description">Descripción:</label>
                    <textarea id="description" name="description" class="form-control" rows="3" required><?php echo htmlspecialchars($event['description']); ?></textarea>
                </div>
                <div class="form-group">
                    <label for="date">Fecha:</label>
                    <input type="date" id="date" name="date" class="form-control" value="<?php echo htmlspecialchars($event['date']); ?>" required>
                </div>
                <div class="form-group">
                    <label for="time">Hora:</label>
                    <input type="time" id="time" name="time" class="form-control" value="<?php echo htmlspecialchars($event['time']); ?>" required>
                </div>
                <div class="form-group">
                    <label for="location">Ubicación:</label>
                    <input type="text" id="location" name="location" class="form-control" value="<?php echo htmlspecialchars($event['location']); ?>">
                </div>
                <button type="submit" name="update_event" class="btn btn-primary">Actualizar Evento</button>
            </form>
        <?php else: ?>
            <h3>Agregar Nuevo Evento</h3>
            <form method="POST" action="manage_events.php">
                <div class="form-group">
                    <label for="title">Título:</label>
                    <input type="text" id="title" name="title" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="description">Descripción:</label>
                    <textarea id="description" name="description" class="form-control" rows="3" required></textarea>
                </div>
                <div class="form-group">
                    <label for="date">Fecha:</label>
                    <input type="date" id="date" name="date" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="time">Hora:</label>
                    <input type="time" id="time" name="time" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="location">Ubicación:</label>
                    <input type="text" id="location" name="location" class="form-control">
                </div>
                <button type="submit" name="add_event" class="btn btn-primary">Agregar Evento</button>
            </form>
        <?php endif; ?>

        <h3>Lista de Eventos</h3>
        <table class="table table-dark table-striped-columns">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Descripción</th>
                    <th>Fecha</th>
                    <th>Hora</th>
                    <th>Ubicación</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['id']); ?></td>
                        <td><?php echo htmlspecialchars($row['title']); ?></td>
                        <td><?php echo htmlspecialchars($row['description']); ?></td>
                        <td><?php echo htmlspecialchars($row['date']); ?></td>
                        <td><?php echo htmlspecialchars($row['time']); ?></td>
                        <td><?php echo htmlspecialchars($row['location']); ?></td>
                        <td>
                            <a href="manage_events.php?edit_id=<?php echo htmlspecialchars($row['id']); ?>" class="btn btn-warning btn-sm">Editar</a>
                            <a href="manage_events.php?delete_id=<?php echo htmlspecialchars($row['id']); ?>" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de que deseas eliminar este evento?')">Eliminar</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
        <footer class="footer">
          <div class="footer-section">
            <h3>Historias</h3>
            <p>Ayuda a las personas refugiadas</p>
            <button>Ver Historias</button>
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
<?php
$conn->close();
?>