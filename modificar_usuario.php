<?php
//conexion con servidor y db
include("conexion.php");
//include("vista_agenda.php");
//nombre de la base de datos para seleccionar la base
//$basededatos="sseis";
//$conexion = mysqli_connect('localhost', $usuario, $contrasena, $base) or die ("Sin conexion :(");
//valores obtenidos del archivo formulario

$id = $_POST['id'];
$cargo  = $_POST['cargo'];
$nivel = $_POST['nivel'];

//prueba de recepción de datos
echo $id;
echo " y ";
echo $cargo," y ", $nivel;


//modificar los datos

$modifica="UPDATE `usuarios` SET `cargo` = '$cargo', `nivel`= '$nivel' WHERE `usuarios`.`id` = $id";
$resultado=mysqli_query($conexion, $modifica);
if($resultado){
    header("location: registro_usuarios.php");
}else{
    echo "error al registrar";
}
