<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/x-icon" href="../imagenes/logo.jpg">
	<link rel="stylesheet" type="text/css" href="./listaJuegos.css"/> 
	<title></title>
</head>
<body>

<?php 
 $conexion=mysqli_connect("localhost","root","","paginaajuegos") or die("Problemas con la conexión");
		if(!isset($_GET['id'])){
			header("location:./indexA.php");
			exit;
		}
   $id=$_GET['id'];
 ?>

<center><h2>Biblioteca:</h2></center>
<button onclick="location.href='./indexA.php'">Volver atras</button>

<center><div id="biblio">
<?php
$sql=$conexion->query("SELECT * FROM usuario WHERE id_usuario=$id");
while($datos=$sql->fetch_object()){ 
	$biblioteca=mysqli_query($conexion,"SELECT id_ventas,t1.id_juego,nombreJuego,id_usuario FROM biblioteca t1
		INNER JOIN juego t2 ON t1.id_juego =t2.id_juego
		WHERE t1.id_usuario=$id");
		?>
		<?php
	while($reg=mysqli_fetch_array($biblioteca)){
		  echo "<br>";     
          echo "".$reg['nombreJuego'];
          echo "<br>";
	}
}   
?>
</div></center>
</body>
</html>