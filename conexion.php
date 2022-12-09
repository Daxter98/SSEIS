<?php

$conexion = mysqli_init(); 
$usuario ="sseis_root";
$contrasena ="DevTest@01";  
$host = "sseis.mysql.database.azure.com";
$base = "sseis";


mysqli_ssl_set($conexion,NULL,NULL, "certificados/DigiCertGlobalRootCA.crt.pem", NULL, NULL); 
mysqli_real_connect($conexion, "sseis.mysql.database.azure.com", "sseis_root", "DevTest@01", "sseis", 3306, MYSQLI_CLIENT_SSL) or die ("Sin conexion a la B.D");


//$conexion = mysqli_connect($host, $usuario, $contrasena, $base) or die ("Sin conexion :(");


?>