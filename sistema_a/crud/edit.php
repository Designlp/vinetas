<?php
$conexion =mysqli_connect("localhost","u532654912_pdsiii","gtaV19921963","u532654912_pdsiii");
$id =$_POST ["id"];
$Nombres =$_POST ["Nombres"];
$Apellidos =$_POST ["Apellidos"];
$password =$_POST ["password"];

$sql2 = "UPDATE users SET Nombres = '".$Nombres."' , Apellidos = '".$Apellidos."' , password ='".$password."' where id='".$id."'  ";

mysqli_query($conexion,$sql2) or die(mysqli_error());
mysqli_close($conexion);
?>