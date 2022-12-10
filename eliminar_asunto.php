<?php 

include("conexion.php");
    global $conexion;
    //$base="sseis";
    //$conexion = mysqli_connect('localhost', $usuario, $contrasena, $base) or die ("Sin conexion :(");

$no_asunto = $_GET['no_asunto'];

    $eliminar= "DELETE FROM asuntos_pendientes WHERE no_asunto ='$no_asunto' ";
    $resultado= mysqli_query($conexion, $eliminar);
    if($resultado){
        header("location:registro_asuntos_p.php");
    }


?>