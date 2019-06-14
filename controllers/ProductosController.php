<?php 
class ProductosController {
	private $model;
	public function __construct() {
		$this->model = new ProductosModel();
	}
	public function set( $producto_data = array() ) {
		return $this->model->set($producto_data);
	}
	public function update( $producto_data = array() ) {
		return $this->model->update($producto_data);
	}
	public function get( $producto_id = '', $inicio = FALSE, $nReg = FALSE) {
		return $this->model->get($producto_id, $inicio, $nReg);
	}
	public function getByCategory( $categoria_id, $inicio=FALSE, $nReg=FALSE ) {
		return $this->model->getByCategory($categoria_id, $inicio, $nReg);
	}
	public function del( $producto = '' ) {
		return $this->model->del($producto);
	}
	public function __destruct() {
		unset($this->session);
	}
}