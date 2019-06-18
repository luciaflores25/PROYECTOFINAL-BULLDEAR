<?php 
class Router {
	public $route;
	public function __construct($route) {
		$session_options = array(
			session_start (),
			'read_and_close' => true
		);
		if( !isset($_SESSION) )  session_start($session_options);
		if( !isset($_SESSION['ok']) )  $_SESSION['ok'] = false;
		if($_SESSION['ok']) {
			
			$this->route = isset($_GET['r']) ? $_GET['r'] : 'home';
			
			$controller = new ViewController();
			switch ($this->route) {
				case 'home':
					if( !isset( $_POST['r'] ) )  $controller->load_view('home');
					else if( $_POST['r'] == 'lista-deseos-add' )  $controller->load_view('lista-deseos-add');
					else if( $_POST['r'] == 'lista-deseos-delete' )  $controller->load_view('lista-deseos-delete');
					else if( $_POST['r'] == 'cesta-add' )  $controller->load_view('cesta-add');
					else if( $_POST['r'] == 'producto-show' )  $controller->load_view('producto-show');
					break;
				case 'zapatillas':
					if( !isset( $_POST['r'] ) )  $controller->load_view('home');
					else if( $_POST['r'] == 'zapatillas-filtro' )  $controller->load_view('zapatillas-filtro');
					else if( $_POST['r'] == 'lista-deseos-add' )  $controller->load_view('lista-deseos-add');
					else if( $_POST['r'] == 'lista-deseos-delete' )  $controller->load_view('lista-deseos-delete');
					else if( $_POST['r'] == 'cesta-add' )  $controller->load_view('cesta-add');
					else if( $_POST['r'] == 'producto-show' )  $controller->load_view('producto-show');
					break;
				case "perfil":
					if( !isset( $_POST['r'] ) )  $controller->load_view('perfil');
					else if( $_POST['r'] == 'usuario-edit-perfil' )  $controller->load_view('usuario-edit-perfil');
					else if( $_POST['r'] == 'usuario-pwd-perfil' )  $controller->load_view('usuario-pwd-perfil');
					break;
				case 'usuarios':
					if( !isset( $_POST['r'] ) )  $controller->load_view('usuario');
					else if( $_POST['r'] == 'usuario-add' )  $controller->load_view('usuario-add');
					else if( $_POST['r'] == 'usuario-edit' )  $controller->load_view('usuario-edit');
					else if( $_POST['r'] == 'usuario-pwd' )  $controller->load_view('usuario-pwd');
					else if( $_POST['r'] == 'usuario-delete' )  $controller->load_view('usuario-delete');
					break;
				case 'categorias':
					if( !isset( $_POST['r'] ) )  $controller->load_view('categoria');
					else if( $_POST['r'] == 'categoria-add' )  $controller->load_view('categoria-add');
					else if( $_POST['r'] == 'categoria-edit' )  $controller->load_view('categoria-edit');
					else if( $_POST['r'] == 'categoria-delete' )  $controller->load_view('categoria-delete');
					break;
				case 'productos':
					if( !isset( $_POST['r'] ) )  $controller->load_view('producto');
					else if( $_POST['r'] == 'producto-add' )  $controller->load_view('producto-add');
					else if( $_POST['r'] == 'producto-show' )  $controller->load_view('producto-show');
					else if( $_POST['r'] == 'producto-edit' )  $controller->load_view('producto-edit');
					else if( $_POST['r'] == 'producto-delete' )  $controller->load_view('producto-delete');
					break;
				case 'lista-deseos':
					if( !isset( $_POST['r'] ) )  $controller->load_view('lista-deseos');
					else if( $_POST['r'] == 'lista-deseos-delete' )  $controller->load_view('lista-deseos-delete');
					else if( $_POST['r'] == 'cesta-add' )  $controller->load_view('cesta-add');
					break;
				case 'cesta':
					if( !isset( $_POST['r'] ) )  $controller->load_view('cesta');
					else if( $_POST['r'] == 'cesta-delete' )  $controller->load_view('cesta-delete');
					break;
				case 'galeria':
					if( !isset( $_POST['r'] ) )  $controller->load_view('galeria');
					break;
				case 'ruleta':
					if( !isset( $_POST['r'] ) )  $controller->load_view('ruleta');
					break;
				case 'salir':
					$user_session = new SessionController();
					$user_session->logout();
					break;
				
				default:
					$controller->load_view('error404');
					break;
			}
			
		} else if ( isset($_POST['usuario']) && isset($_POST['pass']) ) {
			// Login
			if ( isset($_POST['usuario']) && isset($_POST['pass']) ) {
				$user_session = new SessionController();
				$session = $user_session->login($_POST['usuario'], $_POST['pass']);
				if ( empty($session) ) {
					// Si el usuario o la contraseña no se encuentran en la base de datos
					$controller = new ViewController();
					$controller->load_view('login_error');
				}
				else {
					// Si el usuario y la contraseña son correctos se guardan los datos del usuario logueado
					$_SESSION['ok'] = true;
					foreach ($session as $row) {
						$_SESSION['usuario'] = $row['usuario'];
						$_SESSION['pass'] = $row['pass'];
						$_SESSION['nombre'] = $row['nombre'];
						$_SESSION['apellidos'] = $row['apellidos'];
						$_SESSION['email'] = $row['email'];
						$_SESSION['pass'] = $row['pass'];
						$_SESSION['fechNac'] = $row['fechNac'];
						$_SESSION['rol'] = $row['rol'];
					}
					
					header('Location: ./');
				}
				//

			} else {
				$controller = new ViewController();
				$controller->load_view('home');


			}
		} else if(!$_SESSION['ok']) {
			
			$this->route = isset($_GET['r']) ? $_GET['r'] : 'home';
			
			$controller = new ViewController();
			switch ($this->route) {
				case 'home':
					if( !isset( $_POST['r'] ) )  $controller->load_view('home');
					break;
				case 'registro':
					if( !isset( $_POST['r'] ) )  $controller->load_view('registro-add');
					else if( $_POST['r'] == 'registro-add' )  $controller->load_view('registro-add');
					break;
				case 'zapatillas':
					if( !isset( $_POST['r'] ) )  $controller->load_view('home');
					else if( $_POST['r'] == 'zapatillas-filtro' )  $controller->load_view('zapatillas-filtro');
					break;
				case 'galeria':
					if( !isset( $_POST['r'] ) )  $controller->load_view('galeria');
					break;
				case 'ruleta':
					if( !isset( $_POST['r'] ) )  $controller->load_view('ruleta');
					break;
				case 'populate':
					if( !isset( $_POST['r'] ) )  $controller->load_view('populate');
					break;
				default:
					$controller->load_view('error404');
					break;
			}
		}
	} 
}
