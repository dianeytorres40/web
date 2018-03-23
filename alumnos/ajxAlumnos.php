<?php
	
	//verificar usuario válido
    session_start();
    if(empty($_SESSION['usr'])){
            echo "Debe autentificarse";
            exit();
    }
    
    //agregar codigo común
    include '../bd/conexion.php';

    //recuperar los datos de la interfaz html
    $clave 		= $_GET['varAtributo'];
    $txtLike 	= $_GET['varTxtLike'];

    //query sql con criterio de busqueda, obtiene todos los registros ordenados por nombre
    $strQry = "SELECT * FROM alumno WHERE $clave LIKE '$txtLike%' ORDER BY id";

    //variable sesion para ser usada en los reportes
    $_SESSION['strQry'] = $strQry;
    
    $tablaBD	 = mysqli_query($link,$strQry) or die("*** Error al ejecutar el procedimiento almacenado: ".mysqli_error());;                        

    echo "
    <div id='divScroll'  style='overflow:auto; 
                         align-content:center; 
                         margin-left:auto; 
                         margin-right:auto;
                         overflow-x: hidden;'>
    <table align='center' border='1' width='400'>            
        <thead style='position: fixed !important;'> 
            <tr style='background-color: #BAB7B7'>
                <th width='50' height='20'>Clave</th>
                <th height='20'>Nombre</th>
            </tr>
        </thead>  
        <tbody style='overflow:auto;'>
        <tr><td colspan='2'>&nbsp</td></tr>                    
        ";
        //desplegar los registros de la tabla Alumnos de la bd
        while ($registro = mysqli_fetch_array($tablaBD)) {
            $id      = $registro['id'];
            $matricula   = $registro['matricula'];
            $nombre  = $registro['nombre'];
            $paterno=$registro['apaterno'];
            $materno=$registro['amaterno'];
            $especialidad= $registro['especialidad'];
            $edad = $registro['edad'];
            echo "<tr onMouseOver='javascript: this.bgColor=\"#BCF5A9\";' onMouseOut='javascript: this.bgColor=\"#FFFFFF\";' onClick=\"actualizarAlumno('$id', '$matricula','$nombre','$paterno','$materno','$especialidad','$edad')\";>
                    <td width='50'>$matricula</td>
                    <td>$nombre&nbsp;$paterno&nbsp;$materno</td>
                    <td>$especialidad</td>
                    <td>$edad</td>
                  </tr>"; //aqui es donde selecciona el registro para modificarlo o eliminarlo           
        }                
        echo "</tbody></table></div></div>";
?>