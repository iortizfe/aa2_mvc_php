<?php
    include '../../../views/partials/header.php';
?>
<main class="o-register-page o-register-form">
	<div class="w-content">
		<div class="m-form">
		  <div class="form-content">
			<h2 class="general-title">Registro de clases</h2>
			<form id="loginForm" name="loginForm" enctype="multipart/form-data"  method="post" action="<?php echo URLROOT.'controllers/admin/clases/'?>">
			<div class="grid-row">
                <div class="grid-md-6">
			  		<div class="form-group pd-10">
						<label for="class_name">Nombre</label>
						<input id="class_name" name="name" type="text"  placeholder="Nombre"  value="<?php if(isset($_POST['name'])){echo $_POST['name'];} ?>" required>
						<span class="error"><?php echo $nameComment;?></span>
			  		</div>
				</div>
				<div class="grid-md-6">
					<div class="form-group pd-10">
                        <label for="class_color">Color</label>
						<input id="class_color" name="color" type="color"  placeholder="Color"  value="<?php if(isset($_POST['color'])){echo $_POST['color'];} ?>" required>
					</div>
			  	</div>
			</div> 
            <div class="grid-row">
                <div class="grid-md-6">
					<div class="form-group pd-10">
						<label for="class_teacher">Profesor</label>
                        <select id="class_teacher" name="id_teacher" class="select2">
                            <?php foreach ($teachers as $teacher) { ?>
                                <option value="<?php echo $teacher->id_teacher; ?>" <?php if(isset($_POST['teacher']) && $_POST['teacher'] == $teacher->id_teacher){echo 'selected';} ?>><?php echo $teacher->name.' '.$teacher->surname;?></option>
                            <?php }?>
                        </select>
					</div>
			  	</div>
                <div class="grid-md-6">
					<div class="form-group pd-10">
						<label for="class_course">Curso</label>
                        <select id="class_course" name="id_course" class="select2">
                            <?php foreach ($courses as $course) { ?>
                                <option value="<?php echo $course->id_course; ?>" <?php if(isset($_POST['course']) && $_POST['course'] == $course->id_course){echo 'selected';} ?>><?php echo $course->name;?></option>
                            <?php }?>
                        </select>
					</div>
			  	</div>
			</div>   
            <div class="grid-row">
                <div class="grid-md-6">
					<div class="form-group pd-10">
						<label for="class_day">Dia</label>
                        <input id="class_day" name="day" type="date"  placeholder="Fecha de Inicio"  min="<?php echo date("Y-m-d");?>" value="<?php if(isset($_POST['day'])){echo $_POST['day'];} ?>" required>
                        <span class="error"><?php echo $dayComment;?></span>
					</div>
			  	</div>
                <div class="grid-md-3">
			  		<div class="form-group pd-10">
						<label for="class_time_start">Hora Inicio</label>
						<input id="class_time_start" name="time_start" type="time"  placeholder="Hora Inicio"  min="<?php echo date("Y-m-d");?>" value="<?php if(isset($_POST['time_start'])){echo $_POST['time_start'];} ?>" required>
			  		</div>
				</div>
				<div class="grid-md-3">
                    <div class="form-group pd-10">
						<label for="class_time_end">Hora Fin</label>
						<input id="class_time_end" name="time_end" type="time"  placeholder="Hora Final" min="<?php echo date("Y-m-d");?>" value="<?php if(isset($_POST['time_end'])){echo $_POST['time_end'];} ?>" required>
						<span class="error"><?php echo $timeMinComment;?></span>
			  		</div>
			  	</div>
			</div>   
			  <div id="msg_error" class="form-errors"></div>
			  <button id="class_submit" type="submit" class="mgt-10 mgb-10 button w100">Registrar</button>
			</form>
		  </div>
		</div>
	</div>
</main>

<?php
    include '../../../views/partials/footer.php'
?>