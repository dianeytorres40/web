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
    <title>claseDAWEB Agrega Calificacion</title>
    <!-- funciones javascript  --> 
    <script type="text/javascript" src="../js/funciones.js"></script>    
</head>

<!-- establece foco a la caja de entrada de la clave -->
<body onLoad="javascript: document.getElementById('matricula').focus()">

<!-- nombre de formulario, script a redireccionar y protocolo http de envío al servidor -->
<form id='frmAddCalificacion' action='./qryCalificaciones.php' method='POST'>
<input type="hidden" id="id" name="id" value="">
    <input type="hidden" id="txtNombre" name="txtNombre" naavalue="">
    <!--tabla html que contenedora de la forma -->
    <table align='center' border="1">
        <tr height='50'><td colspan='2' align='center'>
            <b>Agregando Calificaciones</b>
            <input type='hidden' id='txtOpc' name='txtOpc' value='add'>
            </td>
        </tr>   
        <input type='hidden' id='txtId' name='txtId' value=''>                
        <tr>
            <td>Matricula</td>
            <td>
                <?php
                    $sqlMatricula = "SELECT id, matricula FROM alumno";
                    $resultMatricula = mysqli_query($link,$sqlMatricula);         
                    echo "<select name='matricula' id='matricula' value=''>";
                    echo "<option value='' selected>Selecciona Matricula</option>";
                    while ($rowMatricula = $resultMatricula->fetch_assoc()){
                        echo "<option value='".$rowMatricula['matricula']."'>".$rowMatricula['matricula']."</option>";
                    };
                ?>   
                </select>
            </td>
        </tr>
        <tr>
            <td>Materia</td>
            <td>
                <?php
                    $sqlCurso = "SELECT id, nombre FROM curso";
                    $resultCurso = mysqli_query($link,$sqlCurso);         
                    echo "<select name='curso' id='curso' value=''>";
                    echo "<option value='' selected>Selecciona Materia</option>";
                    while ($rowCurso = $resultCurso->fetch_assoc()){
                        echo "<option value='".$rowCurso['id']."'>".$rowCurso['nombre']."</option>";
                    };
                ?>   
                </select>
            </td>
        </tr>
        <tr>
            <td>Maestro</td>
            <td>
                <?php
                    $sqlProfesor = "SELECT id,nombre FROM profesor";
                    $resultProfesor = mysqli_query($link,$sqlProfesor);         
                    echo "<select name='profesor' id='profesor' value=''>";
                    echo "<option value='' selected>Selecciona Maestro</option>";
                    while ($rowProfesor = $resultProfesor->fetch_assoc()){
                        echo "<option value='".$rowProfesor['id']."'>".$rowProfesor['nombre']."</option>";
                    };
                ?>   
                </select>
            </td>
        </tr>
        <tr>
            <td>Ciclo</td>
            <td>
                <select name="ciclo" id="ciclo">
                    <option value="" selected>Selecciona Ciclo</option>
                    <option value="Verano">Verano</option>
                    <option value="Invierno">Invierno</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>Ano</td>
            <td>
                <select name="ano" id="ano">
                    <option value="" selected>Selecciona Ano</option>
                    <option value="2018">2018</option>
                    <option value="2017">2017</option>
                    <option value="2016">2016</option>
                    <option value="2015">2015</option>
                    <option value="2014">2014</option>
                    <option value="2013">2013</option>
                    <option value="2012">2012</option>
                    <option value="2011">2011</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>Calificacion</td>
            <td>
                <input id="calificacion" name="calificacion" type="number" max="100" min="0" value="0">
            </td>
        </tr>

    </table>

    <!--tabla html que contenedora de botones grabar y regresar -->
    <table align="center">
    <tr height="50px">
        <td align='center'>
            <input type='button' id='btnGrabar' name='btnGrabar' value='Grabar' style='width: 100px' onClick='grabarCalificacion()'>
        </td>
        <td colspan='2' align='center'>
            <input type='button' id='btnRegresar' name='btnRegresa' value='Regresar' style='width: 100px' onClick='regresarShwCalificaciones();'>            
        </td>
    </tr>
    </table>
</form>
</body>
</html>


