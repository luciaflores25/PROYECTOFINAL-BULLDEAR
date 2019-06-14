<?php 
if( $_POST['r'] == 'producto-add' && $_SESSION['rol'] == 'Admin' && !isset($_POST['crud']) ) {
	$categoria_controller = new CategoriaController();
	$categoria = $categoria_controller->get();
	$categoria_select = '';
	for ($n=0; $n < count($categoria); $n++) { 
		$categoria_select .= '<option value="' . $categoria[$n]['categoria_id'] . '">' . $categoria[$n]['categoria'] . '</option>';
	}
	?>
		<div class="container"> 
		    <h3>Agregar producto</h3> 
		    <form method="POST" onsubmit="return validarProducto()"> 
		      <div class="form-group">
		        <label for="nombre">Nombre producto *</label>
		        <input type="text" class="form-control" id="nombreProducto" name="nombre" placeholder="Nombre producto" onchange="quitarError('nombreProducto')">
		        <small class="form-text text-muted">Ej. Nike AIR MAX 90</small>
		      </div>
		      <div class="form-group">
		        <label for="descripcion">Descripción *</label>
		        <textarea class="form-control" id="descripcion" name="descripcion" placeholder="Descripción del producto..." onchange="quitarError('descripcion')"></textarea>
		        <small class="form-text text-muted">Breve descripción del producto</small>
		      </div>
		      <div class="form-group">
		        <label for="precio">Precio *</label>
		        <input type="text" class="form-control" id="precio" name="precio" placeholder="Precio" onchange="quitarError('precio')">
		        <small class="form-text text-muted">Número entero o hasta 2 decimales.</small>
		      </div>
		      <div class="form-group">
		        <label for="imagen">Imagen *</label>
		        <input type="text" class="form-control" id="imagen" name="imagen" placeholder="Link imagen" onchange="quitarError('imagen')">
		        <small class="form-text text-muted">Link de una imagen (.jpg, .png, etc.)</small>
		      </div>
		      <div class="form-group">
		        <label for="enlace_compra">Enlace de compra</label>
		        <input type="text" class="form-control" name="enlace_compra" placeholder="Enlace de compra">
		        <small class="form-text text-muted">Link de un enlace de compra de cualquier tienda</small>
		      </div>
		      <div class="form-group">
			    <label for="categoriaSelect">Categoría *</label>
			    <select class="form-control" name="categoria" id="categoriaSelect" placeholder="categoría" onchange="quitarError('categoriaSelect')">
			      <option value="">Categoría</option>
			      <?= $categoria_select ?>
			    </select>
			  </div>

		      <button type="submit" class="btn btn-primary">Añadir</button>
		      <small class="form-text text-muted">Todos los campos con (*) son obligatorios.</small>
		      <input type="hidden" name="r" value="producto-add">
		      <input type="hidden" name="crud" value="set">
		    </form>
		</div>

		<?php
} else if( $_POST['r'] == 'producto-add' && $_SESSION['rol'] == 'Admin' && $_POST['crud'] == 'set' ) {
	$producto_controller = new ProductosController();
	$new_producto = array(
		'producto_id' =>  "",
		'categoria_id' =>  $_POST['categoria'],
		'nombre' =>  $_POST['nombre'],
		'descripcion' =>  $_POST['descripcion'], 
		'precio' =>  $_POST['precio'], 
		'imagen' =>  $_POST['imagen'],
		'enlace_compra' =>  $_POST['enlace_compra']
	);
	$producto = $producto_controller->set($new_producto);
	?>
		<div class="alert alert-success alertas" role="alert">
		  Producto añadido satisfactoriamente.
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