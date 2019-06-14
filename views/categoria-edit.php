<?php 
$categoria_controller = new CategoriaController();
if( $_POST['r'] == 'categoria-edit' && $_SESSION['rol'] == 'Admin' && !isset($_POST['crud']) ) {
	$categoria = $categoria_controller->get($_POST['categoria_id']);
	if( empty($categoria) ) {
		?>
			<div class="alert alert-success alertas" role="alert">
			  No existe la categoría seleccionada.
			</div>
			<script>
				window.onload = function (){
					reloadPage("categorias")
				}
			</script>
	<?php
	} else {
		?>
			<div class="container"> 
			    <h3>Editar categoría</h3> 
			    <form method="POST" onsubmit="return validarCategoria()">
			       <div class="form-group">
			        <label for="categoriaId">Categoría ID</label>
			        <input type="text" class="form-control" id="categoriaId" name="categoria" placeholder="Nombre categoría" value="<?=$categoria[0]['categoria_id'];?>" disabled>
			        <small id="categoriaIdHelp" class="form-text text-muted">Número identificador de la categoría</small>
			        <input type="hidden" name="categoria_id" value="<?=$categoria[0]['categoria_id'];?>">
			      </div>
			      <div class="form-group">
			        <label for="categoria">Categoría</label>
			        <input type="text" class="form-control" id="categoria" name="categoria" placeholder="Nombre categoría" value="<?=$categoria[0]['categoria'];?>" onchange="quitarError('categoria')">
			        <small class="form-text text-muted">Ej. Nike, Adidas</small>
			      </div>
			      <button type="submit" class="btn btn-warning">Editar</button>
			      <input type="hidden" name="r" value="categoria-edit">
				  <input type="hidden" name="crud" value="update">
			    </form>
			</div>
	<?php
	}
} else if( $_POST['r'] == 'categoria-edit' && $_SESSION['rol'] == 'Admin' && $_POST['crud'] == 'update' ) {	
	$save_categoria = array(
		'categoria_id' => $_POST['categoria_id'],
		'categoria' => $_POST['categoria']
	);
	$categoria = $categoria_controller->update($save_categoria);
	?>
		<div class="alert alert-success alertas" role="alert">
		  Categoría editada satisfactoriamente.
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