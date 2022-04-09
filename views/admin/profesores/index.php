<?php
    include '../../../views/partials/header.php';
?>

<main class="o-register-page o-register-form">
	<div class="w-content">
		<div class="m-form">
		  <div class="form-content">
			<h2 class="general-title">Registro de profesores</h2>
			<form id="loginForm" name="loginForm" enctype="multipart/form-data"  method="post" action="<?php echo URLROOT.'controllers/admin/profesores/'?>">
			<div class="grid-row">
				<div class="grid-md-6">
					<div class="form-group pd-10">
						<label for="login_name">Nombre</label>
						<input id="login_name" name="name" type="text"  placeholder="Nombre"  value="<?php if(isset($_POST['name'])){echo $_POST['name'];} ?>" required>
						<span class="error"><?php echo $nameComment;?></span>
					</div>
				</div>
				<div class="grid-md-6">
					<div class="form-group pd-10">
						<label for="login_name">Apellido</label>
						<input id="login_name" name="surname" type="text"  placeholder="Apellido"  value="<?php if(isset($_POST['surname'])){echo $_POST['surname'];} ?>" required>
						<span class="error"><?php echo $surnameComment;?></span>
					</div>
			  	</div>
			</div>  
			<div class="grid-row">
				<div class="grid-md-6">
					<div class="form-group pd-10">
						<label for="login_email">Email</label>
						<input id="login_email" name="email" type="email"  placeholder="Email" value="<?php if(isset($_POST['email'])){echo $_POST['email'];} ?>"  required>
						<span class="error"><?php echo $emailComment;?></span>
					</div>
				</div>
				<div class="grid-md-6">
					<div class="form-group pd-10">
						<label for="login_telephone">Telefono</label>
						<input id="login_telephone" name="telephone" type="phone"  placeholder="Telefono"  value="<?php if(isset($_POST['telephone'])){echo $_POST['telephone'];} ?>" required>
						<span class="error"><?php echo $telefonoComment;?></span>
					</div>
					</div>
			  	</div>
			  <div class="form-group pd-10">
				<label for="login_nif">NIF</label>
				<input id="login_nif" name="nif" type="text"  placeholder="nif" value="<?php if(isset($_POST['nif'])){echo $_POST['nif'];} ?>" required>
				<span class="error"><?php echo $nifComment;?></span>
			  </div>
			  <div id="msg_error" class="form-errors"></div>
			  <button id="login_submit" type="submit" class="mgt-10 mgb-10 button w100">Registrar</button>
			</form>
		  </div>
		</div>
	</main>
</div>


<?php
    include '../../../views/partials/footer.php'
?>