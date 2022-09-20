<?php
$conexion =mysqli_connect("localhost","id18079492_fucks","123456xxxXXX@","id18079492_estudiantes");

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