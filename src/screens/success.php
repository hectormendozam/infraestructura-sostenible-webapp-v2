<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eco Track - Reporte Registrado</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" href="../img/planeta.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Serif+JP:wght@200..900&family=Open+Sans:wght@300;400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: "Noto Serif JP", serif;
            background-color: #f8f9fa;
        }
        .success-box {
            max-width: 600px;
            margin: 100px auto;
            padding: 40px;
            border-radius: 20px;
            background-color: #ffffff;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
        }
        .success-icon {
            font-size: 60px;
            color: #198754;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="success-box text-center">
            <div class="success-icon mb-3">✅</div>
            <h2 class="fw-bold mb-3">¡Reporte registrado con éxito!</h2>
            <p class="mb-4 text-muted">Tu información ha sido guardada correctamente y está disponible en tu panel.</p>
            <a href="dashboard.php" class="btn btn-success btn-lg shadow-sm">Volver al Dashboard</a>
        </div>
    </div>
</body>
</html>
