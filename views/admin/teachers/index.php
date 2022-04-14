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
			<div class="grid-md-9 pd-20">
			 	<table id="datatable" class="datatable display" style="width:100%">
					<thead>
						<tr>
							<th>Nombre</th>
							<th>Apellido</th>
							<th>Teléfono</th>
							<th>Email</th>
							<th>Actions</th>
						</tr>
					</thead>
					<tbody>
						<?php 	if(isset($teachers)){
							foreach ($teachers as $teacher) { ?>
						<tr>
							<td><?php echo $teacher->name;?></td>
							<td><?php echo $teacher->surname;?></td>
							<td><?php echo $teacher->telephone;?></td>
							<td><?php echo $teacher->email;?></td>
							<td>
								<a class="button-icon button-remove-teacher las la-trash-alt" data-id="<?php echo $teacher->id_teacher; ?>" data-name="<?php echo $teacher->name.' '.$teacher->surname;?>">
								</a>
								<a class="button-icon las la-pen" href="<?php echo URLROOT.'controllers/admin/teachers/modificar.php?id='.$teacher->id_teacher;?>">
								</a>
							</td>
						</tr>
						<?php }
						}?>
					</tbody>
					<tfoot>
						<tr>
							<th>Nombre</th>
							<th>Apellido</th>
							<th>Teléfono</th>
							<th>Email</th>
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
        if (target.classList.contains('button-remove-teacher')) {
            var btn = target,
				id = btn.getAttribute('data-id'),
                message = '¿Seguro que quieres borrar a '+btn.getAttribute('data-name')+'?';
				url = '<?php echo URLROOT ?>';
                if(window.confirm(message)){
                    location.href = url+'controllers/admin/teachers/remove.php?id='+id;
                }
       	 	}
	});
</script>

<?php
    include '../../../views/partials/footer.php'
?>