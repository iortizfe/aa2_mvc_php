<?php
    include '../../../views/partials/header.php';
?>
<main class="o-register-page o-register-form">
	<div class="w-content">
		<h2 class="general-title tcenter">Cursos</h2>
		<div class="grid-row">
			<div class="grid-md-3">
				<div class="pd-10"><a href="<?php echo URLROOT.'controllers/admin/teachers/insertar.php'?>" class="button">Añadir Profesores</a></div>
				<div class="pd-10"><a href="<?php echo URLROOT.'controllers/admin/courses/insertar.php'?>" class="button">Añadir Cursos</a></div>
				<div class="pd-10"><a href="<?php echo URLROOT.'controllers/admin/clases/insertar.php'?>" class="button">Añadir Clases</a></div>
			</div>
			<div class="grid-md-9 pd-20">
			 	<table id="datatable" class="datatable display" style="width:100%">
					<thead>
						<tr>
							<th>Nombre</th>
							<th>Fecha inicio</th>
							<th>Fecha fin</th>
							<th>Activo</th>
							<th>Actions</th>
						</tr>
					</thead>
					<tbody>
						<?php 
							if(isset($courses)){
								foreach ($courses as $course) { ?>
						<tr>
							<td><?php echo $course->name;?></td>
							<td><?php echo $course->date_start;?></td>
							<td><?php echo $course->date_end;?></td>
							<td><?php echo ($course->active == 1) ? 'Activo' : 'No Activo';?></td>
							<td>
								<a class="button-icon button-remove-course las la-trash-alt" data-id="<?php echo $course->id_course; ?>" data-name="<?php echo $course->name;?>">
								</a>
								<a class="button-icon las la-pen" href="<?php echo URLROOT.'controllers/admin/courses/modificar.php?id='.$course->id_course;?>">
								</a>
							</td>
						</tr>
						<?php }
							}
						?>
					</tbody>
					<tfoot>
						<tr>
							<th>Nombre</th>
							<th>Fecha inicio</th>
							<th>Fecha fin</th>
							<th>Activo</th>
							<th>Actions</th>
						</tr>
					</tfoot>
				</table>
			</div>
		</div>
	</div>
</main>

<script>
	    const table = document.querySelector('.datatable');
        table.addEventListener('click', e => {
        const { target } = e;as
        if (target.classList.contains('button-remove-course')) {
            var btn = target,
				id = btn.getAttribute('data-id'),
                message = '¿Seguro que quieres borrar a '+btn.getAttribute('data-name')+'?';
				url = '<?php echo URLROOT ?>';
                if(window.confirm(message)){
                    location.href = url+'controllers/admin/courses/remove.php?id='+id;
                }
       	 	}
	});
</script>


<?php
    include '../../../views/partials/footer.php'
?>