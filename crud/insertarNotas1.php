<?php 

$conexion =mysqli_connect("localhost","id18079492_fucks","123456xxxXXX@","id18079492_estudiantes");


//idNotas	idFkAlumno	IdFKPregunta	Apellido	Nombre	Usuario	Puntos


 $idFkAlumno = $_POST['idFkAlumno'];
 $IdFKPregunta = $_POST['IdFKPregunta'];
 $Apellido = $_POST['Apellido'];
 $Nombre = $_POST['Nombre'];
 $Usuario = $_POST['Usuario'];
 $Puntos = $_POST['Puntos'];
 
        
         
$query_insert = mysqli_query($conexion, "INSERT INTO Notas(idFkAlumno,IdFKPregunta,Apellido,Nombre,Usuario,Puntos) values ('$idFkAlumno','$IdFKPregunta','$Apellido','$Nombre','$Usuario','$Puntos')");
            
            if ($query_insert) {
                   echo "exito" ;
                  
            } else {
                    echo "error" ;
            }
        


?>