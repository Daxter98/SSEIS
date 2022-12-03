<?php
include("conexion.php");

$us=$_POST['us'];
$con=$_POST['con'];

    $sql=mysqli_query($conexion,"SELECT * FROM usuarios WHERE usuario ='$us' AND contrasena ='$con'");
    $filas=mysqli_num_rows($sql);
   if($filas>0){
    header("location: vista_administrador.html");
   }
   else
    {
      echo"<script> alert ('Usuario no existente'); window.location='index.html' </script>";
    }
 ?>