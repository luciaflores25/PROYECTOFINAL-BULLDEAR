<?php
class CestaController {
	private $model;

	public function __construct() {
		$this->model = new CestaModel();
	}
	public function set( $cesta_data = array() ) {
		return $this->model->set($cesta_data);
	}
	public function get( $usuario = '') {
		return $this->model->get($usuario);
	}
	public function getCantidad( $usuario, $producto_id) {
		return $this->model->getCantidad($usuario, $producto_id);
	}
	public function getCantidadEnCesta( $usuario ) {
		return $this->model->getCantidadEnCesta($usuario);
	}
	public function del( $usuario = '', $producto_id = '' ) {
		return $this->model->del($usuario, $producto_id);
	}
	public function __destruct() {
		unset($this->session);
	}
}