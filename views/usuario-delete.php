<?php 
$usuario_controller = new UsuariosController();
if( $_POST['r'] == 'usuario-delete' && $_SESSION['rol'] == 'Admin' && !isset($_POST['crud']) ) {
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
			    <h3>Eliminar usuario</h3> 
			    <form method="POST"> 
			      <div class="form-group">
					¿Estas seguro que desea eliminar el usuario <mark><?= $usuario[0]['usuario'] ?></mark>?
			      </div>
			      <button type="submit" class="btn btn-danger">Eliminar</button>
			      <input type="hidden" name="usuario" value="<?= $usuario[0]['usuario']?>">
				<input type="hidden" name="r" value="usuario-delete">
				<input type="hidden" name="crud" value="del">
			    </form>
                <form method="POST">
			    	<input type="hidden" value="usuarios">
			    	<button type="submit" class="btn btn-secondary">Volver</button>
			    </form>
			</div>
	<?php	
	}
} else if( $_POST['r'] == 'usuario-delete' && $_SESSION['rol'] == 'Admin' && $_POST['crud'] == 'del' ) {	
	$usuario = $usuario_controller->del($_POST['usuario']);
	?>
		<div class="alert alert-success alertas">
			Usuario <b><?=$_POST['usuario']?></b> eliminado correctamente
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