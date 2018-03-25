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
    
    if($clave=="espId"){
        $auxEspecialidad= "SELECT id FROM especialidad WHERE nombre = '".$_GET['varTxtLike']."'";    
        $tablaEspecialidad = mysqli_query($link,$auxEspecialidad) or die("*** Error al ejecutar el procedimiento almacenado: ".mysqli_error());
        $textoEsp = mysqli_fetch_array($tablaEspecialidad);
        $txtLike= $textoEsp['id'];
        error_log($txtLike);
    }
    else{
        $txtLike 	= $_GET['varTxtLike'];
    }
    //query sql con criterio de busqueda, obtiene todos los registros ordenados por nombre
    $strQry = "SELECT * FROM curso WHERE $clave LIKE '$txtLike%' ORDER BY id";
    //variable sesion para ser usada en los reportes
    error_log($strQry);
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
        <th width='50' height='20'>Clave</th>
        <th height='20'>Nombre</th>
        <th height='20'>Especialidad</th>
        </tr>
    </thead>  
        <tbody style='overflow:auto;'>
                          
        ";
        //desplegar los registros de la tabla Alumnos de la bd
        while ($registro = mysqli_fetch_array($tablaBD)) {

            $id      = $registro['id'];
                $clave   = $registro['clave'];
                $nombre  = $registro['nombre'];
                $shwEsp = "SELECT nombre FROM especialidad WHERE id =".$registro['espId']."";
                $tablaEsp = mysqli_query($link, $shwEsp);
                $rowEsp= mysqli_fetch_array($tablaEsp);
                $especialidad = $rowEsp['nombre'];
                echo "<tr
                onMouseOver='javascript: this.bgColor=\"#BCF5A9\";' 
                onMouseOut='javascript: this.bgColor=\"#FFFFFF\";'
                onClick=\"actualizarCurso($id, '$clave', '$nombre','$especialidad')\";>
                <td width='50'>$clave</td>
                <td>$nombre</td>
                <td>$especialidad</td>
              </tr>"; //aqui es donde selecciona el registro para modificarlo o eliminarlo                      
        }                
        echo "</tbody></table></div></div>";
?>