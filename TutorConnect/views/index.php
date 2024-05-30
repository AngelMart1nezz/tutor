<?php
    $current_page = basename($_SERVER['PHP_SELF']);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tutor Connect</title>
    <link href="../assets/bootstrap-5.3.3/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/estilos.css">
    <link rel="icon" type="x-icon" href="../assets/images/favicon.ico">
</head>
<body>
    <header>
        <?php include 'header.php'; ?>
    </header>

    <div class="frase">
        <p>¡Explora nuestras asesorías y lleva tu aprendizaje al siguiente nivel!</p>
    </div>

    <!-- Carousel -->
    <div id="demo" class="carousel slide" data-bs-ride="carousel">

        <!-- Indicadores -->
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
            <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
            <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
        </div>

        <!-- Slides -->
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="../assets/images/slider/sliderProgramacion.jpg" alt="Programación" class="img">
                <div class="carousel-caption">
                    <h3>Programación</h3>
                </div>
            </div>
            <div class="carousel-item">
                <img src="../assets/images/slider/sliderAlgebra.jpg" alt="Álgebra" class="img">
                <div class="carousel-caption">
                    <h3>Álgebra</h3>
                </div> 
            </div>
            <div class="carousel-item">
                <img src="../assets/images/slider/sliderContabilidad.jpg" alt="Contabilidad" class="img">
                <div class="carousel-caption">
                    <h3>Contabilidad</h3>
                </div>  
            </div>
        </div>

        <!-- Controles -->
        <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
        </button>

    </div>
    <footer>
        <?php include 'footer.html'?>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>