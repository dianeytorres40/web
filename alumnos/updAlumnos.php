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
    $id = $_POST['txtId'];
    $matricula = $_POST['matricula'];
    $txtnombre = $_POST['txtnombre'];
    $especialidad = $_POST['especialidad'];
    $edad = $_POST['edad'];
    $paterno = $_POST['paterno'];
    $materno = $_POST['materno'];
?>    
<html>
<head>
    <title></title>
    <!-- funciones javascript  --> 
    <script type="text/javascript" src="../js/funciones.js"></script>     
    <script type="text/javascript" src="../js/jquery.js"></script>   
</head>

<!-- establece foco a la caja de entrada del nombre de la especialidad -->
<body onLoad='javascript: document.getElementById("txtnombre").focus()'>

<!-- nombre de formulario, script a redireccionar y protocolo http de envío al servidor -->
<form id='frmUpdAlumno' action='qryAlumnos.php' method='POST'>

    <!--tabla html que contenedora de la forma -->
    <table align='center' width='400'>
        <tr height='100'><td colspan='2' align='center'>
            <b>Modificando Alumno</b>
            <!-- objetos necesarios para la forma del qryEspecialidades -->
            <input type='hidden' id='txtOpc' name='txtOpc' value=''>
            <input type='hidden' id='txtId' name='txtId' value='<?php echo($id);?>'>
            <input type='hidden' id='matricula' name='matricula' value='<?php echo($matricula);?>'>
            <input type='hidden' id='txtnombre' name='txtnombre' value='<?php echo($txtnombre);?>'>
            <input type='hidden' id='paterno' name='paterno' value='<?php echo($paterno);?>'>
            <input type='hidden' id='materno' name='materno' value='<?php echo($materno);?>'>
            <input type='hidden' id='especialidad' name='especialidad' value='<?php echo($especialidad);?>'>
            <input type='hidden' id='edad' name='edad' value='<?php echo($edad);?>'>
            </td>
        </tr>                    
        <tr>
            <td>Matricula</td>
            <td><?php echo($matricula);?></td>
        </tr>
        <tr>
            <td>Nombre</td>
            <td><input type='text' id='txtnombre' name='txtnombre' value='<?php echo($txtnombre);?>'></td>
        </tr>
        <tr>
            <td>Apellido Paterno</td>
            <td><input type='text' id='paterno' name='paterno' value='<?php echo($paterno);?>'></td>
        </tr>
        <tr>
            <td>Apellido Materno</td>
            <td><input type='text' id='materno' name='materno' value='<?php echo($materno);?>'></td>
        </tr>
        <tr>
            <td>Especialidad</td>
            <td>
            <?php
                $sql = "SELECT nombre FROM especialidad";
                $result = mysqli_query($link,$sql);         
                echo "<select name='especialidad' id='especialidad' >";
                echo "<option value='".$especialidad."' selected>".$especialidad."</option>";
                while ($row = $result->fetch_assoc()){
                    echo "<option value='".$row['nombre']."'>".$row['nombre']."</option>";
                };
                ?>   
                </select>
            </td>
        </tr>
        
        <tr>
            <td>Edad</td>
            <td><input type='text' id='edad' name='edad' value='<?php echo($edad);?>'></td>
        </tr>
        <tr height='100'>
            <td colspan='2' align='center'>
                <table border='1'>
                <tr>
                    <td><input type='button' id='btnGrabar' name='btnGrabar' value='Grabar' style='width: 100px' onClick='enviar("updAlu")'></td>
                    <td><input type='button' id='btnEliminar' name='btnEliminar' value='Eliminar' style='width: 100px' onClick='enviar("delAlu")'></td>
                    <td><input type='button' id='btnRegresar' name='btnRegresar' value='Regresar' style='width: 100px' onClick='enviar("backAlu")'></td>
                </tr>
            </td>
        </tr>
    </table>
</html>

