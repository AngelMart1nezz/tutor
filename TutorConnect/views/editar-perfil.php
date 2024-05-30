<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    echo "<script>window.location = 'index.php';</script>";
    session_destroy();
    die();
}
include '../assets/php/conexionBD.php';

$datos = mysqli_query($conexion, "SELECT * FROM usuarios WHERE correo = '$_SESSION[usuario]'");
$dato = mysqli_fetch_array($datos);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Editar datos</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@200..800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/estilosEditarDatos.css">
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
            </div>
        </header>
        <div class="profile__name">
            <h2>Editar datos <img src="../assets/svg/verified.svg" alt="Usuario verificado"></h2>
        </div> <br>
        <main>
            <form action="../assets/php/editarDatos.php" method="post" class="edit-form">
                <input type="text" name="nombre" placeholder="Nombre completo" value="<?php echo $dato['nombre']; ?>">
                <input type="text" name="correo" placeholder="Correo electrónico" value="<?php echo $dato['correo']; ?>">
                <input type="text" name="institucion" placeholder="Institución" value="<?php echo $dato['institucion']; ?>">
                <input type="text" name="grado" placeholder="Grado académico" value="<?php echo $dato['grado']; ?>">
                <?php
                // Si el usuario es un asesor, se muestran los campos adicionales
                if ($dato['tipo'] == "asesor") {
                    echo "<input type='text' name='materia' placeholder='Materia' value='" . $dato['materia'] . "'>";
                    echo "<input type='text' name='info' placeholder='Información adicional' value='" . $dato['info'] . "'>";
                }
                ?>
                <button type="submit" class="btn">Guardar cambios</button>
            </form>
        </main>
    </div>
    <footer>
        <?php include 'footer.html'?>
    </footer>

    <script src="../assets/js/script.js"></script>
</body>

</html>
