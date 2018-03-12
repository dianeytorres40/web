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
			case 'Calificaciones':
				top.frames['2'].location.href = "calificaciones.html";
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
				<input type="button" value="Ver Calificaciones" style="width: 150px; height: 40px;" onclick="opcion('Calificaciones');">
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