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

	public function list(){
		require_once "conexion.php";
		$con = new Conexion();
		$sql = "SELECT * FROM producto";
		$stm = $con->query($sql);
		$con->cerrarConexion();
		while($row = mysqli_fetch_array($stm) ){
			$r[] = $row;
		}
		return $r;
	}

	public function add($n,$ta,$ti,$ma,$co,$de,$st){
		$n = mysqli_escape_string($con->obtenerConexion(),$n);
		$ta = mysqli_escape_string($con->obtenerConexion(),$ta);
		$ti = mysqli_escape_string($con->obtenerConexion(),$ti);
		$ma = mysqli_escape_string($con->obtenerConexion(),$ma);
		$co = mysqli_escape_string($con->obtenerConexion(),$co);
		$de = mysqli_escape_string($con->obtenerConexion(),$de);
		$st = mysqli_escape_string($con->obtenerConexion(),$st);
		$sql = "INSERT INTO producto VALUES ( '', '$n' , '$ta' , '$ti' , '$ma' , '$co' , '$de' , $st )";
		$stm = $con->query($sql);
		$con->cerrarConexion();
		if( $stm ){
			return 1;
		}else{
			return 3;
		}
	}

	public function edit($n,$ta,$ti,$ma,$co,$de,$st,$id){
		require_once "conexion.php";
		$con = new Conexion();
		$n = mysqli_escape_string($con->obtenerConexion(),$n);
		$ta = mysqli_escape_string($con->obtenerConexion(),$ta);
		$ti = mysqli_escape_string($con->obtenerConexion(),$$ti);
		$ma = mysqli_escape_string($con->obtenerConexion(),$ma);
		$co = mysqli_escape_string($con->obtenerConexion(),$co);
		$de = mysqli_escape_string($con->obtenerConexion(),$de);
		$st = mysqli_escape_string($con->obtenerConexion(),$st);
		$id = mysqli_escape_string($con->obtenerConexion(),$id);
		$sql = "UPDATE producto SET nombre = '$n',talla='$ta',tipo='$ti',marca='$ma',color='$co',detalle='$de',stock=$st WHERE idproducto = $id ";
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