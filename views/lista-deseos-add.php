<?php 
if( $_POST['r'] == 'lista-deseos-add' &&  $_POST['crud'] == 'set' ) {
	$lista_controller = new ListaDeseosController();
	$new_productoEnListaDeseos = array(
		'usuario' =>  $_POST['usuario'], 
		'producto_id' =>  $_POST['producto_id']
	);
	$lista = $lista_controller->set($new_productoEnListaDeseos);
	?>
		<div class="alert alert-success alertas" role="alert">
		  AÑADIDIDO
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