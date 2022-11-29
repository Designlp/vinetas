<?php include_once "includes/header.php";
include "../conexion.php";
if (!empty($_POST)) {
    $alert = "";
    if (empty($_POST['dependencia'])) {
        $alert = '<div class="alert alert-primary" role="alert">
                    Todo los campos son obligatorios
                </div>';
    } else {
      $id_fk_usuario_r= $_POST['rol'];
      $fecha_inicio_r = $_POST['fecha_inicio'];
      $fecha_salida_r = $_POST['fecha_salida'];
                         
                  
        $ingreso_r = $_POST['ingreso'];
        $salida_r = $_POST['salida'];
        $dependencia_r = $_POST['dependencia'];
        
        
        
        
        
        
        
        
        
       if (($fecha_inicio_r > $fecha_salida_r)  || ($ingreso_r > $salida_r) )   {
            
     
                        $alert = '<div class="alert alert-danger" role="alert">
                        El horario y la fecha de Inicio no puede ser superior o igual a el horario y la fecha de salida </div>';
                
        }else {
            
            
            $query_insert = mysqli_query($conexion, "INSERT INTO pasante(IDUsuario, FechaInicio,FechaSalida, HoraEntrada, HoraSalida, IDDependencia)
            
             values ('$id_fk_usuario_r', '$fecha_inicio_r' , '$fecha_salida_r', '$ingreso_r', '$salida_r', '$dependencia_r')");
            if ($query_insert) {
                $alert = '<div class="alert alert-primary" role="alert">
                            Pasante registrado
                        </div>';
            } else {
                $alert = '<div class="alert alert-danger" role="alert">
                        Error al registrar Pasante
                    </div>';
            }
            
        }
        
        
                 
  
        
    }
}
?>

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Contratación de Pasante</h1>
        <a href="lista_usuarios.php" class="btn btn-primary">Regresar</a>
    </div>

    <!-- Content Row -->
    <div class="row">
        <div class="col-lg-6 m-auto">
            <form action="" method="post" autocomplete="off">
                <?php echo isset($alert) ? $alert : ''; ?>
          
                <div class="form-group">
                    <label>Usuario</label>
                    <select name="rol" id="rol" class="form-control seleccionarROL">
                    <option>---Selecciona un Usuario---</option>     
                        <?php
                        $query_rol = mysqli_query($conexion, "select u.IDUsuario as idus,u.Nombres as nombre from usuario u where u.IDRol=4 and u.IDUsuario NOT IN (SELECT n.IDUsuario FROM pasante n WHERE n.IDUsuario = u.IDUsuario );
 ");
             
                        $resultado_rol = mysqli_num_rows($query_rol);
                        if ($resultado_rol > 0) {
                            while ($rol = mysqli_fetch_array($query_rol)) {
                        ?>
                                <option value="<?php echo $rol["idus"]; ?>"><?php echo $rol["nombre"]; 
                               ?></option>
                        <?php

                            }
                        }

                        ?>
                    </select>
                </div>

                <div class="form-group">
                <label for="nombre">Fecha Inicio</label>
                <input type="date" class="form-control" name="fecha_inicio" id="fecha_inicio" >
                </div>
                          <div class="form-group">
                <label for="nombre">Fecha Salida</label>
                <input type="date" class="form-control" name="fecha_salida" id="fecha_salida" >
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
                    <select name="dependencia" id="dependencia" class="form-control seleccionarROL">
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