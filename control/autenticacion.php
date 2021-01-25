<?php

if ( !empty($_POST["usuario"]) && !empty($_POST["clave"])){
	require_once "../modelo/conexion.php";
	$con = new Conexion();
	$usuario = mysqli_real_escape_string($con->obtenerConexion(),$_POST["usuario"]);
	$clave = mysqli_real_escape_string($con->obtenerConexion(),$_POST["clave"]);
	$sql = "SELECT * FROM usuario WHERE usuario = '$usuario' AND clave = '$clave' AND estado = 1 ";
	$stm = $con->query($sql);
	if ( $row = mysqli_fetch_array($stm) ){
		session_start();
		$_SESSION["usuario"] = $row[1];
		$_SESSION["nombre"] = $row[3]." ".$row[4];
		$_SESSION["cargo"] = $row[5];
		echo 4;
	}else{
		echo 3;
		}
}else{
	echo 2;
	}



/*
CODIGO DE ERRORES

COD 2 : Datos vacios
COD 3 : Usuario no encontrado/inactivo
COD 4 : Correcto 


*/

?>