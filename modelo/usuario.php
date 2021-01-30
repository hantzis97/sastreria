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

	public function editEst($id){
		require_once "conexion.php";
		$con = new Conexion();
		$id = mysqli_escape_string($con->obtenerConexion(),$id);
		$sql = "SELECT estado FROM usuario WHERE idusuario = $id ";
		$stm = $con->query($sql);
		if ( $row = mysqli_fetch_array($stm) ){
			if ( $row[0] == 1){
				$sql2 = "UPDATE usuario SET estado = 0 WHERE idusuario = $id ";
				$stm2 = $con->query($sql2);
				return 1;
			}else{
				$sql2 = "UPDATE usuario SET estado = 1 WHERE idusuario = $id ";
				$stm2 = $con->query($sql2);
				return 1;
			}
		}else{
			return 2;
		}
	}

	public function getData($id){
		require_once "conexion.php";
		$con = new Conexion();
		$id = mysqli_escape_string($con->obtenerConexion(),$id);
		$sql = "SELECT * FROM usuario WHERE idusuario = $id ";
		$stm = $con->query($sql);
		$con->cerrarConexion();
		if ( $row = mysqli_fetch_array($stm) ){
			$material = array('id' => $row[0],'usuario' => $row[1],'clave' => $row[2],'nombre' => $row[3],'apellido' => $row[4],'cargo' => $row[5],'telefono' => $row[6],'direccion' => $row[7],'estado' => $row[8] );
		}
		return $material;
	}

	public function list(){
		require_once "conexion.php";
		$con = new Conexion();
		$sql = "SELECT * FROM usuario";
		$stm = $con->query($sql);
		$con->cerrarConexion();
		while ( $row = mysqli_fetch_array($stm) ){
			$r[] = $row;
		}
		return $r;
	}

	public function val($u){
		require_once "conexion.php";
		$con = new Conexion();
		$u = mysqli_escape_string($con->obtenerConexion(),$u);
		$sql = "SELECT usuario FROM usuario WHERE usuario = '$u' ";
		$stm = $con->query($sql);
		$con->cerrarConexion();
		if ( $row = mysqli_fetch_array($stm) ){
			return 3;
		}else{
			return 1;
		}
	}

	public function add($u,$ca,$no,$ap,$cr,$te,$di){
		require_once "conexion.php";
		$con = new Conexion();
		$u = mysqli_escape_string($con->obtenerConexion(),$u);
		$ca = mysqli_escape_string($con->obtenerConexion(),$ca);
		$no = mysqli_escape_string($con->obtenerConexion(),$no);
		$ap = mysqli_escape_string($con->obtenerConexion(),$ap);
		$cr = mysqli_escape_string($con->obtenerConexion(),$cr);
		$te = mysqli_escape_string($con->obtenerConexion(),$te);
		$di = mysqli_escape_string($con->obtenerConexion(),$di);
		$sql = "INSERT INTO usuario VALUES ( '', '$u' ,'$ca' , '$no' , '$ap' , $cr , '$te' , '$di' , 1 )";
		$stm = $con->query($sql);
		$con->cerrarConexion();
		if( $stm ){
			return 1;
		}else{
			return 3;
		}
	}

	public function edit($u,$ca,$no,$ap,$te,$di,$id){
		require_once "conexion.php";
		$con = new Conexion();
		$u = mysqli_escape_string($con->obtenerConexion(),$_POST["edusuario"]);
		$ca = mysqli_escape_string($con->obtenerConexion(),$_POST["edclave"]);
		$no = mysqli_escape_string($con->obtenerConexion(),$_POST["ednombre"]);
		$ap = mysqli_escape_string($con->obtenerConexion(),$_POST["edapellido"]);
		$te = mysqli_escape_string($con->obtenerConexion(),$_POST["edtelefono"]);
		$di = mysqli_escape_string($con->obtenerConexion(),$_POST["eddireccion"]);
		$id = mysqli_escape_string($con->obtenerConexion(),$_POST["id"]);
		$sql = "UPDATE usuario SET usuario= '$u',clave='$ca',nombre='$no',apellido='$ap',telefono='$te',direccion='$di' WHERE idusuario = $id ";
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