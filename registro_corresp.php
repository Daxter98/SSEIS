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

//folio, interno, no_folio, fecha_oficio, asunto, cve_status, detalle, 
//destinatario, remitente, fecha_recepcion, turnado

//MODIFICAR CAMPOS DE DATOS, SON ERRÓNEOS
    try {
        
        $sql=mysqli_query($conexion,"INSERT INTO correspondencia VALUES ('', '$interno', '$no_folio', '$fecha_of', '$asunto', '$status', '$detalle', '$dest', '$rem', '$fechaRec', '$turnado') ");
        
        $consulta= "SELECT * FROM correspondencia";
        $resultado= $conexion->query($consulta);

        echo "<html>
        <head>
    <meta charset='UTF-8'>
    <!-- Viewport -->
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
  <!-- Favicon -->
  <link rel='icon' type='favicon/x-icon' href='img/logos/IPN.png'/>
  <!-- CSS -->
  <link rel='stylesheet' href='css/main.css'>
  <!-- Iconos de Font Awesome -->
  <link rel='stylesheet' href='css/all.min.css'>
  <!-- Styles SweetAlert -->
  <link rel='stylesheet' href='css/sweetalert2.min.css'>
  <link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'>
  <title>Administrador || Control SSEIS</title>
</head>

              <div class='tab-content p-5 border border-2' style='height: center;' id='myTabContent'>
                <div class='row mb-2' id='consulta'>
                   <table class='table'>
                    <thead class='table-light' align='center>
                    <tr>
                    <th></th>
                    <th scope='col'>Folio</th>
                    <th scope='col'>Interno</th>
                    <th scope='col'>No. Of.</th>
                    <th scope='col'>Fecha Of.</th>
                    <th scope='col'>Asunto</th>
                    <th scope='col'>Estatus</th>
                    <th scope='col'>Detalle</th>
                    <th scope='col'>Dest.</th>
                    <th scope='col'>Rem.</th>
                    <th scope='col'>Fecha Recep.</th>
                    <th scope='col'>Turnado</th>
                    </tr>
                    
                    </thead>";
                      

        while($rowdos = $resultado->fetch_assoc()) { 
                      echo "<tbody>  <tr align='center'>";
                      echo "<td>".$rowdos['folio']."</td>";
                      echo "<td>".$rowdos['interno']."</td>";
                      echo "<td>".$rowdos['no_oficio']."</td>";
                      echo "<td>".$rowdos["fecha_oficio"]."</td>";
                      echo "<td>".$rowdos['asunto']."</td>";
                      echo "<td>".$rowdos['cve_status1']."</td>";
                      echo "<td>".$rowdos['detalle']."</td>";
                      echo "<td>".$rowdos['destinatario']."</td>";
                      echo "<td>".$rowdos['remitente']."</td>";
                      echo "<td>".$rowdos['fecha_recepcion']."</td>";
                      echo "<td>".$rowdos['turnado']."</td>
                      <td>
    <a href='ss'><button type='button' class='fas fa-trash-alt'></button></a>
    </td>"; 
}
    echo "</tr> </tbody></table></div></div> </html>";
    } catch (Exception $e) {
        print "¡Error BD!: " . $e->getMessage() . "<br/>";
        die();
    }
    
 ?>