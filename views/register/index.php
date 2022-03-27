<?php
    include '../views/partials/header.php';
?>

<main class="o-register-page o-register-form">
	<div class="w-content">
		<div class="m-form">
		  <div class="form-content">
			<h5 class="general-title">Registrate</h5>
			<form id="loginForm" name="loginForm" enctype="multipart/form-data">
			  <div class="form-group">
				<label for="login_username">Usuario</label>
				<input id="login_username" name="username" type="text" class="form-control" placeholder="Nombre Usuario" required>
			  </div>
			  <div class="form-group">
				<label for="login_password">Contraseña</label>
				<input id="login_password" name="password" type="password" class="form-control" placeholder="Contraseña" required>
			  </div>
			  <div class="form-group">
				<label for="login_email">Contraseña</label>
				<input id="login_email" name="email" type="email" class="form-control" placeholder="Email" required>
			  </div>
			  <div class="form-group">
				<label for="login_name">Nombre</label>
				<input id="login_name" name="name" type="text" class="form-control" placeholder="Nombre" required>
			  </div>
			  <div class="form-group">
				<label for="login_name">Nombre</label>
				<input id="login_name" name="name" type="text" class="form-control" placeholder="Nombre" required>
			  </div>
			  <div class="form-group">
				<label for="login_telephone">Telefono</label>
				<input id="login_telephone" name="telephone" type="phone" class="form-control" placeholder="Telefono" required>
			  </div>
			  <div class="form-group">
				<label for="login_nif">nif</label>
				<input id="login_nif" name="nif" type="text" class="form-control" placeholder="nif" required>
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
	</main>
</div>

<?php
    include '../views/partials/footer.php';
?>