<?php
/*
const APIKEY = "l7xxffdf0f7fd16c4d5188654edfbc25aa27";
$textoDescripcion = "Creadas para hacer el día a día más cómodo a personas que buscan unas zapatillas muy resistentes con una sujeción excelente al pie. El diseño de estas zapatillas ofrece una buena sujeción y una excelente resistencia. Zapatillas casual muy resistentes gracias al exterior de polipiel irrompible.";

$producto_controller = new ProductosController();


////////////////////////////////////////// CARGAR NIKE //////////////////////////////////////////

	$nike_url = "https://api.shop.com/AffiliatePublisherNetwork/v1/products?publisherID=TEST&locale=en_US&perPage=20&brandId=Nike&categoryId=1-32805&apikey=".APIKEY;
	$nike   = json_decode(file_get_contents($nike_url));
	
	foreach ($nike->products as $item):
		$nombre = $item->name;
		$nombre=str_replace("'","",$nombre);  
		$precio = $item->minimumPrice;
		$precio=str_replace("$","",$precio); 
		$descripcion = $textoDescripcion;
		$imagen = $item->imageUrl;
		$idApi = $item->id;
		$categoria_id = '1';
		$enlace_compra = $item->referralUrl;

		$new_producto = array(
			'producto_id' =>  "",
			'categoria_id' =>  $categoria_id,
			'nombre' =>  $nombre, 
			'descripcion' =>  $descripcion,
			'precio' =>  $precio, 
			'imagen' =>  $imagen,
			'enlace_compra' =>  $enlace_compra,
			'idApi' => $idApi
		);
		$producto = $producto_controller->set($new_producto);
	endforeach ;


	////////////////////////////////////////// CARGAR ADIDAS //////////////////////////////////////////

	$adidas_url = "https://api.shop.com/AffiliatePublisherNetwork/v1/products?publisherID=TEST&locale=en_US&perPage=20&brandId=adidas&categoryId=1-32805&apikey=".APIKEY;
	$adidas   = json_decode(file_get_contents($adidas_url));

	
	foreach ($adidas->products as $item):
		$nombre = $item->name;
		$nombre=str_replace("'","",$nombre);  
		$precio = $item->minimumPrice;
		$precio=str_replace("$","",$precio); 
		$descripcion = $textoDescripcion;
		$imagen = $item->imageUrl;
		$idApi = $item->id;
		$categoria_id = '2';
		$enlace_compra = $item->referralUrl;
		
		$new_producto = array(
			'producto_id' =>  "",
			'categoria_id' =>  $categoria_id,
			'nombre' =>  $nombre, 
			'descripcion' =>  $descripcion,
			'precio' =>  $precio, 
			'imagen' =>  $imagen,
			'enlace_compra' =>  $enlace_compra,
			'idApi' => $idApi
		);
		$producto = $producto_controller->set($new_producto);

	endforeach ;


	////////////////////////////////////////// CARGAR VANS //////////////////////////////////////////

	$vans_url = "https://api.shop.com/AffiliatePublisherNetwork/v1/products?publisherID=TEST&locale=en_US&perPage=20&brandId=Vans&categoryId=1-32805&apikey=".APIKEY;
	$vans   = json_decode(file_get_contents($vans_url));
	
	foreach ($vans->products as $item):
		$nombre = $item->name;
		$nombre=str_replace("'","",$nombre);  
		$precio = $item->minimumPrice;
		$precio=str_replace("$","",$precio); 
		$descripcion = $textoDescripcion;
		$imagen = $item->imageUrl;
		$idApi = $item->id;
		$categoria_id = '3';
		$enlace_compra = $item->referralUrl;

		$new_producto = array(
			'producto_id' =>  "",
			'categoria_id' =>  $categoria_id,
			'nombre' =>  $nombre, 
			'descripcion' =>  $descripcion,
			'precio' =>  $precio, 
			'imagen' =>  $imagen,
			'enlace_compra' =>  $enlace_compra,
			'idApi' => $idApi
		);
		$producto = $producto_controller->set($new_producto);
	endforeach ;


	////////////////////////////////////////// CARGAR REEBOK //////////////////////////////////////////

	$reebok_url = "https://api.shop.com/AffiliatePublisherNetwork/v1/products?publisherID=TEST&locale=en_US&perPage=20&brandId=Reebok&categoryId=1-32805&apikey=".APIKEY;
	$reebok   = json_decode(file_get_contents($reebok_url));
	
	foreach ($reebok->products as $item):
		$nombre = $item->name;
		$nombre=str_replace("'","",$nombre);  
		$precio = $item->minimumPrice;
		$precio=str_replace("$","",$precio); 
		$descripcion = $textoDescripcion;
		$imagen = $item->imageUrl;
		$idApi = $item->id;
		$categoria_id = '4';
		$enlace_compra = $item->referralUrl;

		$new_producto = array(
			'producto_id' =>  "",
			'categoria_id' =>  $categoria_id,
			'nombre' =>  $nombre, 
			'descripcion' =>  $descripcion,
			'precio' =>  $precio, 
			'imagen' =>  $imagen,
			'enlace_compra' =>  $enlace_compra,
			'idApi' => $idApi
		);
		$producto = $producto_controller->set($new_producto);
	endforeach ;


	////////////////////////////////////////// CARGAR PUMA //////////////////////////////////////////

	$puma_url = "https://api.shop.com/AffiliatePublisherNetwork/v1/products?publisherID=TEST&locale=en_US&perPage=20&brandId=Puma&categoryId=1-32805&apikey=".APIKEY;
	$puma   = json_decode(file_get_contents($puma_url));
	
	foreach ($puma->products as $item):
		$nombre = $item->name;
		$nombre=str_replace("'","",$nombre);  
		$precio = $item->minimumPrice;
		$precio=str_replace("$","",$precio); 
		$descripcion = $textoDescripcion;
		$imagen = $item->imageUrl;
		$idApi = $item->id;
		$categoria_id = '5';
		$enlace_compra = $item->referralUrl;

		$new_producto = array(
			'producto_id' =>  "",
			'categoria_id' =>  $categoria_id,
			'nombre' =>  $nombre, 
			'descripcion' =>  $descripcion,
			'precio' =>  $precio, 
			'imagen' =>  $imagen,
			'enlace_compra' =>  $enlace_compra,
			'idApi' => $idApi
		);
		$producto = $producto_controller->set($new_producto);
	endforeach ;


	////////////////////////////////////////// CARGAR ASICS //////////////////////////////////////////

	$asics_url = "https://api.shop.com/AffiliatePublisherNetwork/v1/products?publisherID=TEST&locale=en_US&perPage=20&brandId=ASICS&categoryId=1-32805&apikey=".APIKEY;
	$asics   = json_decode(file_get_contents($asics_url));
	
	foreach ($asics->products as $item):
		$nombre = $item->name;
		$nombre=str_replace("'","",$nombre);  
		$precio = $item->minimumPrice;
		$precio=str_replace("$","",$precio); 
		$descripcion = $textoDescripcion;
		$imagen = $item->imageUrl;
		$idApi = $item->id;
		$categoria_id = '6';
		$enlace_compra = $item->referralUrl;

		$new_producto = array(
			'producto_id' =>  "",
			'categoria_id' =>  $categoria_id,
			'nombre' =>  $nombre, 
			'descripcion' =>  $descripcion,
			'precio' =>  $precio, 
			'imagen' =>  $imagen,
			'enlace_compra' =>  $enlace_compra,
			'idApi' => $idApi
		);
		$producto = $producto_controller->set($new_producto);

	endforeach ;


	////////////////////////////////////////// CARGAR NEW BALANCE //////////////////////////////////////////

	$newbalance_url = "https://api.shop.com/AffiliatePublisherNetwork/v1/products?publisherID=TEST&locale=en_US&perPage=20&brandId=%22New%20Balance%22&categoryId=1-32805&apikey=".APIKEY;
	$newbalance   = json_decode(file_get_contents($newbalance_url));
	
	foreach ($newbalance->products as $item):
		$nombre = $item->name;
		$nombre=str_replace("'","",$nombre);  
		$precio = $item->minimumPrice;
		$precio=str_replace("$","",$precio); 
		$descripcion = $textoDescripcion;
		$imagen = $item->imageUrl;
		$idApi = $item->id;
		$categoria_id = '7';
		$enlace_compra = $item->referralUrl;

		$new_producto = array(
			'producto_id' =>  "",
			'categoria_id' =>  $categoria_id,
			'nombre' =>  $nombre, 
			'descripcion' =>  $descripcion,
			'precio' =>  $precio, 
			'imagen' =>  $imagen,
			'enlace_compra' =>  $enlace_compra,
			'idApi' => $idApi
		);
		$producto = $producto_controller->set($new_producto);
	endforeach ;

	////////////////////////////////////////// CARGAR CONVERSE //////////////////////////////////////////

	$converse_url = "https://api.shop.com/AffiliatePublisherNetwork/v1/products?publisherID=TEST&locale=en_US&perPage=20&categoryId=1-32805&brandId=Converse&apikey=".APIKEY;
	$converse   = json_decode(file_get_contents($converse_url));
	
	foreach ($converse->products as $item):
		$nombre = $item->name;
		$nombre=str_replace("'","",$nombre);  
		$precio = $item->minimumPrice;
		$precio=str_replace("$","",$precio); 
		$descripcion = $textoDescripcion;
		$imagen = $item->imageUrl;
		$idApi = $item->id;
		$categoria_id = '8';
		$enlace_compra = $item->referralUrl;

		$new_producto = array(
			'producto_id' =>  "",
			'categoria_id' =>  $categoria_id,
			'nombre' =>  $nombre, 
			'descripcion' =>  $descripcion,
			'precio' =>  $precio, 
			'imagen' =>  $imagen,
			'enlace_compra' =>  $enlace_compra,
			'idApi' => $idApi
		);
		$producto = $producto_controller->set($new_producto);
	endforeach ;

	////////////////////////////////////////// CARGAR SKECHERS //////////////////////////////////////////

	$skechers_url = "https://api.shop.com/AffiliatePublisherNetwork/v1/products?publisherID=TEST&locale=en_US&perPage=20&categoryId=1-32805&brandId=Skechers&apikey=".APIKEY;
	$skechers   = json_decode(file_get_contents($skechers_url));
	
	foreach ($skechers->products as $item):
		$nombre = $item->name;
		$nombre=str_replace("'","",$nombre);  
		$precio = $item->minimumPrice;
		$precio=str_replace("$","",$precio); 
		$descripcion = $textoDescripcion;
		$imagen = $item->imageUrl;
		$idApi = $item->id;
		$categoria_id = '9';
		$enlace_compra = $item->referralUrl;

		$new_producto = array(
			'producto_id' =>  "",
			'categoria_id' =>  $categoria_id,
			'nombre' =>  $nombre, 
			'descripcion' =>  $descripcion,
			'precio' =>  $precio, 
			'imagen' =>  $imagen,
			'enlace_compra' =>  $enlace_compra,
			'idApi' => $idApi
		);
		$producto = $producto_controller->set($new_producto);
	endforeach ;

	////////////////////////////////////////// CARGAR CLARKS //////////////////////////////////////////

	$clarks_url = "https://api.shop.com/AffiliatePublisherNetwork/v1/products?publisherID=TEST&locale=en_US&perPage=20&categoryId=1-32805&brandId=Clarks&apikey=".APIKEY;
	$clarks   = json_decode(file_get_contents($clarks_url));
	
	foreach ($clarks->products as $item):
		$nombre = $item->name;
		$nombre=str_replace("'","",$nombre);  
		$precio = $item->minimumPrice;
		$precio=str_replace("$","",$precio); 
		$descripcion = $textoDescripcion;
		$imagen = $item->imageUrl;
		$idApi = $item->id;
		$categoria_id = '10';
		$enlace_compra = $item->referralUrl;

		$new_producto = array(
			'producto_id' =>  "",
			'categoria_id' =>  $categoria_id,
			'nombre' =>  $nombre, 
			'descripcion' =>  $descripcion,
			'precio' =>  $precio, 
			'imagen' =>  $imagen,
			'enlace_compra' =>  $enlace_compra,
			'idApi' => $idApi
		);
		$producto = $producto_controller->set($new_producto);
	endforeach ;

	////////////////////////////////////////// CARGAR NAUTILUS //////////////////////////////////////////

	$nautilus_url = "https://api.shop.com/AffiliatePublisherNetwork/v1/products?publisherID=TEST&locale=en_US&perPage=20&categoryId=1-32805&brandId=Nautilus&apikey=".APIKEY;
	$nautilus   = json_decode(file_get_contents($nautilus_url));
	
	foreach ($nautilus->products as $item):
		$nombre = $item->name;
		$nombre=str_replace("'","",$nombre);  
		$precio = $item->minimumPrice;
		$precio=str_replace("$","",$precio); 
		$descripcion = $textoDescripcion;
		$imagen = $item->imageUrl;
		$idApi = $item->id;
		$categoria_id = '11';
		$enlace_compra = $item->referralUrl;

		$new_producto = array(
			'producto_id' =>  "",
			'categoria_id' =>  $categoria_id,
			'nombre' =>  $nombre, 
			'descripcion' =>  $descripcion,
			'precio' =>  $precio, 
			'imagen' =>  $imagen,
			'enlace_compra' =>  $enlace_compra,
			'idApi' => $idApi
		);
		$producto = $producto_controller->set($new_producto);
	endforeach ;
*/	