<?php

class Producto{

	public function getCantidad(){
		require_once "conexion.php";
		$con = new Conexion();
		$sql = "SELECT nombre ,count(*) FROM producto GROUP BY nombre  ";
		$stm = $con->query($sql);
		$datos = array();
		$con->cerrarConexion();
		while (  $row = mysqli_fetch_array($stm) ){
			$r[] = $row;
		}	
		return $r;			
	}
}

?>