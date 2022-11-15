<?php

include 'conexion.php';

$con=connect();

$qr=$_POST['qr'];


$query="CALL GET_QR_DATA('{$qr}')";

$request=mysqli_query($con,$query);


$data = mysqli_fetch_assoc($request);

echo json_encode($data);

?>