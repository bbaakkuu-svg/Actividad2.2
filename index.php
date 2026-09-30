<?php
// 1. Directivas de configuración
ini_set("display_errors",1);
ini_set("display_startup_errors",1);
error_reporting(E_ALL);
 
// Configuración de hora local para la fecha dinámica
 
date_default_timezone_set("Europe/Madrid");
 
// 2. Definición de variables globales (nombre, apellidos, edadActual)
$nombre = "Bakunin";
$apellidos = "Sosa Álvarez";
$edadActual = 46;
 
// 3. Control de Ámbitos y Funciones PHP
// Declaramos las variables fuera para inicializarlas en el ámbito global
//edad10, edad20, edadDoble, todas a 0 de inicio.﻿
$edad10 = 0;
$edad20 = 0; 
$edadDoble = 0;


 
 
function calcularEdadesFuturas() {
    // Esto es necesario: Acceso al ámbito global mediante la palabra reservada 'global'
    global $edadActual, $edad10, $edad20, $edadDoble;
    // Operadores aritméticos (edad10, edad20, edadDoble)
    $edad10 = $edadActual + 10;
    $edad20 = $edadActual + 20;
    $edadDoble= $edadActual * 2;
    // establecer los valores correctos
}
 
// Ejecutamos la función para procesar los cálculos en el servidor
 calcularEdadesFuturas();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Solución Modelo - UT2 DAW</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 30px; line-height: 1.6; }
        .box { border: 1px solid #ccc; padding: 15px; border-radius: 5px; background: #f9f9f9; max-width: 500px; }
        button { padding: 10px 15px; margin-right: 5px; cursor: pointer; background-color: #007BFF; color: white; border: none; border-radius: 3px; }
        button:hover { background-color: #0056b3; }
        #resultado { margin-top: 15px; font-size: 1.2em; font-weight: bold; color: #28a745; }
        footer { margin-top: 30px; font-size: 0.85em; color: #666; }
    </style>
 
 
    <script>
        function mostrarResultado(opcion) {
            let resultado = "";
 
 
            switch(opcion) {
                case "10":
                    // El servidor inyecta el número limpio. Las comillas evitan errores de sintaxis en JS.
                    resultado = "<?php echo $edad10; ?>"; 
                    document.getElementById("resultado").innerHTML = `Dentro de 10 años tendré ${resultado} años.`;
                    break;
                case "20":
                    resultado = "<?php echo $edad20; ?>";
                    document.getElementById("resultado").innerHTML = `Dentro de 20 años tendré ${resultado} años.`;
                    break;
                case "doble":
                    resultado = "<?php echo $edadDoble; ?>";
                    document.getElementById("resultado").innerHTML = `El doble de mi edad es ${resultado} años.`;
                    break;
            }
        }
    </script>
</head>
<body>
 
 
    <h1>UT2: Fundamentos de PHP — Caso Práctico</h1>
 
 
    <div class="box">
        <p><strong>Presentación:</strong> Soy <?= htmlspecialchars($nombre . " " . $apellidos) ?>, y tengo <?= $edadActual ?> años.</p>
        
        <h3>Interactividad en el Cliente (Sin recarga de página):</h3>
        <button onclick="mostrarResultado('10')">Hacer pasar 10 años</button>
        <button onclick="mostrarResultado('20')">Hacer pasar 20 años</button>
        <button onclick="mostrarResultado('doble')">Que pase el doble</button>
 
 
        <div id="resultado">Púlsese un botón para calcular...</div>
    </div>
 
 
    <footer>
        Petición procesada dinámicamente por el servidor el de <?= date('d/m/Y a las H:i:s') ?>.
    </footer>
 
 
</body>
</html>