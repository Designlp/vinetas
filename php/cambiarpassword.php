<?php 
    include "./conexion.php";
    $email =$_POST['email'];
    $p1 =$_POST['p1'];
    $p2 =$_POST['p2'];
    if($p1 == $p2){
        
        
        $p1= md5($p1);
        $conexion->query("update usuario set Contrasena='$p1' where CorreoElectronico='$email' ")or die($conexion->error);
        echo "todo bien";
        
    }else{
        echo "no coinciden";
    }
?>