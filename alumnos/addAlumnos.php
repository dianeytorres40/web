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
    <title>claseDAWEB Agrega Alumno</title>
    <!-- funciones javascript  --> 
    <script type="text/javascript" src="../js/funciones.js"></script>    
    <script type="text/javascript" src="../js/jquery.js"></script>
</head>

<!-- establece foco a la caja de entrada de la clave -->
<body onLoad="javascript: document.getElementById('matricula').focus()">

<!-- nombre de formulario, script a redireccionar y protocolo http de envío al servidor -->
<form id='frmAddAlumnos' action='./qryAlumnos.php' method='POST'>

    <!--tabla html que contenedora de la forma -->
    <table align='center' border="1">
        <tr height='50'><td colspan='2' align='center'>
            <b>Agregando Especialidades</b>
            <input type='hidden' id='txtOpc' name='txtOpc' value='add'>
            </td>
        </tr>   
        <input type='hidden' id='txtId' name='txtId' value=''>                
        <tr>
            <td>Matricula</td>
            <td><input title="Solo numeros" type='number' id='matricula' name='matricula' maxlength="8"></td>
            </tr>
        <tr>
            <td>Nombre</td>
            <td><input type='text' id='txtnombre' name='txtnombre' maxlength="20"></td>
        </tr>
        <tr>
            <td>Apellido Paterno</td>
            <td><input type='text' id='paterno' name='paterno' maxlength="20"></td>
        </tr>
        <tr>
            <td>Apellido Materno</td>
            <td><input type='text' id='materno' name='materno' maxlength="20"></td>
        </tr>
        <tr>
            <td>Edad</td>
            <td><input type='number' id='edad' name='edad' maxlength="20"></td>
        </tr>
        <tr>
            <td>Especialidad</td>
            <td>
                <?php
                    $sql = "SELECT id, nombre FROM especialidad";
                    $result = mysqli_query($link,$sql);         
                    echo "<select name='especialidad' id='especialidad' value=''>";
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
            <!-- <input type='button' id='btnGrabar' name='btnGrabar' value='Grabar' style='width: 100px' onClick='grabarAlumno()'> -->
            <input type='button' id='btnGrabar' name='btnGrabar' value='Grabar' style='width: 100px' onClick='validaAlumno2()'>
        </td>
        <td colspan='2' align='center'>
            <input type='button' id='btnRegresar' name='btnRegresa' value='Regresar' style='width: 100px' onClick='regresarShwAlumnos()'>            
        </td>
    </tr>
    </table>
</form>
</body>
</html>


