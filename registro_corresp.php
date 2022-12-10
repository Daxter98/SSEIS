<?php

include("conexion.php");

$interno= $_POST['interno'];
$no_folio=$_POST['no_folio'];
$fecha_of=$_POST['fecha_of'];
$asunto=$_POST['asunto'];
$status=$_POST['status'];
$detalle=$_POST['detalle'];
$dest=$_POST['dest'];
$rem=$_POST['remitente'];
$fechaRec=$_POST['fecha_rec'];
$turnado=$_POST['turnado'];

//folio, interno, no_oficio, fecha_oficio, asunto, cve_status, detalle, 
//destinatario, remitente, fecha_recepcion, turnado


    try {
        
        
        $sql=mysqli_query($conexion,"INSERT INTO correspondencia(interno,no_oficio,fecha_oficio,asunto,estatus,detalle,destinatario,remitente,fecha_recepcion,turnado) VALUES ('$interno', '$no_folio', '$fecha_of', '$asunto', '$status', '$detalle', '$dest', '$rem', '$fechaRec', '$turnado') ");
        
        header('location: Seguimiento.php');

    } catch (Exception $e) {
        print "¡Error BD!: " . $e->getMessage() . "<br/>";
        die();
    }
    
 ?>