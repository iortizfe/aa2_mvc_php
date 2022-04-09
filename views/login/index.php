<?php
    include '../views/partials/header.php';
?>
<main class="o-register-page o-register-form">
	<div class="w-content">
		<div class="m-form">
		  <div class="form-content">
			<h2 class="general-title">Accede al aula</h2>
			<form id="loginForm" name="loginForm" enctype="multipart/form-data"  method="post" action="<?php echo URLROOT.'controllers/login.php'?>" >
			  <div class="form-group">
				<label for="login_email">Email</label>
				<input id="login_email" name="email" type="text"  placeholder="Email" required>
			  </div>
			  <div class="form-group">
				<label for="login_password">Contraseña</label>
				<input id="login_password" name="password" type="password"  placeholder="Contraseña" required>
			  </div>
			  <div id="msg_error" class="form-errors"><?php echo $error; ?></div>
			  <button id="login_submit" type="submit" class="mgt-10 mgb-10 button w100">Acceder</button>
			</form>
		  </div>
		  <div class="card-footer text-muted">
			<span>No tengo cuenta</span>
			<a href="<?php echo URLROOT . 'controllers/register/' ?>" class="btn btn-outline-secondary w-full">Registrarme</a>
		  </div>
		</div>
	</div>
</main>
<?php
    include '../views/partials/footer.php'
?>

