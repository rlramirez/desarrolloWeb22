<?php
	extract($_POST);
	include ('../dll/config.php');
	include ('../dll/class_mysqli.php');

	$conexion= new clase_mysqli();
	$conexion->conectar(DBHOST, DBUSER, DBPASS, DBNAME);
	$resutConsulta=$conexion->consulta("update usuarios set nombres='$nombres', apellidos='$apellidos', correo='$correo', ci='$cedula', rol='$rol' where id= $idUser");
	echo "<script>location.href='usuarios.php'</script>";
	
?>
