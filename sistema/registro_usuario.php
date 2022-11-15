<?php include_once "includes/header.php";
include "../conexion.php";
if (!empty($_POST)) {
    $alert = "";
    if (empty($_POST['nombre']) ||  empty($_POST['passw'])) {
        $alert = '<div class="alert alert-primary" role="alert">
                    Todo los campos son obligatorios
                </div>';
    } else {

        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellidos'];
        $correo = $_POST['correo'];
        $fecha = $_POST['fecha'];


        $carnet = $_POST['carnet'];
        $tel = $_POST['Telefono'];
        
        $passw = md5($_POST['passw']);
        
        
        $rol = $_POST['rol'];

        $query = mysqli_query($conexion, "SELECT * FROM usuario where CorreoElectronico = '$correo'");
        $result = mysqli_fetch_array($query);

        if ($result > 0) {
            $alert = '<div class="alert alert-danger" role="alert">
                        El correo ya existe
                    </div>';
        } else {
            $query_insert = mysqli_query($conexion, "INSERT INTO usuario(Nombres,Apellidos,FechaNacimiento,
            CarnetIdentidad,CorreoElectronico,Contrasena,Telefono,Estado,IDQr,IDRol) values ('$nombre', '$apellido', '$fecha',  '$carnet', '$correo', '$passw',  '$tel' ,
            '1','1','$rol')");
            if ($query_insert) {
                $alert = '<div class="alert alert-primary" role="alert">
                            Usuario registrado
                        </div>';
            } else {
                $alert = '<div class="alert alert-danger" role="alert">
                        Error al registrar
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
        <h1 class="h3 mb-0 text-gray-800">Panel de Administración</h1>
        <a href="lista_usuarios.php" class="btn btn-primary">Regresar</a>
    </div>

    <!-- Content Row -->
    <div class="row">
        <div class="col-lg-6 m-auto">
            <form action="" method="post" autocomplete="off">
                <?php echo isset($alert) ? $alert : ''; ?>
                <div class="form-group">
                <label for="nombre">Nombres</label>
                <input type="text" placeholder="Ingrese sus Nombres" class="form-control" name="nombre" id="nombre" >
                </div>

                <div class="form-group">
                <label for="nombre">Apellidos</label>
                <input type="text" placeholder="Ingrese sus Apellidos" class="form-control" name="apellidos" id="apellidos">
                </div>

                <div class="form-group">
                <label for="nombre">Fecha Nacimiento</label>
                <input type="date" class="form-control" name="fecha" id="fecha" >
                </div>

                <div class="form-group">
                <label for="nombre">Carnet Identidad</label>
                <input type="text" placeholder="Ingrese su Carnet Identidad" class="form-control" name="carnet" id="carnet">
                </div>
                
                <div class="form-group">
                <label for="nombre">Contraseña</label>
                <input type="password" placeholder="Ingrese su Contraseña" class="form-control" name="passw" id="passw">
                </div>

                <div class="form-group">
                <label for="correo">Correo</label>
                <input type="email" placeholder="Ingrese correo electronico" class="form-control" name="correo" id="correo">
                </div>
                <div class="form-group">
                <label for="Telefono">Telefono</label>
                <input type="number" placeholder="Ingrese Celular o Telefono" class="form-control" name="Telefono" id="Telefono">

                </div>
                <div class="form-group">
                   
                            <select name="rol" id="rol" class="form-control">
                            <option>---Selecciona un Rol---</option>   
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
                            
                    
                    
                    
                    
                <input type="submit" value="Guardar Usuario" class="btn btn-primary">
            </form>
        </div>
    </div>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
<?php include_once "includes/footer.php"; ?>