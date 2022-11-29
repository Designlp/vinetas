<?php include_once "includes/header.php"; ?>

<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">Banco de preguntas</h1>
		<a href="registro_preguntas.php" class="btn btn-primary">Nuevo</a>
	</div>

	<div class="row">
		<div class="col-lg-12">

			<div class="table-responsive">
				<table class="table table-striped table-bordered" id="table">
					<thead class="thead-dark">
						<tr>
							<th>ID</th>
											<th>NUMERO DE LECCIÓN</th>
							
											<th>PREGUNTA</th>
											
							<th>TIPO DE PREGUNTA</th>
						<th>RESPUESTA</th>
					<th>ACCIONES</th>
				
							<?php if ($_SESSION['rol'] == 1) { ?>
				
							<?php } ?>
						</tr>
					</thead>
					<tbody>
						<?php
						include "../conexion.php";

						$query = mysqli_query($conexion, "SELECT * FROM BancoDePreguntas");
						$result = mysqli_num_rows($query);
						if ($result > 0) {
							while ($data = mysqli_fetch_assoc($query)) { ?>
								<tr>
									<td><?php echo $data['IdPregunta']; ?></td>
									<td><?php echo $data['IdFKLeccion']; ?></td>
									<td><?php echo $data['Pregunta']; ?></td>
									<td><?php echo $data['TipoPregunta']; ?></td>
									<td><?php echo $data['RespuestaCorrecta']; ?></td>
											
										
						
									<?php if ($_SESSION['rol'] == 1) { ?>
									<td>
										<a href="editar_preguntas.php?id=<?php echo $data['IdPregunta']; ?>" class="btn btn-success"><i class='fas fa-edit'></i></a>
										<form action="eliminar_preguntas.php?id=<?php echo $data['IdPregunta']; ?>" method="post" class="confirmar d-inline">
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