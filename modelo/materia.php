<?php

class Materia{

	public function list(){
		require_once "conexion.php";
		$con = new Conexion();
		$sql = "SELECT * FROM materia_prima";
		$stm = $con->query($sql);
		$con->cerrarConexion();
		while ( $row = mysqli_fetch_array($stm) ){
			$r[] = $row;
		}
		return $r;
	}

	public function get($id){
		require_once "conexion.php";
		$con = new Conexion();
		$id = mysqli_escape_string($con->obtenerConexion(),$id);
		$sql = "SELECT * FROM materia_prima WHERE idmateria = $id ";
		$stm = $con->query($sql);
		$con->cerrarConexion();
		if ( $row = mysqli_fetch_array($stm) ){
			$material = array('id' => $row[0],'nombre' => $row[1],'marca' => $row[2],'color' => $row[3],'tipo' => $row[4],'diseno' => $row[5],'tamano' => $row[6] );
		}
		return $material;
	}

	public function add($n,$ma,$co,$ti,$di,$ta){
		require_once "conexion.php";
		$con = new Conexion();
		$n = mysqli_escape_string($con->obtenerConexion(),$n);
		$ma = mysqli_escape_string($con->obtenerConexion(),$ma);
		$co = mysqli_escape_string($con->obtenerConexion(),$co);
		$ti = mysqli_escape_string($con->obtenerConexion(),$ti);
		$di = mysqli_escape_string($con->obtenerConexion(),$di);
		$ta = mysqli_escape_string($con->obtenerConexion(),$ta);
		$sql = "INSERT INTO materia_prima VALUES ( '', '$n' , '$ma' , '$co' , '$ti' , '$di' , '$ta' )";
		$stm = $con->query($sql);
		$con->cerrarConexion();
		if( $stm ){
			return 1;
		}else{
			return 3;
		}
	}

	public function edit($n,$ma,$co,$ti,$di,$ta,$id){
		require_once "conexion.php";
		$con = new Conexion();
		$n = mysqli_escape_string($con->obtenerConexion(),$n);
		$ma = mysqli_escape_string($con->obtenerConexion(),$ma);
		$co = mysqli_escape_string($con->obtenerConexion(),$co);
		$ti = mysqli_escape_string($con->obtenerConexion(),$ti);
		$di = mysqli_escape_string($con->obtenerConexion(),$di);
		$ta = mysqli_escape_string($con->obtenerConexion(),$ta);
		$id = mysqli_escape_string($con->obtenerConexion(),$id);
		$sql = "UPDATE materia_prima SET nombre='$n',marca='$ma',color='$co',tipo='$ti',diseño='$di',tamaño='$ta' WHERE idmateria = $id ";
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