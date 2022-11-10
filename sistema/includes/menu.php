<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

	<!-- Sidebar - Brand -->
	<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
		<div class="sidebar-brand-icon">
		    </br>
			<img src="img/qwer.png" width="75px">
		</div>
		</br>
		<div class="sidebar-brand-text mx-3">Menu</div>
	</a>

	<!-- Divider -->
	<hr class="sidebar-divider my-0">

	<!-- Divider -->
	<hr class="sidebar-divider">
 </br>
	<!-- Heading -->
	<div class="sidebar-heading">
		Modulos del Sistema
	</div>
	
		<!-- Nav Item - Clientes Collapse Menu 
	<li class="nav-item">
		<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseClientes" aria-expanded="true" aria-controls="collapseUtilities">
			<i class="fas fa-id-card"></i>
			<span>Alumnos</span>
		</a>
		<div id="collapseClientes" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
			<div class="bg-white py-2 collapse-inner rounded">
				<a class="collapse-item" href="registro_cliente.php">Nuevo Alumno</a>
				<a class="collapse-item" href="lista_cliente.php">Listado de Alumnos</a>
			</div>
		</div>
	</li>-->
	

	<!-- Nav Item - Pages Collapse Menu 
	<li class="nav-item">
		<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
		    <i class="fas fa-info"></i>
		 	<span>Notas</span>
		</a>
		<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
			<div class="bg-white py-2 collapse-inner rounded">
				<a class="collapse-item" href="lista_notas.php">Listado de Notas</a>
			</div>
		</div>
	</li>-->

	<!-- Nav Item - Productos Collapse Menu 
	<li class="nav-item">
		<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
			<i class="fas fa-chalkboard-teacher"></i>
			<span>Lecciones</span>
		</a>
		<div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
			<div class="bg-white py-2 collapse-inner rounded">
				<a class="collapse-item" href="registro_lecciones.php">Nueva Leccion</a>
				<a class="collapse-item" href="lista_lecciones.php">Listado de Lecciones</a>
			</div>
		</div>
	</li>-->
	
			<!-- Nav Item - Clientes Collapse Menu 
	<li class="nav-item">
		<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePregunta" aria-expanded="true" aria-controls="collapseUtilities">
			<i class="fas fa-id-badge"></i>
			<span>Preguntas de Leccion</span>
		</a>
		<div id="collapsePregunta" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
			<div class="bg-white py-2 collapse-inner rounded">
				<a class="collapse-item" href="registro_preguntas.php">Nuevo Pregunta</a>
				<a class="collapse-item" href="lista_preguntas.php">Listado de Preguntas</a>
			</div>
		</div>
	</li>-->



	
		<!-- Nav Item - Clientes Collapse Menu -->
	
	<!-- Nav Item - Utilities Collapse Menu -->

	<?php if ($_SESSION['rol'] == 1) { ?>
		<!-- Nav Item - Usuarios Collapse Menu -->
		<li class="nav-item">
			<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUsuarios" aria-expanded="true" aria-controls="collapseUtilities">
				<i class="fas fa-user"></i>
				<span>Usuarios/Empleados</span>
			</a>
			<div id="collapseUsuarios" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
				<div class="bg-white py-2 collapse-inner rounded">
					<a class="collapse-item" href="registro_usuario.php">Nuevo Empleados</a>
					<a class="collapse-item" href="registro_dependencia.php">Nueva Dependecia</a>
					<a class="collapse-item" href="lista_usuarios.php">Listado Empleados</a>
					<a class="collapse-item" href="lista_dependecia.php">Listado Dependencias</a>
				</div>
			</div>
		</li>

		<li class="nav-item">
		<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePregunta" aria-expanded="true" aria-controls="collapseUtilities">
			<i class="fas fa-id-badge"></i>
			<span>Generar QR</span>
		</a>
		<div id="collapsePregunta" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
			<div class="bg-white py-2 collapse-inner rounded">
				<a class="collapse-item" href="registro_QR.php">Nuevo QR</a>
				<a class="collapse-item" href="lista_QR.php">Listado de QR</a>
			</div>
		</div> 

		<li class="nav-item">
		<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseDependencias" aria-expanded="true" aria-controls="collapseDependencias">
			<i class="fas fa-atom"></i>
			<span>Dependencias</span>
		</a>
		
		<div id="collapseDependencias" class="collapse" aria-labelledby="headingDependencias" data-parent="#accordionSidebar">
			<div class="bg-white py-2 collapse-inner rounded">
				<a class="collapse-item" href="lista_asis_emp.php">Nueva Dependencia</a>
				<a class="collapse-item" href="lista_asis_pas.php">Listado de Dependencia</a>
			</div>
		</div>
		</li>

		<li class="nav-item">
		<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseAsistencias" aria-expanded="true" aria-controls="collapseAsistencias">
			<i class="fas fa-clock"></i>
			<span>Asistencias</span>
		</a>
		
		<div id="collapseAsistencias" class="collapse" aria-labelledby="headingAsistencias" data-parent="#accordionSidebar">
			<div class="bg-white py-2 collapse-inner rounded">
				<a class="collapse-item" href="lista_asis_emp.php">Asistencias Empleados</a>
				<a class="collapse-item" href="lista_asis_pas.php">Asistencias Pasantes</a>
			</div>
		</div>
		</li>

	</li>

	<?php } ?>



	<?php if ($_SESSION['rol'] == 2) { ?>
		<!-- Nav Item - Usuarios Collapse Menu -->
		<li class="nav-item">
			<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUsuarios" aria-expanded="true" aria-controls="collapseUtilities">
				<i class="fas fa-user"></i>
				<span>Usuarios/Empleados</span>
			</a>
			<div id="collapseUsuarios" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
				<div class="bg-white py-2 collapse-inner rounded">
					<a class="collapse-item" href="registro_usuario.php">Nuevo Empleados</a>
					<a class="collapse-item" href="registro_dependencia.php">Asignar Dependecia </a>
					<a class="collapse-item" href="lista_usuarios.php">Listado Empleados</a>
					<a class="collapse-item" href="lista_dependecia.php">Listado Dependencias </a>
				</div>
			</div>
		</li>

		<li class="nav-item">
		<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePregunta" aria-expanded="true" aria-controls="collapseUtilities">
			<i class="fas fa-id-badge"></i>
			<span>Generar QR</span>
		</a>
		<div id="collapsePregunta" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
			<div class="bg-white py-2 collapse-inner rounded">
				<a class="collapse-item" href="registro_QR.php">Nuevo QR</a>
				<a class="collapse-item" href="lista_QR.php">Listado de QR</a>
			</div>
		</div>

		<li class="nav-item">
		<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseDependencias" aria-expanded="true" aria-controls="collapseDependencias">
			<i class="fas fa-atom"></i>
			<span>Dependencias</span>
		</a>
		
		<div id="collapseDependencias" class="collapse" aria-labelledby="headingDependencias" data-parent="#accordionSidebar">
			<div class="bg-white py-2 collapse-inner rounded">

				<a class="collapse-item" href="lista_dependencia2.php">Listado de Dependencia</a>
			</div>
		</div>
		</li>

		<li class="nav-item">
		<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseAsistencias" aria-expanded="true" aria-controls="collapseAsistencias">
			<i class="fas fa-atom"></i>
			<span>Asistencias</span>
		</a>
		
		<div id="collapseAsistencias" class="collapse" aria-labelledby="headingAsistencias" data-parent="#accordionSidebar">
			<div class="bg-white py-2 collapse-inner rounded">
				<a class="collapse-item" href="lista_asis_emp.php">Asistencias Empleados</a>
				<a class="collapse-item" href="lista_asis_pas.php">Asistencias Pasantes</a>
			</div>
		</div>
		</li>
	</li>




	<?php } ?>

	<?php if ($_SESSION['rol'] == 3) { ?>
		<!-- Nav Item - Usuarios Collapse Menu -->
		<li class="nav-item">
			<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUsuarios" aria-expanded="true" aria-controls="collapseUtilities">
				<i class="fas fa-user"></i>
				<span>Usuarios/Empleados</span>
			</a>
			<div id="collapseUsuarios" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
				<div class="bg-white py-2 collapse-inner rounded">
			
					<a class="collapse-item" href="lista_usuarios.php">Listado Empleados</a>
					<a class="collapse-item" href="lista_dependecia.php">Listado Dependencias</a>
				</div>
			</div>
		</li>

		<li class="nav-item">
		<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePregunta" aria-expanded="true" aria-controls="collapseUtilities">
			<i class="fas fa-id-badge"></i>
			<span>Generar QR</span>
		</a>
		<div id="collapsePregunta" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
			<div class="bg-white py-2 collapse-inner rounded">
			
				<a class="collapse-item" href="lista_QR.php">Listado de QR</a>
			</div>
		</div>

		<li class="nav-item">
		<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseDependencias" aria-expanded="true" aria-controls="collapseDependencias">
			<i class="fas fa-atom"></i>
			<span>Dependencias</span>
		</a>
		
		<div id="collapseDependencias" class="collapse" aria-labelledby="headingDependencias" data-parent="#accordionSidebar">
			<div class="bg-white py-2 collapse-inner rounded">

				<a class="collapse-item" href="lista_dependencia2.php">Listado de Dependencia</a>
			</div>
		</div>
		</li>
	</li>




	<?php } ?>

</ul>
