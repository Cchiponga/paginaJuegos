<?php
	if(isset($_GET['id'])){
		$id=$_GET['id'];
		if($id==1){
			echo'<script type="text/javascript">
					        alert("NO SE PUEDE BORRAR EL ADMIN");
					        window.location.href="indexA.php";
					        </script>';
		}else{
		$id=$_GET['id'];
		$conexion=mysqli_connect("localhost","root","","paginaajuegos") or
        die("Problemas con la conexión");

	    $sql="DELETE FROM usuario WHERE id_usuario=$id";
	    $conexion->query($sql);
 	
	    header("location:./indexA.php");
	    exit;
	    }
	}
?>