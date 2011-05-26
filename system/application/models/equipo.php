<?php

class Equipo extends Model{

	function Equipo(){
		parent::Model();
	}

	function getEquipoById($id){
		$sql = "SELECT * FROM babydcc.equipo WHERE idEquipo = ?";
		$result = $this->db->query($sql, $id);
		if($result->num_rows() <= 0)
			return false;
		$result = $result->row();
		return $result;
	}

	function regNewEquipo($nombre, $c1, $c2, $email, $log_data){
		$sql = "INSERT INTO babydcc.equipo(nombre, color_pri, color_sec, email, logo_name, logo_width, logo_height) VALUES(?, ?, ?, ?, ?, ?, ?)";
		if(!$this->db->query($sql, array($nombre, $c1, $c2, $email, $log_data['file_name'], $log_data['image_width'], $log_data['image_height'])))
			return FALSE;
		$sql = "SELECT * FROM babydcc.equipo WHERE nombre=? AND color_pri=? AND color_sec=? AND email=?";
		$result = $this->db->query($sql, array($nombre, $c1, $c2, $email));
		if($result->num_rows() <=0)
			return FALSE;
		$result = $result->row();
		return $result->idEquipo;
	}

	function assignCapitan($idEquipo, $idCapitan){
		$sql = "UPDATE babydcc.equipo SET capitan = ? WHERE idEquipo = ?";
		return $this->db->query($sql, array($idCapitan, $idEquipo));
	}
}
?>
