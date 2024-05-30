<!DOCTYPE html>

<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesión</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/estilosLogin.css">
    <link rel="icon" type="x-icon" href="../assets/images/favicon.ico">
    
</head>
<body class="registroInicioSesion">

    <!--Contenedor de toda la estructura-->
    <div class="contenedor__todo">

        <!--Cajas traseras-->
        <div class="caja__trasera">

            <!--Parte del login-->
            <div class="caja__trasera__login">
                <h3>¿Ya tienes una cuenta?</h3>
                <p>Entra a tu cuenta</p>
                <button id = "btn__iniciar__sesion">Iniciar sesión</button>
            </div>

            <!--Parte del Register-->
            <div class="caja__trasera__register">
                <h3>¿Aún no estas registrado?</h3>
                <p>Regístrate para iniciar sesión</p>
                <button id = "btn__register">Crear cuenta</button>
            </div>

        </div>

        <!--Caja delantera-->
        <div class="contenedor__login__register">

            <!--Caja delantera Login-->
            <form action="../assets/php/iniciarSesion.php" class="formulario__login">
                <h2>Iniciar sesión</h2>
                <input type="text" placeholder="Correo electrónico" name = "correo">
                <input type="password" placeholder="Contraseña" name = "contrasena">
                <?php
                session_start();
                if (isset($_SESSION['error_message'])) {
                    echo '<div id="error-message" class="alert alert-danger">' . $_SESSION['error_message'] . '</div>';
                    unset($_SESSION['error_message']);
                }
                ?>
                <button> Entrar </button>
                <a href="index.php"> <img src="../assets/images/logo3.png" alt="Tutor Connect" width="100"> </a>
            </form>

            <!--Caja delantera Register-->
            <form action="../assets/php/registroUsuario.php" class="formulario__register">
                <h2>Crea una cuenta</h2>
                <input type="text" id="nombre" name="nombre" placeholder="Nombre completo" pattern="^\S+(\s+\S+)+$" title="Ingrese su nombre completo" required>
                <input type="email" placeholder="Correo electrónico" name="correo" required
                pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="Ingresa un correo electrónico válido">
                <input type="text" placeholder="Institución académica" name="institucionAcademica" required>
                <input type="text" placeholder="Nivel académico" name="nivelAcademico" required>
                <input type="password" placeholder="Contraseña" name="contrasena" required>
                <select name="tipoUsuario" required>
                    <option value="" disabled selected> - Tipo de usuario - </option>
                    <option value="alumno"> Alumno </option>
                    <option value="asesor"> Asesor </option>
                </select>
                <br>
                <button> Registrarse </button>
                <a href="index.php"> <img src = "../assets/images/logo3.png" alt="Tutor Connect" width="100"> </a>
            </form>

        </div>

    </div>

    <script src = "../assets/js/registroInicioSesion.js"> </script>

</body>
</html>