<?php
$conexion =mysqli_connect("localhost","u532654912_pdsiii","gtaV19921963","u532654912_pdsiii");
$avance = 6;



$sql2 = "SELECT * FROM Lecciones WHERE IdLec ='$avance' ";
$result2= mysqli_query($conexion,$sql2);

while($row = mysqli_fetch_array($result2)) {

    // If you want to display all results from the query at once:
   // print_r($row);

    // If you want to display the results one by one
    echo $row['Titulo'];
    

        
        }

    
?>