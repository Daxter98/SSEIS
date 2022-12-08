<?php

include 'conexion.php';

$us = $_POST['us'];
$con = $_POST['con'];

$sql = mysqli_query($conn, "SELECT * FROM usuarios WHERE usuario ='$us' AND contrasena ='$con'");
$filas = mysqli_num_rows($sql);
if ($filas > 0) 
{
    //header('location: vista_administrador.html');
    echo json_encode(array('ok'=> 1));
} 
else 
{
    //echo "<script> Swal.fire('test1', 'header', 'error'); window.location='index.html' </script>";
    echo json_encode(array('ok'=> 0));
}

$conn->close()
?>