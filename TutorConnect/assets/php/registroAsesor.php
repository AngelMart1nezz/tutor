<?php
    session_start();
    if (!isset($_SESSION['usuario'])){
        echo "
            <script>
                alert('Debes iniciar sesión para ver tu perfil');
                window.location = '/Tutor-Connect/index.php';
            </script>
        ";
        
        session_destroy();
        die();
    }
    include 'conexionBD.php';
    
    $datos = mysqli_query($conexion, "SELECT materia, info FROM usuarios WHERE correo = '$_SESSION[usuario]' ");
    $dato = mysqli_fetch_array($datos);

    
    if (empty($_REQUEST['materia']))
        mysqli_query($conexion, "UPDATE usuarios SET materia = '$dato[materia]' WHERE correo = '$_SESSION[usuario]' ");
    else
        mysqli_query($conexion, "UPDATE usuarios SET materia = '$_REQUEST[materia]' WHERE correo = '$_SESSION[usuario]' ");

    if (empty($_REQUEST['info']))
        mysqli_query($conexion, "UPDATE usuarios SET info = '$dato[info]' WHERE correo = '$_SESSION[usuario]' ");
    else
        mysqli_query($conexion, "UPDATE usuarios SET info = '$_REQUEST[info]' WHERE correo = '$_SESSION[usuario]' ");

    
    echo"
        <script>
            window.location = '../../views/index.php';
        </script>
    ";

    mysqli_close($conexion);
?>