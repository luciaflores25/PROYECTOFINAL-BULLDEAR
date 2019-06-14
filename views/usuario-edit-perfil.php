<?php 
$usuario_controller = new UsuariosController();
if( $_POST['r'] == 'usuario-edit-perfil' && $_SESSION['rol'] == 'User' && !isset($_POST['crud']) ) {
	$usuario = $usuario_controller->get($_POST['usuario']);
	if( empty($usuario) ) {
	?>
			<div class="alert alert-danger alertas">
				No existe el usuario <b>%<?=$_POST['usuario']?></b>
			</div>
			<script>
				window.onload = function (){
					reloadPage("perfil")
				}
			</script>
	<?php
	} else {
	?>
		<div class="container"> 
		    <h3>Editar mi perfil</h3> 
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

		      <button type="submit" class="btn btn-warning">Editar usuario</button>
		      <small class="form-text text-muted">Todos los campos con (*) son obligatorios.</small>
		      <input type="hidden" name="r" value="usuario-edit-perfil">
		      <input type="hidden" name="crud" value="update">
		    </form>
		</div>
	<?php
	}
} else if( $_POST['r'] == 'usuario-edit-perfil' && $_SESSION['rol'] == 'User' && $_POST['crud'] == 'update' ) {	
	$save_usuario = array(
		'usuario' =>  $_POST['usuarioR'], 
		'nombre' =>  $_POST['nombre'], 
		'apellidos' =>  $_POST['apellidos'], 
		'email' =>  $_POST['email'], 
		'pass' =>  $usuario[0]['pass'], 
		'fechNac' =>  $_POST['fechNac'],
		'rol' => 'User'
	);
	$usuario = $usuario_controller->update($save_usuario);
	?>
		<div class="alert alert-success alertas">
			<b><?=$_POST['nombre']?></b> tu perfil se ha editado correctamente
		</div>
		<script>
			window.onload = function () {
				reloadPage("perfil")
			}
		</script>
<?php
} else {
	$controller = new ViewController();
	$controller->load_view('error401');
}