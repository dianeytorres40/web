<?php
	session_start();
	if(empty($_SESSION['usr'])){
		echo "Debe autentificarse";
	}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title></title>
<script type="text/javascript" >
	function opcion(opc){		
		switch (opc) {			
			case 'Especialidades':
				top.frames['2'].location.href = "../especialidades/shwEspecialidades.php";
				break;		
			case 'Materias':
				top.frames['2'].location.href = "../materias/shwMaterias.php";
				break;
			case 'Alumnos':
				top.frames['2'].location.href = "../alumnos/shwAlumnos.php";
				break;
			case 'Calificaciones':
				top.frames['2'].location.href = "../calificaciones/shwCalificaciones.php";
				break;
			case 'Maestros':
				top.frames['2'].location.href = "../maestros/shwMaestros.php";
				break;
			case 'Terminar':
				window.top.location.href = "http://www.its.mx";
				break;													
		}		
		opc="";
	}
</script>
<style type="text/css">
	.tama�oBoton{
		width: 	150px;	
		height: 40px;
		}
</style>
</head>
<body>
	<table align="center">
		<tr>
			<td>
				<input type="button" value="Especialidades" class="tama�oBoton" onclick="opcion('Especialidades');">
			</td>
		</tr>
		<tr>
			<td>
				<input type="button" value="Materias" class="tama�oBoton" onclick="opcion('Materias');">
			</td>
		</tr>
		<tr>
			<td>
				<input type="button" value="Alumnos" style="width: 150px; height: 40px;" onclick="opcion('Alumnos');">				                                      
			</td>
		</tr>
		<tr>
			<td>
				<input type="button" value="Calificaciones" style="width: 150px; height: 40px;" onclick="opcion('Calificaciones');">
			</td>
		</tr>		
		<tr>
			<td>
				<input type="button" value="Maestros" style="width: 150px; height: 40px;" onclick="opcion('Maestros');">
			</td>
		</tr>					
		<tr style="height: 200px">
			<td>
				<input type="button" value="Terminar" style="width: 150px; height: 40px;" onclick="opcion('Terminar');">
			</td>
		</tr>	
	</table>
</body>
</html>