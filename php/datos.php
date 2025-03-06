<?php

   $conexion=mysqli_connect("localhost","root","","paginaajuegos") or
   die("Problemas con la conexión");

   if(isset($_POST['request'])){
   		$request=$_POST['request'];
   		$query="SELECT nombreJuego,precio,lanzamiento,t1.id_juego,CPUMinima,CPUMaxima,
					GPUMinima,GPUMaxima,ramMinima,ramRecomendada,EspacioRequerido from juego t1 
					INNER JOIN requerimientos t2 ON t1.id_juego=t2.id_juego
					WHERE id_genero='$request'";
			$result=mysqli_query($conexion,$query);
			$count=mysqli_num_rows($result);
   
?>

<center><table class="table">
	<?php
	if($count){
	?>
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
				<th>EspacioRequerido</th>
				<th> </th>
			</tr>
			<?php
		}else{
			echo "No record encontrados";
		}
		?>
		</thead>
		<tbody>
			<?php
			while($row=mysqli_fetch_assoc($result)){
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
		}?>
		</tbody>
</table></center>
<?php
}
?>

