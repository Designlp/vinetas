<?php
include_once "includes/header.php";
include "../conexion.php";
if (!empty($_POST)) {
    $alert = "";
    if (empty($_POST['Titulo']) || empty($_POST['Leccion']) || empty($_POST['idModulos']) || $_POST['idModulos'] <  0 ) {
      $alert = '<div class="alert alert-danger" role="alert">
                Todo los campos son obligatorios
              </div>';
    } else {
      $IdLec2 = $_GET['id'];
      $Titulo = $_POST['Titulo'];
      $Leccion = $_POST['Leccion'];
      $idModulos = $_POST['idModulos'];
      
    

    
    $query_update = mysqli_query($conexion, "UPDATE Lecciones SET Titulo = '$Titulo', Leccion= '$Leccion', idModulos= '$idModulos' WHERE IdLec = $IdLec2");
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
$IdLec2 = $_REQUEST['id'];
$sql = mysqli_query($conexion, "SELECT * FROM Lecciones WHERE IdLec = $IdLec2");
mysqli_close($conexion);
$result_sql = mysqli_num_rows($sql);
if ($result_sql == 0) {
  header("Location: lista_lecciones.php");
} else {
  while ($data = mysqli_fetch_array($sql)) {
    $IdLec2 = $data['IdLec'];
    $Titulo = $data['Titulo'];
    $Leccion = $data['Leccion'];
    $idModulos = $data['idModulos'];
  }
}
?>
<!-- Begin Page Content -->
<div class="container-fluid">

  <div class="row">
    <div class="col-lg-6 m-auto">

      <div class="card">
        <div class="card-header bg-primary text-white">
          Modificar Leccion
        </div>
        <div class="card-body">
          <form action="" method="post">
            <?php echo isset($alert) ? $alert : ''; ?>
        
            <div class="form-group">
              <label for="producto">Titulo</label>
              <input type="text" class="form-control" placeholder="Ingrese titulo para la leccion" name="Titulo" id="Titulo" value="<?php echo $Titulo; ?>">

            </div>

            <div class="form-group">
              <label for="producto">Leccion</label>
              
         
           <textarea  placeholder="Ingrese contenido de la leccion" name="Leccion" rows="4" id="Leccion"  class="form-control"><?php echo $Leccion;?></textarea>
                        
            <!-- <input type="text" class="form-control" placeholder="Ingrese contenido de la leccion" rows="4" name="Leccion" id="Leccion" value="<?php echo $Leccion; ?>">-->

            </div>

            <div class="form-group">
              <label for="producto">Modulo</label>
              <input type="text" class="form-control" placeholder="Ingrese modulo de la leccion" name="idModulos" id="idModulos" value="<?php echo $idModulos; ?>">

            </div>

           
            
            <input type="submit" value="Actualizar Leccion" class="btn btn-primary">
          </form>
        </div>
      </div>
    </div>
  </div>


</div>
</div>
<?php include_once "includes/footer.php"; ?>