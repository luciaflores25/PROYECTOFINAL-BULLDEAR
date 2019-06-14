<?php
class CestaModel extends Model {
	public function set( $cesta_data = array() ) {
		foreach ($cesta_data as $item => $value) {
			// Variable de variable
			$$item = $value;
		}

		$this->query = "INSERT INTO cesta (producto_id, usuario) VALUES ($producto_id, '$usuario');";
		$this->set_query();
	}

	public function get( $usuario = '') {
		$this->query = "SELECT distinct ce.usuario, ce.producto_id, p.imagen, p.nombre, c.categoria, p.precio 
							FROM cesta AS ce
								INNER JOIN producto AS p ON ce.producto_id = p.producto_id
						    	INNER JOIN categoria AS c ON p.categoria_id = c.categoria_id
						WHERE ce.usuario = '$usuario'";
		
		$this->get_query();
		$num_rows = count($this->rows);
		$data = array();
		foreach ($this->rows as $key => $value) {
			array_push($data, $value);
		}
		return $data;
	}
	public function getCantidad( $usuario, $producto_id) {
		$this->query = "SELECT * FROM cesta WHERE usuario = '$usuario' AND producto_id = '$producto_id'";
		$this->get_query();
		$num_rows = count($this->rows);
		return $num_rows;
	}

	public function getCantidadEnCesta( $usuario ) {
		$this->query = "SELECT * FROM cesta WHERE usuario = '$usuario'";
		$this->get_query();
		$num_rows = count($this->rows);
		return $num_rows;
	}

	public function del( $usuario = '', $producto_id = '' ) {
		$this->query = "DELETE FROM cesta WHERE usuario = '$usuario' AND producto_id = '$producto_id'";
		$this->set_query();
	}

	public function __destruct() {
		unset($this->session);
	}

}