<?php
    //verificar usuario valido
    session_start();
    if(empty($_SESSION['usr'])){
        echo "Debe autentificarse";
        exit();
    }

    //agregar codigo común
    include '../bd/conexion.php';        

    //recuperar los datos de la interfaz html
    $opc        = $_POST['txtOpc'];
    $id         = $_POST['txtId'];
    $nombre     = $_POST['txtNombre'];

?>    
<html>
<head>
    <title></title>
    <!-- funciones javascript  --> 
    <script type="text/javascript" src="../js/funciones.js"></script>        
</head>

<!-- establece foco a la caja de entrada del nombre de la especialidad -->
<body onLoad='javascript: document.getElementById("txtNombre").focus()'>

<!-- nombre de formulario, script a redireccionar y protocolo http de envío al servidor -->
<form id='frmUpdMaestros' action='qryMaestros.php' method='POST'>

    <!--tabla html que contenedora de la forma -->
    <table align='center' width='400'>
        <tr height='100'><td colspan='2' align='center'>
            <b>Modificando Maestros</b>
            <!-- objetos necesarios para la forma del qryEspecialidades -->
            <input type='hidden' id='txtOpc' name='txtOpc' value=''>
            <input type='hidden' id='txtId' name='txtId' value='<?php echo($id);?>'>
            </td>
        </tr>                    
        <tr>
            <td>Nombre</td> 
            <td><input type='text' id='txtNombre' name='txtNombre' value='<?php echo($nombre);?>'></td>
        </tr>
        <tr height='100'>
            <td colspan='2' align='center'>
                <table border='1'>
                <tr>
                <td><input type='button' id='btnGrabar' name='btnGrabar' value='Grabar' style='width: 100px' onClick='enviar("updPro")'></td>
                <td><input type='button' id='btnEliminar' name='btnEliminar' value='Eliminar' style='width: 100px' onClick='enviar("delPro")'></td>
                <td><input type='button' id='btnRegresar' name='btnRegresar' value='Regresar' style='width: 100px' onClick='enviar("backPro")'></td>
                </tr>
            </td>
        </tr>
    </table>
</html>

