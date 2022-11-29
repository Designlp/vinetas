<?php include_once "includes/header.php"; ?>

<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">Usuarios</h1>
		<?php if ($_SESSION['rol'] == 1) { ?>
		<a href="registro_usuario.php" class="btn btn-primary">Nuevo</a>
		<?php } ?>
	</div>
	<script type="text/javascript" src="http://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
          <script src="https://unpkg.com/qrious@4.0.2/dist/qrious.js"></script>

          <script type="text/javascript" src="jquery.min.js"></script>
          <script type="text/javascript" src="qrcode.js"></script>
          <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/4.0.0/core.min.js"></script>
          <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.9-1/md5.js"></script>

	<div class="row">
		<div class="col-lg-12">
			<div class="table-responsive">
				<table class="table table-striped table-bordered" id="table">
					<thead class="thead-dark">
						<tr>
							<th>ID</th>
							<th>NOMBRE</th>
				
							<th>QR</th>
						
							<?php if ($_SESSION['rol'] == 1) { ?>
							<th>ACCIONES</th>
							<?php }?>
						</tr>
					</thead>
					<tbody>

					<script>
                $("#idusuario").on('input',function() {
                var lineas = $("#idusuario option:selected").val();
                alert("qr:"+lineas);
                $("#qrcode").val("");
                $("#codigos").val("");
                $("#codigos").val(lineas);

               // $("#codigo").on('input',function(){
              

                var qrcode = new QRCode(document.getElementById("qrcode"), {
                  width : 150,
                  height : 150
                });
                
            
                
                $("#codigos").val(hash);
                alert(hash);
                  function makeCode () {
                  var elText = document.getElementById("codigos");
                  qrcode.makeCode(elText.value);
                  }
                  makeCode();
                });
                </script>


						<?php
						include "../conexion.php";

						$query = mysqli_query($conexion, "SELECT u.idusuario, u.nombre, u.correo, u.usuario, u.id_qr as qr FROM usuario u INNER JOIN rol r ON u.rol = r.idrol");
						$result = mysqli_num_rows($query);
						if ($result > 0) {
							while ($data = mysqli_fetch_assoc($query)) { ?>
								<tr>
									<td><?php echo $data['idusuario']; ?></td>
									<td><?php echo $data['nombre']; ?></td>
				
									<td><?php echo $data['qr']; ?></td>
									<?php if ($_SESSION['rol'] == 1) { ?>
									<td>
										<a href="editar_usuario.php?id=<?php echo $data['idusuario']; ?>" class="btn btn-success"><i class='fas fa-edit'></i> Editar</a>
										<form action="eliminar_usuario.php?id=<?php echo $data['idusuario']; ?>" method="post" class="confirmar d-inline">
											<button class="btn btn-danger" type="submit"><i class='fas fa-trash-alt'></i> </button>
										</form>
									</td>
									<?php } ?>
								</tr>
						<?php }
						} ?>
					</tbody>

				</table>
			</div>

		</div>
	</div>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->


<?php include_once "includes/footer.php"; ?>