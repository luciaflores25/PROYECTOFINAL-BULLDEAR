<?php 
$categoria_controller = new CategoriaController();
$categoria = $categoria_controller->get();
$nCesta = 0;

if (isset($_SESSION['usuario'])){
	$cesta_controller = new CestaController();
	$nCesta = $cesta_controller->getCantidadEnCesta($_SESSION['usuario']);
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="UTF-8">
	<title>BULL&DEAR</title>
	<link rel="shortcut icon" type="image/png" href="./public/img/favicon.ico">
	<link rel="stylesheet" href="public/css/estilo.css">

	<!-- ICONOS -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">

	<!-- BOOTSTRAP -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

	
	<script src="./public/js/TweenMax.min.js"></script>
	<script src="./public/js/Winwheel.min.js"></script>
	<script src="./public/js/bullbear.js"></script>
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body onload="setInterval(automatico,4500)">
	<!-- BARRA DE NAVEGACIÓN -->
	<nav class="navbar navbar-expand-xl navbar-light fixed-top">
		<a class="navbar-brand" href="./">BULL&DEAR</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item active">
					<a class="nav-link" href="./">HOME <span class="sr-only">(current)</span></a>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Zapatillas
					</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdown">
						<!-- LISTADO DESPLEGABLE DE CATEGORÍAS -->
					<?php
					for ($n=0; $n < count($categoria); $n++) { 
						?>
							<form method="POST" action="zapatillas">
								<input type="hidden" name="categoria_id" value="<?=$categoria[$n]['categoria_id']?>">
								<input type="hidden" name="r" value="zapatillas-filtro">
								<button type="submit" class="dropdown-item"><?=$categoria[$n]['categoria']?></button>
							</form>
							
						<?php
					}
					?>
						</div>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="galeria">Galería</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="ruleta">¿Juegas?</a>
					</li>

				<!-- SI LA SESIÓN ESTÁ ACTIVA Y EL ROL DEL USUARIO ES ADMINISTRADOR -->
				<?php
				if(($_SESSION['ok']) && ($_SESSION["rol"] == 'Admin')) {
					?>
					<li class="nav-item">
						<a class="nav-link" href="categorias">Categorías</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="usuarios">Usuarios</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="productos">Productos</a>
					</li>

				<!-- SI LA SESIÓN ESTÁ ACTIVA Y EL ROL DEL USUARIO ES USUARIO NORMAL -->
				<?php
				}
				else if(($_SESSION['ok']) && $_SESSION['rol'] == 'User') {
					?>
					<li class="nav-item">
						<a class="nav-link" href="perfil">Perfil</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="lista-deseos">Lista de deseos</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="cesta"><i class="fas fa-shopping-cart"></i> Cesta (<?= $nCesta?>)</a>
					</li>
					<?php
				}
				?>
			</ul>

	<!-- SI LA SESIÓN ESTÁ ACTIVA SIN IMPORTAR EL ROL -->
	<?php 
	if ($_SESSION['ok']) { 
	?>
			<ul class="navbar-nav mr-auto">
				<li class="nav-item ">
					<span class="nav-link text-body"><i class="fas fa-user"></i> <?= $_SESSION["usuario"];?></span>
				</li>
				<li class="nav-item">
					<a class="nav-link btn btn-ligth" href="salir">Salir </a>

				</li>
			</ul>
	</nav>
	
	<!-- SI EL USUARIO NO HA INICIADO SESIÓN SE MOSTRARÁ EL LOGIN Y EL REGISTRO-->

	<?php
	} else if (!$_SESSION['ok']) { 
	?>
			<form method="POST" class="form-inline my-2 my-lg-0">
				<input name="usuario" class="form-control mr-sm-2" type="text" placeholder="usuario" aria-label="usuario" required>
				<input name="pass" class="form-control mr-sm-2" type="password" placeholder="contraseña" required>
				<button class="btn btn-outline-dark my-2 my-sm-0" type="submit">Accede</button>
			</form>
			<form method="POST" action="registro">
				<input type="hidden" name="r" value="registro-add">
				<button class="btn btn-outline-dark my-2 my-sm-0" type="submit" href="registro">Registro</button> 
			</form>
		</div>
	</nav>
	<?php
		
	}