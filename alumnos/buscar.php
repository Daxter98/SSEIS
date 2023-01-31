<?php
include("../conexion.php");
$boleta = $_POST["boleta"];

$data = array("a" => "Apple", "b" => "Ball", "c" => "Cat", "boleta" => $boleta);

header("Content-Type: application/json");

// return the json object
echo json_encode($data);
?>