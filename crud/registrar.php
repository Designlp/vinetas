<?php
$conexion =mysqli_connect("localhost","u532654912_pdsiii","gtaV19921963","u532654912_pdsiii");

$Nombres =$_POST ["Nombres"];
$Apellidos =$_POST ["Apellidos"];
$email = $_POST ["email"];
$password =$_POST ["password"];

$sql = "INSERT INTO users (Nombres,Apellidos,email,password) VALUES ('$Nombres','$Apellidos','$email','$password')";
$result= mysqli_query($conexion,$sql);

if($result) {
  echo "datos insertados";
  }
  else {
  echo "no se pudo insertar datos";
 
}
?>