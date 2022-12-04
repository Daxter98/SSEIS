<!DOCTYPE html>
<html lang="es">
<?php
  include("conexion.php");
   // global $conexion;
    $base="sseis";
    $conexion = mysqli_connect('localhost', $usuario, $contrasena, $base) or die ("Sin conexion :(");
    $id= $_GET['id'];
    $modificar= "SELECT * FROM usuarios WHERE id = '$id'";
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
  <title>Administrador || Control SSEIS</title>
</head>
<title>Modificar Administrador</title>

<body id="body_agenda">
    <div class="container p-4">
    <div class="row">
        <div class="col d-flex justify-content-around align-items-center">
            <img class="img-fluid" width="90px" src="img\logos\IPN.png" alt="IPN">
        </div>
        <div class="col-9 d-flex justify-content-around align-items-center">
            <h3 class="text-black mx-5 text-center">CENTRO DE ESTUDIOS CIENTIFICOS Y TECNOLOGICOS NO. 8 "Narcisso Bassols"</h3>
        </div>
        <div class="col d-flex justify-content-around align-items-center">
            <img class="img-fluid" width="70px" src="img\logos\voca8.png" alt="cecyt 8">
        </div>
    </div>
    <br><br>

    <form action="modificar_usuario.php" id="formulario" method="POST">
    </header>
    <div class="row">
    <p> </p>
    <div  class="fw-bold">Puedes modificar los siguientes datos:  </div>
   
    <div class=" row mb-3">
                <input type="hidden" name="id" id="id" value="<?php echo $dato['id'] ?>">
            </div>

  <div class="container"></div>
              <div class="col"  aria-label="Default select example" >
                <div class="col-6 col-sm-3 fw-bold">
                <input type="cargo" class="form-control" name="cargo" id="cargo" placeholder="Cargo">
            </div>
          </div>
          <p> </p>
    
          <div class="row align-items-start">
            <div class="col-sm-12 col-md-6 col-xl-4 col-xl-4" id="form" method="POST">

              <select class="form-select mb-9" id="nivel" name="nivel" aria-label=".form-select-sm example">
              <option selected>Seleccione el nivel de acceso</option>

              <?php     
      $tablatres="SELECT * FROM nivel";
      $resultadotres=mysqli_query($conexion, $tablatres);
        while($rowtres=mysqli_fetch_assoc($resultadotres))
        {
              ?>
                <option value="<?php echo $rowtres["nivel"] ?>"><?php echo $rowtres["nivel"] ?></option>
              <?php
  } mysqli_free_result($resultadotres);
?>
              </select>
          </div>
          </div>
          <p> </p>
    
            <div class=" row mb-3">
                <button type="submit" class="btn btn-primary">Guargar Cambios</button>
            </div>    
</body>
</html>