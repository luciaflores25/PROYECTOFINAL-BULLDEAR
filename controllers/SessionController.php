<?php
class SessionController {
	private $session;
	public function __construct() {
		$this->session = new UsuariosModel();
	}
	public function login($usuario, $pass) {
		return $this->session->validate_user($usuario, $pass);
	}
	public function logout() {
		session_start();
		session_destroy();
		header('Location: ./');
	}
}