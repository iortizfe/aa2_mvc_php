<?php
    include '../../../views/partials/header.php';
?>
<main class="o-register-page o-register-form">
	<div class="w-content">
		<div class="m-form">
		  <div class="form-content">
			<h2 class="general-title tcenter">Modificación de clases</h2>
			<h4 class="success tcenter"> <?php echo $success; ?></h4>
			<form id="loginForm" name="loginForm" enctype="multipart/form-data"  method="post" action="<?php echo URLROOT.'controllers/admin/clases/modificar.php?id='.$_GET['id'];?>">
				<input type="hidden" name="id_schedule" value="<?php echo $clase->id_schedule; ?>">
				<input type="hidden" name="id_class" value="<?php echo $clase->id_class; ?>">

			<div class="grid-row">
                <div class="grid-md-6">
			  		<div class="form-group pd-10">
						<label for="class_name">Nombre</label>
						<input id="class_name" name="name" type="text"  placeholder="Nombre"  value="<?php if(isset($_POST['name'])){echo $_POST['name'];} else { echo $clase->name; }?>" required>
						<span class="error"><?php echo $nameComment;?></span>
			  		</div>
				</div>
				<div class="grid-md-6">
					<div class="form-group pd-10">
                        <label for="class_color">Color</label>
						<input id="class_color" name="color" type="color"  placeholder="Color"  value="<?php if(isset($_POST['color'])){echo $_POST['color'];} else { echo $clase->color; } ?>" required>
					</div>
			  	</div>
			</div> 
			
            <div class="grid-row">
                <div class="grid-md-6">
					<div class="form-group pd-10">
						<label for="class_teacher">Profesor</label>
                        <select id="class_teacher" name="id_teacher" class="select2">
                            <?php foreach ($teachers as $teacher) { ?>
                                <option value="<?php echo $teacher->id_teacher; ?>" <?php if((isset($_POST['id_teacher']) && $_POST['id_teacher'] == $teacher->id_teacher)||(isset($_POST['id_teacher']) == false && $clase->id_teacher == $teacher->id_teacher)){echo 'selected';} ?>><?php echo $teacher->name.' '.$teacher->surname;?></option>
                            <?php }?>
                        </select>
					</div>
			  	</div>
                <div class="grid-md-6">
					<div class="form-group pd-10">
						<label for="class_course">Curso</label>
                        <select id="class_course" name="id_course" class="select2">
                            <?php foreach ($courses as $course) { ?>
                                <option value="<?php echo $course->id_course; ?>" <?php if((isset($_POST['id_course']) && $_POST['id_course'] == $course->id_course)||(isset($_POST['id_course']) == false && $clase->id_course == $course->id_course)){echo 'selected';} ?>><?php echo $course->name;?></option>
                            <?php }?>
                        </select>
					</div>
			  	</div>
			</div>   
            <div class="grid-row">
                <div class="grid-md-6">
					<div class="form-group pd-10">
						<label for="class_day">Dia</label>
                        <input id="class_day" name="day" type="date"  placeholder="Fecha de Inicio"  min="<?php echo date("Y-m-d");?>" value="<?php if(isset($_POST['day'])){echo $_POST['day'];} else { echo $clase->day; }  ?>" required>
                        <span class="error"><?php echo $dayComment;?></span>
					</div>
			  	</div>
                <div class="grid-md-3">
			  		<div class="form-group pd-10">
						<label for="class_time_start">Hora Inicio</label>
						<input id="class_time_start" name="time_start" type="time"  placeholder="Hora Inicio"  min="<?php echo date("Y-m-d");?>" value="<?php if(isset($_POST['time_start'])){echo $_POST['time_start'];} else { echo $clase->time_start; }  ?>" required>
			  		</div>
				</div>
				<div class="grid-md-3">
                    <div class="form-group pd-10">
						<label for="class_time_end">Hora Fin</label>
						<input id="class_time_end" name="time_end" type="time"  placeholder="Hora Final" min="<?php echo date("Y-m-d");?>" value="<?php if(isset($_POST['time_end'])){echo $_POST['time_end'];} else { echo $clase->time_end; }?>" required>
						<span class="error"><?php echo $timeMinComment;?></span>
			  		</div>
			  	</div>
			</div>   
			  <div id="msg_error" class="form-errors"></div>
			  <button id="class_submit" type="submit" class="mgt-10 mgb-10 button w100">Modificar</button>
			</form>
		  </div>
		</div>
	</div>
</main>


<?php
    include '../../../views/partials/footer.php'
?>