<?php
include("conexion.php");

$folio = $_GET['folio'];




    $modifica= "UPDATE correspondencia SET COLUMN WHERE folio='$folio' ";
    $resultado= mysqli_query($conexion, $elimina);
    if($resultado){
        header("location:seguimiento.php");
    }

?>