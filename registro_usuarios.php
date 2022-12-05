<!DOCTYPE html>
<html lang="es">
<?php
  include("conexion.php");
   // global $conexion;
    $base="sseis";
    $conexion = mysqli_connect('localhost', $usuario, $contrasena, $base) or die ("Sin conexion :(");
    $tabla= "SELECT * FROM usuarios";
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
<body>
<form action="usuarios.php" id="formulario" method="POST">
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

                  <div class="row">
                    <p> </p>
                    <div  class="fw-bold">Introduce los siguientes datos:  </div>
              
                    </div>
                    <p> </p>
                    <div class="container"></div>
                    <div class="col"  aria-label="Default select example" >
                      <div class="col-md-4 col-sm-3 fw-bold">
                      <input type="nombre" class="form-control" name="nombre" id="nombre" placeholder="Nombre">
                  </div>
                </div>
                <p> </p>
                <div class="container"></div>
                    <div class="col"  aria-label="Default select example" >
                      <div class="col-md-4 col-sm-3 fw-bold">
                      <input type="aPaterno" class="form-control" name="aPaterno" id="aPaterno" placeholder="Apellido Paterno">
                  </div>
                </div>
                <p> </p>
                <div class="container"></div>
                    <div class="col"  aria-label="Default select example" >
                      <div class="col-md-4 col-sm-3 fw-bold">
                      <input type="aMaterno" class="form-control" name="aMaterno" id="aMaterno" placeholder="Apellido Materno">
                  </div>
                </div>
                <p> </p>
                  <div class="container"></div>
                  <div class="col"  aria-label="Default select example" >
                    <div class="col-6 col-sm-3 fw-bold">
                    <input type="usuario" class="form-control" name="usuario" id="usuario" placeholder="Usuario">
                </div>
              </div>
              <p> </p>
                <div class="container"></div>
                <div class="col"  aria-label="Default select example" >
                  <div class="col-md-5 col-sm-2 fw-bold">
                  <input type="contrasena" class="form-control" name="contrasena" id="contrasena" placeholder="Contraseña">
              </div>
            </div>
            <p> </p>
<!-- 
            <div class="container"></div>
                <div class="col"  aria-label="Default select example" >
                  <div class="col-md-5 col-sm-2 fw-bold">
                  <input type="ContrasenaAdmin" class="form-control" name="ContrasenaAdmin" id="ContrasenaAdmin" placeholder="Confirmar Contraseña">
              </div>
            </div>
            <p> </p>
-->
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
                <!-- <option value="admin">Administrador</option>
                <option value="moderado">Capturista</option>
                <option value="user">Vigilancia</option> -->
              </select>
          </div>
          </div>
          <p> </p>
          <div class="col-6">
            <button type="submit" class="btn btn-primary">Registrar</button>
            </div>
            <p> </p>
            </form>

         <div class="row mb-3" id="consulta">
          <table class="table">
           <thead class="table-light" align="center">
           <tr>
            <th scope="col">Nombre</th>
           <th scope="col">Usuario</th>
           <th scope="col">Cargo</th>
           <th scope="col">Nivel de Acceso</th>
           </tr>
           </thead>
           <tbody>
<?php     
     $resultado=mysqli_query($conexion, $tabla);
        while($row=mysqli_fetch_assoc($resultado)) 
        {
?>
            <tr align="center">
             <td><?php echo $row["nombre"]?> <?php echo $row["aPaterno"]?> <?php echo $row["aMaterno"]?></td>
             <td><?php echo $row["usuario"]?></td>
            <td><?php echo $row["cargo"]?></td>
            <td><?php echo $row["nivel"]?></td>
            <td>
            <a href="modificar_user.php?id=<?php echo $row["id"]?>"><button type="button" class="fas fa-edit"></button></a> 
            <a href="eliminar_user.php?id=<?php echo $row["id"] ?>"><button type="button" class="fas fa-trash-alt"></button></a>
            </td>
            </tr>
            <?php
            } mysqli_free_result($resultado);
?>               
           
           </tbody>
            </table>
             </div>
             <script src="confirmacion.js">
        
        </script>

  </div>

    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/sweetalert2.all.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>