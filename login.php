<?php
    include("conexion.php");
    global $conexion;
    $basededatos="sseis";
    $db = mysqli_select_db( $conexion, $basededatos ) or die ( "Upps! No se ha podido conectar a la base de datos" );
    $correo=$_POST['correo'];
    $password=$_POST['password'];

    $sql=mysqli_query($conexion,"SELECT * FROM usuarios WHERE correo ='$correo' AND password ='$password'");
    $filas=mysqli_num_rows($sql);
   if($filas>0){
    header("location: vista_administrador.html");
   }
   else
    {
        header("location: index.html");
    }
 ?>