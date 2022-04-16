
<?php
    include '../../views/partials/header.php';
?>
<main class="o-register-page o-register-form">
	<div class="w-content">
		<h2 class="general-title tcenter">Clases</h2>
		<div class="grid-row">
			<div class="grid-md-3">
				<div class="pd-10"><a href="<?php echo URLROOT.'controllers/admin/teachers/insertar.php'?>" class="button">Añadir Profesores</a></div>
				<div class="pd-10"><a href="<?php echo URLROOT.'controllers/admin/courses/insertar.php'?>" class="button">Añadir Cursos</a></div>
			</div>
			<div class="grid-md-9 pd-20">
			 	<table id="datatable" class="datatable display" style="width:100%">
					<thead>
						<tr>
                            <th>Nombre</th>
							<th>Fecha Inicio</th>
							<th>Fecha Fin</th>
							<th>Actions</th>
						</tr>
					</thead>
					<tbody>
						<?php 
						if(isset($mine_courses)){

						foreach ($mine_courses as $course) { ?>
						<tr>
							<td><?php echo $course->name;?></td>
							<td><?php echo $course->date_start;?></td>
							<td><?php echo $course->date_end;?></td>
							<td>
								<?php if(is_null($course->id_student)) {?>
                                    <button class="button green button-add-student-course">DARSE DE ALTA</button>
                                <?php } else if($course->active == 0) { ?>
                                    <button class="button orange button-on-student-course">REACTIVAR</button>
                                <?php } else {  ?>
                                    <button class="button red button-off-student-course">DESACTIVAR</button>
                                <?php } ?>
							</td>
						</tr>
						<?php }
							}	
						?>
					</tbody>
					<tfoot>
						<tr>
							<th>Nombre</th>
							<th>Fecha Inicio</th>
							<th>Fecha Fin</th>
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
	const { target } = e;
	if (target.classList.contains('button-add-student-course')) {
		var btn = target,
			id = btn.getAttribute('data-id'),
			message = '¿Seguro que quieres apuntarte a '+btn.getAttribute('data-course')+'?';
			url = '<?php echo URLROOT ?>';
			if(window.confirm(message)){
				location.href = url+'controllers/admin/clases/addCourse.php?id='+id;
			}
		}

    if (target.classList.contains('button-add-student-course')) {
		var btn = target,
			id = btn.getAttribute('data-id'),
			message = '¿Seguro que quieres apuntarte a '+btn.getAttribute('data-course')+'?';
			url = '<?php echo URLROOT ?>';
			if(window.confirm(message)){
				location.href = url+'controllers/admin/clases/addCourse.php?id='+id;
			}
		}
	});
</script>


<?php
    include '../../views/partials/footer.php'
?>