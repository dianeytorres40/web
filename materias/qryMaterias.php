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
    $clave  = $_POST['clave'];
    $nombre = $_POST['txtNombre']; 
    $especialidad = $_POST['espec']; 

    switch($opcion){        

        case 'add':
            //opción de agregar registro
            $strQry = "INSERT INTO curso (clave,nombre, espId) VALUES ('$clave','$nombre','$especialidad')";            
            $result = mysqli_query($link,$strQry) or die("*** Error al ejecutar el procedimiento almacenado: ".mysqli_error());;                        
            //redirigir el programa al script html de captura de datos
            echo " 
                <script type='text/javascript'>window.location='./shwMaterias.php'</script>
                 ";                        
            break;
        
        case 'upd':
            //opción de modificar registro
            $strQry = "UPDATE curso SET nombre = '$nombre', clave= '$clave' , espId = '$especialidad' WHERE id = $id";            
            error_log($strQry);
            $result = mysqli_query($link,$strQry) or die("*** Error al ejecutar el procedimiento almacenado: ".mysqli_error());;                        
            //redirigir el programa al script html de captura de datos
            echo " 
                <script type='text/javascript'>window.location='./shwMaterias.php'</script>
                 ";                        
            break;

        case 'del':
            //opción de eliminar registro        
            $strQry = 'DELETE FROM curso WHERE id = '.$id;                          
            $result = mysqli_query($link,$strQry) or 
            die('*** Error al ejecutar el procedimiento almacenado: '.mysqli_error());
            header('Location:./shwMaterias.php');
            break;

    }
?>