<?php
$conexion =mysqli_connect("localhost","id18079492_fucks","123456xxxXXX@","id18079492_estudiantes");
$email = $_POST ["email"];
//$password =$_POST ["password"];
$password = md5($_POST['password']); 


$sql = "SELECT * FROM users WHERE email ='$email' AND password='$password'";
$result= mysqli_query($conexion,$sql);


    
if($result->num_rows >0) {
  echo "ingreso correcto";
  
  }
  else {
  echo "no se pudo ingresar";
 
}


?>