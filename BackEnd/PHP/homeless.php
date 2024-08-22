<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Personas Sin Hogar</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="/HOPE/CSS/styles.css">
    <link rel="icon" href="/HOPE/Assets/logo-removebg-preview.png" type="image/x-icon">
    <style>
        .form-container {
            background-color: #f8f9fa;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 800px;
            margin: auto;
        }
        .form-container h2 {
            margin-bottom: 20px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .btn-primary {
            background-color: #0033cc;
            border-color: #0033cc;
        }
        .btn-primary:hover {
            background-color: #002299;
            border-color: #002299;
        }
        table {
            width: 100%;
            margin-bottom: 20px;
            background-color: #fff;
        }
        table th, table td {
            text-align: center;
            padding: 12px;
            border: 1px solid #ddd;
        }
        table th {
            background-color: #0033cc;
            color: #fff;
        }
        table tbody tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        table tbody tr:hover {
            background-color: #f1f1f1;
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
                <li class="active"><a href="#">Homeless</a></li>
                <li><a href="/HOPE/vistas/personal.php">Personal</a></li>
                
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="/HOPE/vistas/usuario_admin.php"><span class="glyphicon glyphicon-user"></span> Perfil</a></li>
                <li><a href="/HOPE/includes/logout.php"><span class="glyphicon glyphicon-log-in"></span> Cerrar sesión</a></li>
            </ul>
        </div>
    </nav>
    <div class="container mt-5">
        <?php
        $conn = new mysqli('localhost', 'root', '', 'albergue');

        if ($conn->connect_error) {
            die("Conexión fallida: " . $conn->connect_error);
        }

        if (isset($_GET['delete'])) {
            $id = intval($_GET['delete']);
            $delete_sql = "DELETE FROM persona_sin_hogar WHERE persona_id = ?";
            $stmt = $conn->prepare($delete_sql);
            $stmt->bind_param('i', $id);
            if ($stmt->execute()) {
                echo "<div class='alert alert-success' role='alert'>Registro eliminado exitosamente</div>";
            } else {
                echo "<div class='alert alert-danger' role='alert'>Error: " . $conn->error . "</div>";
            }
            $stmt->close();
        }

        echo "<h2>Lista de Personas Sin Hogar</h2>";
        echo "<table class='table table-bordered'>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Apellidos</th>
                        <th>CURP</th>
                        <th>Enfermedades</th>
                        <th>Tipo de Enfermedad</th>
                        <th>Familiares</th>
                        <th>Descripción</th>
                        <th>Fecha de Registro</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>";

        $sql = "SELECT * FROM persona_sin_hogar";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['persona_id']}</td>
                        <td>{$row['nombre']}</td>
                        <td>{$row['apellidos']}</td>
                        <td>{$row['curp']}</td>
                        <td>{$row['enfermedades']}</td>
                        <td>{$row['tipo_enfermedad']}</td>
                        <td>{$row['familiares']}</td>
                        <td>{$row['descripcion']}</td>
                        <td>{$row['fecha_ingreso']}</td>
                        <td>
                            <a href='?edit={$row['persona_id']}' class='btn btn-primary btn-sm'>Editar</a>
                            <a href='?delete={$row['persona_id']}' class='btn btn-danger btn-sm' onclick=\"return confirm('¿Estás seguro de que deseas eliminar este registro?');\">Eliminar</a>
                        </td>
                    </tr>";
            }
        } else {
            echo "<tr><td colspan='10'>No hay registros disponibles.</td></tr>";
        }
        echo "</tbody></table>";

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST['create'])) {
                $nombre = $_POST['nombre'] ?? '';
                $apellidos = $_POST['apellidos'] ?? '';
                $curp = $_POST['curp'] ?? '';
                $enfermedades = $_POST['enfermedades'] ?? [];
                $tipo_enfermedades = $_POST['tipo_enfermedad'] ?? '';
                $familiares = $_POST['familiares'] ?? '';
                $descripcion = $_POST['descripcion'] ?? '';
                $fecha_registro = $_POST['fecha_ingreso'] ?? '';

                $enfermedades_str = implode(',', $enfermedades);

                $sql = "INSERT INTO persona_sin_hogar (nombre, apellidos, curp, enfermedades, tipo_enfermedad, familiares, descripcion, fecha_ingreso)
                        VALUES ('$nombre', '$apellidos', '$curp', '$enfermedades_str', '$tipo_enfermedades', '$familiares', '$descripcion', '$fecha_registro')";

                if ($conn->query($sql) === TRUE) {
                    echo "<div class='alert alert-success' role='alert'>Nuevo registro creado exitosamente</div>";
                } else {
                    echo "<div class='alert alert-danger' role='alert'>Error: " . $conn->error . "</div>";
                }
            }

            if (isset($_POST['update'])) {
                $id = $_POST['id'] ?? '';
                $nombre = $_POST['nombre'] ?? '';
                $apellidos = $_POST['apellidos'] ?? '';
                $curp = $_POST['curp'] ?? '';
                $enfermedades = $_POST['enfermedades'] ?? [];
                $tipo_enfermedades = $_POST['tipo_enfermedad'] ?? '';
                $familiares = $_POST['familiares'] ?? '';
                $descripcion = $_POST['descripcion'] ?? '';
                $fecha_registro = $_POST['fecha_ingreso'] ?? '';
                $enfermedades_str = implode(',', $enfermedades);

                $sql = "UPDATE persona_sin_hogar SET nombre = ?, apellidos = ?, curp = ?, enfermedades = ?, tipo_enfermedad = ?, familiares = ?, descripcion = ?, fecha_registro = ? WHERE persona_id = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param('ssssssssi', $nombre, $apellidos, $curp, $enfermedades_str, $tipo_enfermedades, $familiares, $descripcion, $fecha_registro, $id);
                if ($stmt->execute()) {
                    echo "<div class='alert alert-success' role='alert'>Registro actualizado exitosamente</div>";
                } else {
                    echo "<div class='alert alert-danger' role='alert'>Error: " . $conn->error . "</div>";
                }
                $stmt->close();
            }
        }

        $conn->close();
        ?>
        <div class="form-container">
            <h2>Agregar Nuevo Registro</h2>
            <form method="POST" action="">
                <div class="form-group">
                    <label for="nombre">Nombre:</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" required>
                </div>
                <div class="form-group">
                    <label for="apellidos">Apellidos:</label>
                    <input type="text" class="form-control" id="apellidos" name="apellidos" required>
                </div>
                <div class="form-group">
                    <label for="curp">CURP:</label>
                    <input type="text" class="form-control" id="curp" name="curp" required>
                </div>
                <div class="form-group">
                    <label for="enfermedades">Enfermedades:</label><br>
                    <label><input type="checkbox" name="enfermedades[]" value="Diabetes"> Diabetes</label><br>
                    <label><input type="checkbox" name="enfermedades[]" value="Hipertensión"> Hipertensión</label><br>
                    <label><input type="checkbox" name="enfermedades[]" value="Enfermedad Cardíaca"> Enfermedad Cardíaca</label><br>
                    <label><input type="checkbox" name="enfermedades[]" value="Otras"> Otras</label>
                </div>
                <div class="form-group">
                    <label for="tipo_enfermedad">Tipo de Enfermedad:</label>
                    <select class="form-control" id="tipo_enfermedad" name="tipo_enfermedad">
                        <option value="">Seleccione una opción</option>
                        <option value="Diabetes">Diabetes</option>
                        <option value="Hipertensión">Hipertensión</option>
                        <option value="Enfermedad Cardíaca">Enfermedad Cardíaca</option>
                        <option value="Otras">Otras</option>
                    </select>
                </div>
                <div class="form-group" id="tipo_enfermedad_otras_container" style="display: none;">
                    <label for="tipo_enfermedad_otras">Especificar Enfermedad:</label>
                    <input type="text" class="form-control" id="tipo_enfermedad_otras" name="tipo_enfermedad_otras">
                </div>
                <div class="form-group">
                    <label for="familiares">Familiares:</label>
                    <input type="text" class="form-control" id="familiares" name="familiares">
                </div>
                <div class="form-group">
                    <label for="descripcion">Descripción:</label>
                    <textarea class="form-control" id="descripcion" name="descripcion"></textarea>
                </div>
                <div class="form-group">
                    <label for="fecha_registro">Fecha de Registro:</label>
                    <input type="date" class="form-control" id="fecha_registro" name="fecha_registro">
                </div>
                <button type="submit" name="create" class="btn btn-primary">Agregar Registro</button>
            </form>
        </div>
    </div>
    <script>
        document.getElementById('tipo_enfermedad').addEventListener('change', function () {
            var tipoEnfermedad = this.value;
            var container = document.getElementById('tipo_enfermedad_otras_container');
            if (tipoEnfermedad === 'Otras') {
                container.style.display = 'block';
            } else {
                container.style.display = 'none';
            }
        });
    </script>
</body>
</html>
