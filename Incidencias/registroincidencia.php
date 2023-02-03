<?php

include("../config/conexion.php");

switch($_GET["op"]){
    
    case "get_alumno":
        $boleta = $_POST['boleta'];
            $sql="SELECT nombres, a_materno, a_paterno FROM alumno WHERE boleta= '$boleta'";
            $resultado= $conexion->query($sql);
            $row=mysqli_fetch_assoc($resultado);
            echo "<option>".$row['nombres']." ".$row['a_materno']." ".$row['a_paterno']."</option>";
        break;

    case "registra_incidencia":
        $boleta1= $_POST['boleta'];
        $cveincidencia=$_POST['temainc'];
        $ciclo=$_POST['ciclo'];
        $fecha_inc=$_POST['fecha_inc'];
        $hora=$_POST['hora'];
        $hecho=$_POST['hecho'];
        $citatorio= 0;
        $persona_reporta=$_POST['persona_reporta'];
        $observacion=$_POST['observacion'];

        try {
            
            $sql="
            INSERT INTO incidencias(boleta,cve_incidencia,ciclo,fecha_reporte,hora,hecho,citatorio,quien_reporto,observacion)
            VALUES ('$boleta1', '$cveincidencia', '$ciclo', '$fecha_inc', '$hora', '$hecho', '$citatorio', '$persona_reporta', '$observacion') ";
            $resultado = $conexion->query($sql);
            echo json_encode($boleta1);
    
        } catch (Exception $e) {
            print "¡Error BD!: " . $e->getMessage() . "<br/>";
            die();
        }
       
    break;

    case "citatorio":
        
        $folio_inc=$_POST['folio_inc'];
        $boleta3=$_POST['boleta_al'];
        $no_cita= $_POST['no_cita'];
        $fecha_generada=$_POST['fecha_generada'];
        $fecha_cita=$_POST['fecha_cita'];
        $hora_cita=$_POST['hora_citat'];
        $area_cita=$_POST['area'];
        $persona_atiende=$_POST['persona_atiende'];


        try {
            
            $sql="
            INSERT INTO citatorios(folio_inc,boleta,no_cita,fecha_generada,fecha_cita,hora,area_cita, persona_atiende)
            VALUES ('$folio_inc','$boleta3', '$no_cita','$fecha_generada', '$fecha_cita', '$hora_cita', '$area_cita', '$persona_atiende');";
            
            if($resultado = $conexion->query($sql)){
                $update="UPDATE incidencias
                SET citatorio= 1
                WHERE folio_inc= '$folio_inc';";
                $res = $conexion->query($update);
            }
            
        } catch (Exception $e) {
            print "¡Error BD!: " . $e->getMessage() . "<br/>";
            die();
        }
       
    break;

    case "get_no_cita":

        $boleta2 =$_POST['boleta_al'];
        try {
            
            $sql="
            SELECT COUNT(boleta)+1 AS num_cita FROM citatorios WHERE boleta= '$boleta2'";
            $resultado = $conexion->query($sql);
            $row= $resultado-> fetch_assoc(); 
            $output["ncita"]= $row['num_cita'];
            $output["boleta"]= $boleta2;
            echo json_encode($output);
    
        } catch (Exception $e) {
            print "¡Error BD!: " . $e->getMessage() . "<br/>";
            die();
        }
       
    break;


}
   
 ?>