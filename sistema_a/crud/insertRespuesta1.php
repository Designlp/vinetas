<?php 
$conexion =mysqli_connect("localhost","u532654912_pdsiii","gtaV19921963","u532654912_pdsiii");

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