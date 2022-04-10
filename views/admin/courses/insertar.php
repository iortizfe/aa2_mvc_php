<?php
    include '../../../views/partials/header.php';
?>
<main class="o-register-page o-register-form">
	<div class="w-content">
		<div class="m-form">
		  <div class="form-content">
			<h2 class="general-title">Registro de courses</h2>
			<form id="loginForm" name="loginForm" enctype="multipart/form-data"  method="post" action="<?php echo URLROOT.'controllers/admin/courses/insertar.php'?>">
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
						<label for="class_active">Active</label>
                        <select id="class_active" name="active" class="select2">
                            <option value="1" <?php if(isset($_POST['active']) && $_POST['active'] == "1"){echo 'selected';} ?>>Si</option>
                            <option value="0" <?php if(isset($_POST['active']) && $_POST['active'] == "0"){echo 'selected';} ?>>No</option>
                        </select>
					</div>
			  	</div>
			</div> 
            <div class="grid-row">
                <div class="grid-md-6">
			  		<div class="form-group pd-10">
						<label for="class_date_start">Nombre</label>
						<input id="class_date_start" name="date_start" type="date"  placeholder="Fecha de Inicio"  min="<?php echo date("Y-m-d");?>" value="<?php if(isset($_POST['date_start'])){echo $_POST['date_start'];} ?>" required>
			  		</div>
				</div>
				<div class="grid-md-6">
                    <div class="form-group pd-10">
						<label for="class_date_end">Nombre</label>
						<input id="class_date_end" name="date_end" type="date"  placeholder="Fecha de Final" min="<?php echo date("Y-m-d");?>" value="<?php if(isset($_POST['date_end'])){echo $_POST['date_end'];} ?>" required>
						<span class="error"><?php echo $dateMinComment;?></span>
			  		</div>
			  	</div>
			</div>   
			<div class="grid-row">
				<div class="grid-12">
					<div class="form-group pd-10">
						<label for="class_description">description</label>
						<textarea id="class_description" name="description" required><?php if(isset($_POST['description'])){echo $_POST['description'];} ?></textarea>
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