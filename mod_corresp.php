<?php
include("conexion.php");

$folio = $_GET['folio'];
$detalle1 = $_GET['detalle'];
$estatus1 = $_GET['status'];
$no_of = $_GET['no_oficio'];
$asun = $_GET['asunto'];


function Modificar_Corresp($conn,$fol,$stM,$detM)
{

    $modifica= "UPDATE correspondencia SET status='$stM', detalle='$detM' WHERE folio='$fol'";
    $resultado= mysqli_query($conn, $modifica);
    if($resultado){
        header("location:seguimiento.php");
    }
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <!-- Viewport -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Favicon -->
  <link rel="icon" type="favicon/x-icon" href="img/logos/IPN.png"/>
  <!-- CSS -->
  <link rel="stylesheet" href="css/main.css">
  <!-- Iconos de Font Awesome -->
  <link rel="stylesheet" href="css/all.min.css">
  <!-- Styles SweetAlert -->
  <link rel="stylesheet" href="css/sweetalert2.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <title>Administrador || Control SSEIS</title>
</head>
<body>
    <div class="container p-4">
        
		<div class="row">
            <div class="col d-flex justify-content-around align-items-center">
                <img class="img-fluid" width="90px" src="img\logos\IPN.png" alt="IPN">
            </div>
            <div class="col-9 d-flex justify-content-around align-items-center">
                <h3 class="text-black mx-5 text-center">CENTRO DE ESTUDIOS CIENTIFICOS Y TECNOLOGICOS NO. 8 "narciso Bassols"</h3>
            </div>
            <div class="col d-flex justify-content-around align-items-center">
                <img class="img-fluid" width="70px" src="img\logos\voca8.png" alt="cecyt 8">
            </div>
        </div>
      </div>

        <br><br>
        <form action="<?php 
        $status_mod = $_POST['status_mod'];
        $detalle_mod = $_POST['detalle_mod'];
        Modificar_Corresp($conexion, $folio, $status_mod, $detalle_mod);
        ?>" method="POST">
        </header>
        <style>
      * {
        box-sizing: border-box;
      }

      .label-1{
        background-color:aliceblue;
        font-size: 18px;
        color:darkslategrey; 
        padding: 15px;
        box-shadow: 2px 3px 2px 3px rgba(0,0,0,0.5);
      }

      .column {
        float: right;
        width: 50%;
        padding: 10px;
      }
      .row:after {
        content: "";
        display: table;
        clear: both;
      }
      .link{
        float:right;
      }
      </style>
    
    <div class="container">
    <div class="tab-content p-4 border border-1" style="height: auto;" id="myTabContent">
        <span class="link"> 
            <a href="Seguimiento.php" class="btn btn-primary">Regresar</a>
        </span> <br><br>
        
        <div class="col"> 
        <b><label class="label-1" text-align="right"> Folio: <?php echo $folio; ?> </label></b>
        </div> <br>

        <div class="column"> 
        <b><label class="label-1"> Asunto: <?php echo $asun; ?> </label></b>
        </div> 

        <div class="col"> 
        <b><label class="label-1"> No. de Oficio : <?php echo $no_of; ?> </label></b>
        </div> 
        <br><br>

        <div  class="fw-bold">Introduce los cambios:   </div> <br>

        <div class="col"> 
              <label for="status_mod"> Seleccione estatus: </label>
              <select class="form-select mb-9" id="status_mod" name="status_mod" aria-placeholder="Seleccione estatus">
                
                <option selected value="Normal"> Normal</option>
                <option selected value="Pendiente"> Pendiente </option>
                <option selected value="Urgente"> Urgente </option>
                <option selected value="Finalizado"> Finalizado </option>
                
              </select><br>
            </div>

            <div class="column">
                <label for="detalle_mod"> Descripción: </label>
                <textarea type="text" class="form-control" name="detalle_mod" id="detalle_mod"> 
                <?php echo $detalle1; ?>
                </textarea>
            </div>
            <br><br><br>
            <br><br><br>
            <div class="col-6">
                  <input class="btn btn-primary" type="submit" value="Guardar Cambios">
              </div>
    </div></div>
            </form>
  
  
    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/sweetalert2.all.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>