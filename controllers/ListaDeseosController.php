<?php
class ListaDeseosController {
	private $model;

	public function __construct() {
		$this->model = new ListaDeseosModel();
	}
	public function set( $lista_data = array() ) {
		return $this->model->set($lista_data);
	}
	public function get( $usuario = '') {
		return $this->model->get($usuario);
	}
	public function del( $usuario = '', $producto_id = '' ) {
		return $this->model->del($usuario, $producto_id);
	}
	public function changeColor( $usuario = '', $producto_id = '' ) {
		return $this->model->changeColor($usuario, $producto_id);
	}
	public function __destruct() {
		unset($this->session);
	}
}