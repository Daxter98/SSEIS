<?php
//conexion con servidor y db
include("conexion.php");
//nombre de la base de datos para seleccionar la base
$basededatos="sseis";
//var_dump( $_POST['siglas_a']);
//die();

$conexion = mysqli_connect('localhost', $usuario, $contrasena, $base) or die ("Sin conexion :(");
if (isset($_POST['siglas_a'])) {
    $siglas_a_str = implode(" ", $_POST['siglas_a']);// converts $_POST siglas_a into a string
    $siglas_a_array = explode(" ", $siglas_a_str);// converts the string to an array which you can easily manipulate
}
$no_asunto = $_POST['no_asunto'];
//$siglas_a = $_POST['siglas_a'];
$descripcion = $_POST['descripcion'];
$prioridad= $_POST['prioridad'];
$fecha_limite = $_POST['fecha_limite'];
//$fecha_respuesta = $_POST['fecha_respuesta'];
$status  = $_POST['status'];


insertar($no_asunto, $siglas_a_array, $descripcion, $prioridad, $fecha_limite, $status); //se llama la funcion insertar

    function insertar($no_asunto, $siglas_a, $descripcion, $prioridad, $fecha_limite, $status) //creacion de la funcion insertar
    {
        
        global $conexion; //tomamos la variable del archivo conexion
        for($i=0; $i < count($siglas_a); $i++){

            if(!mysqli_query($conexion,"INSERT INTO asuntos_pendientes (no_asunto, siglas_a, descripcion, prioridad, fecha_limite, status) 
        VALUES ('".$no_asunto."','".$siglas_a[$i]."','".$descripcion."','".$prioridad."','".$fecha_limite."','".$status."')"))
                    {
                        //mensaje en caso de que falle el registro
                       echo "Error al registrar";
                    }
        
        }
                                header("location: registro_asuntos_p.php");

    }
?>