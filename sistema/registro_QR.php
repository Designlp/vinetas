<?php include_once "includes/header.php"; ?>

<?php 
  include "../conexion.php";
  if (!empty($_POST)) {
    $alert = "";
    if ( empty($_POST['codigos'])) {
      $alert = '<div class="alert alert-danger" role="alert">
                Todo los campos son obligatorios
              </div>';
    } else {
     
      $id_usuario = $_POST['txt1'];
      $qrcode = $_POST['codigos'];
	

      $sql_update = mysqli_query($conexion, "UPDATE usuario SET IDQr = '$qrcode'  WHERE CorreoElectronico = '$id_usuario'");

        if ($sql_update) {
        $alert = '<div class="alert alert-primary" role="alert">
                Qr Registrado
              </div>';
      } else {
        $alert = '<div class="alert alert-danger" role="alert">
                Error al registrar el Qr
              </div>';
      }
    }
  }

?>




 <!-- Begin Page Content -->
 <div class="container-fluid">

   <!-- Page Heading -->
   <div class="d-sm-flex align-items-center justify-content-between mb-4">
     <h1 class="h3 mb-0 text-gray-800">Registro de QR</h1>
     <a href="lista_preguntas.php" class="btn btn-primary">Regresar</a>
   </div>

   <!-- Content Row -->
   <div class="row">
     <div class="col-lg-6 m-auto">
         
         
 
       <form action="" method="post" autocomplete="off">
         
      <!-- <form action="Crear_Carnet.php" method="post" autocomplete="off"> -->
         <?php echo isset($alert) ? $alert : ''; ?>
         <div class="form-group">
           <label>Usuario al que se le Generara QR</label>
           <?php
             	include "../conexion.php";
            $query_proveedor = mysqli_query($conexion, "SELECT IDUsuario,CorreoElectronico,Nombres FROM usuario ORDER BY IDUsuario ASC");
            $resultado_proveedor = mysqli_num_rows($query_proveedor);
            mysqli_close($conexion);
            ?>
        
           <select id="idusuario" name="idusuario" class="form-control">
           <option>---Selecciona un Usuario---</option>   
             <?php
              if ($resultado_proveedor > 0) {
                while ($encontrado = mysqli_fetch_array($query_proveedor)) {
                  // code...
              ?>
                 <option value="<?php echo $encontrado['CorreoElectronico']; ?>"><?php echo $encontrado['Nombres']; ?></option>
                 


             <?php
                
                $nuevo=$encontrado;
              }
              }
              
              ?>
              
           </select>


      
       
       
         </div>
         <div class="form-group">
           <label>QR</label>
            </br>
         <!-- Libreria del QR -->    
          <script type="text/javascript" src="http://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
          <script src="https://unpkg.com/qrious@4.0.2/dist/qrious.js"></script>

          <script type="text/javascript" src="jquery.min.js"></script>
          <script type="text/javascript" src="qrcode.js"></script>
          <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/4.0.0/core.min.js"></script>
          <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.9-1/md5.js"></script>

          <input type="text" placeholder=".." name="codigos" id="codigos" class="form-control">
       
         <div class="row">
         <div class="col text-center">
         <input type="hidden" placeholder="fantasma 1" name="txt1" id="txt1" class="form-control">
            <div id="qrcode" style="width:100px; height:100px; margin-top:15px;"></div>
            </div>
          </div>
             <script>
                $("#idusuario").on('input',function() {
                
                var lineas = $("#idusuario option:selected").val();
                alert("qr:"+lineas);
                $("#qrcode").val("");
                $("#codigos").val("");
                $("#codigos").val(lineas);

               // $("#codigo").on('input',function(){    <meta http-equiv="refresh" content="2;url=lista_carrera.php">
              

                var qrcode = new QRCode(document.getElementById("qrcode"), {
                  width : 150,
                  height : 150
                });

                
                var valor = $("#codigos").val();

                var hash = CryptoJS.MD5("valor");
                
                $("#codigos").val(hash);
                alert(hash);
                  function makeCode () {
                $("#idusuario").prop( "disabled", true);
                $("#txt1").val(lineas);

                  var elText = document.getElementById("codigos");
                  qrcode.makeCode(elText.value);
                  }
                  makeCode();
                });

                function FuncionAtras() {
                  $("#idusuario").prop("disabled", false);
                  location.reload();
                }
                </script>

              </br>     
              </br>
              </br>       
           
             <script src="https://code.jquery.com/jquery-3.6.0.min.js"  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
       
         </div>
         
         
         <div class="row">
        <div class="col text-center">
          <button type="button" name="btnatras" id="btnatras" onclick="FuncionAtras()" class="btn btn-secondary">Atras</button>
         <input type="submit" value="Guardar"  name="btnenviar" class="btn btn-primary">
           </div>
      </div>
        </form>

       </div>
 
     
   </div>
              </br>
      <div class="container">
      <div class="row">
   
        <div class="col text-center">

          <!--  <a href="Crear_Carnet.php?id_usuario=<?php echo $id_usuario ?>" button class= "btn btn-primary" >Crear Carnet</button></a>-->

      

        
        </div>
      </div>
    </div>


   
 </div>
 <!-- /.container-fluid -->

 </div>
 <!-- End of Main Content -->
 <?php include_once "includes/footer.php"; ?>