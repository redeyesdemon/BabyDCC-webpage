<?php

class User extends Model{

	function User(){
		parent::Model();
	}

	function getUserByUsername($user){
		$sql = "SELECT * FROM usuarios AS U WHERE U.usuario = ?";
		$query = $this->db->query($sql, array($user));
		if($query->num_rows() <= 0)
			return false;
		return $query->row();
	}

	function registerNewUser($username, $passwd, $permisos, $idJugador){
		// Primero, chequear que el usuario no exista
		$sql = "SELECT * FROM babydcc.usuarios WHERE usuario = ?";
		$result = $this->db->query($sql, $username);
		if($result->num_rows > 0){
			// Ya existe, quedarse con el que tenga mejores privilegios
			$result = $result->row();
			if($result->permisos >= $permisos){
				//Alterar solamente el idJugador
				$sql = "UPDATE babydcc.usuarios SET idJugador = ? WHERE usuario = ?";
				return $this->db->query($sql, array($idJugador, $username));
			}
			//Alterar los permisos del usuario y el idJugador
			$sql = "UPDATE babydcc.usuarios SET idJugador = ?, permisos = ? WHERE usuario = ?";
			return $this->db->query($sql, array($idJugador, $permisos, $username));
		}
		// Insertar al nuevo usuario
		$sql = "INSERT INTO babydcc.usuarios (usuario, contrasena, permisos, idJugador) VALUES (?, ?, ?, ?)";
		$result = $this->db->query($sql, array($username, $passwd, $permisos, $idJugador));
		return $result;
	}

	function updatePassword($rut, $pass){
		$sql = "UPDATE babydcc.usuarios SET contrasena = ? WHERE usuario = ?";
		return $this->db->query($sql, array($pass, $rut));
	}

	function addNewAdmin($username, $passwd, $permisos){
		$sql = "INSERT INTO babydcc.usuarios (usuario, contrasena, permisos, idJugador) VALUES (?, ?, ?, ?)";
		$result = $this->db->query($sql, array($username, $passwd, $permisos, 0));
		return $result;
	}
}
?>
