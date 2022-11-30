<?php
$usuario ="root";
$contrasena ="";  // 
$servidor = "localhost";
//$basededatos = "sseis";

$conexion = mysqli_connect($servidor, $usuario, $contrasena); 
    if(!$conexion)
        {
            die("<center><h1>Enlace con servidor fallido</center></h1>");
        }
    else{
    }
?>