<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="biblio.css"/> 
	<link rel="icon" type="image/x-icon" href="../imagenes/logo.jpg">
	<title></title>
</head>
<body>

<?php 
 $conexion=mysqli_connect("localhost","root","","paginaajuegos") or die("Problemas con la conexión");
 session_start();

  $id=$_SESSION['id_usuario'];
 ?>

<center><p>Juegos en la biblioteca:</p></center>
<button onclick="location.href='../paginaPrincipal.php'">Volver atras</button>

<center><div id="biblio">
<?php
$sql=$conexion->query("SELECT * FROM usuario WHERE id_usuario=$id");

while($datos=$sql->fetch_object()) { 
	$biblioteca=mysqli_query($conexion,"SELECT t1.id_juego,nombreJuego,desarrollador,genero,distribuidor FROM biblioteca t1
		INNER JOIN juego t2 ON t1.id_juego =t2.id_juego
		INNER JOIN desarrollador t3 ON t2.id_desarrollador = t3.id_desarrollador
		INNER JOIN genero t4 ON t2.id_genero = t4.id_genero
		INNER JOIN distribuidor t5 ON t2.id_distribuidor = t5.id_distribuidor
		WHERE t1.id_usuario=$id");
		?>
		<?php
	while($reg=mysqli_fetch_array($biblioteca)){
		  echo "<br>";     
		  echo "Nombre:".$reg['nombreJuego']."<br>";
		  echo "Desarrollador: ".$reg['desarrollador'];
		  echo "<br>";     
          echo "Distribuidor: ".$reg['distribuidor'];
          echo "<br>";     
		  echo "Genero: ".$reg['genero'];
	 	  echo "<br>";
	}
}    


?>
</div></center>

</body>
</html>
