<?php

class Cliente{

	public function list(){
		require_once "conexion.php";
		$con = new Conexion();
		$sql = "SELECT * FROM cliente";
		$stm = $con->query($sql);
		$con->cerrarConexion();
		while ( $row = mysqli_fetch_array($stm)){
			$r[] = $row;
		}
		return $r;
	}
}

?>