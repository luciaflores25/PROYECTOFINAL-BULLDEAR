<?php 
$producto_controller = new ProductosController();
if( $_POST['r'] == 'producto-edit' && $_SESSION['rol'] == 'Admin' && !isset($_POST['crud']) ) {
	$producto = $producto_controller->get($_POST['producto_id']);
	if( empty($producto) ) {
		?>
			<div class="alert alert-danger alertas" role="alert">
			  No existe el producto seleccionado
			</div>
			<script>
				window.onload = function (){
					reloadPage("productos")
				}
			</script>
		<?php
	} else {
		$categoria_controller = new CategoriaController();
		$categoria = $categoria_controller->get();
		$categoria_select = '';

		for ($n=0; $n < count($categoria); $n++) { 
			$selected = ($producto[0]['categoria'] == $categoria[$n]['categoria']) ? 'selected' : '';
			$categoria_select .= '<option value="' . $categoria[$n]['categoria_id'] . '" ' . $selected . '>' . $categoria[$n]['categoria'] . '</option>';
		}
		?>
		<div class="container"> 
		    <h3>Editar producto</h3> 
		    <form method="POST" onsubmit="return validarProducto()"> 
			  <div class="form-group">
			    <label for="producto_id">ID Producto</label>
			    <input type="text" class="form-control" value="<?=$producto[0]['producto_id']?>" disabled>
			    <input type="hidden" name="producto_id" value="<?=$producto[0]['producto_id']?>">
			    <small class="form-text text-muted">ID del producto en la base de datos.</small>
			  </div>
		      <div class="form-group">
		        <label for="nombre">Nombre producto *</label>
		        <input type="text" class="form-control" id="nombreProducto" name="nombre" placeholder="Nombre producto" value="<?=$producto[0]['nombre']?>" onchange="quitarError('nombreProducto')" required>
		        <small class="form-text text-muted">Ej. Nike AIR MAX 90</small>
		      </div>
		      <div class="form-group">
		        <label for="descripcion">Descripción *</label>
		        <textarea class="form-control" id="descripcion" name="descripcion" placeholder="Descripción del producto..." onchange="quitarError('descripcion')" required><?=$producto[0]['descripcion']?></textarea>
		        <small class="form-text text-muted">Breve descripción del producto</small>
		      </div>
		      <div class="form-group">
		        <label for="precio">Precio *</label>
		        <input type="text" class="form-control" id="precio" name="precio" placeholder="Precio" value="<?=$producto[0]['precio']?>" onchange="quitarError('precio')">
		        <small class="form-text text-muted">Número entero o hasta 2 decimales.</small>
		      </div>
		      <div class="form-group">
		        <label for="imagen">Imagen *</label>
		        <input type="text" class="form-control" id="imagen" name="imagen" placeholder="Link imagen" value="<?=$producto[0]['imagen']?>" onchange="quitarError('imagen')">
		        <small class="form-text text-muted">Link de una imagen (.jpg, .png, etc.)</small>
		      </div>
		      <div class="form-group">
		        <label for="enlace_compra">Enlace de compra</label>
		        <input type="text" class="form-control" name="enlace_compra" placeholder="Link de un enlace de compra" value="<?=$producto[0]['enlace_compra']?>">
		        <small class="form-text text-muted">Link de un enlace de compra de cualquier tienda</small>
		      </div>
		      <div class="form-group">
			    <label for="categoriaSelect">Categoría *</label>
			    <select class="form-control" name="categoria_id" id="categoriaSelect" placeholder="categoría" onchange="quitarError('categoriaSelect')">
			      <option value="">Categoría</option>
			      <?= $categoria_select ?>
			    </select>
			  </div>

		      <button type="submit" class="btn btn-warning">Editar</button>
		      <small class="form-text text-muted">Todos los campos con (*) son obligatorios.</small>
		      <input type="hidden" name="r" value="producto-edit">
		      <input type="hidden" name="crud" value="update">
		    </form>
		</div>
		<?php
	}
} else if( $_POST['r'] == 'producto-edit' && $_SESSION['rol'] == 'Admin' && $_POST['crud'] == 'update' ) {	
	$save_producto = array(
		'producto_id' =>  $_POST['producto_id'],
		'categoria_id' =>  $_POST['categoria_id'], 
		'nombre' =>  $_POST['nombre'], 
		'descripcion' =>  $_POST['descripcion'], 
		'precio' =>  $_POST['precio'],
		'imagen' =>  $_POST['imagen'],
		'enlace_compra' =>  $_POST['enlace_compra']
	);
	$producto = $producto_controller->update($save_producto);
	?>
		<div class="alert alert-success alertas" role="alert">
		  Producto <b><?= $_POST['nombre']?></b> editado satisfactoriamente.
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