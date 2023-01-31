<?php
include 'conexion.php';
$boleta = $_POST["boleta"];

$sql = mysqli_query($conexion, "SELECT * FROM alumno WHERE boleta ='$boleta'");
$data = mysqli_fetch_assoc($sql);

// while($r = mysqli_fetch_assoc($sql)){
//     $rows[] = $r;
// }

// return the json object
echo json_encode($data);
?>