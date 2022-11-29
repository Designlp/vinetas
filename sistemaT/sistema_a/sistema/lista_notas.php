<?php include_once "includes/header.php"; ?>

<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">Notas</h1>
		<a href="registro_lecciones.php" class="btn btn-primary">Nuevo</a>
	</div>

	<div class="row">
		<div class="col-lg-12">
			<div class="table-responsive">
				<table class="table table-striped table-bordered" id="table">
					<thead class="thead-dark">
						<tr>
							<th>ID</th>
							<th>Id_Alumno</th>
							<th>Preguna_Lección</th>
							<th>Apellidos</th>
							<th>Nombres</th>
							<th>Puntos</th>
							
						</tr>
					</thead>
					<tbody>
						<?php
						include "../conexion.php";
	
//idNotas idFkAlumno IdFKPregunta Apellido Nombre Usuario Puntos
						$query = mysqli_query($conexion, "SELECT * FROM Notas");
						$result = mysqli_num_rows($query);
						if ($result > 0) {
							while ($data = mysqli_fetch_assoc($query)) { ?>
								<tr>
									<td><?php echo $data['idNotas']; ?></td>
									<td><?php echo $data['idFkAlumno']; ?></td>
									<td><?php echo $data['IdFKPregunta']; ?></td>
									<td><?php echo $data['Apellido']; ?></td>
									<td><?php echo $data['Nombre']; ?></td>	
									<td><?php echo $data['Puntos']; ?></td>	
									
										<?php if ($_SESSION['rol'] == 1) { ?>
								
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