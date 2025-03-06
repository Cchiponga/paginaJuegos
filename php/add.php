<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>

	<?php 
			$conexion=mysqli_connect("localhost","root","","paginaajuegos") or
			    die("Problemas con la conexión");
			session_start();

			$id= $_POST['juegoid'];
 	
			$sql=mysqli_query($conexion,"SELECT precio FROM juego WHERE id_juego= '{$id}'");
			$precio = mysqli_fetch_assoc($sql);
			$numero = $precio ['precio'];

			$registros=mysqli_query($conexion,"SELECT * FROM carrito") or die("Problemas en el select:".mysqli_error($conexion));


			mysqli_query($conexion,"INSERT INTO carrito(id_carrito,precioJuego,id_juego) VALUES (NULL,$numero,'$id')") or 
			die("Problemas en el select".mysqli_error($conexion));

			

			    header("Location:../carrito.php");	
		

	 ?>



</body>
</html>