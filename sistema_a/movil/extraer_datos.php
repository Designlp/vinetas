<?php
include 'conexion.php';
$con=connect();
$correo=$_POST['correo'];

$query= "CALL GET_USER ('{$correo}')";

$request = mysqli_query($con,$query);

$data = mysqli_fetch_assoc($request);

echo json_encode($data);



?>