<?php include_once "includes/header.php";
include "../conexion.php";
if (!empty($_POST)) {
  $alert = "";
  if (empty($_POST['Nombres']) || empty($_POST['Apellidos']) || empty($_POST['email'])) {
    $alert = '<p class"error">Todo los campos son requeridos</p>';
  } else {
    $id = $_GET['id'];
    $Nombres = $_POST['Nombres'];
    $Apellidos = $_POST['Apellidos'];
    $email = $_POST['email'];


      $sql_update = mysqli_query($conexion, "UPDATE users SET Nombres = '$Nombres' , Apellidos = '$Apellidos', email = '$email' WHERE id = $id");

      if ($sql_update) {
        $alert = '<p class"exito">Estudiante Actualizado correctamente</p>';
      } else {
        $alert = '<p class"error">Error al Actualizar el Estudiante</p>';
      }
    }
  }

// Mostrar Datos

if (empty($_REQUEST['id'])) {
  header("Location: lista_cliente.php");
  mysqli_close($conexion);
}
$id = $_REQUEST['id'];
$sql = mysqli_query($conexion, "SELECT * FROM users WHERE id = $id");
mysqli_close($conexion);
$result_sql = mysqli_num_rows($sql);
if ($result_sql == 0) {
  header("Location: lista_cliente.php");
} else {
  while ($data = mysqli_fetch_array($sql)) {
    $id = $data['id'];
    $Nombres = $data['Nombres'];
    $Apellidos = $data['Apellidos'];
    $email = $data['email'];
  }
}
?>
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <div class="row">
            <div class="col-lg-6 m-auto">

              <form class="" action="" method="post">
                <?php echo isset($alert) ? $alert : ''; ?>
       
            
                <div class="form-group">
                  <label for="nombre">Nombres</label>
                  <input type="text" placeholder="Ingrese Nombre" name="Nombres" class="form-control" id="Nombres" value="<?php echo $Nombres; ?>">
                </div>
                <div class="form-group">
                  <label for="telefono">Apellidos</label>
                  <input type="text" placeholder="Ingrese Teléfono" name="Apellidos" class="form-control" id="Apellidos" value="<?php echo $Apellidos; ?>">
                </div>
                <div class="form-group">
                  <label for="direccion">Email</label>
                  <input type="text" placeholder="Ingrese Direccion" name="email" class="form-control" id="email" value="<?php echo $email; ?>">
                </div>
                <button type="submit" class="btn btn-dark"><i class="fas fa-user-edit"></i> Editar Estudiante</button>
              </form>
            </div>
          </div>


        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
      <?php include_once "includes/footer.php"; ?>