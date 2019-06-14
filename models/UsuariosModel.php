<?php 
class UsuariosModel extends Model {
	public function set( $usuario_data = array() ) {
		foreach ($usuario_data as $key => $value) {
			$$key = $value;
		}
		$this->query = "INSERT INTO usuario (usuario, nombre, apellidos, email, pass, fechnac, rol) VALUES ('$usuario', '$nombre', '$apellidos', '$email', MD5('$pass'), '$fechNac', '$rol')";
		$this->set_query();
	}

	public function update( $usuario_data = array() ) {
		foreach ($usuario_data as $key => $value) {
			$$key = $value;
		}
		$this->query = "UPDATE usuario SET nombre = '$nombre', apellidos = '$apellidos', email = '$email', fechnac = '$fechNac', rol = '$rol' WHERE usuario = '$usuario'";
		$this->set_query();
	}
	public function updatePwd( $usuario_data = array() ) {
		foreach ($usuario_data as $key => $value) {
			$$key = $value;
		}
		$this->query = "UPDATE usuario SET pass = MD5('$pass') WHERE usuario = '$usuario'";
		$this->set_query();
	}
	public function get( $usuario = '', $inicio=FALSE, $nReg=FALSE) {
		if ($inicio !== FALSE && $nReg !== FALSE){
			$this->query = "SELECT * FROM usuario order by apellidos limit $inicio, $nReg";
		} else {
			$this->query = ($usuario != '')
			?"SELECT * FROM usuario WHERE usuario = '$usuario'"
			:"SELECT * FROM usuario order by apellidos";
		}
		
		$this->get_query();
		$num_rows = count($this->rows);
		$data = array();
		foreach ($this->rows as $key => $value) {
			array_push($data, $value);
		}
		return $data;
	}
	public function del( $usuario = '' ) {
		$this->query = "DELETE FROM lista_deseos WHERE usuario = '$usuario'";
		$this->set_query();
		$this->query = "DELETE FROM usuario WHERE usuario = '$usuario';";
		$this->set_query();
	}
	public function validate_user($usuario, $pass) {
		$this->query = "SELECT * FROM usuario WHERE usuario = '$usuario' AND pass = MD5('$pass')";
		$this->get_query();
		$data = array();
		foreach ($this->rows as $key => $value) {
			array_push($data, $value);
		}
		return $data;
	}

	public function checkEmail( $email ) {
		$this->query = "SELECT * FROM usuario WHERE email = '$email'";
		$this->get_query();
		$num_rows = count($this->rows);
		
		if ($num_rows < 1){
			return true;
		} else {
			return false;
		}
	}

	public function checkUser( $usuario ) {
		$this->query = "SELECT * FROM usuario WHERE usuario = '$usuario'";
		$this->get_query();
		$num_rows = count($this->rows);
		
		if ($num_rows < 1){
			return true;
		} else {
			return false;
		}
	}

	public function checkPass( $usuario = '', $pass = '' ) {
		$this->query = "SELECT * FROM usuario WHERE usuario = '$usuario' AND pass = MD5('$pass')";
		$this->get_query();
		$num_rows = count($this->rows);
		
		if ($num_rows < 1){
			return false;
		} else {
			return true;
		}
	}

	public function __destruct() {
		unset($this->session);
	}
}