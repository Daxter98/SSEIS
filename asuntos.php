<?php
//conexion con servidor y db
include("conexion.php");
//nombre de la base de datos para seleccionar la base
$basededatos="sseis";
$conexion = mysqli_connect('localhost', $usuario, $contrasena, $base) or die ("Sin conexion :(");
//valores obtenidos del archivo formulario
$no_asunto = $_POST['no_asunto'];
$id_area = $_POST['id_area'];
$descripcion = $_POST['descripcion'];
$prioridad= $_POST['prioridad'];
$fecha_limite = $_POST['fecha_limite'];
$fecha_respuesta = $_POST['fecha_respuesta'];
$cve_status  = $_POST['cve_status'];


insertar($no_asunto, $descripcion, $id_area, $prioridad, $fecha_limite, $fecha_respuesta, $cve_status); //se llama la funcion insertar

    function insertar($no_asunto, $descripcion, $id_area, $prioridad, $fecha_limite, $fecha_respuesta, $cve_status) //creacion de la funcion insertar
    {
        global $conexion; //tomamos la variable del archivo conexion

        if(!mysqli_query($conexion,"INSERT INTO asuntos_pendientes (no_asunto, descripcion, id_area, prioridad, fecha_limite, fecha_respuesta, cve_status) 
        VALUES ('".$no_asunto."','".$id_area."','".$descripcion."','".$prioridad."','".$fecha_limite."','".$fecha_respuesta."','".$cve_status."')"))
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