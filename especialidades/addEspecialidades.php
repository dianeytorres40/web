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
    <title>claseDAWEB Agrega Especialidades</title>
    <!-- funciones javascript  --> 
    <script type="text/javascript" src="../js/funciones.js"></script> 
    <script type="text/javascript" src="../js/jquery.js"></script>   
</head>

<!-- establece foco a la caja de entrada de la clave -->
<body onLoad="javascript: document.getElementById('txtClave').focus()">

<!-- nombre de formulario, script a redireccionar y protocolo http de envío al servidor -->
<form id='frmAddEspecialidades' action='./qryEspecialidades.php' method='POST'>

    <!--tabla html que contenedora de la forma -->
    <table align='center' border="1">
        <tr height='50'><td colspan='2' align='center'>
            <b>Agregando Especialidades</b>
            <input type='hidden' id='txtOpc' name='txtOpc' value='add'>
            <input type='hidden' id='txtId' name='txtId' value="">
            </td>
        </tr>                    
        <tr>
            <td>Clave</td>
            <td><input type='text' id='txtClave' name='txtClave' title="4 letras que identifiquen la especialidad" maxlength="4"></td>
            </tr>
        <tr>
            <td>Nombre</td>
            <td><input type='text' id='txtNombre' name='txtNombre' maxlength="20"></td>
        </tr>
    </table>

    <!--tabla html que contenedora de botones grabar y regresar -->
    <table align="center">
    <tr height="50px">
        <td align='center'>
            <!-- <input type='button' id='btnGrabar' name='btnGrabar' value='Grabar' style='width: 100px' onClick='grabarEspecialidad()'> -->
            <input type='button' id='btnGrabar' name='btnGrabar' value='Grabar' style='width: 100px' onClick='validaEspecialidadesAdd()'>
        </td>
        <td colspan='2' align='center'>
            <input type='button' id='btnRegresar' name='btnRegresa' value='Regresar' style='width: 100px' onClick='regresarShwEspecialidades()'>            
        </td>
    </tr>
    </table>
</form>
</body>
</html>


