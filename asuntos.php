<?php
//conexion con servidor y db
include("conexion.php");
//nombre de la base de datos para seleccionar la base
$basededatos="sseis";
$conexion = mysqli_connect('localhost', $usuario, $contrasena, $base) or die ("Sin conexion :(");
//valores obtenidos del archivo formulario
//$link = mysqli_connect("localhost", "root", "");
//if($link){
  //  mysqli_select_db($link, "sseis");}
//$checkbox=$_POST['checkbox'];
   // foreach($checkbox as $llave){
        //$ficha2="INSERT INTO asuntos_pendientes SET siglas_a='$llave'";
       // $ejecutar_insertar_ficha2=mysqli_query($link, $ficha2); }

$no_asunto = $_POST['no_asunto'];
$siglas_a = $_POST['siglas_a'];
$descripcion = $_POST['descripcion'];
$prioridad= $_POST['prioridad'];
$fecha_limite = $_POST['fecha_limite'];
$fecha_respuesta = $_POST['fecha_respuesta'];
$cve_status  = $_POST['status'];



insertar($no_asunto, $siglas_a, $descripcion, $prioridad, $fecha_limite, $fecha_respuesta, $status); //se llama la funcion insertar

    function insertar($no_asunto, $siglas_a, $descripcion, $prioridad, $fecha_limite, $fecha_respuesta, $status) //creacion de la funcion insertar
    {
        global $conexion; //tomamos la variable del archivo conexion

        if(!mysqli_query($conexion,"INSERT INTO asuntos_pendientes (no_asunto, siglas_a, descripcion, prioridad, fecha_limite, fecha_respuesta, status) 
        VALUES ('".$no_asunto."','".$siglas_a."','".$descripcion."','".$prioridad."','".$fecha_limite."','".$fecha_respuesta."','".$status."')"))
                    {
                        //mensaje en caso de que falle el registro
                       echo "Error al registrar";
                    }
        else
                    {
                        header("location: registro_asuntos_p.php");
                    }
    }
?>