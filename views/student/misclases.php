<?php
    include '../../views/partials/header.php';
?>
   
   <main class="o-register-page o-register-form">
	<div class="w-content">
		<h2 class="general-title tcenter">Mis clases</h2>
		<div class="grid-row">
			<div class="grid-md-3">
				<div class="pd-10"><a href="<?php echo URLROOT.'controllers/student/'?>" class="button">Ver calendario</a></div>
			</div>
			<div class="grid-md-9 pd-20">
			 	<table id="datatable" class="datatable display" style="width:100%">
					<thead>
						<tr>
                            <th>Curso</th>
							<th>Clase </th>
							<th>day</th>
						</tr>
					</thead>
					<tbody>
						<?php 
						if(isset($mine_clases)){

						foreach ($mine_clases as $clase) { ?>
						<tr>
							<td><?php echo $clase->cursename;?></td>
							<td><?php echo $clase->classname;?></td>
							<td><?php echo $clase->day;?></td>
							
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



<?php
    include '../../views/partials/footer.php'
?>