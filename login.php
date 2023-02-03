<?php
include 'conexion.php';
/*
session_start();
if(isset($_GET['cerrar_sesion'])){
    session_unset();
    session_destroy();
}
if(isset($_SESSION['nivel'])){
    switch($_SESSION['nivel']){
        case 'ADMINISTRADOR':
            header('location: vista_administrador.html')
            break;
        case 'CAPTURISTA':
            header('location: vista_capturista.html')
            break;
        case 'VIGILANTE':
            header('location: vista_vigilante.html')
                break;
        default:
    }
}*/
$us = $_POST['us'];
$con = $_POST['con'];
//$nivel = $_POST['nivel'];
$sql = mysqli_query($conexion, "SELECT * FROM usuarios WHERE usuario ='$us' AND contrasena ='$con'");
$filas = mysqli_num_rows($sql);
if ($filas > 0) 
{ 
    //$_SESSION['nivel'] = $nivel;
    $user = $sql->fetch_assoc();
    //header('location: vista_administrador.html');
    
    echo json_encode(array('ok'=> 1, 'user'=>$user));
} 
else 
{
    //echo "<script> Swal.fire('test1', 'header', 'error'); window.location='index.html' </script>";
    echo json_encode(array('ok'=> 0));
}

$conexion->close()
?>
