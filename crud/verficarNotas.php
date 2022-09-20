<?php 

$conexion =mysqli_connect("localhost","id18079492_fucks","123456xxxXXX@","id18079492_estudiantes");
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