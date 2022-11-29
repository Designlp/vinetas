<?php 

$servername = "localhost";
$username = "u532654912_vinetasbdml";
$password = "gtaV19921963";
$database = "u532654912_vinetasbdml";

// Create a connection
//$conn = mysqli_connect($servername, $username, $password, $database);


    $conexion = new mysqli($servername, $username, $password, $database);
    if($conexion-> connect_error){
        die('No se pudo conectar al servidor');
    }

?>