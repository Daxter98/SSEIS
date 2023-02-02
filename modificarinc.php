<!DOCTYPE html>
<html lang="es">
<?php
  include("conexion.php");
   // global $conexion;
    $base="sseis";
    $conexion = mysqli_connect('localhost', $usuario, $contrasena, $base) or die ("Sin conexion :(");
    $no_asunto= $_GET['no_asunto'];
    $modificar= "SELECT * FROM asuntos_pendientes WHERE no_asunto = '$no_asunto'";
    $ejecutar= $conexion->query($modificar);
    $dato= $ejecutar->fetch_array();
?>
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
  <title> Control SSEIS</title>
</head>
<title>Modificar Asunto</title>

<body id="body_agenda">
    <div class="container p-4">
    <div class="row">
        <div class="col d-flex justify-content-around align-items-center">
            <img class="img-fluid" width="90px" src="img\logos\IPN.png" alt="IPN">
        </div>
        <div class="col-9 d-flex justify-content-around align-items-center">
            <h3 class="text-black mx-5 text-center">CENTRO DE ESTUDIOS CIENTIFICOS Y TECNOLOGICOS NO. 8 "Narciso Bassols"</h3>
        </div>
        <div class="col d-flex justify-content-around align-items-center">
            <img class="img-fluid" width="70px" src="img\logos\voca8.png" alt="cecyt 8">
        </div>
    </div>
    <br><br>

    <form action="modificar_asun.php" id="formulario" method="POST">
    </header>
    <div class="row">
    <p> </p>
    <div  class="fw-bold">Introduce los siguientes datos:  </div>
    <div class=" row mb-3">
                <input type="hidden" name="no_asunto" id="no_asunto" value="<?php echo $dato['no_asunto'] ?>">
            </div>
    
      <div class="row align-items-start">
            <div class="col-sm-12 col-md-6 col-xl-4 col-xl-4" id="form" method="POST">

              <select class="form-select mb-9" id="prioridad" name="prioridad" aria-label=".form-select-sm example">
              <option selected>Seleccione la prioridad</option>

              <?php     
      $tablatres="SELECT * FROM nivel_prioridad";
      $resultadotres=mysqli_query($conexion, $tablatres);
        while($rowtres=mysqli_fetch_assoc($resultadotres))
        {
              ?>
                <option value="<?php echo $rowtres["prioridad"] ?>"><?php echo $rowtres["prioridad"] ?></option>
              <?php
  } mysqli_free_result($resultadotres);
?>
    
              </select>
          </div>
          </div>
          <p> </p>
    
          <div class="col-sm-12 col-md-6 col-xl-4 col-xl-4" id="form" align="left">
            Fecha respuesta:
            </div>
            <p> </p>
          <div class="col-sm-2 col-md-2 col-xl-2 col-xl-2" id="form" align="left">
                <input id="fecha_respuesta" type="date" name="fecha_respuesta">
            </div>
            <p> </p>
    
            <div class="row align-items-start">
            <div class="col-sm-12 col-md-6 col-xl-4 col-xl-4" id="form" method="POST">
          <td> <select class="form-select mb-9" id="status" name="status" aria-label=".form-select-sm example">
                            <option selected>Seleccione el status</option>

                            <?php     
                                $tablatres="SELECT * FROM estatus";
                                $resultadotres=mysqli_query($conexion, $tablatres);
                                    while($rowtres=mysqli_fetch_assoc($resultadotres))
                                    {
                                        ?>
                                            <option value="<?php echo $rowtres["status"] ?>"><?php echo $rowtres["status"] ?></option>
                                        <?php
                            } mysqli_free_result($resultadotres);
                            ?>
                                
              </select></td>
              </div>
          </div>
          <p> </p>
     </div>
    <p> </p>
    
  
            <div class=" row mb-3">
                <button type="submit" class="btn btn-primary">Guargar Cambios</button>
            </div>
       
    
</body>
</html>