<?php 
if( $_POST['r'] == 'producto-show' && isset($_POST['producto_id']) ) {
	$producto_controller = new ProductosController();
	$producto = $producto_controller->get($_POST['producto_id']);
	if( empty($producto) ) {
		?>
			<div class="alert alert-danger alertas" role="alert">
			  Error al cargar la información del producto.
			</div>
		<?php
	} else {
		?>
		<div class="container">
			<div class="card productoShow">
			  <img class="card-img-top" src="<?= $producto[0]['imagen']?>" alt="Card image cap">
			  <div class="card-body">
			    <h5 class="card-title"><?= $producto[0]['nombre']?></h5>
			    <p class="card-text"><?= $producto[0]['descripcion']?></p>
			    <p class="card-text"><?= $producto[0]['precio']?>€</p>
			    <form method="POST">
			    	<input type="hidden" value="home">
			    	<button type="submit" class="btn btn-primary">Volver</button>
			    </form>
			    <a href="<?= $producto[0]['enlace_compra']?>" target="_blank"><button class="btn btn-success" >Enlace de compra</button></a>
			  </div>
			</div>
		</div>
			
	<?php
	}
} else {
	$controller = new ViewController();
	$controller->load_view('error404');
}