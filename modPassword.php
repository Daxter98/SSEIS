<?php
include 'conexion.php';
$id = $_POST["id"];
$newPassword = $_POST["newPassword"];

if(!isset($id) || !isset($newPassword))
{
    echo json_encode(array('ok'=> 0));
    exit();
}

$sql = "UPDATE usuarios SET contrasena='$newPassword' WHERE id=$id";
if($conexion->query($sql) === true){
    echo json_encode(array('ok'=> 1));
}else{
    echo json_encode(array('ok'=> 0));
}
?>