<?php
$conexion =mysqli_connect("localhost","id18079492_fucks","123456xxxXXX@","id18079492_estudiantes");

$Respuestas1 =$_POST ["Respuestas1"];


$sql = "INSERT INTO RespuestasC (Respuestas1) VALUES ('$Respuestas1')";
$result= mysqli_query($conexion,$sql);

if($result) {
  echo "Enviado";
  }
  else {
  echo "ya envio anteriormente su respuesta";
 
}
?>