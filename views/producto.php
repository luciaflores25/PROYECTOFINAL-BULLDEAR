<?php 
$producto_controller = new ProductosController();
$producto = $producto_controller->get();

//////////////////////// PAGINACIÓN
$registros = 20;
$pagina = 0;

if (isset($_POST["pagina"])) {
	$pagina = $_POST["pagina"];
}

if (!$pagina) {
$inicio = 0;
$pagina = 1;
}
else {
$inicio = ($pagina - 1) * $registros;
}
$total_registros = count($producto);
$productos_controller2 = new ProductosController();
$producto = $productos_controller2->get('', $inicio, $registros);
$total_paginas = ceil($total_registros / $registros); 
////////////////////// TERMINA LA PAGINACIÓN


if( empty($producto) ) {
	?>
		<div class="alert alert-danger alertas" role="alert">
		  No hay productos en la base de datos
		</div>
<?php
} else {
	?>
	<div class="container">
		<h2 class="p1">GESTIÓN DE PRODUCTOS</h2>
  		<table class="table">
    		<thead>
      			<tr>
					<th scope="col-sm">ID</th>
					<th scope="col-sm">Categoría</th>
					<th scope="col-sm">Nombre</th>
					<th scope="col-sm">Precio</th>
					<th scope="col-sm">Imagen</th>
					<th scope="col-sm" colspan="3">
						<form method="POST">
							<input type="hidden" name="r" value="producto-add">
							<input class="btn btn-outline-primary" type="submit" value="Nuevo producto">
						</form>
					</th>
				</tr>
			</thead>
	<?php
	for ($n=0; $n < count($producto); $n++) { 
		?>
			<tr>
				<td><?=$producto[$n]['producto_id']?></td>
				<td><?=$producto[$n]['categoria']?></td>
				<td><?=$producto[$n]['nombre']?></td>
				<td><?=$producto[$n]['precio']?>€</td>
				<td><img width="60px" height="60px" src="<?=$producto[$n]['imagen']?>"></td>
				<td>
					<form method="POST">
						<input type="hidden" name="r" value="producto-show">
						<input type="hidden" name="producto_id" value="<?=$producto[$n]['producto_id']?>">
						<button type="submit" class="btn btn-outline-primary"><i class="fas fa-search"></i></button>
					</form>
				</td>
				<td>
					<form method="POST">
						<input type="hidden" name="r" value="producto-edit">
						<input type="hidden" name="producto_id" value="<?=$producto[$n]['producto_id']?>">
						<button type="submit" class="btn btn-outline-warning"><i class="fas fa-pencil-alt"></i></button>
					</form>
				</td>
				<td>
					<form method="POST">
						<input type="hidden" name="r" value="producto-delete">
						<input type="hidden" name="producto_id" value="<?=$producto[$n]['producto_id']?>">
						<button type="submit" class="btn btn-outline-danger"><i class="fas fa-trash"></i></button>
					</form>
				</td>
			</tr>
		<?php
	}
	?>
		</table>
	</div>
	<div class="containerPags"> <!-- COMIENZA EL PAGINADO -->
		<nav aria-label="Page navigation example">
		  <ul class="pagination">
		  		<form action="" method="POST">
			  		<input type="hidden" name="pagina" value="<?= ($pagina-1)?>">
			  		<button type="submit" class="page-item page-link"><i class="fas fa-caret-left"></i></button>
			  	</form>
			<?php
				for ($i=1; $i<=$total_paginas; $i++){
					if ($pagina == $i) {
					?>
					<form method="POST">
						<input type="hidden" name="pagina" value="<?=$i?>">
				  		<li class="page-item active"><button type="submit" class="page-link"><?=$i?></button></li>
				  	</form>
					<?php
					} else {
					?>
						<form method="POST">
					  		<input type="hidden" name="pagina" value="<?=$i?>">
					  		<li class="page-item"><button type="submit" class="page-link"><?=$i?></button></li>
					  	</form>
					<?php
					} 
				} 
		  	if ($pagina != $total_paginas){
		  	?>
			    <form action="" method="POST">
			  		<input type="hidden" name="pagina" value="<?= ($pagina+1)?>">
			  		<button type="submit" class="page-item page-link"><i class="fas fa-caret-right"></i></button>
			  	</form>
			<?php
			}
			?>
		</nav>
	</div> <!-- TERMINA EL PAGINADO -->
<?php
}