<?php 

$productos_controller = new ProductosController();
$productos = $productos_controller->getByCategory($_POST['categoria_id']);

if( empty($productos) ) {
?>
	<div class="alert alert-danger alertas" role="alert">
      No hay productos de la categoría que has seleccionado
    </div>
<?php
} else {
?>
	<div class="container-fluid d-flex">
		<div class="row">
<?php
	for ($n=0; $n < count($productos); $n++) { 
	?>
			<div class="card">
  				<img width="300px" height="300px" src="<?= $productos[$n]['imagen']?>" class="card-img-top">
  				<div class="card-body">
	    			<h5 class="card-title"><?=$productos[$n]['nombre']?></h5>
	    			<p class="card-text"><?=$productos[$n]['precio']?>€</p>
            <?php
	    			if (($_SESSION['ok']) && ($_SESSION['rol'] == 'User')) {
	    			?>
	    				<div class="row">
				            <form method="POST" action="zapatillas">

				             <?php

				         	$deseos_controller = new ListaDeseosController();
							$currentUser = $_SESSION['usuario'];
							$currentProducto = $productos[$n]['producto_id'];
					    	// Color botón deseos según si existe en la lista o no
								if (!$deseos_controller->changeColor($currentUser, $currentProducto)){
									
						    	?>
						            <button type="submit" class="btn corazon"><i class="fas fa-heart"></i></button>
						            <input type="hidden" name="r" value="lista-deseos-delete">
				              		<input type="hidden" name="crud" value="del">
						        <?php
						    	} else {
						    	?>
						    		<button type="submit" class="btn corazon"><i class="far fa-heart"></i></button>
						    		<input type="hidden" name="r" value="lista-deseos-add">
				              		<input type="hidden" name="crud" value="set">
						    	<?php
						    	}
						    	?>
						      <input type="hidden" name="categoria_id" value="<?= $_POST['categoria_id']?>">
				              <input type="hidden" name="producto_id" value="<?= $productos[$n]['producto_id'] ?>">
				              <input type="hidden" name="usuario" value="<?= $_SESSION['usuario']?>">
				            </form>
				            <form method="POST" action="zapatillas">
								<input type="hidden" name="r" value="producto-show">
								<input type="hidden" name="categoria_id" value="<?= $_POST['categoria_id']?>">
								<input type="hidden" name="producto_id" value="<?=$productos[$n]['producto_id']?>">
								<button type="submit" class="btn btn-outline-primary lupaHome"><i class="fas fa-search"></i></button>
							</form>
							<form method="POST" action="zapatillas">
				              <input type="hidden" name="producto_id" value="<?= $productos[$n]['producto_id'] ?>">
				              <input type="hidden" name="usuario" value="<?= $_SESSION['usuario']?>">
				              <input type="hidden" name="r" value="cesta-add">
				              <input type="hidden" name="categoria_id" value="<?= $_POST['categoria_id']?>">
				              <input type="hidden" name="crud" value="set">
				              <button type="submit" class="btn btn-success">Comprar <i class="fas fa-cart-plus"></i></button>
				            </form>
			            </div>
			            
					<?php
	    			}
	    			?>
  				</div>
			</div>
	<?php
   } 
   ?>
		</div>
	</div>

<?php
 } 
?>
