<?php include_once "includes/header.php"; ?>

<?php 
  include "../conexion.php";
  if (!empty($_POST)) {
    $alert = "";
    if (empty($_POST['Titulo']) || empty($_POST['Leccion']) || empty($_POST['idModulos']) || $_POST['idModulos'] <  0 ) {
      $alert = '<div class="alert alert-danger" role="alert">
                Todo los campos son obligatorios
              </div>';
    } else {
     
      $Titulo = $_POST['Titulo'];
      $Leccion = $_POST['Leccion'];
      $idModulos = $_POST['idModulos'];
      

      $query_insert = mysqli_query($conexion, "INSERT INTO Lecciones(Titulo,Leccion,idModulos) values ('$Titulo', '$Leccion', '$idModulos')");
      if ($query_insert) {
        $alert = '<div class="alert alert-primary" role="alert">
                Leccion Registrado
              </div>';
      } else {
        $alert = '<div class="alert alert-danger" role="alert">
                Error al registrar la leccion
              </div>';
      }
    }
  }

?>




 <!-- Begin Page Content -->
 <div class="container-fluid">

   <!-- Page Heading -->
   <div class="d-sm-flex align-items-center justify-content-between mb-4">
     <h1 class="h3 mb-0 text-gray-800">Panel de Creación de Lecciones</h1>
     <a href="lista_lecciones.php" class="btn btn-primary">Regresar</a>
   </div>

   <!-- Content Row -->
   <div class="row">
     <div class="col-lg-6 m-auto">
       <form action="" method="post" autocomplete="off">
         <?php echo isset($alert) ? $alert : ''; ?>
      
         <div class="form-group">
           <label for="Titulo">Titulo</label>
           <input type="text" placeholder="Ingrese nombre del titulo" name="Titulo" id="Titulo" class="form-control">
         </div>
         <div class="form-group">
           <label for="Leccion">Contenido de la Leccion</label>
           <textarea placeholder="Ingrese la Leccion" class="form-control" name="Leccion" rows="4"  id="Leccion"></textarea>
         </div>
 
         
            <div class="form-group">
           <label>Modulo de la Lecciones</label>
           <?php
            $query_proveedor = mysqli_query($conexion, "SELECT idMod,NombreMod FROM Modulo ORDER BY idMod ASC");
            $resultado_proveedor = mysqli_num_rows($query_proveedor);
            mysqli_close($conexion);
            ?>
           <select id="idModulos" name="idModulos" class="form-control">
             <?php
              if ($resultado_proveedor > 0) {
                while ($encontrado = mysqli_fetch_array($query_proveedor)) {
                  // code...
              ?>
                 <option value="<?php echo $encontrado['idMod']; ?>"><?php echo $encontrado['idMod']; ?></option>
                 
             <?php
                
                $nuevo=$encontrado;
              }
              }
              
              ?>
              
           </select>
     
         </div>
         
         
                  <input type="submit" value="Guardar Leccion" class="btn btn-primary">
       </form>
     </div>
   </div>


 </div>
 <!-- /.container-fluid -->

 </div>
 <!-- End of Main Content -->
 <?php include_once "includes/footer.php"; ?>