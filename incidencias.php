<?php 
include("./conexion.php");

$sql = "SELECT MAX(folio_inc)+1 FROM  `incidencias`";
$resultado= $conexion->query($sql);
$row= mysqli_fetch_array($resultado); 
   
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <!-- Viewport -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Favicon -->
  <link rel="icon" type="favicon/x-icon" href="./img/logos/IPN.png"/>
  <!-- CSS -->
  <link rel="stylesheet" href="./css/main.css">
  <!-- Iconos de Font Awesome -->
  <link rel="stylesheet" href="./css/all.min.css">
  <!-- Styles SweetAlert -->
  <link rel="stylesheet" href="./css/sweetalert2.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <title> Control SSEIS</title>
</head>
<body>
    <div class="container p-4">
        
		<div class="row">
            <div class="col d-flex justify-content-around align-items-center">
                <img class="img-fluid" width="90px" src=".\img\logos\IPN.png" alt="IPN">
            </div>
            <div class="col-9 d-flex justify-content-around align-items-center">
                <h3 class="text-black mx-5 text-center">CENTRO DE ESTUDIOS CIENTIFICOS Y TECNOLOGICOS NO. 8 "narciso Bassols"</h3>
            </div>
            <div class="col d-flex justify-content-around align-items-center">
                <img class="img-fluid" width="70px" src=".\img\logos\voca8.png" alt="cecyt 8">
            </div>
        </div>
      </div>
      <style>
        * {
          box-sizing: border-box;
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
  
        </style>
   
        <form method="POST"  id="incidencia_form">
        </header>
        <div class="row">
    </div>
    <div class="container">
    <div  class="fw-bold">Registrar Incidencia: </div><br>     

            <div class="column"> 
              <label class="fw-bold" style="text-align:right;"> Folio: <?php echo $row[0];     ?> </label>
              <input hidden type="text" name="folio" id="folio" value="<?php echo $row[0];?>">
            </div>

            <div class="column"> 
              <input type="text" class="form-center" style="padding: right 6px;" name="ciclo" id="ciclo" size="6" placeholder="Ciclo">
            </div>

            <div class="column"> 
                <input type="text" class="form-center"  style="padding: right 15px;" name="alias" id="alias" placeholder="Alias">
              </div>

            <div class="column"> 
              <input type="text" class="form-center" style="padding: right 23px;" name="boleta" id="boleta" size="10" placeholder="Boleta Alumno">
              &nbsp;&nbsp;<!-- <input type="text" class="form-center" name="nombre_al" id="nombre_al"> -->
              <select class="form-center" name="nombre_al" id="nombre_al"> </select>
            </div>
  
            <div class="col" style="padding-left:80px;"><br>
              <label for="fecha_inc" style="padding-top: 20px;">Fecha de la Incidencia: </label>
              <input type="date" id="fecha_inc" name="fecha_inc">
                &nbsp;<input type="text" class="form-center" style="padding: left 6px;" name="hora" id="hora" placeholder="Hora">
            </div><br>
            
            <div class="column"> <br>
                Reporta: &nbsp;<input type="text" class="form-center" name="persona_reporta" id="persona_reporta" placeholder="Persona que reportó">
            </div>

            <div class="column"> 
              <label for="temainc"> Tema </label>
              <select class="form-select mb-9" style="width:50%;" id="temainc" name="temainc" aria-placeholder="Tema">
                <option label>Seleccione el tema</option>
                <!-- POR ALTERAR PARA LA CONEXIÓN CON BASE-->
                <option value="1">CONSUMIR O POSEER PSICOTRÓPICOS O ESTUPEFACIENTES</option>
                 <option value="4">CONSUMO DE BEBIDAS ALCOHOLICAS</option>
                 <option value="3">DAÑOS AL INMUEBLE</option>
                 <option value="5">DISTRIBUIR PSICOTRÓPICOS O ESTUPEFACIENTES</option>
                 <option value="6">EMPLEAR O PERMITIR EL USO INDEBIDO DE CREDENCIALES DE TERCEROS</option>
                
              </select><br><br>
            </div>

            <div class="col" style="padding-left:80px"> 
              <label for="hecho"> Hecho: </label><br>
              <input type="text" class="form-center" style="width:50%" name="hecho" id="hecho" placeholder="¿Qué sucedió?">
              <br><label for="observacion"> Observaciones: </label><br>
              <textarea class="form-control" style="width: 80%;"name="observacion" id="observacion">
              </textarea>
              </div><br><br>

              <div class="col" style="padding-left:26%">
                <input class="btn btn-primary" id="registrar" type="submit" value="Registrar">&nbsp;&nbsp;&nbsp;
                <a href="#" id="callcita" name="callcita"> Agregar Citatorio</a>
            </form>
              </div>
            <br><br><br>
      <p> </p>


        <div class="col-sm-9 bg-light p-3 border" id="form">

          <form method="get"> Normatividad   <br />
            <input name="1" type="checkbox" /> Apoderarse indebidamente de bienes y documentos que formen parte del patrimonio del Instituto, de su personal o de otros alumnos;
            <br />
            <input name="2" type="checkbox" /> Asumir actitudes irrespetuosas, provocativas o violentas en contra de cualquier miembro de la comunidad politécnica;
            <br />
            <input name="3" type="checkbox" />  Incitar o inducir a otros alumnos a que realicen actos u omisiones que violen la Ley Orgánica, este Reglamento y demás otfrnamientos aplicables, independientemente de que aquellos se consumen o no;
            <br />
            <input name="4" type="checkbox" />  Dañar, destituir o deteriorar instalaciones, equipos, libros, objetos y demás bienes del Instituto;
            <br />
            <input name="5" type="checkbox" />  Falsificar o utilizar indebidamente documentos escolares, sellos y papeles oficiales, así como emplear o permitir el uso indebido de credenciales de terceros;
            <input name="6" type="checkbox" />  Utilizar para fines distintos a los académicos y sin autorización previa el nombre, escudo, lema e himno del Instituto;
            <br />
            <input name="7" type="checkbox" />  Portar armas blancas, de fuego, explosivos o cualquier objeto que pueda ser usado para amenazar o producir lesiones;
            <br />
            <input name="8" type="checkbox" />  Recurrir a cualquier forma de violencia en las instalaciones politécnicas o fuera de ellas usando el nombre de la Institución;
            <br />
            <input name="9" type="checkbox" />  Registrar, explotar o utilizar sin autorización los derechos de autor, tesis, patentes, marcas o certificados de invención pertenecientes al Instituto;
            <br />
            <input name="10" type="checkbox" />  Impedir a los miembros de la comunidad politécnica el ejercicio de sus funciones o el uso de instalaciones, así como influir indebidamente en la toma de decisiones;
            <br />
            <input name="11" type="checkbox" />  Suplantar o permitir ser suplantado en la realización de actividades académicas;
            <br />
            <input name="12" type="checkbox" />  Distribuir, poseer o consumir psicotrópicos o estupefacientes, así como bebidas embriagantes en las instalaciones en las instalaciones del Instituto, o concurrir al mismo bajo la influencia de alguno de ellos, y
            <br />
            <input name="13" type="checkbox" />  Realizar cualquier actividad que atente contra el orden, buen nombre, prestigio académico y dignidad del Instituto
            <br />
            </form>
      </div>
      <p> </p>

  </div>

  
<div class="tab-content p-5 border border-2" style="height: center;" id="myTabContent">
				
            
  <div class="tab-pane fade show active" id="DGE" role="tabpanel"
         aria-labelledby="DGE-tab">
         <div class="row" style="text-indent: 6px;">

         <div class="row mb-7" id="consulta">
         <table class="table">
          <thead class="table-light" align="center">
          <tr>
          <th scope="col">Folio</th>
          <th scope="col">Boleta</th>
          <th scope="col">Hecho</th>
          <th scope="col">Fecha</th>
          <th scope="col">Hora</th>
          <th scope="col">Persona que reportó</th>
          <th scope="col">Amonestación</th>
          <th scope="col">Citatorio</th>
    
          </tr>
          </thead>
          <tbody>
         <!-- 
          <?php     
           $tablados="SELECT * FROM incidencias";
          $resultadodos=mysqli_query($conexion, $tablados);
          while($rowdos=mysqli_fetch_assoc($resultadodos)) 
          {
           ?>   
            -->

           <tr align="center">
           <td><?php echo $rowdos["folio_inc"]?> </td>
           <td><?php echo $rowdos["boleta"]?> </td>
           <td><?php echo $rowdos["hecho"]?></td>
           <td><?php echo $rowdos["fecha_reporte"]?></td>
           <td><?php echo $rowdos["hora"]?> </td>
           <td><?php echo $rowdos["quien_reporto"]?></td>
           <td><?php echo $rowdos["observacion"]?></td>
           <td><?php echo $rowdos["citatorio"]?></td>
          
           <td>
          <a href="modificarinc.php?folio_inc=<?php echo $rowdos["folio_inc"]?>"><button type="button" class="fas fa-edit"></button></a> 
          <a href="eliminar_incidencia.php?folio_inc=<?php echo $rowdos["folio_inc"] ?>"><button type="button" class="fas fa-trash-alt"></button></a>
          </td>
          </tr>
          <!-- 
          <?php
          } mysqli_free_result($resultadodos);
          ?> 
          -->
          </tbody>
           </table>
            </div>
            <script src="confirmacion.js">
        </script>
      </div>  
     </div>
</div>
             
<?php require_once("./citatorio.php");?>
    <script src="./js/jquery-3.6.0.min.js"></script>
    <script src="./js/bootstrap.bundle.min.js"></script>
    <script src="./js/sweetalert2.all.min.js"></script>
    <script src="./js/main.js"></script>
    <script src="./incidencias.js"></script>
</body>

</html>