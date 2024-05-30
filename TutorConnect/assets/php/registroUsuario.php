<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel = "stylesheet" href = "../css/estilosRegistroUsuario.css">
</head>
<body>
    <?php
        include 'conexionBD.php';

        $verificar_correo = mysqli_query($conexion, "SELECT correo FROM usuarios WHERE correo = '$_REQUEST[correo]'");

        if(mysqli_num_rows($verificar_correo) > 0){

            echo "
            <div class = 'contenedor__registro'>
            
                <div class = 'contenedor__mensaje'>
            
                    <div class = 'mensaje'>
                        <p> El correo ingresado ya existe </p>
                        <a href = '../../views/registro-inicio-sesion.php'> Regresar </a>
                    </div>
                </div>
            </div>
            ";

        } else {

            /* Para encriptar
            $contrasena = $_REQUEST['contrasena'];
            $contrasena = hash('sha512', $contrasena);
            */
            $nombre = ucwords(strtolower($_REQUEST['nombre']));
            $institucionAcademica = strtoupper(ucwords(strtolower($_REQUEST['institucionAcademica'])));

            mysqli_query($conexion, "INSERT INTO usuarios(nombre, correo, institucion, grado, contrasena, tipo) VALUES
                        ('$nombre', 
                        '$_REQUEST[correo]', 
                        '$institucionAcademica', 
                        '$_REQUEST[nivelAcademico]',
                        '$_REQUEST[contrasena]', 
                        '$_REQUEST[tipoUsuario]')");
            
            if ($_REQUEST['tipoUsuario'] == 'asesor'){
                session_start();
                $_SESSION['usuario'] = $_REQUEST['correo'];
                echo "
                    <div class = 'contenedor__registro'>
                        <div class = 'contenedor__mensaje'>
                            <div class = 'mensaje'>
                                <p> Te has registrado como asesor </p>
                                <p> Presiona abajo para continuar con tu registro </p>
                                <a href = '../../views/registroAsesor.php'> Continuar </a>
                            </div>
                        </div>
                    </div>

                ";
            } else {
                session_start();
                $_SESSION['usuario'] = $_REQUEST['correo'];
                $_SET['materia'] = NULL;
                $_SET['info'] = NULL;
                echo "

                    <div class = 'contenedor__registro'>
                        <div class = 'contenedor__mensaje'>
                            <div class = 'mensaje'>
                                <p> Registro exitoso </p>
                                <a href = '../../views/registro-inicio-sesion.php'> Iniciar sesión </a>
                            </div>
                        </div>
                    </div>

                ";
            }
        }
    mysqli_close($conexion);
    ?>
</body>
</html>