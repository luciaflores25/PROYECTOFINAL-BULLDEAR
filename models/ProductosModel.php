<?php 
class ProductosModel extends Model {
	public function set( $producto_data = array() ) {
		foreach ($producto_data as $key => $value) {
			$$key = $value;
		}

		$this->query = "INSERT INTO producto (producto_id, categoria_id, nombre, descripcion, precio, imagen, enlace_compra, idApi) VALUES (NULL, '$categoria_id', '$nombre', '$descripcion', '$precio', '$imagen', '$enlace_compra', '$idApi')";
		$this->set_query();
	}

	public function update( $producto_data = array() ){
		foreach ($producto_data as $item => $value) {
			// Variable de variable
			$$item = $value;
		}

		$this->query = "UPDATE producto SET categoria_id = '$categoria_id', nombre = '$nombre', descripcion = '$descripcion', precio = '$precio', imagen = '$imagen', enlace_compra = '$enlace_compra' WHERE producto_id = $producto_id ;";
		$this->set_query();
	}

	public function get( $producto_id = '', $inicio=FALSE, $nReg=FALSE) {

		if ($inicio !== FALSE && $nReg !== FALSE){
			$this->query = "SELECT p.producto_id, p.nombre, c.categoria, p.precio, p.imagen, p.enlace_compra FROM producto AS p INNER JOIN categoria AS c ON p.categoria_id = c.categoria_id limit $inicio, $nReg";
		} else {
			$this->query = ($producto_id != '')
			?"SELECT p.producto_id, p.nombre, p.descripcion, c.categoria, p.precio, p.imagen, p.enlace_compra FROM producto AS p INNER JOIN categoria AS c ON p.categoria_id = c.categoria_id WHERE p.producto_id = $producto_id"
			:"SELECT p.producto_id, p.nombre, c.categoria, p.precio, p.imagen, p.enlace_compra FROM producto AS p INNER JOIN categoria AS c ON p.categoria_id = c.categoria_id";
		}

		$this->get_query();
		$num_rows = count($this->rows);
		$data = array();
		foreach ($this->rows as $key => $value) {
			array_push($data, $value);
		}
		return $data;
	}

	public function getByCategory( $categoria_id, $inicio=FALSE, $nReg=FALSE ) {
		if ($inicio !== FALSE && $nReg !== FALSE){
			$this->query = "SELECT p.producto_id, p.nombre, p.descripcion, c.categoria, p.precio, p.imagen, p.enlace_compra FROM producto AS p INNER JOIN categoria AS c ON p.categoria_id = c.categoria_id WHERE c.categoria_id = $categoria_id limit $inicio, $nReg";
		} else {
			$this->query = "SELECT p.producto_id, p.nombre, p.descripcion, c.categoria, p.precio, p.imagen, p.enlace_compra FROM producto AS p INNER JOIN categoria AS c ON p.categoria_id = c.categoria_id WHERE c.categoria_id = $categoria_id";
		}
		
		$this->get_query();
		$num_rows = count($this->rows);
		$data = array();
		foreach ($this->rows as $key => $value) {
			array_push($data, $value);
		}
		return $data;
	}
	public function del( $producto_id = '' ) {
		$this->query = "DELETE FROM lista_deseos WHERE producto_id = '$producto_id'";
		$this->set_query();
		$this->query = "DELETE FROM cesta WHERE producto_id = '$producto_id'";
		$this->set_query();
		$this->query = "DELETE FROM producto WHERE producto_id = $producto_id";
		$this->set_query();
	}
	public function __destruct() {
		unset($this->session);
	}
}