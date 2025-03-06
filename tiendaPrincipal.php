<?php
$conexion=mysqli_connect('localhost','root','','paginaajuegos');

  if(isset($_POST['borrarCarrito'])){
    echo'<script language="javascript">alert("Carrito borrado con exito");</script>';
    mysqli_query($conexion,"TRUNCATE TABLE carrito");
  }

  if(isset($_POST['borrar_delCarrito'])){
  $idcarrito=$_POST['borrar_delCarrito'];
  echo'<script language="javascript">alert("Articulo borrado con exito");</script>';
  mysqli_query($conexion,"DELETE FROM carrito WHERE id_carrito=$idcarrito");
   }

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <link rel="stylesheet" type="text/css" href="tiendaPrincipal.css"/> 
	<title></title>
</head>
<body>
	<center><div id="filters">
		<select name="fetchval" id="fetchval">
			<option value="" disabled="" selected="">Seleccionar genero</option>
			<option value=0>Accion</option>
			<option value=1>Aventura</option>
			<option value=2>Rol</option>
			<option value=3>Estrategia</option>
			<option value=4>Deporte y Carrera</option>
		</select>
	</div></center>
	<div class="container">
		<center><table>
		<thead>
			<tr>
				<th>Nombre</th>
				<th>Precio</th>
				<th>Lanzamiento</th>
				<th>CPUminima</th>
				<th>CPUMaxima</th>
				<th>GPUMinima</th>
				<th>GPUMaxima</th>
				<th>ramMinima</th>
				<th>ramMaxima</th>
				<th>Espacio Requerido</th>
				<th> </th>
			</tr>
		</thead>
		<tbody>
			<?php
			$query="SELECT nombreJuego,precio,lanzamiento,t1.id_juego,CPUMinima,CPUMaxima,
					GPUMinima,GPUMaxima,ramMinima,ramRecomendada,EspacioRequerido from juego t1 
					INNER JOIN requerimientos t2 ON t1.id_juego=t2.id_juego";
			$r=mysqli_query($conexion,$query);
			while($row=mysqli_fetch_assoc($r)){
		
		    ?>
			<tr>
				<td><?php echo $row['nombreJuego']?></td>
				<td>$<?php echo $row['precio']?></td>
				<td><?php echo $row['lanzamiento']?></td>
				<td><?php echo $row['CPUMinima']?></td>
				<td><?php echo $row['CPUMaxima']?></td>
				<td><?php echo $row['GPUMinima']?></td>
				<td><?php echo $row['GPUMaxima']?></td>
				<td><?php echo $row['ramMinima']?></td>
				<td><?php echo $row['ramRecomendada']?></td>
				<td><?php echo $row['EspacioRequerido']?></td>
				<td><?php echo '<form method="post" action="./php/add.php">';
  	 					  echo '<button type="submit" name="juegoid" value="'.$row['id_juego'].'">Añadir a carrito</button>';
     					  echo '</form>';
      					  echo "<br>";?></td>
			</tr>
			<?php
	        }
			?>
		</tbody>
	</table></center>
	</div>

	<script type="text/javascript">
		$(document).ready(function(){
			$("#fetchval").on('change',function(){
				var value=$(this).val();
				$.ajax({
					url:"./php/datos.php",
					type:"POST",
					data:'request='+value,
					beforeSend:function(){
						$(".container").html("<span>Funcionando...</span>");
					},
					success:function(data){
						$(".container").html(data);
					}
				});
			});
		});
	</script>
 <form method="post" action="./paginaPrincipal.php">
 <button type="submit" name="volver_atras" >Volver Atras</button>
 </form>
</body>
</html>
