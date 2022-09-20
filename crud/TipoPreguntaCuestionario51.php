<?php
$conexion =mysqli_connect("localhost","id18079492_fucks","123456xxxXXX@","id18079492_estudiantes");
$avance = 20;



$sql2 = "SELECT * FROM BancoDePreguntas WHERE IdPregunta ='$avance' ";
$result2= mysqli_query($conexion,$sql2);

while($row = mysqli_fetch_array($result2)) {

    // If you want to display all results from the query at once:
   // print_r($row);

    // If you want to display the results one by one
    echo $row['TipoPregunta'];
    

        
        }

    
?>