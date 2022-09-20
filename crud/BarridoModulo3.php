<?php
$conexion =mysqli_connect("localhost","u532654912_pdsiii","gtaV19921963","u532654912_pdsiii");
$modulo = 3;


//SELECT COUNT(*) AS NUM FROM Lecciones WHERE idModulos = 1;

$sql2 = "SELECT COUNT(*) AS NUM FROM Lecciones WHERE idModulos ='$modulo' ";
$result2= mysqli_query($conexion,$sql2);

while($row = mysqli_fetch_array($result2)) {

    // If you want to display all results from the query at once:
   // print_r($row);

    // If you want to display the results one by one
    echo $row['NUM'];
    

        
        }

    
?>