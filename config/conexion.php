<?php

ini_set('display_errors', 1);
error_reporting(E_ALL ^ E_NOTICE);

$conexion = mysqli_init(); 
$usuario ="sseis_root";
$contrasena ="DevTest@01";  
$host = "sseis-server.mysql.database.azure.com";
$base = "sseis";


mysqli_ssl_set($conexion,NULL,NULL, "../certificados/DigiCertGlobalRootCA.crt.pem", NULL, NULL); 
mysqli_real_connect($conexion, "sseis-server.mysql.database.azure.com", "sseis_root", "DevTest@01", "sseis", 3306, MYSQLI_CLIENT_SSL) or die ("Sin conexion a la B.D");

/*

$usuario="root";
$contrasena="";
$base="sseis";

try {
    //TODO: Cadena de Conexion Local
    $conexion = mysqli_connect('localhost', 'root', '', 'sseis');
} catch (Exception $e) {
    print "¡Error BD!: " . $e->getMessage() . "<br/>";
    die();
}
*/

?>