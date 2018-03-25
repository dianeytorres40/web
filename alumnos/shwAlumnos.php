<?php

    //verificar usuario válido
    session_start();
    if(empty($_SESSION['usr'])){
            echo "Debe autentificarse";
            exit();
    }
    //agregar codigo común
    include '../bd/conexion.php';
    //obtener colección de registros temporales
    //query sql sin criterio de busqueda, obtiene todos los registros ordenados por nombre
    $strQry = "SELECT alumno.id, alumno.matricula, alumno.nombre, alumno.apaterno, alumno.amaterno, alumno.edad, especialidad.nombre AS especialidad FROM alumno INNER JOIN especialidad ON alumno.especialidad = especialidad.id"; 
    //variable sesion para ser usada en los reportes, son los registros a imprimir
    $_SESSION['strQry'] = $strQry;
    
    //ejecutar el query
    $tablaBD = mysqli_query($link, $strQry);
    //si existen registros crear tabla
    if (mysqli_num_rows($tablaBD)>0){        
        ?>

        <html>

        <head>       
            <title>claseDAWEB shwEspecialidades</title> 
            <!-- funciones javascript  --> 
            <script type="text/javascript" src="../js/funciones.js"></script>
            <script type="text/javascript" src="../js/jquery.js"></script>
            <link rel="stylesheet" href="../css/estilos.css">
        </head>

        <body>
        <!-- nombre de formulario, script a redireccionar y protocolo http de envío al servidor -->
        <form id='frmUpdAlumno' action='./updAlumnos.php' method='POST'>        
        <!--tabla html que contenedora de botones buscar, imprimir y agregar -->
        <table align='center' width='600' border='0'>
            <tr><td colspan='2' align='center'>

                <!-- obtener los datos seleccionados por el usuario al hacer click
                     en la tabla que muestra los registros, 
                     truco para evitar visitar al servidor de bd -->
                <input type='hidden' id='txtOpc' name='txtOpc' value=''>
                <input type='hidden' id='txtId' name='txtId' value=''>
                <input type='hidden' id='matricula' name='matricula' value=''>
                <input type='hidden' id='txtnombre' name='txtnombre' value=''>
                <input type='hidden' id='especialidad' name='especialidad' value=''>
                <input type='hidden' id='edad' name='edad' value=''>
                <input type='hidden' id='paterno' name='paterno' value=''>
                <input type='hidden' id='materno' name='materno' value=''>
        
                <!-- ventana desplegable con los atributos de la tabla para hacer busquedas -->
                <select id='selBuscar' name='selBuscar' onClick="javascript: document.getElementById('txtBuscar').focus();">
                    <option id='optBuscar' value='matricula'>Matricula</option>
                    <option id='optBuscar' value='nombre'>Nombre</option>
                    <option id='optBuscar' value='especialidad'>Especialidad</option>
                    <option id='optBuscar' value='edad'>Edad</option>
                </select>
                <!-- caja de texto, contiene dato del criterio de busqueda -->
                <input type='text' id='txtBuscar' name='txtBuscar' value=''
                style='width:150px;'>

                <!-- botón de buscar -->
                <input type='button' id='btnBuscar' name='btnBuscar' value='Buscar' onclick='buscarAlumnos();'>

                <!-- botón de agregar -->
                <input type='button' id='btnAgregar' name='btnAgregar' value='Agregar' onclick='agregarAlumnos();'>

                <!-- botón de imprimir -->
                <input type='button' id='btnPrint' name='btnPrint' value='Imprimir' 
                onclick='imprimirMaterias();'>

                

            </td></tr>
        </table>

        <!-- región para alojar la tabla contenedora de registros -->        
        <div id='divTabla' style='align-content:center;margin-left:auto; margin-right:auto;'>

        <!-- region con barra desplazamiento para visualizar los renglones de la tabla -->
        <div id='divScroll'  style='overflow:auto; align-content:center; margin-left:auto; 
                             margin-right:auto; overflow-x: hidden;'>

        <!-- tabla para los titulos de las columnas -->                             
        <table align='center' border='1' width='400' class="table-full">            
            <thead class="table-full"> 
                <tr style='background-color: #BAB7B7'>
                    <th width='50' height='20'>Matricula</th>
                    <th height='20'>Nombre</th>
                    <th height='20'>Especialidad</th>
                    <th height='20'>Edad</th>
                </tr>
            </thead>  

            <!-- cuerpo de la tabla html que contiene los renglones con cada registro de 
                 la tabla de base de datos especialidades -->
            <tbody style='overflow:auto;'>                  

            <?php
            //desplegar los registros de la tabla especialidades de la bd
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
            echo "</tbody>
                  </table>
                  </div>
                  </div>";
        }
        
        else {
            //notificar que no existen registros en la tabla de especialidades
            echo " 
            <table border='0' align='center' bordercolor='#FF3333'>
            <tr><td></td></tr>
            <tr align='center'>
                    <td align='center'><font color='#FF3333'>No existen registros en la tabla de Materias!!</font></td>
                    </tr>
            </table> 
            </div>
            </body>
        ";
        }                
    //cerrar la conexion a la bd
    mysqli_free_result($tablaBD);
    //mysqli_free_result($link, $tablaBD); // libera los registros de la tabla
    mysqli_close($link);    
?>

