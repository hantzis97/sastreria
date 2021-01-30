<?php

class Resumen{

	public function list($op,$m,$a){
		require_once "conexion.php";
		require_once "../control/method.php";
		$con = new Conexion();
		$mes = mysqli_escape_string($con->obtenerConexion(),$m);
		$anio = mysqli_escape_string($con->obtenerConexion(),$a);
		$op = mysqli_escape_string($con->obtenerConexion(),obtenerNombreOperaro($op));
		switch ($mes){
		case "Enero":
			$fechai = $anio."-01-01";
			$fechaf = $anio."-01-31";
		break;
		case "Febrero":
			$fechai = $anio."-o2-01";
			$fechaf = $anio."-o2-28";
		break;
		case "Marzo":
			$fechai = $anio."-o3-01";
			$fechaf = $anio."-03-31";
		break;
		case "Abril":
			$fechai = $anio."-04-01";
			$fechaf = $anio."-04-30";
		break;
		case "Mayo":
			$fechai = $anio."-05-01";
			$fechaf = $anio."-05-31";
		break;
		case "Junio":
			$fechai = $anio."-06-01";
			$fechaf = $anio."-06-30";
		break;
		case "Julio":
			$fechai = $anio."-07-01";
			$fechaf = $anio."-07-31";
		break;
		case "Agosto":
			$fechai = $anio."-08-01";
			$fechaf = $anio."-08-31";
		break;
		case "Septiembre":
			$fechai = $anio."-09-01";
			$fechaf = $anio."-09-30";
		break;
		case "Octubre":
			$fechai = $anio."-10-01";
			$fechaf = $anio."-10-31";
		break;
		case "Noviembre":
			$fechai = $anio."-11-01";
			$fechaf = $anio."-11-30";
		break;
		case "Diciembre":
			$fechai = $anio."-12-01";
			$fechaf = $anio."-12-31";
		break;
		}
		$sql = "SELECT * FROM control WHERE idusuario = '$op' AND inicio >= '$fechai' AND fin <= '$fechaf'  ";
		$stm = $con->query($sql);
		$con->cerrarConexion();
		while ( $row = mysqli_fetch_array($stm) ){
			$r[] = $row;
		}
		return $r;
	}
}

?>