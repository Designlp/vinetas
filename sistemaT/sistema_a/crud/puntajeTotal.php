SELECT COUNT(*) FROM Notas WHERE idFkAlumno='4' and Puntos='5' ;

<?php 

$conexion =mysqli_connect("localhost","u532654912_pdsiii","gtaV19921963","u532654912_pdsiii");
//idNotas	idFkAlumno	IdFKPregunta	Apellido	Nombre	Usuario	Puntos

 $idFkAlumno = $_POST['idFkAlumno'];
 $query = mysqli_query($conexion, "SELECT COUNT(*) FROM Notas WHERE idFkAlumno = '$idFkAlumno' and Puntos='5'");
        
        $result = mysqli_fetch_array($query);
        if ($result) {
          echo "update";
        } else {

             echo "insert";
         
        }



?>