<html>
<head>
<title>CARRITO</title>
<link rel="icon" type="image/x-icon" href="./imagenes/logo.jpg">
<link rel="stylesheet" type="text/css" href="carrito.css"/> 
</head>
<body>
<?php

$conexion=mysqli_connect("localhost","root","","paginaajuegos") or
    die("Problemas con la conexión");
 
 session_start();


  $id=$_SESSION['id_usuario'];

$registros=mysqli_query($conexion,"SELECT id_carrito,t1.id_juego,t2.nombreJuego,precio from carrito t1
                          INNER JOIN juego t2 ON t1.id_juego = t2.id_juego") or
  die("Problemas en el select:".mysqli_error($conexion));

?>

<center><div id="carrito">

<?php
while ($reg=mysqli_fetch_array($registros))
{  
  echo "<br>";     
  echo "Nombre:".$reg['nombreJuego']."<br>";
  echo "Precio: $".$reg['precio']."<br>";
  echo "<br>";
  echo '<form method="POST" action="./tiendaPrincipal.php">';
  echo '<button name="borrar_delCarrito" value="'.$reg['id_carrito'].'">Borrar del Carrito</button>';
  echo '</form>';
  echo"<br>";

  $id =$reg['id_juego'];
  
  }
  ?>
    <form method="POST" action="./php/comprar.php">
    <button type="submit" name="juego">COMPRAR</button>
    </form>
  <?php  
  $sum=mysqli_query($conexion,"SELECT SUM(precioJuego) from carrito");
      while($reg=mysqli_fetch_array($sum)){
        echo "Precio Total: $".$reg['SUM(precioJuego)'];
   }



?>

</div></center>
<center><div id="botones">


<?php

 echo '<form method="post" action="./paginaPrincipal.php">';
 echo '<button type="submit" name="borrarCarrito" >Borrar Carrito</button>';
 echo '<button type="submit" name="volver_atras" >Volver Atras</button>';
 echo '</form>';
?>  
</div></center>
</body>
</html>