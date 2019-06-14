<?php 
$usuario_controller = new UsuariosController();
if( $_POST['r'] == 'usuario-pwd' && $_SESSION['rol'] == 'Admin' && !isset($_POST['crud']) ) {
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
	?>
		<div class="container"> 
		    <h3>Cambiar contraseña de <b><?=$usuario[0]['usuario']?></b></h3> 
		    <form method="POST" onsubmit="return ValidarChangePwd()"> 
		      <div class="form-group">
		        <label for="pass1">Nueva contraseña *</label>
		        <input type="password" class="form-control" id="pass1" name="pass1" placeholder="Contraseña" onchange="quitarError('pass1')">
		        <small class="form-text text-muted">Mínimo 4 carácteres. Debe tener mayúsculas, minúsculas y algún númnero</small>
		      </div>
		      <div class="form-group">
		        <label for="pass2">Confirmación nueva contraseña *</label>
		        <input type="password" class="form-control" id="pass2" name="pass2" placeholder="Confirmar contraseña" onchange="quitarError('pass2')">
		        <small class="form-text text-muted">Repite la contraseña</small>
		      </div>
		      <button type="submit" class="btn btn-success">Aceptar</button>
		      <input type="hidden" name="r" value="usuario-pwd">
		      <input type="hidden" name="usuario" value="<?=$usuario[0]['usuario']?>">
		      <input type="hidden" name="crud" value="updatePwd">
		    </form>
		</div>
		<?php
	}
} else if( $_POST['r'] == 'usuario-pwd' && $_SESSION['rol'] == 'Admin' && $_POST['crud'] == 'updatePwd' ) {	
	$save_usuario = array(
		'usuario' =>  $_POST['usuario'],
		'pass' =>  $_POST['pass2']
	);
	$usuario = $usuario_controller->updatePwd($save_usuario);
	?>
		<div class="alert alert-success alertas">
			Contraseña de <b><?=$_POST['usuario']?></b> actualizada correctamente.
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