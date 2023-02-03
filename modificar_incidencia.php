<?php
//conexion con servidor y db
include("conexion.php");
//include("vista_agenda.php");
//nombre de la base de datos para seleccionar la base
//$basededatos="sseis";
//$conexion = mysqli_connect('localhost', $usuario, $contrasena, $base) or die ("Sin conexion :(");
//valores obtenidos del archivo formulario
$folio_inc = $_POST['folio_inc'];
$fecha_reporte = $_POST['fecha_reporte'];
$hecho = $_POST['hecho'];


//prueba de recepción de datos
echo $folio_inc;
echo " y ";
echo $hecho," y ", $fecha_reporte;


//modificar los datos

$modifica="UPDATE `incidencias` SET `fecha_reporte` = '$fecha_reporte', `hecho`= '$hecho' WHERE `incidencias`.`folio_inc` = $folio_inc";
$resultado=mysqli_query($conexion, $modifica);
if($resultado){
    header("location: incidencias.php");
}else{
    echo "error al registrar";
}
