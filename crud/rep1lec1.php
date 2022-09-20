<?php
$conexion =mysqli_connect("localhost","u532654912_pdsiii","gtaV19921963","u532654912_pdsiii");

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