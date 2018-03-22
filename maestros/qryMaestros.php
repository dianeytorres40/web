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
    $id     = $_POST['txtId'];
    $nombre = $_POST['txtNombre']; 

    switch($opcion){        

        case 'add':
            //opción de agregar registro
            $strQry = "INSERT INTO profesor (nombre) VALUES ('$nombre')";            
            $result = mysqli_query($link,$strQry) or die("*** Error al ejecutar el procedimiento almacenado: ".mysqli_error());;                        
            //redirigir el programa al script html de captura de datos
            echo " 
                <script type='text/javascript'>window.location='./shwMaestros.php'</script>
                 ";                        
            break;
        
        case 'upd':
            //opción de modificar registro
            $strQry = "UPDATE profesor SET nombre = '$nombre' WHERE id = $id";            
            $result = mysqli_query($link,$strQry) or die("*** Error al ejecutar el procedimiento almacenado: ".mysqli_error());;                        
            //redirigir el programa al script html de captura de datos
            echo " 
                <script type='text/javascript'>window.location='./shwMaestros.php'</script>
                 ";                        
            break;

        case 'del':
            //opción de eliminar registro        
            $strQry = 'DELETE FROM especialidad WHERE id = '.$id;                          
            $result = mysqli_query($link,$strQry) or 
            die('*** Error al ejecutar el procedimiento almacenado: '.mysqli_error());
            header('Location:./shwEspecialidades.php');
            break;

    }
?>