<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="admin.css"/> 
	<title>Admin</title>
</head>
<body>

	<div class="container">
		<h2>Lista de clientes</h2>
		<br>
		<center><a class="btn" href="./crearUsuario.php" role="button">Nuevo Cliente</a></center>
		<br>	
		<table class="table">
			<thead>
				<tr>
					<th>ID</th>
					<th>Usuario</th>
					<th>Contraseña</th>
					<th>Email</th>	
					<th>Servicios</th>
	   			</tr>
	   		</thead>	
	   		<tbody>
	   			<?php
	   			$conexion=mysqli_connect("localhost","root","","paginaajuegos") or
   					 die("Problemas con la conexión");

   				$sql="SELECT * FROM usuario";
   				$resultado= $conexion->query($sql);
   				if(!$resultado){
   					die("Query invalida: ".$conexion->error);
   				}

   				while($row=$resultado->fetch_assoc()){
   					echo "
   					<tr>
	   				<td>$row[id_usuario]</td>
	   				<td>$row[usuario]</td>
	   				<td>$row[contraseña]</td>
	   				<td>$row[mail]</td>
	   				<td>
	   				<a class='boton' href='./editarUsuario.php?id=$row[id_usuario]'>EDITAR</a>		
	   				<a class='btn' href='./borrarUsuario.php?id=$row[id_usuario]'>BORRAR</a>
	   				<a class='btn' href='./listaJuegos.php?id=$row[id_usuario]'>JUEGOS</a>
	   				</td>
	   		   	    </tr>
   					";
   				}
	   			?>
	   		</tbody>	
		</table>	
	<center><a href="../index.php">Inicio</a></center>
<br>
</body>
</html>