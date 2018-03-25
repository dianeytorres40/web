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
    if($clave="especialidad"){
        $auxEspecialidad= "SELECT id FROM especialidad WHERE nombre = '".$txtLike."'";
        $tablaEspecialidad = mysqli_query($link,$auxEspecialidad) or die("*** Error al ejecutar el procedimiento almacenado: ".mysqli_error());
        $textoEsp = mysqli_fetch_array($tablaEspecialidad);
        $txtLike= $textoEsp['id'];
    }
    else{
        $txtLike 	= $_GET['varTxtLike'];
    }

    //query sql con criterio de busqueda, obtiene todos los registros ordenados por nombre
    $strQry = "SELECT * FROM alumno WHERE $clave LIKE '$txtLike%' ORDER BY id";
    $auxQry= "SELECT nombre FROM especialidad";
    //variable sesion para ser usada en los reportes
    $_SESSION['strQry'] = $strQry;
    
    $tablaBD	 = mysqli_query($link,$strQry) or die("*** Error al ejecutar el procedimiento almacenado: ".mysqli_error());                        
    
    echo "
    <div id='divScroll'  style='overflow:auto; 
                         align-content:center; 
                         margin-left:auto; 
                         margin-right:auto;
                         overflow-x: hidden;'>
    <table align='center' border='1' width='100%'>            
        <thead> 
            <tr style='background-color: #BAB7B7'>
                <th width='50' height='20'>Matricula</th>
                <th height='20'>Nombre</th>
                <th height='20'>Especialidad</th>
                <th height='20'>Edad</th>

            </tr>
        </thead>  
        <tbody style='overflow:auto;'>
                          
        ";
        //desplegar los registros de la tabla Alumnos de la bd
        while ($registro = mysqli_fetch_array($tablaBD)) {

            $id      = $registro['id'];
            $matricula   = $registro['matricula'];
            $nombre  = $registro['nombre'];
            $paterno=$registro['apaterno'];
            $materno=$registro['amaterno'];
            $auxQry= "SELECT nombre FROM especialidad WHERE id = '".$registro['especialidad']."'";
            $tablaAux = mysqli_query($link,$auxQry) or die("*** Error al ejecutar el procedimiento almacenado: ".mysqli_error());
            $row = mysqli_fetch_array($tablaAux);
            $especialidad= $row['nombre'];
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