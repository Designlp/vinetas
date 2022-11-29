<?php
include "includes/header.php";
include "../conexion.php";
if (!empty($_POST)) {
  $alert = "";
  if (empty($_POST['nombre']) || empty($_POST['descripcion'])) {
    $alert = '<p class"error">Todo los campos son requeridos</p>';
  } else {
    $iddependecias = $_GET['id'];
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];

    $sql_update = mysqli_query($conexion, "UPDATE dependencias SET nombre = '$nombre', descripcion = '$descripcion'  WHERE iddependecias = $iddependecias");
    $alert = '<p>Dependencia Actualizado</p>';
  }
}

// Mostrar Datos

if (empty($_REQUEST['id'])) {
  header("Location: lista_usuarios.php");
}
$iddependecias = $_REQUEST['id'];
$sql = mysqli_query($conexion, "SELECT * FROM dependencias WHERE iddependecias = $iddependecias");
$result_sql = mysqli_num_rows($sql);
if ($result_sql == 0) {
  header("Location: lista_usuarios.php");
} else {
  if ($data = mysqli_fetch_array($sql)) {
    $iddependecias = $data['iddependecias'];
    $nombre = $data['nombre'];
    $descripcion = $data['descripcion'];

  }
}
?>


<!-- Begin Page Content -->
<div class="container-fluid">

  <div class="row">
    <div class="col-lg-6 m-auto">
      <form class="" action="" method="post">
        <?php echo isset($alert) ? $alert : ''; ?>
        <input type="hidden" name="id" value="<?php echo $iddependecias; ?>">
  
        <div class="form-group">
                    <label for="Dependecia">Dependecia</label>
                    <input type="text" placeholder="Ingrese la Dependencia" name="nombre" id="nombre"  class="form-control" value="<?php echo $nombre;?>">
                </div>
                <div class="form-group">
                    <label for="Dependecia">descripcion</label>
                    <input type="text" placeholder="Ingrese la Descripción" name="descripcion" id="descripcion" class="form-control" value="<?php echo $descripcion;?>">
                </div>
                  

        <button type="submit" class="btn btn-primary"><i class="fas fa-user-edit"></i> Editar Dependencia</button>
      </form>
    </div>
  </div>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
<?php include_once "includes/footer.php"; ?>