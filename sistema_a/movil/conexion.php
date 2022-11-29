<?php
    
    
   function connect(){
        
        $host = "localhost";
        $user = "u532654912_vinetasbdml";
        $clave = "gtaV19921963";
        $bd = "u532654912_vinetasbdml";
    
        $conexion = mysqli_connect($host,$user,$clave,$bd);
        
        
       /* if($conexion){
            echo 'conexion exitosa';
            
        }else{
            
            echo 'no';
        }*/
        
        return $conexion;
    }
    //$cn=connect();
    


?>
