<?php
include("conexion.php");

$folio = $_GET['folio'];

    $elimina= "DELETE FROM correspondencia WHERE folio='$folio' ";
    $resultado= mysqli_query($conexion, $elimina);
    if($resultado){
        header("location:seguimiento.php");
    }

?>