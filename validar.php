<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Mi primer ejemplo de PHP</title>
</head>
<body>
	<header>
		<h1>Mi primera app en php</h1>
	</header>
<nav>
	<a href="index.php">Inicio</a>
	<a href="acercade.html">Acerca de</a>
	<a href="validar.php">Validad edad</a>
	<a href="contactos.php">Contactos</a>
</nav>
<h2>Validad tu edad</h2>

<form action="procesar.php" method="post">
	<input type="text" name="nombre" placeholder="Ingrese su nombre"><br>
	<input type="number" name="edad" placeholder="Ingrese su edad"><br>
	<button type="submit">Validar</button>
</form>

</body>
</html>