<?php

class Medida{

	public function getCantidad(){
		require_once "conexion.php";
		$con = new Conexion();
		$sql = "SELECT nombre , (fecha) as Fecha, count(*) FROM pedido GROUP BY nombre ORDER BY Fecha desc LIMIT 7";
		$stm = $con->query($sql);
		$datos = array();
		$con->cerrarConexion();
		while (  $row = mysqli_fetch_array($stm) ){
			$r[] = $row;
		}
		return $r;					
	}

	public function list($id){
		require_once "conexion.php";
		$con = new Conexion();
		$sql = "SELECT * FROM pedido where idcliente = $id ";
		$stm = $con->query($sql);
		$con->cerrarConexion();
		while ( $row = mysqli_fetch_array($stm)){
			$r[] = $row; 
		}
		return $r;
	}

	public function add($n,$m,$d,$id,$f){
		require_once "conexion.php";
		$con = new Conexion();
		$n = mysqli_escape_string($con->obtenerConexion(),$n);
		$m = mysqli_escape_string($con->obtenerConexion(),$m);
		$d = mysqli_escape_string($con->obtenerConexion(),$d);
		$id = mysqli_escape_string($con->obtenerConexion(),$id);
		$sql = "INSERT INTO pedido VALUES ( '', '$n' , '$m' , '$d' , $id , 1 , '$f' )";
		$stm = $con->query($sql);
		$con->cerrarConexion();
		if( $stm ){
			return 1;
		}else{
			return 3;
		}
	}

	public function edit($n,$m,$d,$id){
		require_once "conexion.php";
		$con = new Conexion();
		$n = mysqli_escape_string($con->obtenerConexion(),$n);
		$m = mysqli_escape_string($con->obtenerConexion(),$m);
		$d = mysqli_escape_string($con->obtenerConexion(),$d);
		$id = mysqli_escape_string($con->obtenerConexion(),$id);
		$sql = "UPDATE pedido SET nombre = '$n' , medidas = '$m' , detalles='$d' WHERE idpedido = $id ";
		$stm = $con->query($sql);
		$con->cerrarConexion();
		if( $stm ){
			return 1;
		}else{
			return 3;
		}
	}
}

?>