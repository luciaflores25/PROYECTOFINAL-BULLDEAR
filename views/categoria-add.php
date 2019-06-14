<?php
if ( $_POST['r'] == 'categoria-add' && $_SESSION['rol'] == 'Admin' && !isset($_POST['crud']) ) {
?>
	<div class="container">
		<h3>Agregar categoría</h3>
     	<form method="POST" onsubmit="return validarCategoria()"> 
	      <div class="form-group">
	        <label for="categoria">Categoría</label>
	        <input type="text" class="form-control" id="categoria" name="categoria" placeholder="Nombre categoría" onchange="quitarError('categoria')">
	        <small class="form-text text-muted">Ej. Nike, Adidas</small>
	      </div>
	      <button type="submit" class="btn btn-primary">Añadir</button>
	      <input type="hidden" name="r" value="categoria-add">
	      <input type="hidden" name="crud" value="set">
	    </form>
	</div>
<?php
} else if ( $_POST['r'] == 'categoria-add' && $_SESSION['rol'] == 'Admin' && $_POST['crud'] == 'set' ) {
	$categoria_controller = new CategoriaController();
	$new_categoria = array(
		'categoria_id' => 0,
		'categoria' => $_POST['categoria']
	);
	$categoria = $categoria_controller->set($new_categoria);
	?>

		<div class="alert alert-success alertas" role="alert">
		  Categoría añadida satisfactoriamente.
		</div>
		<script>
			window.onload = function () {
				reloadPage("categorias")
			}
		</script>

	<?php
} else {
	$controller = new ViewController();
	$controller->load_view('error401');
}