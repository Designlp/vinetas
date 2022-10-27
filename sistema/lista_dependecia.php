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

	<div class="row">
		<div class="col-lg-12">
			<div class="table-responsive">
				<table class="table table-striped table-bordered" id="table">
					<thead class="thead-dark">
						<tr>
							<th>ID</th>
							<th>NOMBRES</th>
							<th>APELLIDOS</th>
							<th>DEPENDENCIAS</th>
							<th>HORARIO ENTRADA</th>
							<th>HORARIO SALIDA</th>
				
							<th>TIPO DE USUARIO</th>
							<th>ESTADO</th>
							<?php if ($_SESSION['rol'] == 1) { ?>
							<th>ACCIONES</th>
							<?php }?>
						</tr>
					</thead>
					<tbody>
						<?php
						include "../conexion.php";

						$query = mysqli_query($conexion, "SELECT DISTINCT u.IDUsuario, u.Nombres, u.Apellidos,u.CorreoElectronico, r.Rol , emp.IDDependencia 
						as depen, emp.HoraEntrada as entrada ,emp.HoraSalida as salida, u.Estado as TF FROM usuario u
						 INNER JOIN roles r ON u.IDRol = r.IDRol
						  INNER JOIN empleado emp ON emp.IDUsuario = u.IDUsuario

						");
						$result = mysqli_num_rows($query);
						if ($result > 0) {
							while ($data = mysqli_fetch_assoc($query)) { ?>
								<tr>
									<td><?php echo $data['IDUsuario']; ?></td>
									<td><?php echo $data['Nombres']; ?></td>
									<td><?php echo $data['Apellidos']; ?></td>
									<td><?php
						     		$nombre_dep=$data['depen'];

									$query2 = mysqli_query($conexion, "SELECT IDDependencia,Dependencia FROM dependencia Where IDDependencia= '$nombre_dep' ");
									$result2 = mysqli_num_rows($query2);
									if ($result2 > 0) {
										while ($data2 = mysqli_fetch_assoc($query2)) { 

										echo $data2['Dependencia'];
										}
									}
									 ?>
									</td>
									<td><?php echo $data['entrada']; ?></td>
									<td><?php echo $data['salida']; ?></td>
									<td><?php echo $data['Rol']; ?></td>
									<td><?php 
									

									if ($data['TF'] == 1) {
										$estado = '<span class="badge badge-pill badge-success">Activo</span>';
									} else {
										$estado = '<span class="badge badge-pill badge-danger">Inactivo</span>';
									}
									
									
									echo $estado; ?></td>

									<?php if ($_SESSION['rol'] == 1) { ?>
									<td>
										<a href="editar_usuario.php?id=<?php echo $data['IDUsuario']; ?>" class="btn btn-success"><i class='fas fa-edit'></i> Editar</a>
										<form action="eliminar_usuario.php?id=<?php echo $data['IDUsuario']; ?>" method="post" class="confirmar d-inline">
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