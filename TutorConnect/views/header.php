<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$current_page = basename($_SERVER['PHP_SELF']);
$is_logged_in = isset($_SESSION['usuario']);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tutor Connect</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/estilos.css">
    <link rel="icon" type="x-icon" href="../assets/images/favicon.ico">
</head>
<body>
    <header>
        <nav class="navigation navbar navbar-expand-lg fixed-top">
            <a href="index.php">
                <img src="../assets/images/logo3.png" id="logo" alt="Tutor Connect">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item <?php echo $current_page === 'index.php' ? 'active' : ''; ?>">
                        <a class="nav-link" href="index.php">Inicio</a>
                    </li>
                    <li class="nav-item <?php echo $is_active = ($current_page === 'lista-asesores.php' || $current_page === 'perfil-asesor.php') ? 'active' : ''; ?>">
                        <a class="nav-link" href="lista-asesores.php">Asesores</a>
                    </li>
                    <li class="nav-item <?php echo $current_page === 'mi-perfil.php' || $current_page === 'editar-perfil.php' ? 'active' : ''; ?>">
                        <a class="nav-link" href="mi-perfil.php">Mi perfil</a>
                    </li>
                    <li class="nav-item <?php echo $current_page === 'ayuda.html' ? 'active' : ''; ?>">
                        <a class="nav-link" href="ayuda.html">Ayuda</a>
                    </li>
                </ul>
                <div class="inicioSesion">
                    <?php if ($is_logged_in): ?>
                        <a class="sign_btn" href="../assets/php/cerrarSesion.php">Cerrar sesión</a>
                    <?php else: ?>
                        <a class="sign_btn" href="registro-inicio-sesion.php">Iniciar sesión</a>
                    <?php endif; ?>
                </div>
            </div>
        </nav>
    </header>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>