<?php 
$conexion =mysqli_connect("localhost","u532654912_pdsiii","gtaV19921963","u532654912_pdsiii");

//idNotas	idFkAlumno	IdFKPregunta	Apellido	Nombre	Usuario	Puntos


 $idFkAlumno = $_POST['idFkAlumno'];
 $IdFKPregunta = $_POST['IdFKPregunta'];
 $Puntos = $_POST['Puntos'];
 

        
$query_update = mysqli_query($conexion, "UPDATE Notas SET Puntos = '".$Puntos."' where idFkAlumno='".$idFkAlumno."' and
 IdFKPregunta='".$IdFKPregunta."' ");
    
            if ($query_update) {
                   echo "exito" ;
                  
            } else {
                    echo "error" ;
            }
        


?>