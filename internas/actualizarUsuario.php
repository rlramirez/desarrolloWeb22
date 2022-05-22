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

		<?php
			extract($_GET);
			include ('../dll/config.php');
			include ('../dll/class_mysqli.php');

			$conexion= new clase_mysqli();
			$conexion->conectar(DBHOST, DBUSER, DBPASS, DBNAME);
			$resutConsulta=$conexion->consulta("select* from usuarios where id= $idUser");
			$listaUser=$conexion->consulta_lista();
			
			$listaRol[1]="Administrador";
			$listaRol[2]="Comensal";
		?>
		<form method="post" action="updateUser.php">
			<input type="hidden" name="idUser" value="<?php echo $listaUser[0]; ?>"><br>
			<input type="text" name="nombres" value="<?php echo $listaUser[1]; ?>"><br>
			<input type="text" name="apellidos" value="<?php echo $listaUser[2]; ?>"><br>
			<input type="text" name="correo" value="<?php echo $listaUser[3]; ?>"><br>
			<input type="text" name="cedula" value="<?php echo $listaUser[4]; ?>"><br>

			<select name="rol">
				<option value="<?php echo $listaUser[5]; ?>"><?php echo $listaRol[$listaUser[5]]; ?></option>
				<option value="1">Administrador</option>
				<option value="2">Comensal</option>
			</select><br>
			<input type="submit" name="" value="Actualizar">
		</form>
	</main>
	<footer class="footerPrincipal">
		<h6>Derechos Reservados UTPL 2022</h6>
	</footer>
</body>
</html>