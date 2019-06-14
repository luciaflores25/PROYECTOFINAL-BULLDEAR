<?php 
$categoria_controller = new CategoriaController();
if( $_POST['r'] == 'categoria-delete' && $_SESSION['rol'] == 'Admin' && !isset($_POST['crud']) ) {
	$categoria = $categoria_controller->get($_POST['categoria_id']);
	if( empty($categoria) ) {
		?>
			<div class="alert alert-danger alertas">
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
				<h3>Eliminar categoría</h3> 
		    	<form method="POST"> 
			      <div class="form-group">
					¿Estas seguro que desea eliminar la categoría <mark><?= $categoria[0]['categoria'] ?></mark>?
			      </div>
			      <button type="submit" class="btn btn-danger">Eliminar</button>
			      <button type="button" class="btn btn-secondary" onclick="history.back()">Cancelar</button>
			      <input type="hidden" name="categoria_id" value="<?= $categoria[0]['categoria_id']?>">
				  <input type="hidden" name="r" value="categoria-delete">
				  <input type="hidden" name="crud" value="del">
			    </form>
			</div>
	<?php	
	}
} else if( $_POST['r'] == 'categoria-delete' && $_SESSION['rol'] == 'Admin' && $_POST['crud'] == 'del' ) {	
	$categoria = $categoria_controller->del($_POST['categoria_id']);
	?>
		<div class="alert alert-success alertas" role="alert">
		  La categoría ha sido eliminada satisfactoriamente.
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