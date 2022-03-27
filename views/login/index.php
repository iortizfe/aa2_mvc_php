<?php
    include '../views/partials/header.php';
?>
<main class="o-register-page o-register-form">
	<div class="w-content">
		<div class="m-form">
		  <div class="form-content">
			<h5 class="general-title">Accede al aula</h5>
			<form id="loginForm" name="loginForm" enctype="multipart/form-data">
			  <div class="form-group">
				<label for="login_username">Usuario</label>
				<input id="login_username" name="username" type="text" class="form-control" placeholder="Nombre Usuario" required>
			  </div>
			  <div class="form-group">
				<label for="login_password">Contraseña</label>
				<input id="login_password" name="password" type="password" class="form-control" placeholder="Contraseña" required>
			  </div>
			  <div id="msg_error" class="form-errors"></div>
			  <button id="login_submit" type="submit" class="button w-full">Acceder</button>
			</form>
		  </div>
		  <div class="card-footer text-muted">
			<span>No tengo cuenta</span>
			<a href="<?php echo URLROOT . '/register' ?>" class="btn btn-outline-secondary w-full">Registrarme</a>
		  </div>
		</div>
	</div>
</main>
<?php
    include '../views/partials/footer.php'
?>

