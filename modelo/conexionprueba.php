<?php

class Conexion{

	private $conexion;

	function __construct(){
		#probando 123
		$this->conexion = mysqli_connect("localhost","user","password","bd2");
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