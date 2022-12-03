<?php

include("conexion.php");

$fechaRec=$_POST['fecha_rec'];
$no_oficio=$_POST['no_oficio'];
$rem=$_POST['remitente'];
$descr=$_POST['descripcion'];
$fechaRes=$_POST['fecha_res'];
$turnado=$_POST['turnado'];
$fechaTur=$_POST['fecha_tur'];
//$con=$_POST['con'];
//$us=$_POST['us'];
$detalle=$_POST['detalle'];
//folio, interno, no_folio, fecha_oficio, asunto, cve_status, detalle, 
//destinatario, remitente, fecha_recepcion, turnado

//MODIFICAR CAMPOS DE DATOS, SON ERRÓNEOS
    try {
        
        $sql=mysqli_query($conexion,"INSERT INTO correspondencia VALUES ('','','.$no_oficio.','".$fechaRec."', '".$descr."', 1,'".$detalle."', '','".$rem."', '".$fechaRes."','.$turnado.') ");
        header("location: registro.html");

    } catch (Exception $e) {
        print "¡Error BD!: " . $e->getMessage() . "<br/>";
        die();
    }
    
 ?>