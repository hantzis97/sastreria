<?php

class Producto{

	public function getCantidad(){
		require_once "conexion.php";
		$con = new Conexion();
		$sql = "SELECT nombre,sum(stock) FROM producto group by nombre  ";
		$stm = $con->query($sql);
		$datos = array();
		$con->cerrarConexion();
		while (  $row = mysqli_fetch_array($stm) ){
			$r[] = $row;
		}	
		return $r;			
	}

	public function getDato($id){
		require_once "conexion.php";
		$con = new Conexion();
		$id = mysqli_escape_string($con->obtenerConexion(),$id);
		$sql = "SELECT * FROM producto WHERE idproducto = $id ";
		$stm = $con->query($sql);
		$con->cerrarConexion();
		if ( $row = mysqli_fetch_array($stm) ){
			$producto = array('id' => $row[0],'nombre' => $row[1],'talla' => $row[2],'tipo' => $row[3],'marca' => $row[4],'color' => $row[5],'detalle' => $row[6],'stock' => $row[7]);
		}
		return $producto;
	}

	public function val($c,$id){
		require_once "conexion.php";
		$con = new Conexion();
		$c = mysqli_escape_string($con->obtenerConexion(),$c);
		$id = mysqli_escape_string($con->obtenerConexion(),$id);
		$sql = "SELECT stock FROM producto WHERE idproducto = $id ";
		$stm = $con->query($sql);
		$con->cerrarConexion();
		if( $row = mysqli_fetch_array($stm) ){
			if ( $row[0] >= $c ){
				return 1;
			}else{
				return 4;
			}
		}else{
			return 3;
		}
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
		require_once "conexion.php";
		$con = new Conexion();
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
		$ti = mysqli_escape_string($con->obtenerConexion(),$ti);
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

	public function desct($c,$id){
		require_once "conexion.php";
		$con = new Conexion();
		date_default_timezone_set('America/Lima');
		$c = mysqli_escape_string($con->obtenerConexion(),$c);
		$id = mysqli_escape_string($con->obtenerConexion(),$id);
		$sql = "UPDATE producto SET stock = stock - $c WHERE idproducto = $id ";
		$stm = $con->query($sql);
		if( $stm ){
			$f = date('Y-m-d');
			$sql2 = "INSERT INTO registro_descuento VALUES( '' , $id , $c , '$f' )";
			$stm2 = $con->query($sql2);
			$con->cerrarConexion();
			if ( $stm2){
				return 1;
			}
		}else{
			return 3;
		}
	}
}

?>