<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Mi primer ejemplo de PHP</title>
	<link rel="stylesheet" type="text/css" href="../css/estilos.css">
</head>
<body>
	<div class="contenedor1">	
		<nav class="menuTop">
			<a href="">099999544</a>
			<a href="">info@gmail.com</a>
		</nav>
	</div>
	<header class="cabeceraPrincipal">
		<img src="../images/logoapp.png" alt="logo-Restaurante" title="Logo Restaurante">
	</header>
	<div class="contenedor1">
		<nav class="menuPrincipal">
			<a href="../index.php">Inicio</a>
			<a href="internas/menu.php">Menu</a>
			<a href="usuarios.php">Usuarios</a>
			<a href="validar.php">Validad edad</a>
			<a href="contactos.php">Contactos</a>
			<a href="login.php">Login</a>
		</nav>
	</div>

	<main>
		<h2>Usuarios del restaurante</h2>
		<h3><a href="nuevoUser.php">Nuevo Usuario</a></h3>
		<?php
			include ('../dll/config.php');
			include ('../dll/class_mysqli.php');

			$conexion= new clase_mysqli();
			$conexion->conectar(DBHOST, DBUSER, DBPASS, DBNAME);
			$resutConsulta=$conexion->consulta("select* from usuarios ");
			$conexion->verconsultacrud();
			
		?>
		
	</main>
	<footer class="footerPrincipal">
		<h6>Derechos Reservados UTPL 2022</h6>
	</footer>
</body>
</html>