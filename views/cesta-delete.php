<?php 
$cesta_controller = new CestaController();
if( $_POST['r'] == 'cesta-delete' && !isset($_POST['crud']) ) {
	$cesta = $cesta_controller->get($_POST['usuario']);
	if( empty($cesta) ) {
		?>
			<div class="alert alert-danger alertas" role="alert">
			  El elemento que desea eliminar no se encuentra en su cesta de la compra
			</div>
			<script>
				window.onload = function (){
					reloadPage("cesta")
				}
			</script>
		<?php
	} else {
		?>

			<div class="container"> 
			    <h3>Eliminar producto</h3> 
			    <form method="POST"> 
			      <div class="form-group">
					¿Estas seguro que desea eliminar <mark><?= $cesta[0]['nombre'] ?></mark> de su cesta de la compra?
			      </div>
			      <button type="submit" class="btn btn-danger">Eliminar</button>
			      <button type="button" class="btn btn-secondary" onclick="history.back()">Cancelar</button>
			      <input type="hidden" name="producto_id" value="<?= $_POST['producto_id']?>">
				  <input type="hidden" name="usuario" value="<?=$cesta[0]['usuario']?>">
				  <input type="hidden" name="r" value="cesta-delete">
				  <input type="hidden" name="crud" value="del">
			    </form>
			</div>
		<?php
	}
} else if( $_POST['r'] == 'cesta-delete' && $_POST['crud'] == 'del' ) {	
	$cesta = $cesta_controller->del($_POST['usuario'], $_POST['producto_id']);
	?>
		<div class="alert alert-success alertas" role="alert">
		  Producto eliminado satisfactoriamente de tu cesta
		</div>
		<script>
			window.onload = function (){
				reloadPage("cesta")
			}
		</script>
	<?php
} else {
	$controller = new ViewController();
	$controller->load_view('error401');
}

