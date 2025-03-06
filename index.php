<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="logIn.css"/> 
     <link rel="icon" type="image/x-icon" href="./imagenes/logo.jpg">
	<title>Login</title>
</head>
<body>
<?php
$conexion=mysqli_connect("localhost","root","","paginaajuegos") or
    die("Problemas con la conexión");
include('./php/controladorLogin.php');

if(isset($_POST['LogOut'])){ 
    mysqli_query($conexion,"TRUNCATE TABLE carrito");
  }
?>
<center><div id="form">
<div id="titulo">
<h1>LogIn</h1>
</div>
<div id="input">
 <form action="" method="post">
        <div id="input">
           <input id="usuario" class="input" type="text" name="usuario" placeholder="Ingrese Usuario">
           <input type="password" id="input" class="input" name="contraseña" placeholder="Ingrese Contraseña">
        </div>
</div>
    <div id="boton"> 
       <center><input type="submit" name="login" class ="btn"value="LogIn"></center>
    </div>
   <p>Create una cuenta aca:<a href="./php/registrarse.php">Registrarse</a></p>
</div></center>

 </form>

</body>
</html>