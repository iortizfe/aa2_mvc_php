
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
							<th>Profesor</th>
							<th>Fecha</th>
							<th>Hora Inicio</th>
							<th>Hora Fin</th>

						</tr>
					</thead>
					<tbody>
						<?php foreach ($clases as $clase) { ?>
						<tr>
							<td><?php echo $clase->classname;?></td>
							<td><?php echo $clase->tname.' '.$clase->tsurname;?></td>
							<td><?php echo $clase->day;?></td>
							<td><?php echo $clase->time_start;?></td>
							<td><?php echo $clase->time_end;?></td>
							<td>
								<!--<a class="button-icon button-remove-course las la-trash-alt" data-id="<?php echo $clase->id_class; ?>" data-name="<?php echo $clase->classname;?>">
								</a>
								<a class="button-icon las la-pen" href="<?php echo URLROOT.'controllers/admin/clases/modificar.php?id='.$clase->id_class;?>">
								</a>-->
							</td>
						</tr>
						<?php }?>
					</tbody>
					<tfoot>
						<tr>
							<th>Nombre</th>
							<th>Profesor</th>
							<th>Fecha</th>
							<th>Hora Inicio</th>
							<th>Hora Fin</th>
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
		console.log(target);
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