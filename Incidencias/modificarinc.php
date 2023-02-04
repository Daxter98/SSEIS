<!DOCTYPE html>
<html lang="es">
<?php
include("../config/conexion.php");
   // global $conexion;
    //$base="sseis";
    //$conexion = mysqli_connect('localhost', $usuario, $contrasena, $base) or die ("Sin conexion :(");
    $folio_inc = $_GET['folio_inc'];
    $modificar = "SELECT * FROM incidencias WHERE folio_inc = '$folio_inc'";
    $ejecutar = $conexion->query($modificar);
    $dato = $ejecutar->fetch_array();
?>
<head>
    <meta charset="UTF-8">
    <!-- Viewport -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Favicon -->
  <link rel="icon" type="favicon/x-icon" href="../img/logos/IPN.png"/>
  <!-- CSS -->
  <link rel="stylesheet" href="../css/main.css">
  <!-- Iconos de Font Awesome -->
  <link rel="stylesheet" href="../css/all.min.css">
  <!-- Styles SweetAlert -->
  <link rel="stylesheet" href="../css/sweetalert2.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <title> Control SSEIS</title>
</head>
<title>Modificar Incidencia</title>

<body id="body_agenda">
    <div class="container p-4">
    <div class="row">
        <div class="col d-flex justify-content-around align-items-center">
            <img class="img-fluid" width="90px" src="..\img\logos\IPN.png" alt="IPN">
        </div>
        <div class="col-9 d-flex justify-content-around align-items-center">
            <h3 class="text-black mx-5 text-center">CENTRO DE ESTUDIOS CIENTIFICOS Y TECNOLOGICOS NO. 8 "Narciso Bassols"</h3>
        </div>
        <div class="col d-flex justify-content-around align-items-center">
            <img class="img-fluid" width="70px" src="..\img\logos\voca8.png" alt="cecyt 8">
        </div>
    </div>
    <br><br>

    <form action="modificar_incidencia.php" id="formulario" method="POST">
    </header>
    <div class="row">
    <p> </p>
    <div  class="fw-bold">Introduce los siguientes datos:  </div>
    <div class=" row mb-3">
                <input type="hidden" name="folio_inc" id="folio_inc" value="<?php echo $dato['folio_inc'] ?>">
            </div>
    <p> </p>
    <div class="container"></div>
        <div class="col" aria-label="Default select example">
          <div class="col-6 col-sm-3 fw-bold">
            <input type="hecho" class="form-control" name="hecho" id="hecho" placeholder="Hecho">
          </div>
        </div>
        <p> </p>
    <div class="col-sm-12 col-md-6 col-xl-4 col-xl-4" id="form" align="left">
            Fecha de la incidencia:
            </div>
            <p> </p>
          <div class="col-sm-2 col-md-2 col-xl-2 col-xl-2" id="form" align="left">
                <input id="fecha_reporte" type="date" name="fecha_reporte">
            </div>
            <p> </p>   
  
            <div class=" row mb-3">
                <button type="submit" class="btn btn-primary">Guardar Cambios</button>
            </div>
       
    
</body>
</html>