<?php
session_start();

include_once '../bd/conexion.php';

//cuando se presiona el boton enviar valida usuario
if(isset($_POST["enviar"])){
	$pass=$_POST['pass'];
	$user=$_POST['user'];
	$strQry="select * from usuario where nombre = '".mysqli_real_escape_string($link,$user)."'";

	#hace query para tomar la fila del usuario
	if($result= mysqli_query($link,$strQry)){
		$registro = mysqli_fetch_array($result);
		$pass2    = $registro['pwd'];
		$cat      = $registro['cat'];
		$usr      = $registro['nombre'];
		#compara el pass de la base de datos con el introducido
		#por el usuario convertido a md5

		if($pass2 == md5($pass)){
			#si es correcto envia hacia la siguiente ventana			
			$_SESSION['usr'] = $usr;
			$_SESSION['cat'] = $cat;
			header("Location: ./menu.php");
		}else{
			echo'<script>'.
			'alert("Usuario y/o contraseña incorrectos.A");'.
			'</script>';
		}
	}else{
			echo'<script>'.
			'alert("Usuario y/o contraseña incorrectos.B");'.
			'</script>';	
	}
}

?>