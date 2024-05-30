<?php

include '../assets/php/conexionBD.php';

function obtenerMaterias($conexion) {
    $consulta = "SELECT DISTINCT materia FROM usuarios WHERE tipo = 'asesor' ORDER BY materia ASC";
    $resultado = mysqli_query($conexion, $consulta);
    return $resultado;
}

function obtenerPerfilesDeAsesores($conexion, $filtro) {
    if ($filtro === 'busqueda') {
        $busqueda = mysqli_real_escape_string($conexion, $_GET['busqueda']);
        $busqueda = strtolower($busqueda);

        $consulta = "
            SELECT * FROM usuarios 
            WHERE tipo = 'asesor' 
            AND (
                LOWER(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(nombre, 'á', 'a'), 'é', 'e'), 'í', 'i'), 'ó', 'o'), 'ú', 'u'), 'ñ', 'n')) LIKE '%$busqueda%'
                OR LOWER(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(materia, 'á', 'a'), 'é', 'e'), 'í', 'i'), 'ó', 'o'), 'ú', 'u'), 'ñ', 'n')) LIKE '%$busqueda%'
            )";
    } elseif ($filtro === 'materia') {
        $materiaSeleccionada = mysqli_real_escape_string($conexion, $_GET['materia']);
        $consulta = "
            SELECT * FROM usuarios 
            WHERE tipo = 'asesor' AND 'materia' = '$materiaSeleccionada'";
    } else {
        $consulta = "SELECT * FROM usuarios WHERE tipo = 'asesor'";
    }
    
    $resultado = mysqli_query($conexion, $consulta);
    return $resultado;
}

$filtro = isset($_GET['busqueda']) ? 'busqueda' : (isset($_GET['materia']) ? 'materia' : '');

$resultadoMaterias = obtenerMaterias($conexion);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asesores</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/estilos.css">
    <?php include 'header.php';?>
</head>
<body>
    <div class="lista-asesores">
        <div class="search-container">
            <!-- Formulario de búsqueda -->
            <form method="GET" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <input type="text" name="busqueda" placeholder="Buscar...">
                <button type="submit">Buscar</button>
            </form>
        </div>

        <div class="content-container">
            <!-- Lista de materias -->
            <div class="lista-materias">
                <b>MATERIAS</b>
                <ul>
                    <li><a href='?' class='<?php echo (!$filtro || $filtro === 'busqueda') ? 'active' : ''; ?>'>Todas las materias</a></li>
                    <?php while ($materia = mysqli_fetch_array($resultadoMaterias)) : ?>
                        <?php
                        $materiaNombre = $materia['materia'];
                        $materiaUrl = rawurlencode($materiaNombre);
                        $activeClass = ($filtro === 'materia' && isset($_GET['materia']) && rawurldecode($_GET['materia']) === $materiaNombre) ? 'active' : '';
                        ?>
                        <li><a class='<?php echo $activeClass; ?>' href='?materia=<?php echo $materiaUrl; ?>'><?php echo htmlspecialchars($materiaNombre); ?></a></li>
                    <?php endwhile; ?>
                </ul>
            </div>

            <div class="contenedor_perfiles">
                <?php
                $resultadoPerfiles = obtenerPerfilesDeAsesores($conexion, $filtro);
                while ($registro = mysqli_fetch_array($resultadoPerfiles)) : ?>
                    <div class='asesores'>
                        <article>
                            <figure>
                                <img src='../assets/images/usuario.png' alt='Foto de asesor' class='center'>
                            </figure>
                            <div class='infoAsesor'>
                                <h2><b><?php echo htmlspecialchars($registro['nombre']); ?></b></h2>
                                <p><?php echo htmlspecialchars($registro['materia']); ?></p>
                                <p class='areaConocimiento'><?php echo htmlspecialchars($registro['info']); ?></p>
                                <a class='btn btn-center' onclick="verificarSesion(<?php echo $registro['Id']; ?>)">Ver perfil</a>
                            </div>
                        </article>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
    </div>

    <footer>
        <?php include 'footer.html'?>
    </footer>

    <script>
        function verificarSesion(idAsesor) {
            <?php if (!isset($_SESSION['usuario'])) : ?>
                // Redirige al usuario a la página de inicio de sesión si no se ha iniciado sesión
                alert('Inicia sesión o regístrate para ver a los asesores disponibles');
                window.location.href = 'lista-asesores.php';
            <?php else : ?>
                // Redirige al perfil de asesor
                window.location.href = 'perfil-asesor.php?id=' + idAsesor;
            <?php endif; ?>
        }
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>