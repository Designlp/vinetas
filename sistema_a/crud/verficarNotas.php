<?php 

$conexion =mysqli_connect("localhost","u532654912_pdsiii","gtaV19921963","u532654912_pdsiii");
//idNotas	idFkAlumno	IdFKPregunta	Apellido	Nombre	Usuario	Puntos

 $idFkAlumno = $_POST['idFkAlumno'];
 $IdFKPregunta = $_POST['IdFKPregunta'];

 
        $query = mysqli_query($conexion, "SELECT * FROM Notas where idFkAlumno = '$idFkAlumno' and IdFKPregunta = '$IdFKPregunta'");
        
        $result = mysqli_fetch_array($query);
        if ($result) {
          echo "update";
        } else {

             echo "insert";
         
        }



?>