<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Administración</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="/HOPE/CSS/styles.css">
    <link rel="icon" href="/HOPE/Assets/logo-removebg-preview.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        .dashboard-section {
            margin: 20px;
        }
        .dashboard-card {
            background-color: #f8f9fa;
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 15px;
            margin-bottom: 20px;
        }
        .dashboard-card h3 {
            margin-top: 0;
        }
        .dashboard-card .btn {
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
                <a class="navbar-brand" href="#">Hogar Esperanza-admin</a>
            </div>
            <ul class="nav navbar-nav">
                <li class="active"><a href="#">Home</a></li>
                <li><a href="/HOPE/vistas/nosotros_a.php">Usuarios</a></li>
                <li><a href="/HOPE/vistas/servicios_a.php">Servicios</a></li>
                <li><a href="/HOPE/vistas/registro_a.php">Registro</a></li>
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

    <div class="container">
        <div class="dashboard-section">
            <div class="dashboard-card">
                <h3>Estadísticas Rápidas</h3>
                <p><strong>Últimas Donaciones:</strong> Ver las últimas donaciones realizadas.</p>
                <p><strong>Eventos Próximos:</strong> Ver los eventos programados.</p>
                <p><strong>Recursos Disponibles:</strong> Ver el inventario actual del albergue.</p>
                <a href="/HOPE/vistas/donacion_a.php" class="btn btn-primary">Ver Donaciones</a>
                <a href="/HOPE/vistas/calendario_a.php" class="btn btn-primary">Ver Calendario</a>
                <a href="/HOPE/vistas/inventario_a.php" class="btn btn-primary">Ver Inventario</a>
            </div>
            <div class="dashboard-card">
                <h3>Gestión de Eventos</h3>
                <p>Ver y gestionar los eventos próximos.</p>
                <a href="/HOPE/vistas/calendario_a.php" class="btn btn-primary">Ver Calendario</a>
            </div>

            <div class="dashboard-card">
                <h3>Gestión de Recursos</h3>
                <p>Ver y actualizar el inventario del albergue.</p>
                <a href="/HOPE/vistas/inventario_a.php" class="btn btn-primary">Ver Inventario</a>
            </div>

            <div class="dashboard-card">
                <h3>Gestión de Personal</h3>
                <p>Ver y gestionar la información del personal.</p>
                <a href="/HOPE/vistas/personal.php" class="btn btn-primary">Ver Personal</a>
            </div>
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
</body>
</html>
