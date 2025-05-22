<?php
// Iniciar la sesión
session_start();

$alertType = $_SESSION['alert_type'] ?? null;
$alertMessage = $_SESSION['alert_message'] ?? null;

// Limpiar la sesión para que el mensaje solo aparezca una vez
unset($_SESSION['alert_type'], $_SESSION['alert_message']);


// Verificar si el usuario está autenticado
if (!isset($_SESSION['user_id'])) {
    // Si no está autenticado, redirigir al login
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EcoTrack - Inicio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" href="../img/planeta.png" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
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
    <div class="d-flex content">
        <!-- Menú de navegación -->
        <nav class="bg-dark text-white vh-100 p-3" style="width: 250px;">
            <!-- Imagen del logo arriba del título -->
            <div class="text-center mb-3">
                <img src="../img/Ecotrack.png" alt="EcoTrack Logo" style="width: 100px; height: 100px;">
            </div>
            <h2 class="text-center">EcoTrack</h2>
            <ul class="nav flex-column mt-4">
                <?php
                $navItems = [
                    "Inicio" => "index.php",
                    "Estadísticas" => "dashboard.php",
                    "Reportes y Objetivos" => "objectives.php",
                    "Perfil" => "profile.php",
                    "Salir" => "login.php"
                ];

                foreach ($navItems as $name => $link) {
                    echo "<li class='nav-item mb-2'><a href='$link' class='nav-link text-white'>$name</a></li>";
                }
                ?>
            </ul>
        </nav>

        <div class="flex-grow-1 bg-light p-4">
            <!-- Barra de navegación superior -->
            <nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-4 rounded">
                <div class="container-fluid">
                    <a class="navbar-brand">Bienvenido, <?php echo $_SESSION['username'] ?? ''; ?></a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarContent">
                        <form class="d-flex ms-auto">
                            <input class="form-control me-2" name="search" id="search" type="search" placeholder="Buscar ID o nombre" aria-label="Search">
                            <button class="btn btn-light" type="submit">Buscar</button>
                        </form>
                    </div>
                </div>
            </nav>

            <!-- Contenido principal en columnas -->
            <div class="row">
                <!-- Columna del formulario -->
                <div class="col-md-4">
                    <form id="project-form">
                        <div class="form-group">
                            <h4 class="text-primary">Ingresa los datos</h4> <br>
                            <fieldset>
                                <input class="form-control mb-3" type="text" id="name" name="name" placeholder="Nombre de proyecto">
                                <textarea class="form-control mb-3" id="description" name="description" placeholder="Detalles del proyecto"></textarea>
                            </fieldset>                
                        </div>
                        <input type="hidden" id="projectId" name="projectId">
                        <input type="hidden" id="user_id" value="<?php echo $_SESSION['user_id'] ?? ''; ?>">
                        <button class="btn btn-primary w-100" type="submit" id="botonFormulario">Agregar Proyecto</button><break><break>

                    </form>
                    
                </div>


                <!-- TABLA  -->
                <div class="col-md-8">
                    <!-- Contenedor para el mensaje -->
                        <div id="mensaje-proyecto" class="mt-3"></div>

                    <div class="card my-4 d-none" id="project-result">
                        <div class="card-body">
                            <!-- RESULTADO -->
                            <ul id="container"></ul>
                        </div>
                    </div>

                    <table class="table table-bordered table-sm">
                        <thead>
                            <tr>
                                <td>Id</td>
                                <td>Nombre</td>
                                <td>Descripción</td>
                            </tr>
                        </thead>
                        <tbody id="projects"></tbody>
                    </table>
                    
                    <button class="btn btn-primary w-100 mt-3" id="botonEditar">
                        <a href="edit_projects.php" class="nav-link text-white">Editar Proyectos</a>
                    </button><break><break>

                </div>
                
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
        crossorigin="anonymous"></script>
    <!-- Lógica del Frontend -->
    <script src="../app.js"></script>
</body>
</html>
