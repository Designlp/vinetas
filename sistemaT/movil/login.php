<?php
include 'conexion.php';
$con = connect();

$correo=$_POST['userName'];
$password=$_POST['password'];
$rol=$_POST['rol'];



/*$a="asdfsdaf";
if($con){
    echo "si '{$a}'"; 
    
}else{
    echo'no';
    
}*/


$query="select u.*, r.Rol from usuario u, roles r where u.CorreoElectronico = '{$correo}' && u.IDRol=r.IDRol &&  Rol like '%{$rol}%'";

$req = mysqli_query($con,$query);

$data = mysqli_fetch_assoc($req);

if(empty($data['CorreoElectronico']) ){
    
    echo json_encode($query."asdf");
    
}else{
    
    
    if($data['Contrasena']==md5($password)){
        
        echo json_encode (true);
    }else{
        
        echo json_encode($query);
    }
}





?>


