<?php
    include '../../views/partials/header.php';
?>

<main class="o-register-page o-register-form">
	<div class="w-content">
		<div class="m-form">
		  <div class="form-content">
			<h2 class="general-title tcenter">Cambia la información de tu perfil</h2>
			<h4 class="success tcenter"> <?php echo $success; ?></h4>
			<form id="loginForm" name="loginForm" enctype="multipart/form-data"  method="post" action="<?php echo URLROOT.'controllers/miperfil/'?>">
			<div class="grid-row">
				<div class="grid-md-4">  
					<div class="form-group pd-10">
						<label for="login_username">Usuario</label>
						<input id="login_username" name="username" type="text"  placeholder="Nombre Usuario" value="<?php if(isset($_POST['username'])){echo $_POST['username'];} else { echo $user->username; } ?>"   required>
						<span class="error"><?php echo $usernameComment;?></span>
					</div>
			  	</div>
				<div class="grid-md-4">
					<div class="form-group pd-10">
						<label for="login_email">Email</label>
						<input id="login_email" name="email" type="email"  placeholder="Email" value="<?php if(isset($_POST['email'])){echo $_POST['email'];} else { echo $user->email; } ?>"  required>
						<span class="error"><?php echo $emailComment;?></span>
					</div>
			  	</div>
				<div class="grid-md-4">
					<div class="form-group pd-10">
						<label for="login_name">Nombre</label>
						<input id="login_name" name="name" type="text"  placeholder="Nombre"  value="<?php if(isset($_POST['name'])){echo $_POST['name'];} else { echo $user->name; } ?>" required>
						<span class="error"><?php echo $nameComment;?></span>
			  		</div>
				</div>
			  </div>  
				<div class="grid-row">
				  	<div class="grid-md-4">
						<div class="form-group pd-10">
							<label for="login_password">Contraseña</label>
							<input id="login_password" name="password" type="password"  placeholder="Contraseña" value="<?php if(isset($_POST['password'])){echo $_POST['password'];}  ?>" required>
							<span class="error"><?php echo $passwordComment;?></span>
						</div>
					</div>
					<div class="grid-md-4">
						<div class="form-group pd-10">
							<label for="login_newpassword1">Nueva Contraseña</label>
							<input id="login_newpassword1" name="newpassword1" type="password"  placeholder="Contraseña" value="<?php if(isset($_POST['newpassword1'])){echo $_POST['newpassword1'];}  ?>" required>
						</div>
					</div>
					<div class="grid-md-4">
						<div class="form-group pd-10">
							<label for="login_newpassword2">Repite Nueva Contraseña</label>
							<input id="login_newpassword2" name="newpassword2" type="password"  placeholder="Contraseña" value="<?php if(isset($_POST['newpassword2'])){echo $_POST['newpassword2'];}  ?>" required>
							<span class="error"><?php echo $newPasswordComment;?></span>
						</div>
					</div>
				</div>
			  <div id="msg_error" class="form-errors"></div>
			  <button id="login_submit" type="submit" class="mgt-10 mgb-10 button w100">Registrate</button>
			</form>
		  </div>
		</div>
	</main>
</div>

<?php
    include '../../views/partials/footer.php';
?>