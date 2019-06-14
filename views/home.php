<?php 

$productos_controller = new ProductosController();
$productos = $productos_controller->get();

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
$total_registros = count($productos);
$productos_controller2 = new ProductosController();
$productos = $productos_controller2->get('', $inicio, $registros);
$total_paginas = ceil($total_registros / $registros); 
////////////////////// TERMINA LA PAGINACIÓN


if( empty($productos) ) {
?>
	<div class="alert alert-danger alertas" role="alert">
      No hay productos en la base de datos
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
				            <form method="POST">

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
				              <input type="hidden" name="producto_id" value="<?= $productos[$n]['producto_id'] ?>">
				              <input type="hidden" name="usuario" value="<?= $_SESSION['usuario']?>">
				            </form>
				            <form method="POST">
								<input type="hidden" name="r" value="producto-show">
								<input type="hidden" name="producto_id" value="<?=$productos[$n]['producto_id']?>">
								<button type="submit" class="btn btn-outline-primary lupaHome"><i class="fas fa-search"></i></button>
							</form>
							<form method="POST">
				              <input type="hidden" name="producto_id" value="<?= $productos[$n]['producto_id'] ?>">
				              <input type="hidden" name="usuario" value="<?= $_SESSION['usuario']?>">
				              <input type="hidden" name="r" value="cesta-add">
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