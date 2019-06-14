<?php 
$categoria_controller = new CategoriaController();
$categoria = $categoria_controller->get();
if( empty($categoria) ) {
	?>
		<div class="alert alert-danger alertas" role="alert">
		 No hay categorías en la base de datos
		</div>
	<?php
} else {
	?>
	<div class="container">
		<h3>Gestión de categorías</h3>
  		<table class="table">
    		<thead>
      			<tr>
					<th scope="col-sm">Id</th>
					<th scope="col-sm">Categoría</th>
					<th scope="col-sm" colspan="2">
						<form method="POST">
							<input type="hidden" name="r" value="categoria-add">
							<input class="btn btn-outline-primary" type="submit" value="Añadir">
						</form>
					</th>
				</tr>
			</thead>
			<?php
	for ($n=0; $n < count($categoria); $n++) { 
		?>
			<tr>
				<td><?= $categoria[$n]['categoria_id'] ?></td>
				<td><?= $categoria[$n]['categoria'] ?></td>
				<td>
					<form method="POST">
						<input type="hidden" name="r" value="categoria-edit">
						<input type="hidden" name="categoria_id" value="<?= $categoria[$n]['categoria_id'] ?>">
						<button type="submit" class="btn btn-outline-warning"><i class="fas fa-pencil-alt"></i></button>
					</form>
				</td>
				<td>
					<form method="POST">
						<input type="hidden" name="r" value="categoria-delete">
						<input type="hidden" name="categoria_id" value="<?= $categoria[$n]['categoria_id'] ?>">
						<button type="submit" class="btn btn-outline-danger"><i class="fas fa-trash"></i></button>	
					</form>
				</td>
			</tr>
	<?php
	}
	?>
		</table>
	</div>
	<?php
}