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
            <li class="active"><a href="#">Servicios</a></li>
            <li><a href="/HOPE/vistas/registro.php">Registro</a></li>
            <li><a href="/HOPE/vistas/donacion_a.php">Donación</a></li>
            <li><a href="/HOPE/vistas/calendario_a.php">Calendario</a></li>
            <li><a href="/HOPE/vistas/inventario_a.php">Inventario</a></li>
            <li><a href="/HOPE/vistas/homeless.php">Homeless</a></li>
            <li><a href="/HOPE/vistas/personal.php">Personal</a></li>
          </ul>
        <ul class="nav navbar-nav navbar-right">
          <li><a href="/HOPE/vistas/usuario_admin.php"><span class="glyphicon glyphicon-user"></span>Usuario</a></li>
          <li><a href="/HOPE/includes/logout.php"><span class="glyphicon glyphicon-log-in"></span> Cerrar sesión</a></li>
        </ul>
      </div>
    </nav> 
    <?php
    $conn = new mysqli('localhost', 'root', '', 'albergue');
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add'])) {
        $nombre = $_POST['nombre'] ?? '';

        $sql = "INSERT INTO recursos (nombre) VALUES ('$nombre')";

        if ($conn->query($sql) === TRUE) {
            echo "<div class='alert alert-success' role='alert'>Nuevo recurso agregado exitosamente</div>";
        } else {
            echo "<div class='alert alert-danger' role='alert'>Error: " . $conn->error . "</div>";
        }
    }

    $sql = "SELECT * FROM recursos";
    $result = $conn->query($sql);
    ?>
    
    <div class="container mt-5">
        <h2>Agregar Recurso</h2>
        <form method="post" action="">
            <div class="form-group">
                <label for="nombre">Nombre del Recurso</label>
                <input type="text" class="form-control" id="nombre" name="nombre" required>
            </div>
            <button type="submit" class="btn btn-primary" name="add">Agregar</button>
        </form>

        <h2 class="mt-5">Nuestros Recursos</h2>
        <table class="recursos-table">
            <thead>
                <tr>
                    <th>N°</th>
                    <th>Recurso</th>
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
                            </tr>";
                    }
                } else {
                    echo "<tr><td colspan='2'>No hay recursos disponibles</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <?php
    require_once($_SERVER['DOCUMENT_ROOT'] . '/HOPE/includes/DB.php');

    $db = new DB();
    $pdo = $db->connect();

    $sql = "SELECT satisfaccion, COUNT(*) as count FROM encuesta GROUP BY satisfaccion";
    $stmt = $pdo->query($sql);
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $satisfaccion = [];
    $count = [];

    foreach ($data as $row) {
        $satisfaccion[] = $row['satisfaccion'];
        $count[] = $row['count'];
    }
    ?>

    <div class="container mt-5">
        <h2>Gráfico de Encuestas</h2>
        <canvas id="surveyChart"></canvas>
    </div>

    <script>
  document.addEventListener('DOMContentLoaded', function() {
      var ctx = document.getElementById('surveyChart').getContext('2d');
      var surveyChart = new Chart(ctx, {
          type: 'bar',
          data: {
              labels: <?php echo json_encode($satisfaccion); ?>,
              datasets: [{
                  label: 'Número de respuestas',
                  data: <?php echo json_encode($count); ?>,
                  backgroundColor: 'rgba(0, 51, 204, 0.2)', // Azul rey con opacidad
                  borderColor: 'rgba(0, 51, 204, 1)',      // Azul rey sólido
                  borderWidth: 1
              }]
          },
          options: {
              scales: {
                  y: {
                      beginAtZero: true
                  }
              }
          }
      });
  });
</script>

    
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
