<?php require_once ("funciones.php"); ?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Prueba XAJAX de María para el curso</title>
        <meta charset="UTF-8">
        <script type="text/javascript" src="pruebausuarios.js"></script>
        <?php
        // Le indicamos a Xajax que incluya el código JavaScript necesario
        $xajax->printJavascript(); 
        ?>
    </head>

    <body>

    <!-- Aqui dejamos la etiqueta del div vacia para rellenarla con la tabla -->
    <div id ="tablaUsuarios"></div>
    </body>
</html>
