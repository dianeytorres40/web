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
    if($clave == "cursoid"){
        $materiaAux="SELECT id FROM curso WHERE nombre ='".$_GET['varTxtLike']."'";
        $tablaMateria	 = mysqli_query($link,$materiaAux) or die("*** Error al ejecutar el procedimiento almacenado: ".mysqli_error());   
        $rowMateria = mysqli_fetch_array($tablaMateria);  
        $txtLike 	= $rowMateria['id'];
        
    }
    else{
        $txtLike 	= $_GET['varTxtLike'];
    }

    

    //query sql con criterio de busqueda, obtiene todos los registros ordenados por nombre
    $strQry = "SELECT * FROM calificaciones WHERE $clave LIKE '$txtLike%' ORDER BY id";
    error_log($strQry);
    //variable sesion para ser usada en los reportes
    $_SESSION['strQry'] = $strQry;
    
    $tablaBD = mysqli_query($link,$strQry) or die("*** Error al ejecutar el procedimiento almacenado: ".mysqli_error());                        
    
    echo "
    <div id='divScroll'  style='overflow:auto; 
                         align-content:center; 
                         margin-left:auto; 
                         margin-right:auto;
                         overflow-x: hidden;'>
    <table align='center' border='1' width='100%'>            
        <thead> 
            <tr style='background-color: #BAB7B7'>
                <th width='50' height='20'>Nombre</th>
                <th height='20'>Matricula</th>
                <th height='20'>Materia</th>
                <th height='20'>Maestro</th>
                <th height='20'>Ciclo</th>
                <th height='20'>Año</th>
                <th height='20'>Calificacion</th>
            </tr>
        </thead>  
        <tbody style='overflow:auto;'>
                          
        ";
        //desplegar los registros de la tabla Calificaciones de la bd
        while ($registro = mysqli_fetch_array($tablaBD)) {

            $id      = $registro['id'];
            $matricula   = $registro['matricula'];
            $ciclo = $registro['ciclo'];
            $ano = $registro['ano'];
            $calificacion = $registro['calificacion'];
            //
            $auxQry= "SELECT nombre FROM curso WHERE id = '".$registro['cursoid']."'";
            $tablaAux = mysqli_query($link,$auxQry) or die("*** Error al ejecutar el procedimiento almacenado: ".mysqli_error());
            $row = mysqli_fetch_array($tablaAux);
            $curso= $row['nombre'];
            //
            $aux2Qry= "SELECT nombre FROM alumno WHERE matricula = '".$registro['matricula']."'";
            $tabla2Aux = mysqli_query($link,$aux2Qry) or die("*** Error al ejecutar el procedimiento almacenado: ".mysqli_error());
            $row2 = mysqli_fetch_array($tabla2Aux);
            $nombre= $row2['nombre'];
            //
            $aux3Qry= "SELECT nombre FROM profesor WHERE id = '".$registro['profesorid']."'";
            $tabla3Aux = mysqli_query($link,$aux3Qry) or die("*** Error al ejecutar el procedimiento almacenado: ".mysqli_error());
            $row3 = mysqli_fetch_array($tabla3Aux);
            $profesor= $row3['nombre'];
            //



            echo "<tr
            onMouseOver='javascript: this.bgColor=\"#BCF5A9\";' 
            onMouseOut='javascript: this.bgColor=\"#FFFFFF\";'
            onClick=\"actualizarCalificaciones('$id', '$nombre', '$matricula', '$calificacion','$curso','$profesor','$ciclo','$ano')\";>
            <td width='50'>$nombre</td>
            <td>$matricula</td>
            <td>$curso</td>
            <td>$profesor</td>
            <td>$ciclo</td>
            <td>$ano</td>
            <td>$calificacion</td>
            </tr>"; //aqui es donde selecciona el registro para modificarlo o eliminarlo                   
        }                
        echo "</tbody></table></div></div>";
?>