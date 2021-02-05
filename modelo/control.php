<?php


class Control{

	public function list(){
		require_once "conexion.php";
		$con = new Conexion();
		$sql = "SELECT * FROM usuario where idcargo = 3  ";
		$stm = $con->query($sql);
		$con->cerrarConexion();
		while ( $row = mysqli_fetch_array($stm) ){
			$r[] = $row;
		}
		return $r;
	}

	public function getData($op){
		require_once "conexion.php";
		$con = new Conexion();
		include_once "../control/method.php";
		$operario = obtenerNombreOperaro($op);
		$sql = "SELECT idcontrol as id , prenda as title , inicio as start, fin as end , prenda as prenda ,color as textColor , fondo as backgroundColor , cantidad as estado FROM control WHERE idusuario = '$operario' ";
		$stm = $con->query($sql);
		$con->cerrarConexion();
		$datos=array();
		while($row = mysqli_fetch_array($stm)){
		   array_push($datos,$row);
		}
		return $datos; 
	}

	public function add($op,$i,$f,$p,$c){
		include_once "../control/method.php";
		require_once "conexion.php";
		$con = new Conexion();
		$operario = mysqli_escape_string($con->obtenerConexion(),obtenerNombreOperaro($op));
		$inicio = mysqli_escape_string($con->obtenerConexion(),$i);
		$fin = mysqli_escape_string($con->obtenerConexion(),$f);
		$prenda = mysqli_escape_string($con->obtenerConexion(),$p);
		$c = mysqli_escape_string($con->obtenerConexion(),$c);
		$sql = "INSERT INTO control VALUES( '', '$operario' , '$inicio','$fin','$prenda','#ffffff', '#3788d8', $c)";
		$stm = $con->query($sql);
		$con->cerrarConexion();
		echo json_encode($stm);
	}

	public function edit($i,$f,$id,$e){
		require_once "conexion.php";
		$con = new Conexion();
		$inicio = mysqli_escape_string($con->obtenerConexion(),$i);
		$fin = mysqli_escape_string($con->obtenerConexion(),$f);
		$id = mysqli_escape_string($con->obtenerConexion(),$id);
		$e = mysqli_escape_string($con->obtenerConexion(),$e);
		$sql = "UPDATE control SET inicio='$inicio' , fin='$fin' , cantidad=$e  WHERE  idcontrol = $id  ";
		$stm = $con->query($sql);
		$con->cerrarConexion();
		echo json_encode($stm);
	}
	public function delete($id){
		require_once "conexion.php";
		$con = new Conexion();
		$id = mysqli_escape_string($con->obtenerConexion(),$id);
		$sql = "DELETE FROM control WHERE idcontrol = $id";
		$stm = $con->query($sql);
		$con->cerrarConexion();
		echo json_encode($stm);
	}
}

?>