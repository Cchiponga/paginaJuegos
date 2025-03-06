<html>
<head>
<title>Comprar</title>
</head>
<body>
<?php

$conexion=mysqli_connect("localhost","root","","paginaajuegos") or
                die("Problemas con la conexión");
            session_start();
            $id_session=$_SESSION['id_usuario'];
    
     $registros=mysqli_query($conexion,"SELECT * FROM carrito") or die("Problemas en el select:".mysqli_error($conexion));
            


        while($reg=mysqli_fetch_array($registros)){
            $id=$reg['id_juego'];
            $sql="INSERT INTO biblioteca(id_ventas,id_usuario,id_juego) VALUES(NULL,$id_session,$id)";
            $res=$conexion->query($sql);

        }  
        mysqli_query($conexion,"TRUNCATE TABLE carrito");
        header("Location:../carrito.php");
?>

</body>
</html>