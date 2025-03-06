<?php
$conexion=mysqli_connect("localhost","root","","paginaajuegos") or die("Problemas con la conexión");
 session_start();

 if(!empty($_POST['login'])){
   if(empty($_POST['usuario'] || empty($_POST['contraseña']) )){
     echo "ALMENOS UN CAMPO ESTA VACIO";
   }else{
   		$usuario=$_POST['usuario'];
        $contraseña=$_POST['contraseña'];
        $sql=mysqli_query($conexion,"SELECT * FROM usuario WHERE usuario= '$usuario' and contraseña='$contraseña'");
       if($datos=$sql->fetch_object()){
          $_SESSION['usuario']=$datos->nombre;
          $_SESSION['contraseña']=$datos->apellido;
          $_SESSION['id_usuario']=$datos->id_usuario;

              if($_SESSION['id_usuario']==1){
                header("location:./admin/indexA.php");
              }else{
              header("Location:./paginaPrincipal.php");
              }
       }else{
       	echo'El usuario no existe o esta vacio un campo';
       }

   }
 }
?>

