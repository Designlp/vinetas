SELECT COUNT(*) FROM Notas WHERE idFkAlumno='4' and Puntos='5' ;

<?php 

$conexion =mysqli_connect("localhost","id18079492_fucks","123456xxxXXX@","id18079492_estudiantes");
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