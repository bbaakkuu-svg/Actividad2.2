# 1. Descripción del Reto
Para afianzar los conceptos fundamentales de sintaxis, variables, operadores y ámbitos de PHP, vais a desarrollar una Prueba de Concepto (PoC) que demuestre la generación dinámica de contenido en el servidor y su posterior interacción en el cliente a través de bloques embebidos en JavaScript.

Deberéis crear un único archivo llamado `index.php` ejecutado obligatoriamente a través de vuestro servidor web local (Apache mediante XAMPP).

---

## 2. Requisitos del Archivo `index.php`
El script deberá cumplir estrictamente con los siguientes bloques funcionales:

1. **Configuración y Directivas (Servidor):** Al principio del archivo, debéis forzar al motor de PHP a mostrar todos los errores y advertencias de código utilizando las directivas de configuración oportunas (ej. `ini_set` o `error_reporting`).
2. **Datos Personales:** Definir variables globales con vuestro nombre, apellidos y edad actual. Mostrad de forma elegante en el HTML una frase de presentación (ej: *"Soy Sergio Montes, y tengo 25 años"*), utilizando la etiqueta abreviada de impresión de PHP.
3. **Control de Ámbitos (Funciones PHP):** 
   * Deberéis crear una función en PHP llamada `calcularEdadesFuturas()`.
   * Dentro de ella, utilizando el ámbito global o pasándole los datos necesarios, debéis calcular tres nuevas variables correspondientes a: tu edad + 10 años, tu edad + 20 años, y el doble de tu edad.
   * Estas tres variables calculadas deben quedar accesibles para el resto del documento.
4. **Fecha y Hora:** Mostrar en el pie de la página la fecha y hora actuales del servidor usando la función `date()`. No olvides configurar la zona horaria correcta (`Europe/Madrid`).
5. **Interfaz e Integración con JavaScript:**
   * La página dispondrá de tres botones HTML: *"Hacer pasar 10 años"*, *"Hacer pasar 20 años"* y *"Que pase el doble"*.
   * Al pulsarlos, llamarán a una función común de JavaScript que debéis integrar en la cabecera o cuerpo.
   * ¡Ojo! Esta función de JavaScript no envía ningún formulario, sino que utiliza bloques de PHP embebidos en el propio código JS para asignar los valores calculados en el servidor a las variables del cliente de forma segura.

---

## 3. Plantilla de Código Base
Podéis utilizar la siguiente estructura HTML/JavaScript de partida. Prestad especial atención a las comillas que envuelven los bloques de PHP dentro de JavaScript para evitar errores de sintaxis en el navegador:

```php
<?php
// 1. Directivas de configuración
 
 
// Configuración de hora local para la fecha dinámica
 
 
 
// 2. Definición de variables globales (nombre, apellidos, edadActual)
 
 
// 3. Control de Ámbitos y Funciones PHP
// Declaramos las variables fuera para inicializarlas en el ámbito global
//edad10, edad20, edadDoble, todas a 0 de inicio.
 
 
function calcularEdadesFuturas() {
    // Esto es necesario?: Acceso al ámbito global mediante la palabra reservada 'global'
    // Operadores aritméticos (edad10, edad20, edadDoble)
    // establecer los valores correctos
}
 
// Ejecutamos la función para procesar los cálculos en el servidor
 
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
        <p><strong>Presentación:</strong> Soy <?= htmlspecialchars($nombre . " " . $apellidos) ?>, y tengo <?=$edadActual ?> años.</p>
        
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