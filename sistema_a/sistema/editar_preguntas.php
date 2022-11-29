<?php
include_once "includes/header.php";

  include "../conexion.php";
if (!empty($_POST)) {
    $alert = "";
    if (empty($_POST['Pregunta']) || empty($_POST['TipoPregunta']) || empty($_POST['RespuestaCorrecta'])  ) {
      $alert = '<div class="alert alert-danger" role="alert">
                Todo los campos son obligatorios
              </div>';
    } else {
       $IdPregunta = $_GET['id']; 
      $IdFKLeccion = $_POST['IdFKLeccion'];
      $Pregunta = $_POST['Pregunta'];
      $TipoPregunta = $_POST['TipoPregunta'];
      $RespuestaCorrecta = $_POST['RespuestaCorrecta'];   	

    
 
 $query_update = mysqli_query($conexion, "UPDATE BancoDePreguntas SET IdFKLeccion = '$IdFKLeccion', Pregunta= '$Pregunta', 
 TipoPregunta= '$TipoPregunta', RespuestaCorrecta='$RespuestaCorrecta'  WHERE IdPregunta = $IdPregunta");
    if ($query_update) {
      $alert = '<div class="alert alert-success" role="alert">
              Modificado
            </div>';
    } else {
      $alert = '<div class="alert alert-primary" role="alert">
                Error al Modificar
              </div>';
    }
  }
}

// Validar producto

if (empty($_REQUEST['id'])) {
  header("Location: lista_lecciones.php");
  mysqli_close($conexion);
}

$IdPregunta = $_REQUEST['id'];
$sql = mysqli_query($conexion, "SELECT * FROM BancoDePreguntas WHERE IdPregunta = $IdPregunta");
mysqli_close($conexion);
$result_sql = mysqli_num_rows($sql);
if ($result_sql == 0) {
  header("Location: lista_lecciones.php");
} else {
  while ($data = mysqli_fetch_array($sql)) {

    $IdFKLeccion = $data['IdFKLeccion'];
    $Pregunta = $data['Pregunta'];
    $TipoPregunta = $data['TipoPregunta'];
    $RespuestaCorrecta = $data['RespuestaCorrecta'];
  }
}

?>
<!-- Begin Page Content -->
<div class="container-fluid">

  <div class="row">
    <div class="col-lg-6 m-auto">

      <div class="card">
        <div class="card-header bg-primary text-white">
          Modificar Preguntas
        </div>
        <div class="card-body">
        <form action="" method="post" >
             <?php echo isset($alert) ? $alert : ''; ?>
                     
         <div class="form-group">
           <label>Numero de Lección</label>
      
           <select id=IdFKLeccion" name="IdFKLeccion" class="form-control">
             <?php
             include "../conexion.php";
             
             
            $query = mysqli_query($conexion, "SELECT IdLec,Titulo FROM Lecciones ORDER BY IdLec ASC");
            $resultado = mysqli_num_rows($query);
            mysqli_close($conexion);
            ?>
              <option value="<?php echo $IdFKLeccion;?>"><?php echo $IdFKLeccion; ?></option> 
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
           <textarea name="Pregunta" rows="4" id="Pregunta"  class="form-control"><?php echo $Pregunta;?></textarea>
         </div>
         
          
           <div class="form-group">
           <label>Tipo de pregunta que va cambiar</label>
          
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
             
                <select class="form-control" id="TipoRespuesta1" name="RespuestaCorrecta" class="TipoRespuesta1"  disabled>
            
                 <option disabled selected>Selecciona una opción</option>
                 <option value="A">A</option>   
                 <option value="B">B</option>   
                 <option value="C">C</option>  
                 <option value="D">D</option>  
             
           </select>
           
            </br>
           <label for="x">Respuesta Correcta Solo Para Verdadero y Falso Seleccionada</label>
           <div class="form-group" disabled>
             
                <select class="form-control" id="TipoRespuesta2"  name="RespuestaCorrecta" class="TipoRespuesta2" disabled>
                 <option disabled selected>Selecciona una opción</option>
                 <option value="Verdadero">Verdadero</option>   
                 <option value="Falso">Falso</option>   

             
           </select>
       
         </div>
         
         
          
          </br>
     
     
           
            <input type="submit" value="Actualizar Leccion" class="btn btn-primary">
          </form>
        </div>
      </div>
    </div>
  </div>


</div>
</div>
<?php include_once "includes/footer.php"; ?>