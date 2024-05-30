<?php
session_start();

// Verificar si hay una sesión iniciada
if (!isset($_SESSION['usuario'])) {
    // Si no hay una sesión iniciada, redirigir al usuario a la página de inicio
    echo "<script>alert('Debes iniciar sesión para ver tu perfil'); window.location = 'index.php';</script>";
    exit(); // Terminar el script para evitar que el resto del código se ejecute
}

include '../assets/php/conexionBD.php';

// Consulta SQL para obtener los datos del usuario
$datos = mysqli_query($conexion, "SELECT nombre, grado, institucion, tipo, materia, info FROM usuarios WHERE correo = '$_SESSION[usuario]'");

// Verificar si la consulta se ejecutó correctamente
if (!$datos) {
    // Manejar el error
    echo "Error en la consulta SQL: " . mysqli_error($conexion);
    exit();
}

// Verificar si se encontraron datos del usuario
if (mysqli_num_rows($datos) > 0) {
    // Recuperar los datos del usuario
    $dato = mysqli_fetch_array($datos);
    // Obtener los valores de nombre, grado e institucion
    $nombre = $dato['nombre'];
    $grado = $dato['grado'];
    $institucion = $dato['institucion'];
    $tipo = $dato['tipo'];
    $materia = $dato['materia'];
    $info = $dato['info'];
} else {
    // Manejar el caso en que no se encuentren datos del usuario
    echo "No se encontraron datos del usuario en la base de datos.";
}

// Cerrar la conexión a la base de datos
mysqli_close($conexion);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Perfil</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@200..800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/style.css">
    <?php include 'header.php' ?>
</head>

<body>
    <div class="profile">
        <header class="profile__header">
            <div class="profile__highlight__wrapper">
            </div>
            <div class="profile__avatar">
                <img src="../assets/images/usuario.png" loading="lazy" alt="Foto de perfil">
            </div>
            <div class="profile__highlight__wrapper">
                <div class="profile__highlight">
                </div>
            </div>
        </header>
        <div class="profile__name">
            <h2> <?php echo $nombre ?> <img src="../assets/svg/verified.svg" alt="Usuario verificado"></h2>
        </div>
        <main>
            <div class="tabs-wrapper">
                <ul class="tabs">
                    <li class="active">
                        <a id="tab1" href="">Sobre mí</a>
                    </li>
                    <li id="active-bg"></li>
                </ul>
            </div>
            <div id="tab1-content" class="tab-content tab-content--active">
                <p> <b> Nivel académico: </b> <?php echo $grado ?> </p>
                <p> <b> Institución: </b> <?php echo $institucion ?> </p>
            <?php if($tipo == "asesor") {
                echo "<p> <b> Asesor de $materia <b> </p>
                    <p> <b> Te puedo ayudar con temas de: </b> $info </p>";
            }
            ?>
        </main>
        <a href="editar-perfil.php" class="btn">
            Editar perfil
        </a>
    </div>

    <footer>
        <?php include 'footer.html'?>
    </footer>

    <script src="../assets/js/script.js"></script>
</body>

</html>