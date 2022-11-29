<?php include_once "includes/header.php"; ?>

<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">Asistencia Pasantes</h1>
		<?php if ($_SESSION['rol'] == 1) { ?>

		<?php } ?>
	</div>

	<div class="row">
		<div class="col-lg-12">
			<div class="table-responsive">
				<table class="table table-striped table-bordered" id="table">
					<thead class="thead-dark">
						<tr>
							<th>ID</th>
							<th>APELLIDOS</th>
							<th>CARNET</th>
							<th>HORA</th>
					
							<th>FECHA</th>
							<?php if ($_SESSION['rol'] == 1) { ?>
					
							<?php }?>
						</tr>
					</thead>
					<tbody>
						<?php
						include "../conexion.php";

						$query = mysqli_query($conexion, "SELECT ae.IDAsistenciaPasante AS IDAS,ae.Hora AS HD,ae.Fecha AS FEC, u.Apellidos as APE,u.CarnetIdentidad AS CARNT
                            FROM asistenciapasante ae
                            INNER JOIN pasante e ON e.IDPasante= ae.IDPasante
                            INNER JOIN usuario u ON u.IDUsuario = e.IDUsuario");
						$result = mysqli_num_rows($query);
						if ($result > 0) {
							while ($data = mysqli_fetch_assoc($query)) { ?>
								<tr>
									<td><?php echo $data['IDAS']; ?></td>
									<td><?php echo $data['APE']; ?></td>
									<td><?php echo $data['CARNT']; ?></td>	
									<td><?php echo $data['HD']; ?></td>
									<td><?php echo $data['FEC']; ?></td>
								
									</td>
									
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