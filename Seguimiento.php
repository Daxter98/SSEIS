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
                <h3 class="text-black mx-5 text-center">CENTRO DE ESTUDIOS CIENTIFICOS Y TECNOLOGICOS NO. 8 "Narciso Bassols"</h3>
            </div>
            <div class="col d-flex justify-content-around align-items-center">
                <img class="img-fluid" width="70px" src="img\logos\voca8.png" alt="cecyt 8">
            </div>
        </div>
        <br><br>

    </div>

    <div class="form" style="font-size:25px; display:flex; text-align:center">
        <form method="GET">
        &nbsp;&nbsp;&nbsp; Numero de Oficio: &nbsp;&nbsp;&nbsp; 
        <input type= "number" name="no_oficio" id="no_oficio" placeholder="No Oficio">
        &nbsp;&nbsp; <input class="btn btn-primary" type="submit" value="Buscar" formmethod="GET"> 
        &nbsp;&nbsp; <input class="btn btn-primary" type="button" value="Reiniciar" onclick=""> 
        </div><br>

<div class="tab-content p-5 border border-2" style="height: center;" id="myTabContent">
				
            
    <div class="tab-pane fade show active" id="DGE" role="tabpanel"
           aria-labelledby="DGE-tab">
           <div class="row" style="text-indent: 6px;">
 
           <div class="row mb-7" id="consulta">
           <table class="table">
            <thead class="table-light" align="center">
            <tr>
             <th scope="col">Folio</th>
            <th scope="col">Interno</th>
            <th scope="col">No Oficio</th>
            <th scope="col">Fecha Of.</th>
            <th scope="col">Asunto</th>
            <th scope="col">Status</th>
            <th scope="col">Descripcion</th>
            <th scope="col">Destinatario</th>
            <th scope="col">Remitente</th>
            <th scope="col">Fecha Recepción</th>
            <th scope="col">Turnado</th>
            </tr>
            </thead>
            <tbody>
           
            <?php   
            
            include("conexion.php");

            if(isset($_GET['no_oficio'])){
	
                $no_oficio= $_GET['no_oficio'];
                $buscar= "SELECT * FROM correspondencia WHERE no_oficio='$no_oficio'";

                $resultado= $conexion->query($buscar);
            while($row=mysqli_fetch_assoc($resultado)) 
            {
             ?>   
            

             <tr align="center">
              <td><?php echo $row["folio"]?> </td>
              <td><?php echo $row["interno"]?></td>
             <td><?php echo $row["no_oficio"]?></td>
             <td><?php echo $row["fecha_oficio"]?></td>
             <td><?php echo $row["asunto"]?></td>
             <td><?php echo $row["status"]?></td>
             <td><?php echo $row["detalle"]?></td>
             <td><?php echo $row["destinatario"]?></td>
             <td><?php echo $row["remitente"]?></td>
             <td><?php echo $row["fecha_recepcion"]?></td>
             <td><?php echo $row["turnado"]?></td>
             <td>
             <a href="mod_corresp.php?folio=<?php echo $row["folio"] ?>&detalle=<?php echo $row["detalle"]?>&estatus=<?php echo $row["status"]?>&no_oficio=<?php echo $row["no_oficio"]?>&asunto=<?php echo $row["asunto"]?>"><button type="button" class="fas fa-edit"></button></a> 
            <a href="eliminar_corresp.php?folio=<?php echo $row["folio"] ?>"><button type="button" class="fas fa-trash-alt"></button></a>
            </td>
            </tr>
            
            <?php
            } mysqli_free_result($resultado);
            ?> 
            
            </tbody></table>
        </div>
    </div>  
</div>
</div>
<?php
            }   
            else{ 
                $consulta= "SELECT * FROM correspondencia";
            $resultado= $conexion->query($consulta);
            while($row=mysqli_fetch_assoc($resultado)) 
            {
             ?>   
            
             <tr align="center">
              <td><?php echo $row["folio"]?> </td>
              <td><?php echo $row["interno"]?></td>
             <td><?php echo $row["no_oficio"]?></td>
             <td><?php echo $row["fecha_oficio"]?></td>
             <td><?php echo $row["asunto"]?></td>
             <td><?php echo $row["status"]?></td>
             <td><?php echo $row["detalle"]?></td>
             <td><?php echo $row["destinatario"]?></td>
             <td><?php echo $row["remitente"]?></td>
             <td><?php echo $row["fecha_recepcion"]?></td>
             <td><?php echo $row["turnado"]?></td>
             <td>
            <a href="mod_corresp.php?folio=<?php echo $row["folio"] ?>&detalle=<?php echo $row["detalle"]?>&estatus=<?php echo $row["status"]?>&no_oficio=<?php echo $row["no_oficio"]?>&asunto=<?php echo $row["asunto"]?>"><button type="button" class="fas fa-edit"></button></a> 
            <a href="eliminar_corresp.php?folio=<?php echo $row["folio"] ?>"><button type="button" class="fas fa-trash-alt"></button></a>
            </td>
            </tr>
            
            <?php
            } mysqli_free_result($resultado);
        }?> 
        
            </tbody>
             </table>
              </div>

        </div>  
       </div>
       <script src="confirmacion.js"></script>
</div>

<script src="js/jquery-3.6.0.min.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>
<script src="js/sweetalert2.all.min.js"></script>
<script src="js/main.js"></script>
</body>

</html>