<?php 

include("../config/conexion.php");
    global $conexion;
    //$base="sseis";
    //$conexion = mysqli_connect('localhost', $usuario, $contrasena, $base) or die ("Sin conexion :(");

$folio_inc = $_GET['folio_inc'];

    $eliminar= "DELETE FROM incidencias WHERE folio_inc ='$folio_inc' ";
    $resultado= mysqli_query($conexion, $eliminar);
    if($resultado){
        header("location:incidencias.php");
    }


?>