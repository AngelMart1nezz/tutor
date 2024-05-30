<?php
session_start();
include 'conexionBD.php';

$correo = $_REQUEST['correo'];
$contrasena = $_REQUEST['contrasena'];

$validar = mysqli_query($conexion, "SELECT * FROM usuarios WHERE correo = '$correo' and contrasena = '$contrasena'");

if (mysqli_num_rows($validar) > 0) {
    $_SESSION['usuario'] = $correo;
    header('Location: ../../views/index.php');
    exit();
} else {
    $_SESSION['error_message'] = 'El correo o la contraseña son incorrectos';
    header('Location: ../../views/registro-inicio-sesion.php');
    exit();
}

mysqli_close($conexion);
?>