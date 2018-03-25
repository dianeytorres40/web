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
    $clave         = $_POST['clave'];
    $especialidad = $_POST['espec'];
    $nombre     = $_POST['txtNombre'];
    

?>    
<html>
<head>
    <title></title>
    <!-- funciones javascript  --> 
    <script type="text/javascript" src="../js/funciones.js"></script>  
    <script type="text/javascript" src="../js/jquery.js"></script>      
</head>

<!-- establece foco a la caja de entrada del nombre de la especialidad -->
<body onLoad='javascript: document.getElementById("txtNombre").focus()'>

<!-- nombre de formulario, script a redireccionar y protocolo http de envío al servidor -->
<form id='frmUpdCurso' action='qryMaterias.php' method='POST'>

    <!--tabla html que contenedora de la forma -->
    <table align='center' width='400'>
        <tr height='100'><td colspan='2' align='center'>
            <b>Modificando Maestros</b>
            <!-- objetos necesarios para la forma del qryEspecialidades -->
            <input type='hidden' id='txtOpc' name='txtOpc' value=''>
            <input type='hidden' id='txtId' name='txtId' value='<?php echo($id);?>'>
            <input type='hidden' id='espec' name='espec' value='<?php echo($espec);?>'>
            </td>
        </tr>                    
        <tr>
            <td>Clave</td> 
            <td><input type='text' id='clave' name='clave' value='<?php echo($clave);?>'></td>
        </tr>
        <tr>
            <td>Nombre</td> 
            <td><input type='text' id='txtNombre' name='txtNombre' value='<?php echo($nombre);?>'></td>
        </tr>
        <tr>
            <td>Especialidad</td>
            <td>
            <?php
                $sql = "SELECT id, nombre FROM especialidad";
                $result = mysqli_query($link,$sql);         
                echo "<select name='espec' id='espec' >";
                echo "<option value='' selected>Selecciona Especialidad</option>";
                while ($row = $result->fetch_assoc()){
                    echo "<option value='".$row['id']."'>".$row['nombre']."</option>";
                };
                ?>   
                </select>
            </td>
        </tr>
        <tr height='100'>
            <td colspan='2' align='center'>
                <table border='1'>
                <tr>
                <td><input type='button' id='btnGrabar' name='btnGrabar' value='Grabar' style='width: 100px' onClick='enviar("updCurso")'></td>
                <td><input type='button' id='btnEliminar' name='btnEliminar' value='Eliminar' style='width: 100px' onClick='enviar("delCurso")'></td>
                <td><input type='button' id='btnRegresar' name='btnRegresar' value='Regresar' style='width: 100px' onClick='enviar("backCurso")'></td>
                </tr>
            </td>
        </tr>
    </table>
</html>

