<?php

class Usuario{
	public function validar($u,$p){
		require_once "conexion.php";
		$con = new Conexion();
		$usuario = mysqli_real_escape_string($con->obtenerConexion(),$u);
		$clave = mysqli_real_escape_string($con->obtenerConexion(),$p);
		$sql = "SELECT * FROM usuario WHERE usuario = '$usuario' AND clave = '$clave' AND estado = 1 ";
		$stm = $con->query($sql);
		$con->cerrarConexion();
		if ( $row = mysqli_fetch_array($stm) ){
			return $row;
		}else{
			return 0;
		}
	}
}

?>