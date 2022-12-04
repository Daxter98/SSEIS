<?php
//conexion con servidor y db
include("conexion.php");
//nombre de la base de datos para seleccionar la base
$basededatos="sseis";
$conexion = mysqli_connect('localhost', $usuario, $contrasena, $base) or die ("Sin conexion :(");
//valores obtenidos del archivo formulario
$usuario = $_POST['usuario'];
$contrasena = $_POST['contrasena'];
$nombre = $_POST['nombre'];
$aPaterno = $_POST['aPaterno'];
$aMaterno = $_POST['aMaterno'];
$cargo  = $_POST['cargo'];
$nivel = $_POST['nivel'];


insertar($nombre, $usuario, $contrasena, $aPaterno, $aMaterno, $cargo, $nivel); //se llama la funcion insertar

    function insertar($nombre, $usuario, $contrasena, $apellidop, $apellidom, $cargo, $nivel) //creacion de la funcion insertar
    {
        global $conexion; //tomamos la variable del archivo conexion

        if(!mysqli_query($conexion,"INSERT INTO usuarios (nombre, usuario, contrasena, aPaterno, aMaterno, cargo, nivel) VALUES ('".$nombre."','".$usuario."','".$contrasena."','".$aPaterno."','".$aMaterno."','".$cargo."','".$nivel."')"))
                    {
                        //mensaje en caso de que falle el registro
                       echo "Error al registrar";
                    }
        else
                    {
                        header("location: registro_usuarios.php");
                    }
    }
?>