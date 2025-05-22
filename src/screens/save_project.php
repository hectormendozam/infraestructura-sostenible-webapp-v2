<?php
// Habilitar la detección de errores
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

include 'config.php'; // Archivo con la conexión a la base de datos

// Verificar si el usuario está autenticado
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validar que se hayan enviado los campos requeridos
    // Obtener los valores del formulario
$id = $_POST['proyecto_id'] ?? '';
$nombre = trim($_POST['name'] ?? '');
$descripcion = trim($_POST['description'] ?? '');
$usuario_id = $_SESSION['user_id'];

// Validación del nombre
if ($nombre === '') {
    $_SESSION['form_error'] = '⚠️ El nombre del proyecto no puede estar vacío.';
    $_SESSION['form_data'] = [
        'nombre' => '',
        'descripcion' => $descripcion,
        'proyecto_id' => $id
    ];
    header("Location: edit_projects.php");
    exit();
}

    // Actualizar el proyecto en la base de datos
    $sql = "UPDATE proyectos 
            SET nombre = ?, descripcion = ?
            WHERE id = ? AND usuario_id = ?";
    $stmt = $conn->prepare($sql);
    if (!$stmt) {
        die("Error en la preparación de la consulta: " . $conn->error);
    }

    // Vincular parámetros y ejecutar la consulta
    $stmt->bind_param("ssii", $nombre, $descripcion, $id, $usuario_id);
    if ($stmt->execute()) {
        // Redirigir o mostrar mensaje de éxito si la actualización fue exitosa
        echo "<script>
                alert('Los cambios se guardaron correctamente.');
                window.location.href = 'index.php';
                </script>";
        exit();
    } else {
        // Manejar errores en la ejecución
        echo "Error al guardar los cambios: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Método no permitido.";
    exit();
}
