<?php
    session_start();
    if (!isset($_SESSION['usuario'])){
        echo "
            <script>
                alert('Debes iniciar sesión para ver tu perfil');
                window.location = '../../views/registro-inicio-sesion.php';
            </script>
        ";
        
        session_destroy();
        die();
    }
    include 'conexionBD.php';
    
    $datos = mysqli_query($conexion, "SELECT nombre, correo, institucion, grado, materia, info FROM usuarios WHERE correo = '$_SESSION[usuario]' ");
    $dato = mysqli_fetch_array($datos);

    if (empty($_REQUEST['nombre']))
        mysqli_query($conexion, "UPDATE usuarios SET nombre = '$dato[nombre]' WHERE correo = '$_SESSION[usuario]' ");
    else
        mysqli_query($conexion, "UPDATE usuarios SET nombre = '$_REQUEST[nombre]' WHERE correo = '$_SESSION[usuario]' ");
    
    if (empty($_REQUEST['correo']))
        mysqli_query($conexion, "UPDATE usuarios SET correo = '$dato[correo]' WHERE correo = '$_SESSION[usuario]' ");
    else
        mysqli_query($conexion, "UPDATE usuarios SET correo = '$_REQUEST[correo]' WHERE correo = '$_SESSION[usuario]' ");
    
    if (empty($_REQUEST['institucion']))
        mysqli_query($conexion, "UPDATE usuarios SET institucion = '$dato[institucion]' WHERE correo = '$_SESSION[usuario]' ");
    else
        mysqli_query($conexion, "UPDATE usuarios SET institucion = '$_REQUEST[institucion]' WHERE correo = '$_SESSION[usuario]' ");
    
    if (empty($_REQUEST['grado']))
        mysqli_query($conexion, "UPDATE usuarios SET grado = '$dato[grado]' WHERE correo = '$_SESSION[usuario]' ");
    else
        mysqli_query($conexion, "UPDATE usuarios SET grado = '$_REQUEST[grado]' WHERE correo = '$_SESSION[usuario]' ");
    
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
            alert('Datos actualizados correctamente.');
            window.location = '../../views/mi-perfil.php';
        </script>
    ";

    mysqli_close($conexion);
?>