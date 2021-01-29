<?php

class Pedido{

	public function getDato($id){
		require_once "conexion.php";
		$con = new Conexion();
		$id = mysqli_escape_string($con->obtenerConexion(),$id);
		$sql = "SELECT * FROM pedido WHERE idpedido = $id ";
		$stm = $con->query($sql);
		$con->cerrarConexion();
		if ( $row = mysqli_fetch_array($stm) ){
			$r = array('id' => $row[0],'nombre' => $row[1],'medida' => $row[2],'detalle' => $row[3],'cliente' => $row[4],'estado' => $row[5],'fecha' => $row[6]);
		}
		return $r;
	}
	public function delete($id){
		require_once "conexion.php";
		$con = new Conexion();
		$id = mysqli_escape_string($con->obtenerConexion(),$id);
		$sql = "DELETE from pedido WHERE idpedido = $id ";
		$stm = $con->query($sql);
		$con->cerrarConexion();
		if ( $stm ){
			return 1;
		}else{
			return 0;
		}
	}
}

?>