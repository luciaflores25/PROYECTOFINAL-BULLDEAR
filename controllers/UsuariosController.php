<?php 
class UsuariosController {
	private $model;
	public function __construct() {
		$this->model = new UsuariosModel();
	}
	public function set( $usuario_data = array() ) {
		return $this->model->set($usuario_data);
	}
	public function checkEmail( $email ) {
		return $this->model->checkEmail($email);
	}
	public function checkUser( $usuario ) {
		return $this->model->checkUser($usuario);
	}
	public function checkPass( $usuario, $pass ) {
		return $this->model->checkPass($usuario, $pass);
	}
	public function checkUsuario( $usuario ) {
		return $this->model->checkUsuario($usuario);
	}
	public function update( $usuario_data = array() ) {
		return $this->model->update($usuario_data);
	}
	public function updatePwd( $usuario_data = array() ) {
		return $this->model->updatePwd($usuario_data);
	}
	public function get( $usuario_id = '', $inicio=FALSE, $nReg=FALSE) {
		return $this->model->get($usuario_id, $inicio, $nReg);
	}
	public function del( $usuario_id = '' ) {
		return $this->model->del($usuario_id);
	}
	public function __destruct() {
		unset($this->session);
	}
}