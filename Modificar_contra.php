<?php 
//conexion con servidor y db
//nombre de la base de datos para seleccionar la base
//$basededatos="sseis";
//$conexion = mysqli_connect('localhost', $usuario, $contrasena, $base) or die ("Sin conexion :(");
//valores obtenidos del archivo formulario



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