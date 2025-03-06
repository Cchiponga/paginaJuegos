<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	 <link rel="stylesheet" type="text/css" href="../singup.css"/> 
	<meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="icon" type="image/x-icon" href="../imagenes/logo.jpg">
	<title>Registrarse</title>
</head>
<body>

<?php
$conexion=mysqli_connect("localhost","root","","paginaajuegos") or
    die("Problemas con la conexión");
include("controladorRegistro.php");    
?>
<center><div id="form">
<div id="titulo">
<h1>Registrarse</h1>
</div>
<div id="input">
<form action="" method="POST">
		<div id="input">
			<input type="text" name="usuario" placeholder="Usuario">
			<input type="password" name="contraseña" placeholder="Password">
			<input type="text" name="mail" placeholder="Email">
		</div>
</div>
	<div id="boton">
	<input type="submit" value="SingUp" class="btn" name="registrarse">
	</div>
<p><a href="../index.php">Volver al Login</a></p>

</div><center>


</form>


</body>
</html>