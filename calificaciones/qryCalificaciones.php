<?php    

    //verificar usuario válido
   session_start();
    if(empty($_SESSION['usr'])){
            echo "Debe autentificarse";
            exit();
    }
    
    //agregar codigo común
    include '../bd/conexion.php';

    //recuperar datos de interfaz html
    $opcion = $_POST['txtOpc'];
    $id = $_POST['txtId'];
    $matricula = $_POST['matricula'];
    $txtNombre = $_POST['txtNombre'];
    $calificacion = $_POST['calificacion'];
    $curso = $_POST['curso'];
    $profesor = $_POST['profesor'];
    $ciclo = $_POST['ciclo'];
    $ano = $_POST['ano'];
    switch($opcion){        

        case 'add':
            //opción de agregar registro
            $strQry = "INSERT INTO calificaciones (matricula, cursoid, profesorid, ciclo,ano, calificacion) VALUES ('$matricula','$curso','$profesor','$ciclo', '$ano','$calificacion')";            
            error_log($strQry);
            $result = mysqli_query($link,$strQry) or die("*** Error al ejecutar el procedimiento almacenado: ".mysqli_error());;                        
            //redirigir el programa al script html de captura de datos
            echo " 
                <script type='text/javascript'>window.location='./shwCalificaciones.php'</script>
                 ";                        
            break;
        
        case 'upd':
            //opción de modificar registro 
            $strQry = "UPDATE calificaciones SET calificacion='$calificacion' , cursoid = (SELECT id FROM curso WHERE nombre= '$curso'), ciclo ='$ciclo', ano= '$ano', profesorid = (SELECT id FROM profesor WHERE nombre= '$profesor')  WHERE id = '$id'";               
            $result = mysqli_query($link,$strQry) or die("*** Error al ejecutar el procedimiento almacenado: ".mysqli_error());;
            echo " 
                <script type='text/javascript'>window.location='./shwCalificaciones.php'</script>
                 ";                        
            break;

        case 'del':
            //opción de eliminar registro        
            $strQry = 'DELETE FROM calificaciones WHERE id = '.$id;                          
            $result = mysqli_query($link,$strQry) or 
            die('*** Error al ejecutar el procedimiento almacenado: '.mysqli_error());
            header('Location:./shwCalificaciones.php');
            break;

    }
?>