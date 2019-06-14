<?php 
$lista_controller = new ListaDeseosController();
if( $_POST['r'] == 'lista-deseos-delete' && !isset($_POST['crud']) ) {
	$lista = $lista_controller->get($_POST['usuario']);
	if( empty($lista) ) {
		?>
			<div class="alert alert-success alertas" role="alert">
			  El elemento que desea eliminar no se encuentra en su lista de deseos
			</div>
			<script>
				window.onload = function (){
					reloadPage("lista-deseos")
				}
			</script>
		<?php
	} else {
		?>

			<div class="containerForm"> 
			    <h3>Eliminar producto</h3> 
			    <form method="POST"> 
			      <div class="form-group">
					¿Estas seguro que desea eliminar <mark><?= $lista[0]['nombre'] ?></mark> de su lista de deseos?
			      </div>
			      <button type="submit" class="btn btn-danger">Eliminar</button>
			      <button type="button" class="btn btn-secondary" onclick="history.back()">Cancelar</button>
			      <input type="hidden" name="producto_id" value="<?= $_POST['producto_id']?>">
				  <input type="hidden" name="usuario" value="<?=$lista[0]['usuario']?>">
				  <input type="hidden" name="r" value="lista-deseos-delete">
				  <input type="hidden" name="crud" value="del">
			    </form>
			</div>
		<?php
	}
} else if( $_POST['r'] == 'lista-deseos-delete' && $_POST['crud'] == 'del' ) {	
	$lista = $lista_controller->del($_POST['usuario'], $_POST['producto_id']);
	?>
		<div class="alert alert-danger alertas" role="alert">
		  PRODUCTO ELIMINADO
		</div>
		<script>
			window.onload = function (){
				reloadPage("lista-deseos")
			}
		</script>
	<?php
} else {
	$controller = new ViewController();
	$controller->load_view('error401');
}