<?php
class ListaDeseosModel extends Model {
	public function set( $lista_data = array() ) {
		foreach ($lista_data as $item => $value) {
			// Variable de variable
			$$item = $value;
		}

		$this->query = "INSERT INTO lista_deseos (producto_id, usuario) VALUES ($producto_id, '$usuario');";
		$this->set_query();
	}

	public function get( $usuario = '') {
		$this->query = "SELECT l.usuario, l.producto_id, p.imagen, p.nombre, c.categoria, p.precio 
							FROM lista_deseos AS l 
								INNER JOIN producto AS p ON l.producto_id = p.producto_id
						    	INNER JOIN categoria AS c ON p.categoria_id = c.categoria_id
						WHERE l.usuario = '$usuario'";
		
		$this->get_query();
		$num_rows = count($this->rows);
		$data = array();
		foreach ($this->rows as $key => $value) {
			array_push($data, $value);
		}
		return $data;
	}

	public function del( $usuario = '', $producto_id = '' ) {
		$this->query = "DELETE FROM lista_deseos WHERE usuario = '$usuario' AND producto_id = '$producto_id'";
		$this->set_query();
	}

	public function changeColor( $usuario, $producto_id ) {
		$this->query = "SELECT * FROM lista_deseos WHERE usuario = '$usuario' AND producto_id = '$producto_id'";
		$this->get_query();
		$num_rows = count($this->rows);
		
		if ($num_rows < 1){
			return true;
		} else {
			return false;
		}
	}

	public function __destruct() {
		unset($this->session);
	}

}