<?php 
$usuarios_controller = new UsuariosController();
$usuarios = $usuarios_controller->get();


//////////////////////// PAGINACIÓN
$registros = 6;
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
$total_registros = count($usuarios);
$usuarios_controller2 = new UsuariosController();
$usuarios = $usuarios_controller2->get('', $inicio, $registros);
$total_paginas = ceil($total_registros / $registros); 
////////////////////// TERMINA LA PAGINACIÓN



if( empty($usuarios) ) {
?>
		<div class="alert alert-danger alertas" role="alert">
	      No hay usuarios registrados
	    </div>
<?php
} else {
?>
	<div class="container">
		<h2 class="p1">GESTIÓN DE USUARIOS</h2>
  		<table class="table">
    		<thead>
      			<tr>
					<th scope="col-sm">Usuario</th>
					<th scope="col-sm">Apellidos, Nombre</th>
					<th scope="col-sm">Email</th>
					<th scope="col-sm">Fecha de nacimiento</th>
					<th scope="col-sm">Rol</th>
					<th scope="col-sm" colspan="2">
						<form method="POST">
							<input type="hidden" name="r" value="usuario-add">
							<input class="btn btn-outline-primary" type="submit" value="Nuevo usuario">
						</form>
					</th>
				</tr>
			</thead>
	<?php
	for ($n=0; $n < count($usuarios); $n++) { 
	?>
			<tr>
				<td><?= $usuarios[$n]['usuario']?></td>
				<td><?= $usuarios[$n]['apellidos']?>, <?= $usuarios[$n]['nombre']?></td>
				<td><?= $usuarios[$n]['email']?></td>
				<td><?= $usuarios[$n]['fechNac']?></td>
				<td><?= $usuarios[$n]['rol']?></td>
				<td>
					<form method="POST">
						<input type="hidden" name="r" value="usuario-edit">
						<input type="hidden" name="usuario" value="<?=$usuarios[$n]['usuario']?>">
						<button type="submit" class="btn btn-outline-warning"><i class="fas fa-pencil-alt"></i></button>
					</form>
				</td>
				<td>
					<form method="POST">
						<input type="hidden" name="r" value="usuario-delete">
						<input type="hidden" name="usuario" value="<?=$usuarios[$n]['usuario']?>">
						<button type="submit" class="btn btn-outline-danger"><i class="fas fa-trash"></i></button>
					</form>
				</td>
				<td>
					<form method="POST">
						<input type="hidden" name="r" value="usuario-pwd">
						<input type="hidden" name="usuario" value="<?=$usuarios[$n]['usuario']?>">
						<button type="submit" class="btn btn-outline"><i class="fas fa-key"></i> Cambiar contraseña</button>
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
		  </ul>
		</nav>
	</div> <!-- TERMINA EL PAGINADO -->
<?php
}