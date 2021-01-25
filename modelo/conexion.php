<?php

class Conexion{

	private $conexion;

	function __construct(){
		$this->conexion = mysqli_connect("localhost","root","12345678","sastreria");
		$this->conexion->set_charset("utf8");
	}

	public function obtenerConexion(){
		return $this->conexion;
	}	

	public function query($sql){
		return mysqli_query($this->conexion,$sql);
	}

	public function cerrarConexion(){
		mysqli_close($this->conexion);
	}
}

?>