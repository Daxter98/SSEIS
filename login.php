<?php

include 'conexion.php';

$us = $_POST['us'];
$con = $_POST['con'];

$sql = mysqli_query($conexion, "SELECT * FROM usuarios WHERE usuario ='$us' AND contrasena ='$con'");
$filas = mysqli_num_rows($sql);
if ($filas > 0) 
{
    //header('location: vista_administrador.html');
    echo json_encode(array('ok'=> 1));
} 
else 
{
    //echo "<script> Swal.fire('test1', 'header', 'error'); window.location='index.html' </script>";
    echo json_encode(array('ok'=> 0));
}




$stmt =$conexion->prepare($sql);
$stmt->bind_param(1, $us);
$stmt->bind_param(2, $con);
$stmt->execute();
$resultado = $stmt->fetch();
if(is_array($resultado) and count($resultado)>0) {
    $_SESSION["nombre"]=$resultado['nombre'];
    $_SESSION["aPaterno"]=$resultado['aPaterno'];
    $_SESSION["aMaterno"]=$resultado['aMaterno'];
    $_SESSION["usuario"]=$resultado['usuario'];
    $_SESSION["cargo"]=$resultado['cargo'];
    $_SESSION["nivel"]=$resultado['nivel'];
    header("location: vista_administrador.html");
    exit();
 }else{
    header("location: index.php?m=1");
    exit();
 }

 if ($_SESSION["cargo"]==9){
    ?>
    <nav id="sidebar" class="active" >
	<h1><a href="index.html" class="logo">ADMIN.</a></h1>

    <ul class="list-unstyled components mb-5">
          <li class="active">
              
			  <a href="Modulo_alumnos.html" target="formulario">
			  <span class="fa fa-users"></span> Alumnos</a>
              <a target="formulario">
            <span class="fas fa-envelope-open-text"></span>Correspondencia</a>

            <tr>
              <td style="white-space:nowrap;width:100%;"><a class="item" href="vregistro_corresp.html" target="formulario" style="border-style:none;font-size:1em;margin-left:1px;">Registro</a></td>
            </tr>
          
            <tr>
              <td style="white-space:nowrap;width:100%;"><a class="item" href="seguimiento.php" target="formulario" style="border-style:none;font-size:1em;margin-left:10px;">Seguimiento</a></td>
            </tr>
            
            <tr>
              <td style="white-space:nowrap;width:100%;"><a class="item " href="correos_masivos.html" target="formulario" style="border-style:none;font-size:1em;margin-left:10px;">Correo masivo</a></td>
            </tr>
            <a>
            </a>
        <a href="incidencias.php"target="formulario">
        <span class="fas fa-user-shield "></span>Incidencias</a>
        
        <a href="registro_asuntos_p.php"target="formulario">
			  <span class="fas fa-file-signature"></span>Asuntos Pendientes</a>

              <a href="registro_usuarios.php" target="formulario">
			  <span class="fa fa-address-book"></span> Usuarios</a>

              <a href="Modificar_contra.php" target="formulario">
			  <span class="fa fa-key"></span> Clave de acceso </a>
	      
          </li>
          
        </ul>
    	</nav>
    <?php
   }else{
    ?>
    <ul class="list-unstyled components mb-5">
          <li class="active">
              
			  <a href="Modulo_alumnos.html" target="formulario">
			  <span class="fa fa-users"></span> Alumnos</a>

    <!--    <span class="fas fa-envelope-open-text" style="border-style:none;font-size:2em;margin-left:6px;" ></span> 
          <td style="border-style:none;font-size:5em;margin-left:40px;">Correspondencia </td>
           -->
           <a target="formulario">
            <span class="fas fa-envelope-open-text"></span>Correspondencia</a>

            <tr>
              <td style="white-space:nowrap;width:100%;"><a class="item" href="vregistro_corresp.html" target="formulario" style="border-style:none;font-size:1em;margin-left:1px;">Registro</a></td>
            </tr>
          
            <tr>
              <td style="white-space:nowrap;width:100%;"><a class="item" href="seguimiento.php" target="formulario" style="border-style:none;font-size:1em;margin-left:10px;">Seguimiento</a></td>
            </tr>
            
            <tr>
              <td style="white-space:nowrap;width:100%;"><a class="item " href="correos_masivos.html" target="formulario" style="border-style:none;font-size:1em;margin-left:10px;">Correo masivo</a></td>
            </tr>
            <a>
            </a>
            </li>
          
        </ul>
    	</nav>
        <?php
 }


$conexion->close()
?>
