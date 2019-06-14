<?php 
$producto_controller = new ProductosController();
if( $_POST['r'] == 'producto-delete' && $_SESSION['rol'] == 'Admin' && !isset($_POST['crud']) ) {
	$producto = $producto_controller->get($_POST['producto_id']);
	if( empty($producto) ) {
		?>
			<div class="alert alert-danger alertas" role="alert">
			  No existe el producto seleccionado.
			</div>
			<script>
				window.onload = function (){
					reloadPage("productos")
				}
			</script>
	<?php
	} else {
		?>
			<div class="container"> 
			    <h3>Eliminar producto</h3> 
			    <form method="POST"> 
			      <div class="form-group">
					¿Estas seguro que desea eliminar <mark><?= $producto[0]['nombre'] ?></mark> de la lista de productos?
			      </div>
				  <button type="submit" class="btn btn-danger">Eliminar</button>
				  <input type="hidden" name="producto_id" value="<?= $producto[0]['producto_id']?>">
				  <input type="hidden" name="r" value="producto-delete">
				  <input type="hidden" name="crud" value="del">
			    </form>
			      <form method="POST">
			    	<input type="hidden" value="productos">
			    	<button type="submit" class="btn btn-primary">Volver</button>
			    </form>
			      
			</div>
	<?php	
	}
} else if( $_POST['r'] == 'producto-delete' && $_SESSION['rol'] == 'Admin' && $_POST['crud'] == 'del' ) {	
	$producto = $producto_controller->del($_POST['producto_id']);
	?>
		<div class="alert alert-success alertas" role="alert">
		  El producto se ha eliminado satisfactoriamente.
		</div>
		<script>
			window.onload = function () {
				reloadPage("productos")
			}
		</script>
	<?php
} else {
	$controller = new ViewController();
	$controller->load_view('error401');
}