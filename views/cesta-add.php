<?php 
if( $_POST['r'] == 'cesta-add' &&  $_POST['crud'] == 'set' ) {
	$cesta_controller = new CestaController();
	$new_productoEnCesta = array(
		'usuario' =>  $_POST['usuario'], 
		'producto_id' =>  $_POST['producto_id']
	);
	$cesta = $cesta_controller->set($new_productoEnCesta);
	?>
		<div class="alert alert-success alertas" role="alert">
		  Producto añadido a la cesta de la compra
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