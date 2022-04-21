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
<?php 
//Declaracion de variables
#una nueva forma de comentar la linea de código
$var1=23;
$var2=3;
$edad=35;
$res=$var1+$var2;
//echo "El resultado es: ".$res;
/*
if ($edad>=18) {
	echo "Ud es mayor de edad ".$edad;
}else{
	echo "Ud es menor de edad ".$edad;	
}*/

for ($i=0; $i < 12; $i++) { 
	$res=5*$i;
	echo "5 * ".$i."=".$res."<br>";
}
$var3=2;
$var4="10";
$result=$var3*$var4;
echo $result;
?>
</body>
</html>