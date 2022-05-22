<?php
	extract($_POST);
	include ('../dll/config.php');
	include ('../dll/class_mysqli.php');

	$conexion= new clase_mysqli();
	$conexion->conectar(DBHOST, DBUSER, DBPASS, DBNAME);
	$resutConsulta=$conexion->consulta("insert into usuarios values('','$nombres','$apellidos','$correo','$cedula','$rol')");
	echo "<script>location.href='usuarios.php'</script>";
	
?>
