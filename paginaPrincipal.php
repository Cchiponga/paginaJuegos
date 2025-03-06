<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="pagina_principal.css"/> 
  <link rel="icon" type="image/x-icon" href="./imagenes/logo.jpg">
	<title>Pagina Principal</title>
</head>
<body>

<?php
  $conexion=mysqli_connect("localhost","root","","paginaajuegos") or
   die("Problemas con la conexión");
   session_start();
   ?>



<center><div id=botones>
<button class="botones" onclick="location.href='./php/bibloteca.php'">Bibloteca</button>
<button class="botones" onclick="location.href='./tiendaPrincipal.php'">Tienda Principal</button>

<button class="botonCarrito" onclick="location.href='carrito.php'">
<img src="./imagenes/carrito.png" class="carrito">
</button>



<center><div id="buscador">
<form id="busca" method="POST">
  <input type="text" name="buscar">
  <input type="submit" name="enviar" value="Buscador">
</form>
</div></center>

<form  id="logout" method="POST" action="./index.php">
 <input type="submit" name="LogOut" value="Logout">
 </form>


<div id="comprar">
<?php
 if(isset($_POST['enviar'])){
  $busqueda=$_POST['buscar'];
  $conexion=mysqli_connect("localhost","root","","paginaajuegos") or die("Problemas con la conexión");
  $sql=mysqli_query($conexion,"SELECT id_juego,nombreJuego,precio FROM juego WHERE nombreJuego LIKE '%$busqueda%'");

  while($row=$sql->fetch_array()){
  	echo $row['nombreJuego'].'<br>';
  	echo "Precio: 	$".$row['precio'].'<br>';
  	  echo '<form method="post" action="./php/add.php">';
  	  echo '<button type="submit" name="juegoid" value="'.$row['id_juego'].'">Añadir a carrito</button>';
      echo '</form>';
      echo "<br>";
  }
 }
 ?>
 </div>

</table>
</div></center>


</body>
<footer>
</footer>
</html>