<?php 
$usuario_controller = new UsuariosController();
if( $_POST['r'] == 'usuario-pwd-perfil' && !isset($_POST['crud']) ) {
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
		    <h3>Cambiar contraseña</h3> 
		    <form method="POST" onsubmit="return ValidarChangePwd()"> 
		      <div class="form-group">
		        <label for="passOld">Contraseña actual *</label>
		        <input type="password" class="form-control" name="passOld" placeholder="Contraseña actual">
		        <small class="form-text text-muted">Contraseña que tienes actualmente</small>
		      </div>
		      <div class="form-group">
		        <label for="pass1">Nueva contraseña *</label>
		        <input type="password" class="form-control" id="pass1" name="pass1" placeholder="Contraseña nueva" onchange="quitarError('pass1')">
		        <small class="form-text text-muted">Mínimo 4 carácteres. Debe tener mayúsculas, minúsculas y algún númnero</small>
		      </div>
		      <div class="form-group">
		        <label for="pass2">Confirmación nueva contraseña *</label>
		        <input type="password" class="form-control" id="pass2" name="pass2" placeholder="Confirmar nueva contraseña" onchange="quitarError('pass2')">
		        <small class="form-text text-muted">Repite la nueva contraseña</small>
		      </div>
		      <button type="submit" class="btn btn-success">Cambiar</button>
		      <input type="hidden" name="r" value="usuario-pwd-perfil">
		      <input type="hidden" name="usuario" value="<?=$usuario[0]['usuario']?>">
		      <input type="hidden" name="crud" value="updatePwd">
		    </form>
		</div>
		<?php
	}
} else if( $_POST['r'] == 'usuario-pwd-perfil' && $_POST['crud'] == 'updatePwd' ) {	
	$usuario_controller_pass = new UsuariosController();

	// Contraseña actual
	$currentPassOld = $_POST['passOld'];
	$currentUser = $_POST['usuario'];

	// Si el usuario no escribe la contraseña que tiene actualmente
	if (!$usuario_controller_pass->checkPass($currentUser, $currentPassOld)){

		?>
		<div class="alert alert-danger alertas" role="alert">
		  La contraseña actual no coincide con la que has introducido
		  <br>
		  <form method="POST" action="perfil">
			<input type="hidden" name="r" value="usuario-pwd-perfil">
			<input type="hidden" name="usuario" value="<?= $_POST['usuario']?>">
			</br>
			<button class="btn btn-secondary my-2 my-sm-0" type="submit" href="">Volver a intentarlo</button> 
		</form>
		</div>
		<?php
		echo "datos del usuario <br>";
		echo $currentUser;
		echo "<br>";
		echo $currentPassOld;
		echo "<br>";
		echo $usuario_controller_pass->checkPass($currentUser, $currentPassOld);

		// Si el usuario introduce la contraseña actual correctamente
		} else {
			$save_usuario = array(
				'usuario' =>  $_POST['usuario'],
				'pass' =>  $_POST['pass2']
			);
			$usuario = $usuario_controller_pass->updatePwd($save_usuario);
			?>
				<div class="alert alert-success alertas">
					Has cambiado tu contraseña
				</div>
				<script>
					window.onload = function () {
						reloadPage("perfil")
					}
				</script>
<?php
	}

} else {
	$controller = new ViewController();
	$controller->load_view('error401');
}

