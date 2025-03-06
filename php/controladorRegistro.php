<?php 
 $conexion=mysqli_connect("localhost","root","","paginaajuegos") or
    die("Problemas con la conexión");

   if(!empty($_POST['registrarse'])){

   	 if(empty($_POST["usuario"]) or empty($_POST["contraseña"]) or empty($_POST["mail"])){
							echo'Alguno de los campos esta vacio o es erroneo';   	 }
  	 else{
	   $usuario=$_POST['usuario'];
       $contraseña=$_POST['contraseña'];
       $mail=$_POST['mail'];
	   $sql=mysqli_query($conexion,"INSERT INTO usuario(usuario,contraseña,mail) VALUES('$usuario','$contraseña','$mail')") 
		    or die("Problemas en el INSERT".mysqli_error($conexion));        
				      if($sql==1){
				        	echo'<script type="text/javascript">
					        alert("Usuario creado con exito);
					        window.location.href="index.php";
					        </script>';
					       	header("Location:../index.php");
							  exit;
				       }
				       else{
				        		echo'Alguno de los campos esta vacio o es erroneo';
        			}

        		}
        	}
?>

