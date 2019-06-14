<?php 
// Obtengo el usuario con el que he iniciado sesión
$usuario_controller = new UsuariosController();
$usuario = $usuario_controller->get($_SESSION['usuario']);

// Obtengo los productos de la lista de deseos
$lista_controller = new ListaDeseosController();
$lista = $lista_controller->get($_SESSION['usuario']);
$total = 0;
if( empty($lista) ) {
?>
	<div class="alert alert-danger alertas" role="alert">
      No tienes ningún producto añadido a la lista de deseos
    </div>
<?php
} else {
?>
	<h3 style="text-align: center">MIS DESEOS <i class="far fa-list-alt"></i></h3>
	<div class="container-fluid d-flex">
		
		<div class="row">
<?php
	for ($n=0; $n < count($lista); $n++) { 
	?>
			<div class="card">
  				<img width="300px" height="300px" src="<?= $lista[$n]['imagen']?>" class="card-img-top">
  				<div class="card-body">
	    			<h5 class="card-title"><?=$lista[$n]['nombre']?></h5>
	    			<p class="card-text"><?=$lista[$n]['precio']?>€</p>
	    			<div class="row">
	    				<form method="POST">  
			              	<input type="hidden" name="producto_id" value="<?= $lista[$n]['producto_id'] ?>">
			              	<input type="hidden" name="usuario" value="<?= $_SESSION['usuario']?>">
			              	<input type="hidden" name="r" value="cesta-add">
			              	<input type="hidden" name="crud" value="set">
			              	<button type="submit" class="btn btn-success">Comprar <i class="fas fa-cart-plus"></i></button>
			            </form>
			            <form method="POST">  
			              	<input type="hidden" name="producto_id" value="<?= $lista[$n]['producto_id'] ?>">
			              	<input type="hidden" name="usuario" value="<?= $_SESSION['usuario']?>">
			              	<input type="hidden" name="r" value="lista-deseos-delete">
			              	<input type="hidden" name="crud" value="del">
			              	<button type="submit" class="btn btn-outline-danger delDeseo"><i class="fas fa-trash"></i></button>
			            </form>
	    			</div>
	    			
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
