<?php
$conexion =mysqli_connect("localhost","id18079492_fucks","123456xxxXXX@","id18079492_estudiantes");
$id =$_POST ["id"];
$Nombres =$_POST ["Nombres"];
$Apellidos =$_POST ["Apellidos"];
$password =$_POST ["password"];

$sql2 = "UPDATE users SET Nombres = '".$Nombres."' , Apellidos = '".$Apellidos."' , password ='".$password."' where id='".$id."'  ";

mysqli_query($conexion,$sql2) or die(mysqli_error());
mysqli_close($conexion);
?>