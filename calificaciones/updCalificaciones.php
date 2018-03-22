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
    $txtNombre = $_POST['txtNombre'];
    $matricula = $_POST['matricula'];
    $calificacion = $_POST['calificacion'];
    $curso = $_POST['curso'];
    $profesor = $_POST['profesor'];
    $ciclo = $_POST['ciclo'];
    $ano = $_POST['ano'];
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
<form id='frmUpdCalificacion' action='qryCalificaciones.php' method='POST'>

    <!--tabla html que contenedora de la forma -->
    <table align='center' width='400'>
        <tr height='100'><td colspan='2' align='center'>
            <b>Modificando Alumno</b>
            <!-- objetos necesarios para la forma del qryEspecialidades -->
            <input type='hidden' id='txtOpc' name='txtOpc' value=''>
            <input type='hidden' id='txtId' name='txtId' value='<?php echo($id);?>'>
            <input type='hidden' id='matricula' name='matricula' value='<?php echo($matricula);?>'>
            <input type='hidden' id='txtNombre' name='txtNombre' value='<?php echo($txtNombre);?>'>
            <input type='hidden' id='calificacion' name='calificacion' value='<?php echo($calificacion);?>'>
            <input type='hidden' id='curso' name='curso' value='<?php echo($curso);?>'>
            <input type='hidden' id='profesor' name='profesor' value='<?php echo($profesor);?>'>
            <input type='hidden' id='ciclo' name='ciclo' value='<?php echo($ciclo);?>'>
            <input type='hidden' id='ano' name='ano' value='<?php echo($ano);?>'>
            </td>
        </tr>                    
        <tr>
            <td>Matricula</td>
            <td><?php echo($matricula);?></td>
        </tr>
        <tr>
            <td>Nombre</td>
            <td><?php echo($txtNombre);?></td>
        </tr>
        <tr>
            <td>Curso</td>
            <td>
                <?php 
                    $sql = "SELECT nombre FROM curso";
                    $result = mysqli_query($link,$sql);
                    echo "<select name='curso' id='curso' value='$curso'>";
                    while ($row = $result->fetch_assoc()){
                        echo "<option value='".$row['nombre']."'>".$row['nombre']."</option>";
                    };
                    echo "</select>"
                ?>        
            </td>
        </tr>
        <tr>
            <td>Profesor</td>
            <td>
                <?php 
                    $sql = "SELECT nombre FROM profesor";
                    $result = mysqli_query($link,$sql);
                    echo "<select name='profesor' id='profesor' value='$profesor'>";
                    while ($row = $result->fetch_assoc()){
                        echo "<option value='".$row['nombre']."'>".$row['nombre']."</option>";
                    };
                    echo "</select>"
                ?>        
            </td>
        </tr>
        <tr>
            <td>Ciclo</td>
            <td><input type='text' id='ciclo' name='ciclo' value='<?php echo($ciclo);?>'></td>
        </tr>
        <tr>
            <td>Ano</td>
            <td><input type='text' id='ano' name='ano' value='<?php echo($ano);?>'></td>
        </tr>
        <tr>
            <td>Calificacion</td>
            <td><input type='number' min="0" max="100" id='calificacion' name='calificacion' value='<?php echo($calificacion);?>'></td>
        </tr>
        <tr height='100'>
            <td colspan='2' align='center'>
                <table border='1'>
                <tr>
                    <td><input type='button' id='btnGrabar' name='btnGrabar' value='Grabar' style='width: 100px' onClick='enviar("updCal")'></td>
                    <td><input type='button' id='btnEliminar' name='btnEliminar' value='Eliminar' style='width: 100px' onClick='enviar("delCal")'></td>
                    <td><input type='button' id='btnRegresar' name='btnRegresar' value='Regresar' style='width: 100px' onClick='enviar("backCal")'></td>
                </tr>
            </td>
        </tr>
    </table>
</html>

