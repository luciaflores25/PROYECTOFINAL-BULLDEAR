<?php 
$usuario_controller = new UsuariosController();
if( $_POST['r'] == 'usuario-edit' && $_SESSION['rol'] == 'Admin' && !isset($_POST['crud']) ) {
	$usuario = $usuario_controller->get($_POST['usuario']);
	if( empty($usuario) ) {
	?>
			<div class="alert alert-danger alertas">
				No existe el usuario <b>%<?=$_POST['usuario']?></b>
			</div>
			<script>
				window.onload = function (){
					reloadPage("usuarios")
				}
			</script>
	<?php
	} else {
		$rol_admin = ($usuario[0]['rol'] == 'Admin') ? 'checked' : '';
		$rol_user = ($usuario[0]['rol'] == 'User') ? 'checked' : '';
	?>
		<div class="container"> 
		    <h3>Editar usuario</h3> 
		    <form method="POST" onsubmit="return validarEditUsuario()"> 
		      <div class="form-group">
		        <label for="usuarioR">Nombre de usuario *</label>
		        <input type="text" class="form-control" id="nombreDeUsuario" onchange="quitarError('nombreDeUsuario')" value="<?=$usuario[0]['usuario']?>" disabled>
		        <input type="hidden" name="usuarioR" value="<?=$usuario[0]['usuario']?>">
		        <small class="form-text text-muted">Mínimo 6 carácteres. Para más seguridad utiliza mayúsculas, minúsculas y algún número</small>
		      </div>
		      <div class="form-group">
		        <label for="nombre">Nombre *</label>
		        <input type="text" class="form-control" id="nombrePersona" name="nombre" placeholder="Nombre" onchange="quitarError('nombrePersona')" value="<?=$usuario[0]['nombre']?>">
		        <small class="form-text text-muted">Nombre del nuevo usuario. Debe tener como mínimo 4 letras</small>
		      </div>
		      <div class="form-group">
		        <label for="apellidos">Apellidos *</label>
		        <input type="text" class="form-control" id="apellidos" name="apellidos" placeholder="Apellidos" onchange="quitarError('apellidos')" value="<?=$usuario[0]['apellidos']?>">
		        <small class="form-text text-muted">Apellidos del nuevo usuario. Debe tener como mínimo 4 letras</small>
		      </div>
		      <div class="form-group">
		        <label for="email">Correo electrónico *</label>
		        <input type="email" class="form-control" id="email" name="email" placeholder="email" onchange="quitarError('email')" value="<?=$usuario[0]['email']?>">
		        <small class="form-text text-muted">Correo electrónico (gmail, outlook, yahoo, etc)</small>
		      </div>
		      <div class="form-group">
		        <label for="fechNac">fecha de nacimiento *</label>
		        <input type="date" class="form-control" id="fechNac" name="fechNac" placeholder="Fecha de nacimiento" onchange="quitarError('fechNac')" value="<?=$usuario[0]['fechNac']?>">
		        <small class="form-text text-muted">Fecha de nacimiento del nuevo usuario</small>
		      </div>
		      <div class="form-group">
		         <input class="form-check-input" type="radio" name="rol" id="admin" <?=$rol_admin?> value="Admin">
				  <label class="form-check-label" for="admin"  >
				    Administrador
				  </label>
				  <br>
				  <input class="form-check-input" type="radio" name="rol" id="noadmin" <?=$rol_user?> value="User" >
				  <label class="form-check-label" for="noadmin">
				    Usuario
				  </label>
		      </div>

		      <button type="submit" class="btn btn-warning">Editar usuario</button>
		      <small class="form-text text-muted">Todos los campos con (*) son obligatorios.</small>
		      <input type="hidden" name="r" value="usuario-edit">
		      <input type="hidden" name="crud" value="update">
		    </form>
		</div>
		<?php
	}
} else if( $_POST['r'] == 'usuario-edit' && $_SESSION['rol'] == 'Admin' && $_POST['crud'] == 'update' ) {	
	$save_usuario = array(
		'usuario' =>  $_POST['usuarioR'], 
		'nombre' =>  $_POST['nombre'], 
		'apellidos' =>  $_POST['apellidos'], 
		'email' =>  $_POST['email'], 
		'fechNac' =>  $_POST['fechNac'],
		'rol' =>  $_POST['rol']
	);
	$usuario = $usuario_controller->update($save_usuario);
	?>
		<div class="alert alert-success alertas">
			Usuario <b><?=$_POST['usuarioR']?></b> editado correctamente.
		</div>
		<script>
			window.onload = function () {
				reloadPage("usuarios")
			}
		</script>
<?php
} else {
	$controller = new ViewController();
	$controller->load_view('error401');
}