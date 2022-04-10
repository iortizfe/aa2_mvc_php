<?php
    include '../../../views/partials/header.php';
?>

<main class="o-register-page o-register-form">
	<div class="w-content">
		<h2 class="general-title tcenter">Profesores</h2>
		<div class="grid-row">
			<div class="grid-md-3">
				<div class="pd-10"><a href="<?php echo URLROOT.'controllers/admin/teachers/insertar.php'?>" class="button">Añadir Profesores</a></div>
				<div class="pd-10"><a href="<?php echo URLROOT.'controllers/admin/courses/insertar.php'?>" class="button">Añadir Cursos</a></div>
				<div class="pd-10"><a href="<?php echo URLROOT.'controllers/admin/clases/insertar.php'?>" class="button">Añadir Clases</a></div>
			</div>
			<div class="grid-md-9">
			
			</div>
		</div>
	</div>
</main>



<?php
    include '../../../views/partials/footer.php'
?>