<?php

include("conexion.php");

$Cicloinc= $_POST['Cicloinc'];
$datosinc=$_POST['datosinc'];
$aliasinc=$_POST['aliasinc'];
$grupoinc=$_POST['grupoinc'];
$fecha_inc=$_POST['fecha_inc'];
$folio_inc=$_POST['folio_inc'];
$observacioninc=$_POST['observacioninc'];
$horainc=$_POST['horainc'];
$personainc=$_POST['personainc'];
$temainc=$_POST['temainc'];



//MODIFICAR CAMPOS DE DATOS, SON ERRÓNEOS
    try {
        
        $sql=mysqli_query($conexion,"INSERT INTO inc VALUES ('', '$Cicloinc', '$datosinc', '$aliasinc', '$grupoinc', '$fecha_inc', '$folio_inc', '$observacioninc', '$horainc', '$personainc', '$temainc') ");
        
        $consulta= "SELECT * FROM inc";
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
                      echo "<td>".$rowdos['Cicloinc']."</td>";
                      echo "<td>".$rowdos['datosinc']."</td>";
                      echo "<td>".$rowdos['aliasinc']."</td>";
                      echo "<td>".$rowdos["grupoinc"]."</td>";
                      echo "<td>".$rowdos['fecha_inc']."</td>";
                      echo "<td>".$rowdos['folio_inc']."</td>";
                      echo "<td>".$rowdos['observacioninc']."</td>";
                      echo "<td>".$rowdos['horainc']."</td>";
                      echo "<td>".$rowdos['personainc']."</td>";
                      echo "<td>".$rowdos['temainc']."</td>
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