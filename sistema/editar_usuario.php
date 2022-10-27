<?php
include "includes/header.php";
include "../conexion.php";
if (!empty($_POST)) {
  $alert = "";
  if (empty($_POST['nombre']) || empty($_POST['correo']) || empty($_POST['usuario']) || empty($_POST['rol'])) {
    $alert = '<p class"error">Todo los campos son requeridos</p>';
  } else {
    $idusuario = $_GET['id'];
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $usuario = $_POST['usuario'];
    $rol = $_POST['rol'];

    $sql_update = mysqli_query($conexion, "UPDATE usuario SET nombre = '$nombre', correo = '$correo' , usuario = '$usuario', rol = $rol WHERE idusuario = $idusuario");
    $alert = '<p>Usuario Actualizado</p>';
  }
}

// Mostrar Datos

if (empty($_REQUEST['id'])) {
  header("Location: lista_usuarios.php");
}
$idusuario = $_REQUEST['id'];
$sql = mysqli_query($conexion, "SELECT * FROM usuario WHERE IDUsuario = $idusuario");
$result_sql = mysqli_num_rows($sql);
if ($result_sql == 0) {
  header("Location: lista_usuarios.php");
} else {
  if ($data = mysqli_fetch_array($sql)) {
    $idcliente = $data['IDUsuario'];
    $nombre = $data['Nombres'];
    $apellidos = $data['Apellidos']; 
    $fecha_nac = $data['FechaNacimiento']; 
    $Carnet_Identidad = $data['CarnetIdentidad']; 
    $correo = $data['CorreoElectronico'];
    $Telefono = $data['Telefono'];


    $rol = $data['IDRol'];
  }
}
?>


<!-- Begin Page Content -->
<div class="container-fluid">

  <div class="row">
    <div class="col-lg-6 m-auto">
      <form class="" action="" method="post">
        <?php echo isset($alert) ? $alert : ''; ?>
        <input type="hidden" name="id" value="<?php echo $idusuario; ?>">
        <div class="form-group">
          <label for="nombre">Nombres</label>
          <input type="text" placeholder="Ingrese nombre" class="form-control" name="nombre" id="nombre" value="<?php echo $nombre; ?>">
        </div>

        <div class="form-group">
          <label for="nombre">Apellidos</label>
          <input type="text" placeholder="Ingrese nombre" class="form-control" name="apellidos" id="apellidos" value="<?php echo $apellidos; ?>">
        </div>

        <div class="form-group">
          <label for="nombre">Fecha Nacimiento</label>
          <input type="text" placeholder="Ingrese nombre" class="form-control" name="apellidos" id="apellidos" value="<?php echo $fecha_nac; ?>">
        </div>

        <div class="form-group">
          <label for="nombre">Carnet Identidad</label>
          <input type="text" placeholder="Ingrese nombre" class="form-control" name="apellidos" id="apellidos" value="<?php echo $Carnet_Identidad; ?>">
        </div>

        <div class="form-group">
          <label for="correo">Correo</label>
          <input type="text" placeholder="Ingrese correo" class="form-control" name="correo" id="correo" value="<?php echo $correo; ?>">
        </div>
        <div class="form-group">
          <label for="usuario">Telefono</label>
          <input type="text" placeholder="Ingrese usuario" class="form-control" name="Telefono" id="Telefono" value="<?php echo $Telefono; ?>">

        </div>
        <div class="form-group">
                    <label>Rol</label>
                    <select name="rol" id="rol" class="form-control">
                        <?php
                        $query_rol = mysqli_query($conexion, " select * from roles");
                        mysqli_close($conexion);
                        $resultado_rol = mysqli_num_rows($query_rol);
                        if ($resultado_rol > 0) {
                            while ($rol = mysqli_fetch_array($query_rol)) {
                        ?>
                                <option value="<?php echo $rol["IDRol"]; ?>"><?php echo $rol["Rol"] ?></option>
                        <?php

                            }
                        }

                        ?>
                    </select>
          </div>
        <button type="submit" class="btn btn-primary"><i class="fas fa-user-edit"></i> Editar Usuario</button>
      </form>
    </div>
  </div>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
<?php include_once "includes/footer.php"; ?>