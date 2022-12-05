<?php
//conexion con servidor y db
include("conexion.php");
//include("vista_agenda.php");
//nombre de la base de datos para seleccionar la base
$basededatos="sseis";
$conexion = mysqli_connect('localhost', $usuario, $contrasena, $base) or die ("Sin conexion :(");
//valores obtenidos del archivo formulario

$no_asunto = $_POST['no_asunto'];
$prioridad = $_POST['prioridad'];
$fecha_respuesta  = $_POST['fecha_respuesta'];
$status = $_POST['status'];

//prueba de recepción de datos
echo $no_asunto;
echo " y ";
echo $prioridad," y " ,$fecha_respuesta," y ", $status;


//modificar los datos

$modifica="UPDATE `asuntos_pendientes` SET `prioridad` = '$prioridad', `fecha_respuesta`= '$fecha_respuesta', `status` = '$status' WHERE `asuntos_pendientes`.`no_asunto` = $no_asunto";
$resultado=mysqli_query($conexion, $modifica);
if($resultado){
    header("location: registro_asuntos_p.php");
}else{
    echo "error al registrar";
}
