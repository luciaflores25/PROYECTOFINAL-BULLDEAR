<?php
class CategoriaModel extends Model {
	public function set( $categoria_data = array() ){
		foreach ($categoria_data as $item => $value) {
			// Variable de variable
			$$item = $value;
		}

		$this->query = "INSERT INTO categoria (categoria_id, categoria) VALUES ($categoria_id, '$categoria')";
		$this->set_query();
	}

	public function update( $categoria_data = array() ){
		foreach ($categoria_data as $item => $value) {
			// Variable de variable
			$$item = $value;
		}

		$this->query = "UPDATE categoria SET categoria = '$categoria' WHERE categoria_id = $categoria_id ;";
		$this->set_query();
	}

	public function get( $categoria_id = '' ) {
		$this->query = ($categoria_id != '')
			?"SELECT * FROM categoria WHERE categoria_id = $categoria_id"
			:"SELECT * FROM categoria order by categoria";

		$this->get_query();

		$num_rows = count($this->rows);
		//echo $num_rows;

		$data = array();

		foreach ($this->rows as $item => $value){
			$data[$item] = $value;
		}

		return $data;
	}

	public function del( $categoria_id = '' ){
		$this->query = "DELETE FROM categoria WHERE categoria_id = $categoria_id";
		$this->set_query();
	}

	public function __destruct() {
		unset($this->session);
	}

}