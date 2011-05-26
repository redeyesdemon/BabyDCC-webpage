<?php

class Jugador extends Model{

	function Jugador(){
		parent::Model();
	}

	function registerNewJugador($data, $i, $equipo){
		$sql = "INSERT INTO babydcc.jugador(RUT, matricula, email, telefono, apodo, departamento, nombre, apellido, equipo) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?)";
		$base = '';//($i==1?'cap':('j'.$i)); //''
		$result = $this->db->query($sql, array($data[$base.'_rut'], $data[$base.'_mat'],
						$data[$base.'_ema'],
						$data[$base.'_tel'], $data[$base.'_apo'], $data[$base.'_dep'],
						$data[$base.'_nam'], $data[$base.'_ape'], $equipo));
		if($result == FALSE)
			return FALSE;
		$sql = "SELECT * FROM babydcc.jugador WHERE RUT=? AND matricula=? AND email=?";
		$result = $this->db->query($sql, array($data[$base.'_rut'], $data[$base.'_mat'], $data[$base.'_ema']));
		if($result->num_rows() <=0)
			return false;
		$result = $result->row();
		return $result->idJugador;
	}

	function getJugadorById($id){
		$sql = "SELECT * FROM babydcc.jugador AS J WHERE J.idJugador = ?";
		$result = $this->db->query($sql, $id);
		if($result->num_rows() <=0)
			return false;
		return $result->row();
	}

	function getJugadorByRut($rut){
		$sql = "SELECT * FROM babydcc.jugador AS J WHERE J.RUT = ?";
		$result = $this->db->query($sql, $rut);
		if($result->num_rows() <= 0)
			return false;
		return $result->row();
	}

	function getJugadoresByIdEquipo($idEquipo){
		$sql = "SELECT * FROM babydcc.jugador AS J WHERE J.equipo = ?";
		$result = $this->db->query($sql, $idEquipo);
		if($result->num_rows() <=0)
			return false;
		return $result->result();
	}

	function updateJugador($rut, $email, $tel, $apo){
		$sql = "UPDATE babydcc.jugador SET email=?, telefono=?, apodo=? WHERE RUT = ?";
		return $this->db->query($sql, array($email, $tel, $apo, $rut));
	}

	function updateAvatar($rut, $data){
		$sql = "UPDATE babydcc.jugador SET avatar_name=?, avatar_width=?, avatar_height=? WHERE RUT = ?";
		return $this->db->query($sql, array($data['file_name'], $data['image_width'], $data['image_height'], $rut));
	}
}
?>
