<?php
session_start();

// Recibir los objetivos seleccionados
$objetivosSeleccionados = isset($_POST['objetivos']) ? $_POST['objetivos'] : [];

$mostrarAdvertencia = false;

// Verificar si no hay objetivos seleccionados
if (empty($objetivosSeleccionados)) {
    $mostrarAdvertencia = true;
} else {
    // Guardar los objetivos en la sesión
    $_SESSION['objetivos'] = $objetivosSeleccionados;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmar Acción</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" href="../img/planeta.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Serif+JP:wght@200..900&family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">
    <style>
        * {
            font-family: "Noto Serif JP", serif;
            font-optical-sizing: auto;
            font-weight: 200;
            font-style: normal;
        }
    </style>
</head>
<body>
    <div class="container my-5 text-center">

        <?php if ($mostrarAdvertencia): ?>
            <div class="alert alert-warning shadow-sm p-4 rounded text-center mx-auto" style="max-width: 600px;">
                <h4 class="fw-bold text-warning mb-3">⚠️ Atención</h4>
                <p class="fw-bold mb-0">Debes seleccionar <strong>al menos un objetivo</strong> antes de continuar.</p>
            </div>
            <a href="objectives.php" class="btn btn-warning btn-lg mt-4 shadow-sm">Volver a seleccionar objetivos</a>
        <?php else: ?>
            <h3>¿Qué deseas hacer?</h3>
            <p class="my-3">Puedes generar un nuevo reporte en base a los objetivos seleccionados o regresar a la página de objetivos.</p>
            <div class="d-flex justify-content-center gap-3">
                <!-- Botón para generar un nuevo reporte -->
                <form action="ingresar_reporte.php" method="post">
                    <button type="submit" class="btn btn-primary btn-lg">Generar Reporte</button>
                </form>
                <!-- Botón para volver a la página de objetivos -->
                <a href="objectives.php" class="btn btn-secondary btn-lg">Volver a Objetivos</a>
            </div>
        <?php endif; ?>

    </div>
</body>
</html>
