<?php include_once "includes/header.php";
include "../conexion.php";
if (!empty($_POST)) {
    $alert = "";
    if (empty($_POST['dependencia'])) {
        $alert = '<div class="alert alert-primary" role="alert">
                    Todo los campos son obligatorios
                </div>';
    } else {

        $id_fk_usuario_r = $_POST['rol'];
   
        $ingreso_r = $_POST['ingreso'];
        $salida_r = $_POST['salida'];
        $dependencia_r = $_POST['dependencia'];
        

            $query_insert = mysqli_query($conexion, "INSERT INTO empleado(IDUsuario,HoraEntrada, HoraSalida, IDDependencia)
            
             values ('$id_fk_usuario_r', '$ingreso_r', '$salida_r', '$dependencia_r')");
            if ($query_insert) {
                $alert = '<div class="alert alert-primary" role="alert">
                            Dependencia registrada
                        </div>';
            } else {
                $alert = '<div class="alert alert-danger" role="alert">
                        Error al registrar Dependencia
                    </div>';
            }
        
    }
}
?>

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Panel de Administración</h1>
        <a href="lista_usuarios.php" class="btn btn-primary">Regresar</a>
    </div>

    <!-- Content Row -->
    <div class="row">
        <div class="col-lg-6 m-auto">
            <form action="" method="post" autocomplete="off">
                <?php echo isset($alert) ? $alert : ''; ?>
          
                <div class="form-group">
                    <label>Usuario</label>
                    <select name="rol" id="rol" class="form-control">
                    <option>---Selecciona un Usuario---</option>     
                        <?php
                        $query_rol = mysqli_query($conexion, " select * from usuario");
             
                        $resultado_rol = mysqli_num_rows($query_rol);
                        if ($resultado_rol > 0) {
                            while ($rol = mysqli_fetch_array($query_rol)) {
                        ?>
                                <option value="<?php echo $rol["IDUsuario"]; ?>"><?php echo $rol["Nombres"]; 
                               ?></option>
                        <?php

                            }
                        }

                        ?>
                    </select>
                </div>


                <div class="form-group">
                    <label for="correo">Horario de Ingreso :&nbsp;</label>
                    <input type="time" id="ingreso" name="ingreso" min="00:00" max="23:59">
                </div>
                <div class="form-group">
                    <label for="correo">Horario de Salida :&nbsp;&nbsp;&nbsp;</label>
                    <input type="time" id="salida" name="salida" min="00:00" max="23:59">
                </div>
      
                  
                <div class="form-group">
                    <label>Dependecia</label>
                    <select name="dependencia" id="dependencia" class="form-control">
                    <option>---Selecciona una Dependencia---</option>     
                        <?php
                        $query_rol = mysqli_query($conexion, " select * from dependencia");
             
                        $resultado_rol = mysqli_num_rows($query_rol);
                        if ($resultado_rol > 0) {
                            while ($rol = mysqli_fetch_array($query_rol)) {
                        ?>
                                <option value="<?php echo $rol["IDDependencia"]; ?>"><?php echo $rol["Dependencia"] ?></option>
                        <?php

                            }
                        }

                        ?>
                    </select>
                </div>


                    
                <input type="submit" value="Guardar Usuario" class="btn btn-primary">
            </form>
        </div>
    </div>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
<?php include_once "includes/footer.php"; ?>