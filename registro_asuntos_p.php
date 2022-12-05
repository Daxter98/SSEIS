<!DOCTYPE html>
<html lang="es">
<?php
  include("conexion.php");
   // global $conexion;
    $base="sseis";
    $conexion = mysqli_connect('localhost', $usuario, $contrasena, $base) or die ("Sin conexion :(");
    $tabla= "SELECT * FROM asuntos_pendientes";
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
<form action="asuntos.php" id="formulario" method="POST">
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
          <td> <select class="form-select mb-9" id="cve_status" name="cve_status" aria-label=".form-select-sm example">
                            <option selected>Seleccione el status</option>

                            <?php     
                                $tablatres="SELECT * FROM estatus";
                                $resultadotres=mysqli_query($conexion, $tablatres);
                                    while($rowtres=mysqli_fetch_assoc($resultadotres))
                                    {
                                        ?>
                                            <option value="<?php echo $rowtres["cve_status"] ?>"><?php echo $rowtres["descripcion"] ?></option>
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

            <form method="get">

              Selecciona el area
              <br />
              <input name="DGE" type="checkbox" id="DGE" value="siglas_a" />  DGE
              <br />
              <input name="DEAE" type="checkbox" id="DEAE" value="siglas_a" />  DEAE
              <br />
              <input name="DSE" type="checkbox" id="DSE" value="siglas_a" />  DSE
              <br />
              <input name="UPIS" type="checkbox" id="UPIS" value="siglas_a" />  UPIS
              <br />
              <input name="SSEIS" type="checkbox" id="SSEIS" value="siglas_a" />  SSEIS
              </form>
        </div>
        <p> </p>
       

          <div class="col">
            <input class="btn btn-primary" type="submit" value="Registrar">
        </div>
         </div>
        <p> </p>
        
    
			
            <div class="col-sm-12">
			<br> <br>
			       
                <ul class="nav nav-tabs" id="myTab" role="tablist">
				
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="DGE-tab" data-bs-toggle="tab"
                            data-bs-target="#DGE" type="button" role="tab" aria-controls="DGE"
                            aria-selected="true">DGE</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="DEAE-tab" data-bs-toggle="tab" data-bs-target="#DEAE"
                            type="button" role="tab" aria-controls="DEAE"
                            aria-selected="false">DEAE</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="DSE-tab" data-bs-toggle="tab" data-bs-target="#DSE"
                            type="button" role="tab" aria-controls="DSE" aria-selected="false">DSE</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="UPIS-tab" data-bs-toggle="tab" data-bs-target="#UPIS"
                            type="button" role="tab" aria-controls="UPIS"
                            aria-selected="false">UPIS</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="SSEIS-tab" data-bs-toggle="tab" data-bs-target="#SSEIS"
                            type="button" role="tab" aria-controls="SSEIS" aria-selected="false">SSEIS</button>
                    </li>
					
                </ul>
             
                <br><br><br>

                <div class="tab-content p-5 border border-2" style="height: center;" id="myTabContent">
				
                <div class="tab-pane fade show active" id="DGE" role="tabpanel"
                            aria-labelledby="DGE-tab">
                            <div class="row" style="text-indent: 6px;">
                  
                            <div class="row mb-7" id="consulta">
                            <table class="table">
                             <thead class="table-light" align="center">
                             <tr>
                                  <th scope="col">Asunto</th>
                                 <th scope="col">Prioridad</th>
                                 <th scope="col">Fecha Limite</th>
                                 <th scope="col">Status</th>
                                 <th scope="col">Fecha de respuesta</th>
                                 <th scope="col">ID1</th>
                                 </tr>
                                 </thead>
                                 <tbody>
 <?php     
     $resultado=mysqli_query($conexion, $tabla);
        while($row=mysqli_fetch_assoc($resultado)) 
        {
?>
                                  <tr align="center">
                                   <td><?php echo $row["no_asunto"]?> </td>
                                   <td><?php echo $row["prioridad"]?></td>
                                  <td><?php echo $row["fecha_limite"]?></td>
                                  <td><?php echo $row["cve_status"]?></td>
                                  <td><?php echo $row["fecha_respuesta"]?></td>
                                  <td><?php echo $row["id_area"]?></td>
                                  <td>
                                 <a href="modificar_asunto.html">"><button type="button" class="fas fa-edit"></button></a> 
                                 <a href="eliminaragenda1.php?idCita=<?php echo $rowdos["idCita"] ?>"><button type="button" class="fas fa-trash-alt"></button></a>
                                 </td>
                                 </tr>
                                 
                            
                                 </tbody>
                                  </table>
                                   </div>
                              </div>
                        
                    </div>  
                    <?php
            } mysqli_free_result($resultado);
?>               
        
                      

                    <div class="tab-pane fade" id="DEAE" role="tabpanel"
                            aria-labelledby="DEAE-tab">
                            <div class="row" style="text-indent: 6px;">
                    
                              <div class="row mb-3" id="consulta">
                                <table class="table">
                                 <thead class="table-light" align="center">
                                 <tr>
                                  <th scope="col">Asunto</th>
                                 <th scope="col">Prioridad</th>
                                 <th scope="col">Fecha Limite</th>
                                 <th scope="col">Status</th>
                                 <th scope="col">Fecha de respuesta</th>
                                 <th scope="col">ID2</th>
                                 </tr>
                                 </thead>
                                 <tbody>
 <?php     
     $resultado=mysqli_query($conexion, $tabla);
        while($row=mysqli_fetch_assoc($resultado)) 
        {
?>
                                  <tr align="center">
                                   <td><?php echo $row["no_asunto"]?> </td>
                                   <td><?php echo $row["prioridad"]?></td>
                                  <td><?php echo $row["fecha_limite"]?></td>
                                  <td><?php echo $row["cve_status"]?></td>
                                  <td><?php echo $row["fecha_respuesta"]?></td>
                                  <td><?php echo $row["id_area"]?></td>
                                  <td>
                                 <a href="modificar_asunto.html">"><button type="button" class="fas fa-edit"></button></a> 
                                 <a href="eliminaragenda1.php?idCita=<?php echo $rowdos["idCita"] ?>"><button type="button" class="fas fa-trash-alt"></button></a>
                                 </td>
                                 </tr>
                                 
                            
                                 </tbody>
                                  </table>
                                   </div>
                              </div>
                        
                    </div>  
                    <?php
            } mysqli_free_result($resultado);
?>               
        
        <div class="tab-pane fade" id="DSE" role="tabpanel"
                         aria-labelledby="DSE-tab">
                         <div class="row" style="text-indent: 6px;">
                 
                          <div class="row mb-3" id="consulta">
                            <table class="table">
                             <thead class="table-light" align="center">
                             <tr>
                                  <th scope="col">Asunto</th>
                                 <th scope="col">Prioridad</th>
                                 <th scope="col">Fecha Limite</th>
                                 <th scope="col">Status</th>
                                 <th scope="col">Fecha de respuesta</th>
                                 <th scope="col">ID3</th>
                                 </tr>
                                 </thead>
                                 <tbody>
 <?php     
     $resultado=mysqli_query($conexion, $tabla);
        while($row=mysqli_fetch_assoc($resultado)) 
        {
?>
                                  <tr align="center">
                                   <td><?php echo $row["no_asunto"]?> </td>
                                   <td><?php echo $row["prioridad"]?></td>
                                  <td><?php echo $row["fecha_limite"]?></td>
                                  <td><?php echo $row["cve_status"]?></td>
                                  <td><?php echo $row["fecha_respuesta"]?></td>
                                  <td><?php echo $row["id_area"]?></td>
                                  <td>
                                 <a href="modificar_asunto.html">"><button type="button" class="fas fa-edit"></button></a> 
                                 <a href="eliminaragenda1.php?idCita=<?php echo $rowdos["idCita"] ?>"><button type="button" class="fas fa-trash-alt"></button></a>
                                 </td>
                                 </tr>
                                 
                            
                                 </tbody>
                                  </table>
                                   </div>
                              </div>
                        
                    </div>  
                    <?php
            } mysqli_free_result($resultado);
?>               
        

        <div class="tab-pane fade" id="UPIS" role="tabpanel"
                      aria-labelledby="UPIS-tab">
                      <div class="row" style="text-indent: 6px;">

                        <div class="row mb-3" id="consulta">
                          <table class="table">
                           <thead class="table-light" align="center">
                           <tr>
                                  <th scope="col">Asunto</th>
                                 <th scope="col">Prioridad</th>
                                 <th scope="col">Fecha Limite</th>
                                 <th scope="col">Status</th>
                                 <th scope="col">Fecha de respuesta</th>
                                 <th scope="col">ID4</th>
                                 </tr>
                                 </thead>
                                 <tbody>
 <?php     
     $resultado=mysqli_query($conexion, $tabla);
        while($row=mysqli_fetch_assoc($resultado)) 
        {
?>
                                  <tr align="center">
                                   <td><?php echo $row["no_asunto"]?> </td>
                                   <td><?php echo $row["prioridad"]?></td>
                                  <td><?php echo $row["fecha_limite"]?></td>
                                  <td><?php echo $row["cve_status"]?></td>
                                  <td><?php echo $row["fecha_respuesta"]?></td>
                                  <td><?php echo $row["id_area"]?></td>
                                  <td>
                                 <a href="modificar_asunto.html">"><button type="button" class="fas fa-edit"></button></a> 
                                 <a href="eliminaragenda1.php?idCita=<?php echo $rowdos["idCita"] ?>"><button type="button" class="fas fa-trash-alt"></button></a>
                                 </td>
                                 </tr>
                                 
                            
                                 </tbody>
                                  </table>
                                   </div>
                              </div>
                        
                    </div>  
                    <?php
            } mysqli_free_result($resultado);
?>               
        
                  
      
        <div class="tab-pane fade" id="SSEIS" role="tabpanel"
                   aria-labelledby="SSEIS-tab">
                   <div class="row" style="text-indent: 6px;">
           
                    <div class="row mb-3" id="consulta">
                      <table class="table">
                       <thead class="table-light" align="center">
                       <tr>
                                  <th scope="col">Asunto</th>
                                 <th scope="col">Prioridad</th>
                                 <th scope="col">Fecha Limite</th>
                                 <th scope="col">Status</th>
                                 <th scope="col">Fecha de respuesta</th>
                                 <th scope="col">ID5</th>
                                 </tr>
                                 </thead>
                                 <tbody>
 <?php     
     $resultado=mysqli_query($conexion, $tabla);
        while($row=mysqli_fetch_assoc($resultado)) 
        {
?>
                                  <tr align="center">
                                   <td><?php echo $row["no_asunto"]?> </td>
                                   <td><?php echo $row["prioridad"]?></td>
                                  <td><?php echo $row["fecha_limite"]?></td>
                                  <td><?php echo $row["cve_status"]?></td>
                                  <td><?php echo $row["fecha_respuesta"]?></td>
                                  <td><?php echo $row["id_area"]?></td>
                                  <td>
                                 <a href="modificar_asunto.html">"><button type="button" class="fas fa-edit"></button></a> 
                                 <a href="eliminaragenda1.php?idCita=<?php echo $rowdos["idCita"] ?>"><button type="button" class="fas fa-trash-alt"></button></a>
                                 </td>
                                 </tr>
                                 
                            
                                 </tbody>
                                  </table>
                                   </div>
                              </div>
                        
                    </div>  
                    <?php
            } mysqli_free_result($resultado);
?>               
        
              
    
   


            
    
              

  </div>
    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/sweetalert2.all.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>