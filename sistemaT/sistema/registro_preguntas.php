<?php include_once "includes/header.php"; ?>

<?php 
  include "../conexion.php";
  if (!empty($_POST)) {
    $alert = "";
    if (empty($_POST['IdFKLeccion']) || empty($_POST['Pregunta']) || empty($_POST['TipoPregunta'])) {
      $alert = '<div class="alert alert-danger" role="alert">
                Todo los campos son obligatorios
              </div>';
    } else {
     
      $IdFKLeccion = $_POST['IdFKLeccion'];
      $Pregunta = $_POST['Pregunta'];
      $TipoPregunta = $_POST['TipoPregunta'];
      $RespuestaCorrecta = $_POST['RespuestaCorrecta'];   	


      $query_insert = mysqli_query($conexion, "INSERT INTO BancoDePreguntas(IdFKLeccion,Pregunta,TipoPregunta,RespuestaCorrecta) values ('$IdFKLeccion', '$Pregunta', '$TipoPregunta', '$RespuestaCorrecta' )");
      if ($query_insert) {
        $alert = '<div class="alert alert-primary" role="alert">
                Pregunta Registrada
              </div>';
      } else {
        $alert = '<div class="alert alert-danger" role="alert">
                Error al registrar la pregunta
              </div>';
      }
    }
  }

?>




 <!-- Begin Page Content -->
 <div class="container-fluid">

   <!-- Page Heading -->
   <div class="d-sm-flex align-items-center justify-content-between mb-4">
     <h1 class="h3 mb-0 text-gray-800">Registro de preguntas de Lecciones</h1>
     <a href="lista_preguntas.php" class="btn btn-primary">Regresar</a>
   </div>

   <!-- Content Row -->
   <div class="row">
     <div class="col-lg-6 m-auto">
         
         

         
         
       <form action="" method="post" autocomplete="off">
         <?php echo isset($alert) ? $alert : ''; ?>
         <div class="form-group">
           <label>Numero de Lección</label>
           <?php
            $query = mysqli_query($conexion, "SELECT IdLec,Titulo FROM Lecciones ORDER BY IdLec ASC");
            $resultado = mysqli_num_rows($query);
            mysqli_close($conexion);
            ?>
           <select id=IdFKLeccion" name="IdFKLeccion" class="form-control">
             <?php
              if ($resultado > 0) {
                while ($xr = mysqli_fetch_array($query)) {
                  // code...
                   
              ?>
                 <option value="<?php echo $xr['IdLec']; ?>"> <?php echo $xr['IdLec']; ?></option>   
                 
                 
             <?php
                }
                
              }
         
              ?>
           </select>
         </div>
         <div class="form-group">
           <label for="Pregunta">Pregunta</label>
           
               <textarea  placeholder="Ingrese la pregunta que realizara" name="Pregunta" rows="4" id="Pregunta"  class="form-control"></textarea>
               
        
         </div>
         
          
           <div class="form-group">
           <label>Tipo de Pregunta</label>
          
           <select class="form-control" id="TipoPregunta" name="TipoPregunta" class="TipoPregunta">
               <option disabled selected>Selecciona una opción</option>
                    <option value="Selectiva">Selectiva</option>   
                 <option value="Verdadero o Falso">Verdadero o Falso</option>   
             
           </select>
           

             <script 
            src="https://code.jquery.com/jquery-3.6.0.min.js"
            integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"
          ></script>
          
            <script>
                $(document).ready(function () {
                    $('#TipoPregunta').change(function (e) {
                      if ($(this).val() === "Selectiva") {
                        $('#TipoRespuesta1').prop("disabled", false);
                        $('#TipoRespuesta2').prop("disabled", "disabled");
                      } 
                      
                        if ($(this).val() === "Verdadero o Falso") {
                        $('#TipoRespuesta2').prop("disabled", false);
                        $('#TipoRespuesta1').prop("disabled", "disabled");
                      }  
                      
                    })
                  });
                  
              </script>
           
           </br>

           <label for="x">Respuesta Correcta Solo Para Selectivas </label>
           <div class="form-group" disabled>
             
                <select class="form-control" id="TipoRespuesta1" name="RespuestaCorrecta" class="TipoRespuesta1" disabled>
                 <option disabled selected>Selecciona una opción</option>
                 <option value="A">A</option>   
                 <option value="B">B</option>   
                 <option value="C">C</option>  
             
           </select>
           
            </br>
           <label for="x">Respuesta Correcta Solo Para Verdadero y Falso</label>
           <div class="form-group" disabled>
             
                <select class="form-control" id="TipoRespuesta2" name="RespuestaCorrecta" class="TipoRespuesta2" disabled>
                 <option disabled selected>Selecciona una opción</option>
                 <option value="Verdadero">Verdadero</option>   
                 <option value="Falso">Falso</option>   

             
           </select>
       
         </div>
         
         
          
          </br>
         
         <input type="submit" value="Guardar Leccion" class="btn btn-primary">
       </form>
     </div>
   </div>


 </div>
 <!-- /.container-fluid -->

 </div>
 <!-- End of Main Content -->
 <?php include_once "includes/footer.php"; ?>