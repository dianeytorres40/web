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
    $txtnombre = $_POST['txtnombre'];
    $especialidad = $_POST['especialidad'];
    $edad = $_POST['edad'];
    $paterno = $_POST['paterno'];
    $materno = $_POST['materno'];

    switch($opcion){        

        case 'add':
            //opción de agregar registro
            $strQry = "INSERT INTO alumno (matricula, nombre, apaterno, amaterno, edad, especialidad) VALUES ('$matricula','$txtnombre','$paterno','$materno', '$edad','$especialidad')";            
            error_log($strQry);
            $result = mysqli_query($link,$strQry) or die("*** Error al ejecutar el procedimiento almacenado: ".mysqli_error());;                        
            //redirigir el programa al script html de captura de datos
            echo " 
                <script type='text/javascript'>window.location='./shwAlumnos.php'</script>
                 ";                        
            break;
        
        case 'upd':
            //opción de modificar registro 
            $strQry = "UPDATE alumno SET matricula='$matricula' , nombre = '$txtnombre', apaterno ='$paterno', amaterno ='$materno', edad= '$edad', especialidad = (SELECT id FROM especialidad WHERE nombre= '$especialidad')  WHERE id = '$id'";               
            $result = mysqli_query($link,$strQry) or die("*** Error al ejecutar el procedimiento almacenado: ".mysqli_error());;
            echo " 
                <script type='text/javascript'>window.location='./shwAlumnos.php'</script>
                 ";                        
            break;

        case 'del':
            //opción de eliminar registro        
            $strQry = 'DELETE FROM alumno WHERE id = '.$id;                          
            $result = mysqli_query($link,$strQry) or 
            die('*** Error al ejecutar el procedimiento almacenado: '.mysqli_error());
            header('Location:./shwAlumnos.php');
            break;

    }
?>