<?php 
$usuario_controller = new UsuariosController();
$usuario = $usuario_controller->get($_SESSION['usuario']);

?>
	<div class="container text-center">
		<p>Nombre de usuario: <b><?= $usuario[0]['usuario']?></b></p>
		<p>Nombre: <b><?= $usuario[0]['nombre']?> <?= $usuario[0]['apellidos']?></b></p>

		<p>Correo eléctronico: <b><?= $usuario[0]['email']?></b></p>
		<p>Fecha de nacimiento: <b><?= $usuario[0]['fechNac']?></b></p>
		<p>Perfil tipo: <b><?= $usuario[0]['rol']?></b></p>
	
		<form method="POST">
			<input type="hidden" name="r" value="usuario-edit-perfil">
			<input type="hidden" name="usuario" value="<?= $usuario[0]['usuario']?>">
			<button type="submit" class="btn btn-success">Editar <i class="far fa-edit"></i></button>
		</form>
		<br>
		<br>
		<br>
		<form method="POST" class="changePwd">
			<input type="hidden" name="r" value="usuario-pwd-perfil">
			<input type="hidden" name="usuario" value="<?= $usuario[0]['usuario']?>">
			<button type="submit" class="btn btn-secondary">Cambiar mi contraseña <i class="fas fa-key"></i></button>
		</form>
	</div>
