<?php
$conexion =mysqli_connect("localhost","u532654912_pdsiii","gtaV19921963","u532654912_pdsiii");
$email = $_POST ["email"];
//$password =$_POST ["password"];
$password = md5($_POST['password']); 


$sql = "SELECT * FROM usuario WHERE correo ='$email' AND clave='$password'";
$result= mysqli_query($conexion,$sql);


    
if($result->num_rows >0) {
  echo "ingreso correcto";
  
  }
  else {
  echo "no se pudo ingresar";
 
}


?>