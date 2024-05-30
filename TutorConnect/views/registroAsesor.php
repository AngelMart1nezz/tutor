<?php
session_start();
if (!isset($_SESSION['usuario'])){
    echo "
        <script>
            window.location = '../views/registro-inicio-sesion.php';
        </script>
    ";
    session_destroy();
    die();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="stylesheet" href="../assets/css/estilosRegistroAsesor.css">
</head>
<body>

    <div class="contenedor">
        <div class="info">
            <form action="../assets/php/registroAsesor.php" class="registro">
                <select id="materiaSelect" name="materia" required>
                    <option id="default" value="" disabled selected>¿En qué materia te especializas?</option>
                    <option value="Español">Español</option>
                    <option value="Inglés">Inglés</option>
                    <option value="Matemáticas">Matemáticas</option>
                    <option value="Pole Dance">Pole Dance</option>
                    <option value="Programación">Programación</option>
                    <option value="Química">Química</option>
                    <option value="Otra">Otra</option>
                </select>
                <div id="otraMateria" class="otra-materia" name="materia">
                    <label for="otraMateriaInput"><b>Por favor, especifica la materia:</b></label>
                    <input type="text" id="otraMateriaInput" class="forma_materia" name="otra_materia">
                </div>
                <div id="info">
                    <p><b>¿Cuál es tu área de conocimiento?</b></p>
                <input type="text" class="forma_materia" name="info" required>
                </div>
                
                <div>
                    <button type="submit"><b>Finalizar registro</b></button>
                </div>
            </form>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var materiaSelect = document.getElementById('materiaSelect');
            var otraMateria = document.getElementById('otraMateria');

            // Función para mostrar u ocultar el campo "otraMateria"
            function toggleOtraMateria() {
                if (materiaSelect.value === 'Otra') {
                    otraMateria.style.display = 'block';
                } else {
                    otraMateria.style.display = 'none';
                }
            }

            // Llamar a la función al cargar la página
            toggleOtraMateria();

            // Agregar evento al cambiar el valor del select
            materiaSelect.addEventListener('change', toggleOtraMateria);
        });
    </script>

</body>
</html>