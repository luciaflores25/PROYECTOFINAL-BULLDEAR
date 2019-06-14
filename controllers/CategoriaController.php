<?php
class CategoriaController {
	private $model;

	public function __construct() {
		$this->model = new CategoriaModel();
	}
	public function set( $categoria_data = array() ) {
		return $this->model->set($categoria_data);
	}
	public function update( $categoria_data = array() ) {
		return $this->model->update($categoria_data);
	}
	public function get( $categoria_id = '' ) {
		return $this->model->get($categoria_id);
	}
	public function del( $categoria_id = '' ) {
		return $this->model->del($categoria_id);
	}
	public function __destruct() {
		unset($this->session);
	}
}