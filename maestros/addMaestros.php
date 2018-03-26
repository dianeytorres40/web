<?php
    
    //verificar usuario válido
    session_start();
    if(empty($_SESSION['usr'])){
        echo "Debe autentificarse";
        exit();
    }

    //agregar codigo común
    include '../bd/conexion.php';        
?>

<html>
<head>
    <title>claseDAWEB Agrega Maestros</title>
    <!-- funciones javascript  --> 
    <script type="text/javascript" src="../js/funciones.js"></script>    
    <script type="text/javascript" src="../js/jquery.js"></script>
</head>

<!-- establece foco a la caja de entrada de la clave -->
<body onLoad="javascript: document.getElementById('txtNombre').focus()">

<!-- nombre de formulario, script a redireccionar y protocolo http de envío al servidor -->
<form id='frmAddMaestros' action='./qryMaestros.php' method='POST'>

    <!--tabla html que contenedora de la forma -->
    <table align='center' border="1">
        <tr height='50'><td colspan='2' align='center'>
            <b>Agregando Maestros</b>
            <input type='hidden' id='txtOpc' name='txtOpc' value='add'>
            <input type='hidden' id='txtId' name='txtId' value=''>
            </td>
        </tr>                    
        <td>Nombre</td>
        <td><input type='text' id='txtNombre' name='txtNombre' maxlength="20"></td>
        </tr>
    </table>

    <!--tabla html que contenedora de botones grabar y regresar -->
    <table align="center">
    <tr height="50px">
        <td align='center'>
            <!-- <input type='button' id='btnGrabar' name='btnGrabar' value='Grabar' style='width: 100px' onClick='grabarMaestro()'> -->
            <input type='button' id='btnGrabar' name='btnGrabar' value='Grabar' style='width: 100px' onClick='validaMaestros2();'>
        </td>
        <td colspan='2' align='center'>
            <input type='button' id='btnRegresar' name='btnRegresa' value='Regresar' style='width: 100px' onClick='regresarShwMaestros()'>            
        </td>
    </tr>
    </table>
</form>
</body>
</html>


