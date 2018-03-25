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
    <title>claseDAWEB Agrega Materia</title>
    <!-- funciones javascript  --> 
    <script type="text/javascript" src="../js/funciones.js"></script>    
</head>

<!-- establece foco a la caja de entrada de la clave -->
<body onLoad="javascript: document.getElementById('clave').focus()">

<!-- nombre de formulario, script a redireccionar y protocolo http de envío al servidor -->
<form id='frmAddCurso' action='./qryMaterias.php' method='POST'>

    <!--tabla html que contenedora de la forma -->
    <table align='center' border="1">
        <tr height='50'><td colspan='2' align='center'>
            <b>Agregando Materia</b>
            <input type='hidden' id='txtOpc' name='txtOpc' value='add'>
            <input type='hidden' id='txtId' name='txtId' value="">
            </td>
        </tr>                    
        <tr>
            <td>Clave</td>
            <td><input type='text' id='clave' name='clave' title="6 letras que identifiquen la materia" maxlength="6"></td>
            </tr>
        <tr>
            <td>Nombre</td>
            <td><input type='text' id='txtNombre' name='txtNombre' maxlength="20"></td>
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
    </table>

    <!--tabla html que contenedora de botones grabar y regresar -->
    <table align="center">
    <tr height="50px">
        <td align='center'>
            <input type='button' id='btnGrabar' name='btnGrabar' value='Grabar' style='width: 100px' onClick='grabarCurso()'>
        </td>
        <td colspan='2' align='center'>
            <input type='button' id='btnRegresar' name='btnRegresa' value='Regresar' style='width: 100px' onClick='regresarShwCurso()'>            
        </td>
    </tr>
    </table>
</form>
</body>
</html>


