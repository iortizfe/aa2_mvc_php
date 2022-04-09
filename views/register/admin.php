<?php
    include '../../views/partials/header.php';
?>

<main class="o-register-page o-register-form">
	<div class="w-content">
		<div class="m-form">
		  <div class="form-content">
			<h2 class="general-title">Registro de administradores</h2>
			<form id="loginForm" name="loginForm" enctype="multipart/form-data"  method="post" action="<?php echo URLROOT.'controllers/register/admin.php'?>">
			  <div class="form-group">
				<label for="login_username">Usuario</label>
				<input id="login_username" name="username" type="text" class="form-control" placeholder="Nombre Usuario" value="<?php if(isset($_POST['username'])){echo $_POST['username'];} ?>"   required>
				<span class="error"><?php echo $usernameComment;?></span>
			  </div>
			  <div class="form-group">
				<label for="login_password">Contraseña</label>
				<input id="login_password" name="password" type="password" class="form-control" placeholder="Contraseña" value="<?php if(isset($_POST['password'])){echo $_POST['password'];} ?>" required>
			  </div>
			  <div class="form-group">
				<label for="login_email">Email</label>
				<input id="login_email" name="email" type="email" class="form-control" placeholder="Email" value="<?php if(isset($_POST['email'])){echo $_POST['email'];} ?>"  required>
				<span class="error"><?php echo $emailComment;?></span>

			  </div>
			  <div class="form-group">
				<label for="login_name">Nombre</label>
				<input id="login_name" name="name" type="text" class="form-control" placeholder="Nombre"  value="<?php if(isset($_POST['name'])){echo $_POST['name'];} ?>" required>
				<span class="error"><?php echo $nameComment;?></span>
			  </div>
			  <div id="msg_error" class="form-errors"></div>
			  <button id="login_submit" type="submit" class="mgt-10 mgb-10 button w100">Registrate</button>
			</form>
		  </div>
		  <div class="card-footer text-muted">
			<span>Ya tengo cuenta</span>
			<a href="<?php echo URLROOT . 'controllers/login.php' ?>" class="btn btn-outline-secondary w-full">Acceder</a>
		  </div>
		</div>
	</main>
</div>

<?php
    include '../../views/partials/footer.php';
?>