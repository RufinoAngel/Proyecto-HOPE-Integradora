<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/HOPE/includes/DB.php');

$db = new DB();
$pdo = $db->connect();

// Verificar que el campo 'donacion' esté presente en el POST
if (isset($_POST['donacion'])) {
    // Obtener datos del formulario
    $tipo_donacion = $_POST['donacion'];
    $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : '';
    $monto = isset($_POST['monto']) ? $_POST['monto'] : '';
    $cuenta = isset($_POST['cuenta']) ? $_POST['cuenta'] : '';
    $cvv = isset($_POST['cvv']) ? $_POST['cvv'] : '';
    $vigencia = isset($_POST['vigencia']) ? $_POST['vigencia'] : '';
    $productos = isset($_POST['productos']) ? $_POST['productos'] : '';
    $albergue = isset($_POST['albergue']) ? $_POST['albergue'] : '';
    $direccion = isset($_POST['direccion']) ? $_POST['direccion'] : '';
    $tipoRopa = isset($_POST['tipoRopa']) ? $_POST['tipoRopa'] : '';

    // Validar datos
    if ($tipo_donacion === 'monetario') {
        // Insertar donación monetaria
        if (!empty($nombre) && !empty($monto) && !empty($cuenta) && !empty($cvv) && !empty($vigencia)) {
            try {
                $stmt = $pdo->prepare("INSERT INTO donaciones (tipo_donacion, nombre, monto, cuenta, cvv, vigencia) VALUES (:tipo_donacion, :nombre, :monto, :cuenta, :cvv, :vigencia)");
                $stmt->bindParam(':tipo_donacion', $tipo_donacion);
                $stmt->bindParam(':nombre', $nombre);
                $stmt->bindParam(':monto', $monto);
                $stmt->bindParam(':cuenta', $cuenta);
                $stmt->bindParam(':cvv', $cvv);
                $stmt->bindParam(':vigencia', $vigencia);

                if ($stmt->execute()) {
                    echo "<p class='success-message'>Donación monetaria guardada correctamente.</p>";
                } else {
                    $errorInfo = $stmt->errorInfo();
                    echo "<p class='error-message'>Error al guardar la donación monetaria: " . $errorInfo[2] . "</p>";
                }
            } catch (PDOException $e) {
                echo "<p class='error-message'>Error: " . $e->getMessage() . "</p>";
            }
        } else {
            echo "<p class='error-message'>Por favor, completa todos los campos requeridos para donación monetaria.</p>";
        }
    } elseif ($tipo_donacion === 'alimentario') {
        // Insertar donación alimentaria
        if (!empty($nombre) && !empty($productos) && !empty($albergue) && !empty($direccion)) {
            try {
                $stmt = $pdo->prepare("INSERT INTO donaciones (tipo_donacion, nombre, productos, albergue, direccion) VALUES (:tipo_donacion, :nombre, :productos, :albergue, :direccion)");
                $stmt->bindParam(':tipo_donacion', $tipo_donacion);
                $stmt->bindParam(':nombre', $nombre);
                $stmt->bindParam(':productos', $productos);
                $stmt->bindParam(':albergue', $albergue);
                $stmt->bindParam(':direccion', $direccion);

                if ($stmt->execute()) {
                    echo "<p class='success-message'>Donación alimentaria guardada correctamente.</p>";
                } else {
                    $errorInfo = $stmt->errorInfo();
                    echo "<p class='error-message'>Error al guardar la donación alimentaria: " . $errorInfo[2] . "</p>";
                }
            } catch (PDOException $e) {
                echo "<p class='error-message'>Error: " . $e->getMessage() . "</p>";
            }
        } else {
            echo "<p class='error-message'>Por favor, completa todos los campos requeridos para donación alimentaria.</p>";
        }
    } elseif ($tipo_donacion === 'ropa') {
        // Insertar donación de ropa
        if (!empty($nombre) && !empty($tipoRopa) && !empty($albergue) && !empty($direccion)) {
            try {
                $stmt = $pdo->prepare("INSERT INTO donaciones (tipo_donacion, nombre, tipoRopa, albergue, direccion) VALUES (:tipo_donacion, :nombre, :tipoRopa, :albergue, :direccion)");
                $stmt->bindParam(':tipo_donacion', $tipo_donacion);
                $stmt->bindParam(':nombre', $nombre);
                $stmt->bindParam(':tipoRopa', $tipoRopa);
                $stmt->bindParam(':albergue', $albergue);
                $stmt->bindParam(':direccion', $direccion);

                if ($stmt->execute()) {
                    echo "<p class='success-message'>Donación de ropa guardada correctamente.</p>";
                } else {
                    $errorInfo = $stmt->errorInfo();
                    echo "<p class='error-message'>Error al guardar la donación de ropa: " . $errorInfo[2] . "</p>";
                }
            } catch (PDOException $e) {
                echo "<p class='error-message'>Error: " . $e->getMessage() . "</p>";
            }
        } else {
            echo "<p class='error-message'>Por favor, completa todos los campos requeridos para donación de ropa.</p>";
        }
    } else {
        echo "<p class='error-message'>Tipo de donación no válido.</p>";
    }
} else {
    echo "<p class='error-message'>No se ha enviado el tipo de donación.</p>";
}
?>
