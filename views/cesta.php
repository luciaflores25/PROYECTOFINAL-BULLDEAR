<?php 
// Obtengo el usuario con el que he iniciado sesión
$usuario_controller = new UsuariosController();
$usuario = $usuario_controller->get($_SESSION['usuario']);

// Obtengo los productos de la cesta
$cesta_controller = new CestaController();
$cesta = $cesta_controller->get($_SESSION['usuario']);
$total = 0;
$cantidad = 0;

if( empty($cesta) ) {
	?>
		<div class="alert alert-danger alertas" role="alert">
		  No tienes ningún producto en tu cesta
		</div>
	<?php
} else {

?>
	<div class="container-fluid">
		<h4>Cesta de la compra</h4>
  		<table class="table">
    		<thead>
      			<tr>
      				<th scope="col-sm"></th>
					<th scope="col-sm">Vista Previa</th>
					<th scope="col-sm">Nombre</th>
					<th scope="col-sm">Marca</th>
					<th scope="col-sm">Cantidad</th>
					<th scope="col-sm">Precio</th>
				</tr>
			</thead>
			<?php
	for ($n=0; $n < count($cesta); $n++) { 
		$cantidad_controller = new CestaController();
		$cantidad = $cantidad_controller->getCantidad($_SESSION['usuario'], $cesta[$n]['producto_id']);
		$precio = $cesta[$n]['precio']*$cantidad;
		?>
				<tr>
					<td>
						<form method="POST">
							<input type="hidden" name="r" value="cesta-delete">
							<input type="hidden" name="producto_id" value="<?= $cesta[$n]['producto_id']?>">
							<input type="hidden" name="usuario" value="<?= $cesta[$n]['usuario']?>">
							<button type="submit" class="btn btn-outline-danger"><i class="fas fa-trash-alt"></i></button>
						</form>
					</td>
					<td><img width="200px" height="200px" src="<?= $cesta[$n]['imagen']?>"></td>
					<td><?= $cesta[$n]['nombre']?></td>
					<td><?= $cesta[$n]['categoria']?></td>
					<td><?= $cantidad?> x <?= $cesta[$n]['precio']?>€</td>
					<td><?= $precio?>€</td>
	<?php
	$total += $precio;
	}
	?>
				</tr>
				<tr>
					<th colspan="5"><h2>Total</h2></th>
					<td><h2><?= $total?>€</h2></td>
				</tr>
			</table>
		</div>
<?php
}