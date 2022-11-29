<?php include_once "includes/header.php";
include "../conexion.php";
if (!empty($_POST)) {
    $alert = "";
    if (empty($_POST['dependencia'])) {
        $alert = '<div class="alert alert-primary" role="alert">
                    Todo los campos son obligatorios
                </div>';
    } else {


        $nombre_r = $_POST['dependencia'];
        $descripcion_r = $_POST['descripcion'];
  


        $query = mysqli_query($conexion, "SELECT * FROM dependencia where Dependencia = '$nombre_r'");
        $result = mysqli_fetch_array($query);

        if ($result > 0) {
            $alert = '<div class="alert alert-danger" role="alert">
                       La dependencia ya se a registrado 
                    </div>';
        }else{
         
        

            $query_insert = mysqli_query($conexion, "INSERT INTO Dependencia(Dependencia)
            
             values ('$nombre_r')");
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
                    <label for="Dependecia">Dependecia</label>
                    <input type="text" placeholder="Ingrese la Dependencia" name="dependencia" id="dependencia" class="form-control">
                </div>
                  
                


                

                    
                <input type="submit" value="Guardar Dependencia" class="btn btn-primary">
            </form>
        </div>
    </div>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
<?php include_once "includes/footer.php"; ?>

