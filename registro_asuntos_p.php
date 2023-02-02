<!DOCTYPE html>
<html lang="es">
<?php
  include("conexion.php");
   // global $conexion;
    //$base="sseis";
    //$conexion = mysqli_connect('localhost', $usuario, $contrasena, $base) or die ("Sin conexion :(");
    $tablaDGE= "SELECT * FROM asuntos_pendientes WHERE siglas_a = 'DGE' ";
    $tablaDEAE= "SELECT * FROM asuntos_pendientes WHERE siglas_a = 'DEAE' ";
    $tablaDSE= "SELECT * FROM asuntos_pendientes WHERE siglas_a = 'DSE' ";
    $tablaUPIS= "SELECT * FROM asuntos_pendientes WHERE siglas_a = 'UPIS' ";
    $tablaSSEIS= "SELECT * FROM asuntos_pendientes WHERE siglas_a = 'SSEIS' ";

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
<body>
<form action="asuntos.php" id="formulario" method="POST">
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

        <form action="asuntos_pendientes.html" id="formulario" method="POST">
        </header>
        <div class="row">
        <p> </p>
        <div  class="fw-bold">Introduce los siguientes datos:  </div>
       
        <div class="w-100"></div>
      </div>

      <div class="container"></div>
              <div class="col"  aria-label="Default select example" >
                <div class="col-6 col-sm-3 fw-bold" >
                <input type="no_asunto" class="form-control" name="no_asunto" id="no_asunto" placeholder="No. de Asunto">
                
            </div>
          </div>
          <p> </p>

         <!-- <div class="container"></div>
              <div class="col"  aria-label="Default select example" >
                <div class="col-6 col-sm-3 fw-bold" >
                <input type="id_area" class="form-control" name="id_area" id="id_area" placeholder="Clave de área">
                
            </div>
          </div>
          <p> </p>
-->
          <div class="container"></div>
              <div class="col"  aria-label="Default select example" >
                <div class="col-1 col-sm-7 fw-bold" >
                <input type="descripcion" class="form-control" name="descripcion" id="descripcion" placeholder="Añada la descripción del asunto">
                
            </div>
          </div>
          <p> </p>
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
          <div class="col-sm-12 col-md-6 col-xl-4 col-xl-4" id="form" align="left">
            Fecha límite de respuesta:
            </div>
            <p> </p>
          <div class="col-sm-2 col-md-2 col-xl-2 col-xl-2" id="form" align="left">
                <input id="fecha_limite" type="date" name="fecha_limite">
            </div>
            <p> </p>


          <div class="col-sm-4 col-md-4 col-xl-4 col-xl-4" id="form">

          <form method="POST" action="asuntos.php">

          Selecciona el area
          <br />
          <input name="siglas_a[]" type="checkbox" value="DGE" />  DGE
          <br />
          <input name="siglas_a[]" type="checkbox" value="DEAE"  />  DEAE
          <br />
          <input name="siglas_a[]" type="checkbox" value="DSE"  />  DSE
          <br />
          <input name="siglas_a[]" type="checkbox" value="UPIS" />  UPIS
          <br />
          <input name="siglas_a[]" type="checkbox" value="SSEIS" />  SSEIS

          <div class="col">
            <input class="btn btn-primary" type="submit" value="Registrar">
        </div>
          </form>
        </div>
        <p> </p>
        
    
        <div class="container mt-3">
  <br>
  <!-- Nav pills -->
  <ul class="nav nav-pills" role="tablist">
    <li class="nav-item">
      <a class="nav-link active" data-bs-toggle="pill" href="#home">DGE</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-bs-toggle="pill" href="#menu1">DEAE</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-bs-toggle="pill" href="#menu2">DSE</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-bs-toggle="pill" href="#menu3">UPIS</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-bs-toggle="pill" href="#menu4">SSEIS</a>
    </li>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div id="home" class="container tab-pane active"><br>
    <div class="tab-pane fade show active" id="home" role="tabpanel"
    aria-labelledby="home">
                            <div class="row" style="text-indent: 6px;">
                            <div class="row mb-7" id="home">
                            <table class="table">
                             <thead class="table-light" align="center">
                             <tr>
                                  <th scope="col">No. de Asunto</th>
                                 <th scope="col">Prioridad</th>
                                 <th scope="col">Fecha Limite</th>
                                 <th scope="col">Status</th>
                                 <th scope="col">Fecha de respuesta</th>
                                 <th scope="col">Asunto</th>
                                 </tr>
                                 </thead>
                                 <tbody>
 
 <?php     
     $resultado=mysqli_query($conexion, $tablaDGE);
        while($row=mysqli_fetch_assoc($resultado)) 
        {
?>
                                  <tr align="center">
                                   <td><?php echo $row["no_asunto"]?> </td>
                                   <td><?php echo $row["prioridad"]?></td>
                                  <td><?php echo $row["fecha_limite"]?></td>
                                  <td><?php echo $row["status"]?></td>
                                  <td><?php echo $row["fecha_respuesta"]?></td>
                                  <td><?php echo $row["descripcion"]?></td>
                                  <td>
                                 <a href="modificar_asunto.php?no_asunto=<?php echo $row["no_asunto"]?>"><button type="button" class="fas fa-edit"></button></a> 
                                 <a href="eliminar_asunto.php?no_asunto=<?php echo $row["no_asunto"] ?>"><button type="button" class="fas fa-trash-alt"></button></a>
                                 </td>
                                 </tr>
                                 <?php
            } mysqli_free_result($resultado);
?>               
        
                                 </tbody>
                                  </table>
                                   </div>
                              </div>
                        
                    </div>  
                    
    </div>

    <div id="menu1" class="container tab-pane fade"><br>
    
                            <div class="row" style="text-indent: 6px;">
                    
    <div class="row mb-7" id="menu1">
                            <table class="table">
                             <thead class="table-light" align="center">
                             <tr>
                                  <th scope="col">No. de Asunto</th>
                                 <th scope="col">Prioridad</th>
                                 <th scope="col">Fecha Limite</th>
                                 <th scope="col">Status</th>
                                 <th scope="col">Fecha de respuesta</th>
                                 <th scope="col">Asunto</th>
                                 </tr>
                                 </thead>
                                 <tbody>
 
 <?php     
     $resultado=mysqli_query($conexion, $tablaDEAE);
        while($row=mysqli_fetch_assoc($resultado)) 
        {
?>
                                  <tr align="center">
                                   <td><?php echo $row["no_asunto"]?> </td>
                                   <td><?php echo $row["prioridad"]?></td>
                                  <td><?php echo $row["fecha_limite"]?></td>
                                  <td><?php echo $row["status"]?></td>
                                  <td><?php echo $row["fecha_respuesta"]?></td>
                                  <td><?php echo $row["descripcion"]?></td>
                                  <td>
                                  <a href="modificar_asunto.php?no_asunto=<?php echo $row["no_asunto"]?>"><button type="button" class="fas fa-edit"></button></a> 
                                  <a href="eliminar_asunto.php?no_asunto=<?php echo $row["no_asunto"] ?>"><button type="button" class="fas fa-trash-alt"></button></a>
                                 </td>
                                 </tr>
                                 <?php
            } mysqli_free_result($resultado);
?>   
                                 </tbody>
                                  </table>
                                   </div>
                              </div>
                        
                    </div>  
                        
    <div id="menu2" class="container tab-pane fade"><br>
    <div class="row mb-7" id="menu2">
                            <table class="table">
                             <thead class="table-light" align="center">
                             <tr>
                                  <th scope="col">No. de Asunto</th>
                                 <th scope="col">Prioridad</th>
                                 <th scope="col">Fecha Limite</th>
                                 <th scope="col">Status</th>
                                 <th scope="col">Fecha de respuesta</th>
                                 <th scope="col">Asunto</th>
                                 </tr>
                                 </thead>
                                 <tbody>
 
 <?php     
     $resultado=mysqli_query($conexion, $tablaDSE);
        while($row=mysqli_fetch_assoc($resultado)) 
        {
?>
                                  <tr align="center">
                                   <td><?php echo $row["no_asunto"]?> </td>
                                   <td><?php echo $row["prioridad"]?></td>
                                  <td><?php echo $row["fecha_limite"]?></td>
                                  <td><?php echo $row["status"]?></td>
                                  <td><?php echo $row["fecha_respuesta"]?></td>
                                  <td><?php echo $row["descripcion"]?></td>
                                  <td>
                                  <a href="modificar_asunto.php?no_asunto=<?php echo $row["no_asunto"]?>"><button type="button" class="fas fa-edit"></button></a> 
                                  <a href="eliminar_asunto.php?no_asunto=<?php echo $row["no_asunto"] ?>"><button type="button" class="fas fa-trash-alt"></button></a>
                                 </td>
                                 </tr>
                                 <?php
            } mysqli_free_result($resultado);
?>        
                                 </tbody>
                                  </table>
                                   </div>
                                   </div>

                              
    <div id="menu3" class="container tab-pane fade"><br>
                            <div class="row mb-7" id="menu3">
                            <table class="table">
                             <thead class="table-light" align="center">
                             <tr>
                                  <th scope="col">No. de Asunto</th>
                                 <th scope="col">Prioridad</th>
                                 <th scope="col">Fecha Limite</th>
                                 <th scope="col">Status</th>
                                 <th scope="col">Fecha de respuesta</th>
                                 <th scope="col">Asunto</th>
                                 </tr>
                                 </thead>
                                 <tbody>
 
 <?php     
     $resultado=mysqli_query($conexion, $tablaUPIS);
        while($row=mysqli_fetch_assoc($resultado)) 
        {
?>
                                  <tr align="center">
                                   <td><?php echo $row["no_asunto"]?> </td>
                                   <td><?php echo $row["prioridad"]?></td>
                                  <td><?php echo $row["fecha_limite"]?></td>
                                  <td><?php echo $row["status"]?></td>
                                  <td><?php echo $row["fecha_respuesta"]?></td>
                                  <td><?php echo $row["descripcion"]?></td>
                                  <td>
                                  <a href="modificar_asunto.php?no_asunto=<?php echo $row["no_asunto"]?>"><button type="button" class="fas fa-edit"></button></a> 
                                  <a href="eliminar_asunto.php?no_asunto=<?php echo $row["no_asunto"] ?>"><button type="button" class="fas fa-trash-alt"></button></a>
                                 </td>
                                 </tr>
                                 <?php
            } mysqli_free_result($resultado);
?>          
                                 </tbody>
                                  </table>
                                   </div>
                                   </div>

    <div id="menu4" class="container tab-pane fade"><br>
                            <div class="row mb-7" id="menu4">
                            <table class="table">
                             <thead class="table-light" align="center">
                             <tr>
                                  <th scope="col">No. de Asunto</th>
                                 <th scope="col">Prioridad</th>
                                 <th scope="col">Fecha Limite</th>
                                 <th scope="col">Status</th>
                                 <th scope="col">Fecha de respuesta</th>
                                 <th scope="col">Asunto</th>
                                 </tr>
                                 </thead>
                                 <tbody>
 
 <?php     
     $resultado=mysqli_query($conexion, $tablaSSEIS);
        while($row=mysqli_fetch_assoc($resultado)) 
        {
?>
                                  <tr align="center">
                                   <td><?php echo $row["no_asunto"]?> </td>
                                   <td><?php echo $row["prioridad"]?></td>
                                  <td><?php echo $row["fecha_limite"]?></td>
                                  <td><?php echo $row["status"]?></td>
                                  <td><?php echo $row["fecha_respuesta"]?></td>
                                  <td><?php echo $row["descripcion"]?></td>
                                  <td>
                                  <a href="modificar_asunto.php?no_asunto=<?php echo $row["no_asunto"]?>"><button type="button" class="fas fa-edit"></button></a> 
                                 <a href="eliminar_asunto.php?no_asunto=<?php echo $row["no_asunto"] ?>"><button type="button" class="fas fa-trash-alt"></button></a>
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