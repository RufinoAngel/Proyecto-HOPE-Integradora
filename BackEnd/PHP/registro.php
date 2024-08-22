<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro_Personal</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="/HOPE/CSS/styles.css">
    <link rel="icon" href="/HOPE/Assets/logo-removebg-preview.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        .table-custom {
            background-color: black;
            color: white;
        }
        .table-custom th, .table-custom td {
            border-color: white;
        }
        .table-custom th {
            background-color: #333;
        }
        .table-custom tbody tr:nth-child(even) {
            background-color: #444;
        }
        .table-custom tbody tr:nth-child(odd) {
            background-color: #555;
        }
        .btn-edit {
            background-color: #69d2cd;
            color: white;
            border: none;
            align-items: center;
        }
        .btn-edit:hover {
            background-color: #5bbab5;
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
                <li class="active"><a href="#">Registro</a></li>
                <li><a href="/HOPE/vistas/donacion_a.php">Donación</a></li>
                <li><a href="/HOPE/vistas/calendario_a.php">Calendario</a></li>
                <li><a href="/HOPE/vistas/eventos.php">Eventos</a></li>
                <li><a href="/HOPE/vistas/inventario_a.php">Inventario</a></li>
                <li><a href="/HOPE/vistas/homeless.php">Homeless</a></li>
                <li><a href="/HOPE/vistas/personal.php">Personal</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#"><span class="glyphicon glyphicon-user"></span>Perfil</a></li>
                <li><a href="/HOPE/includes/logout.php"><span class="glyphicon glyphicon-log-in"></span> Cerrar sesión</a></li>
            </ul>
        </div>
    </nav>

    <div class="container">
        <h2>Lista de Personas con Habilidades</h2>
        <table class="table table-bordered table-custom">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre Completo</th>
                    <th>Edad</th>
                    <th>Número Identificador</th>
                    <th>Habilidades</th>
                    <th>Disponibilidad</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $servername = "localhost";
                $username = "root"; 
                $password = "";     
                $dbname = "albergue";

                $conn = new mysqli($servername, $username, $password, $dbname);

                if ($conn->connect_error) {
                    die("Conexión fallida: " . $conn->connect_error);
                }

                $sql = "SELECT * FROM habilidades";
                $result = $conn->query($sql);

                while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['id']); ?></td>
                        <td><?php echo htmlspecialchars($row['nombre_completo']); ?></td>
                        <td><?php echo htmlspecialchars($row['edad']); ?></td>
                        <td><?php echo htmlspecialchars($row['num_identificador']); ?></td>
                        <td><?php echo htmlspecialchars($row['habilidades']); ?></td>
                        <td><?php echo htmlspecialchars($row['disponibilidad']); ?></td>
                        <td>
                            <a href="editar.php?id=<?php echo $row['id']; ?>" class="btn btn-edit btn-sm">Editar</a>
                            <a href="eliminar.php?id=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de que deseas eliminar este registro?');">Eliminar</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>

    <div class="form-container">
        <h1>Formulario de Habilidades</h1>
        <form method="POST">
            <label for="nombre">Nombre Completo:</label>
            <input type="text" id="nombre" name="nombre" required>

            <label for="edad">Edad:</label>
            <input type="number" id="edad" name="edad" required>

            <label for="num_identificador">Número Identificador:</label>
            <input type="number" id="num_identificador" name="num_identificador">

            <label for="habilidades">Habilidades:</label>
            <textarea id="habilidades" name="habilidades" rows="5" required></textarea>

            <label for="disponibilidad">Disponibilidad:</label>
            <select id="disponibilidad" name="disponibilidad" required>
                <option value="tiempo completo">Tiempo Completo</option>
                <option value="medio tiempo">Medio Tiempo</option>
                <option value="por horas">Por Horas</option>
            </select>

            <button type="submit">Enviar</button>
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
</body>
</html>
