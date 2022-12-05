<?php 

include("conexion.php");
    global $conexion;
    $base="sseis";
    $conexion = mysqli_connect('localhost', $usuario, $contrasena, $base) or die ("Sin conexion :(");

$id = $_GET['id'];

    $eliminar= "DELETE FROM usuarios WHERE id ='$id' ";
    $resultado= mysqli_query($conexion, $eliminar);
    if($resultado){
        header("location:registro_usuarios.php");
    }


?>