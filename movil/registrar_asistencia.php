<?php
include 'conexion.php';

$con= connect();

date_default_timezone_set('America/Dominica');

$hora = date ('H:i:s');
$fecha= date ('Y-m-d');

//echo $fecha." ".$hora ;

$correo=$_POST['correo'];
$rol=$_POST['rol'];

if($rol=='Pasante'){
    
    $query= "CALL INSERT_ATTENDANCE_PRACTICING('{$correo}','{$hora}','{$fecha}')";
    mysqli_query($con,$query);
    
    echo json_encode ('REGISTRADO PASANTE');
    
}else{
    
    $query = "CALL INSERT_ATTENDANCE_EMPLOYED('{$correo}','{$hora}','{$fecha}'')";
    
    mysqli_query($con,$query);
    
    echo json_encode('REGISTRADO EMPLEADO');
    
    
    
}





?>