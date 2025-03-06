<?php

$conexion=mysqli_connect("localhost","root","","paginaajuegos") or
   die("Problemas con la conexión");


	$usuario="";
	$contraseña="";
	$email="";

	$errorMessage="";
	$mensajeCorrecto="";

	
	if($_SERVER['REQUEST_METHOD']=='POST'){
		$usuario=$_POST['usuario'];
		$contraseña=$_POST['contraseña'];
		$email=$_POST['mail'];

		do{
			if(empty($usuario)||empty($contraseña)||empty($email)){
				$errorMessage="Todos los campos son requeridos";
				break;
			}


			$sql="INSERT INTO usuario(usuario,contraseña,mail) VALUES('$usuario','$contraseña','$email')";
		    $resultado=$conexion->query($sql);

		    if(!$resultado){
		    	$errorMessage="Query invalida".$conexion->error;
		    	break;
		    }

				$usuario="";
				$contraseña="";
				$email="";

			$mensajeCorrecto="Cliente creado exitosamente";
			header("Location:./indexA.php");
			exit;
		}while(false);
	}
?>




<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="usuario.css"/> 
	<title>CrearUsuario</title>
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