<?php 
if( $_POST['r'] == 'registro-add' && !isset($_POST['crud']) ) {
?>
		<div class="container"> 
			<h2>¿No estás registrado?</h2> 
		    <h4>Regístrate para obtener más ventajas!</h4> 
		    <form method="POST" onsubmit="return validarAddUsuario()"> 
		      <div class="form-group">
		        <label for="usuarioR">Nombre de usuario *</label>
		        <input type="text" class="form-control" id="nombreDeUsuario" name="usuarioR" placeholder="Nombre de usuario" onchange="quitarError('nombreDeUsuario')">
		        <small class="form-text text-muted">Mínimo 6 carácteres. Para más seguridad utiliza mayúsculas, minúsculas y algún número</small>
		      </div>
		      <div class="form-group">
		        <label for="nombre">Nombre *</label>
		        <input type="text" class="form-control" id="nombrePersona" name="nombre" placeholder="Tu nombre" onchange="quitarError('nombrePersona')">
		        <small class="form-text text-muted">Debe tener como mínimo 4 letras</small>
		      </div>
		      <div class="form-group">
		        <label for="apellidos">Apellidos *</label>
		        <input type="text" class="form-control" id="apellidos" name="apellidos" placeholder="Tus apellidos" onchange="quitarError('apellidos')">
		        <small class="form-text text-muted">Debe tener como mínimo 4 letras</small>
		      </div>
		      <div class="form-group">
		        <label for="email">Correo electrónico *</label>
		        <input type="email" class="form-control" id="email" name="email" placeholder="Tu email" onchange="quitarError('email')">
		        <small class="form-text text-muted">Correo electrónico (gmail, outlook, yahoo, etc)</small>
		      </div>
		      <div class="form-group">
		        <label for="pass1">Contraseña *</label>
		        <input type="password" class="form-control" id="pass1" name="pass1" placeholder="Contraseña" onchange="quitarError('pass1')">
		        <small class="form-text text-muted">Mínimo 4 carácteres. Debe tener mayúsculas, minúsculas y algún númnero</small>
		      </div>
		      <div class="form-group">
		        <label for="pass2">Confirmación contraseña *</label>
		        <input type="password" class="form-control" id="pass2" name="pass2" placeholder="Confirmar contraseña" onchange="quitarError('pass2')">
		        <small class="form-text text-muted">Repite la contraseña</small>
		      </div>
		      <div class="form-group">
		        <label for="fechNac">fecha de nacimiento *</label>
		        <input type="date" class="form-control" id="fechNac" name="fechNac" onchange="quitarError('fechNac')">
		        <small class="form-text text-muted">Fecha de nacimiento del nuevo usuario</small>
		      </div>

		      <button type="submit" class="btn btn-success">Registrarme</button>
		      <small class="form-text text-muted">Todos los campos con (*) son obligatorios.</small>
		      <input type="hidden" name="r" value="registro-add">
		      <input type="hidden" name="crud" value="set">
		    </form>
		</div>
<?php
} else if( $_POST['r'] == 'registro-add' && $_POST['crud'] == 'set' ) {
	$usuario_controller = new UsuariosController();

	// Validación usuario y email
	$currentUser = $_POST['usuarioR'];
	$currentEmail = $_POST['email'];

	// Si el usuario repite un email que exista en la base de datos
	if (!$usuario_controller->checkEmail($currentEmail)){

		?>
		<div class="alert alert-danger alertas" role="alert">
		  El email que has introducido ya está en uso.

			  <form method="POST" action="registro">
				<input type="hidden" name="r" value="registro-add">
				</br>
				<button class="btn btn-secondary my-2 my-sm-0" type="submit" href="registro">Volver a intentarlo</button> 
			</form>
		</div>
		<?php

	// Si el usuario repite un nombre de usuario que exista en la base de datos
	} else if (!$usuario_controller->checkUser($currentUser)){
		?>
		<div class="alert alert-danger alertas" role="alert">
		  El usuario que has introducido ya está en uso.

			  <form method="POST" action="registro">
				<input type="hidden" name="r" value="registro-add">
				</br>
				<button class="btn btn-secondary my-2 my-sm-0" type="submit" href="registro">Volver a intentarlo</button> 
			</form>
		</div>
		
		
		<?php
	// Si el usuario introduce los datos correctamente
	} else {
		$new_usuario = array(
			'usuario' =>  $_POST['usuarioR'], 
			'nombre' =>  $_POST['nombre'], 
			'apellidos' =>  $_POST['apellidos'], 
			'email' =>  $_POST['email'], 
			'pass' =>  $_POST['pass2'], 
			'fechNac' =>  $_POST['fechNac'],
			'rol' =>  'User'
		);
		$usuario = $usuario_controller->set($new_usuario);
		?>
			<div class="alert alert-success alertas" role="alert">
			  <b><?= $_POST['nombre']?></b> te has registrado correctamente
			</div>
			<script>
				window.onload = function () {
					reloadPage("home")
				}
			</script>
<?php
	}

} else {
	$controller = new ViewController();
	$controller->load_view('error401');
}