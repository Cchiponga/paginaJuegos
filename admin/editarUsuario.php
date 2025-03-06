<?php
 $conexion=mysqli_connect("localhost","root","","paginaajuegos") or
   					 die("Problemas con la conexión");
	$id="";
	$usuario="";
	$contraseña="";
	$email="";

	$errorMessage="";
	$mensajeCorrecto="";

	if($_SERVER['REQUEST_METHOD']=='GET'){
		if(!isset($_GET['id'])){
			header("location:./indexA.php");
			exit;
		}

		$id=$_GET['id'];

		$sql="SELECT * FROM usuario WHERE id_usuario=$id";
		$result=$conexion->query($sql);
		$row=$result->fetch_assoc();

		if(!$row){
			header("location:./indexA.php");
			exit;
		}
	   $usuario=$row['usuario'];
	   $contraseña=$row['contraseña'];
	   $email=$row['mail'];

	}else{
		$id=$_POST["id"];
		$usuario=$_POST['usuario'];
	    $contraseña=$_POST['contraseña'];
	    $email=$_POST['mail'];

	    do{
	    	if(empty($id)||empty($usuario)||empty($contraseña)||empty($email)){
				$errorMessage="Todos los campos son requeridos";
				break;
			}

			$sql="UPDATE usuario SET usuario='$usuario',contraseña='$contraseña',mail='$email'
				  WHERE id_usuario=$id";
			$resultado=$conexion->query($sql);
			
			if(!$resultado){
				$errorMessage="Query invalida".$conexion->error;
				break;
			} 	  
	    }while(false);
	    $mensajeCorrecto="Cliente modificado exitosamente";
			header("Location:./indexA.php");
			exit;
	}
?>







<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="usuario.css"/> 
	<title>EDITAR</title>
</head>
<body>

	<center><div class='container'>
		<h2>Nuevo Cliente</h2>
		<?php
			if(!empty($errorMessage)){
				echo "
					<div class='error' role='alert'>
						<strong>$errorMessage</strong>
						<button type='button' class='btn-error' arial-label='Cerrar'></button>
					</div>	
				";
			} 
		?>
		<form method="POST">
			<input type="hidden" name="id" value="<?php echo $id; ?>">
			<div class="rowUsuario">
				<label class="nombre">Usuario</label>
				<div class="input">
					<input type="text" name="usuario" value="<?php echo $usuario; ?>">
				</div>
			<div class="rowContraseña">
				<label class="contra">Contraseña</label>
				<div class="input">
					<input type="text" name="contraseña" value="<?php echo $contraseña; ?>">
				</div>	
			</div>
			<div class="rowEmail">
				<label class="email">Email</label>
				<div class="input">
					<input type="text" name="mail" value="<?php echo $email; ?>">
				</div>

			<?php 
				if(!empty($mensajeCorrecto)){
					echo"
						<div class='row-suc'>
							<strong>$mensajeCorrecto</strong>
							<button type='button' class='btn-error' arial-label='correcto'></button>
						</div>
					";
				}

			?>	


			<div class="rowBotones">
				<div class="boton">
					<button type="submit" class="btn">Cargar</button>
				</div>
				<div class="cancelar">
					<a href="./indexA.php" class="btn" role="button">Cancelar</a>
				</div>
			</div>
		</form>
	</div></center>
</body>
</html>