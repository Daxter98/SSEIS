<?php 

session_start();
if(isset($_SESSION['hola']) && $_SESSION ['hola'] == FALSE ) {
    header ("Location: index.html");
}
include "fuctions.php";
//conexion con servidor y db
//nombre de la base de datos para seleccionar la base
//$basededatos="sseis";
//$conexion = mysqli_connect('localhost', $usuario, $contrasena, $base) or die ("Sin conexion :(");
//valores obtenidos del archivo formulario
$basededatos = "sseis";




            if(isset($_POST['editar'])) {
                require "conexion.php";

                $passActual = $mysqli->real_escape_string($_POST['passActual']);
                $mysqli->real_escape_string($_POST['pass1']);
                $pass2 = $mysqli->real_escape_string($_POST['pass2']);

                $passActual = md5 ($passActual);
                $pass1 = md5 ($pass1);
                $pass2 = md5 ($pass2);

                $sqlA = $mysqli -> query("SELECT password FROM users WHERE ID = '".$_SESION ['id']."'");
                $rowA = $sqlA->fetch_array();

                if($rowA['pasword'] == $passActual) {

                    if($pass1 == $pass2) {
                        $update = $mysql->query("UPDATE users SET password= '$pass1' WHERE id = '".$_SESSION['id']."'");
                        if($update) {echo "se ha actualizado tu contraseña";}
                    }
                    else {
                        echo "las dos contraseñas no coinciden";
                    }

                }
                else{
                    echo "Tu contraseña actual no coincide";
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
    <link rel="icon" type="favicon/x-icon" href="img/logos/IPN.png" />
    <!-- CSS -->
    <link rel="stylesheet" href="css/main.css">
    <!-- Iconos de Font Awesome -->
    <link rel="stylesheet" href="css/all.min.css">
    <!-- Styles SweetAlert -->
    <link rel="stylesheet" href="css/sweetalert2.min.css">
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
        <br><br>
        <div class="row">
            <h1 class="text-center">CAMBIO CLAVE DE ACCESO</h1>
            <div class="col-6 col-md-6 d-flex align-items-center"></div>
            <div  class="fw text-justify">Modifique su contraseña a una cadena de caracteres de 8 a 12 caracteres. Es necesario incluir en su nueva contraseña por lo menos una letra mayúscula, una minúscula, y un número.</div>
            <div class="form-select-col-11 form-select-sm" aria-label=".form-select-sm example"></div>
        
            <br><br>
            <form action="" method="post">

            

            <center>
                <table>
                    <tr>
                    <label>Contraseña actual:  <input type="password" name="passActual" autocomplete="off">
                    </tr>
                    <p> </p>
                    <tr>
                     <label>Contraseña nueva:  <input type="password" name="pass1" autocomplete="off">
                    </tr>
                    <p> </p>
                    <tr>
                    <label>Confirmar contraseña:  <input type="password" name="pass2" autocomplete="off">
                    </tr>
                    <p> </p>

                    <br><br>

                    <div  class="fw text-center">*IMPORTANTE*
                        Una vez introducida la contraseña nueva el sistema le cerrará su sesión para que vuelva a ingresar con su nueva contraseña</div>
                    <div class="form-select-col-11 form-select-sm" aria-label=".form-select-sm example"></div>
                    <p> </p>
                     
                    <tr>
                     <input type="button"  onclick="validar()" value="Cambiar contraseña" name="editar"> 
                    </tr>
                </table>
         </form>

   
        </div>
</body>

</html>