<?php
	extract($_GET);
	include ('../dll/config.php');
	include ('../dll/class_mysqli.php');

	$conexion= new clase_mysqli();
	$conexion->conectar(DBHOST, DBUSER, DBPASS, DBNAME);
	$resutConsulta=$conexion->consulta("delete from usuarios where id= $idUser");
	echo "<script>location.href='usuarios.php'</script>";
	
?>
