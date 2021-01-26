<?php
require_once "../modelo/conexion.php";
include_once "method.php";
$con = new Conexion();
$a = $_GET["action"];

switch($a){

	case 1:
		if ( !empty($_POST["nombre"]) && !empty($_POST["apellido"] ) ){
			$n = mysqli_escape_string($con->obtenerConexion(),$_POST["nombre"]);
			$ap = mysqli_escape_string($con->obtenerConexion(),$_POST["apellido"]);
			$sql = "INSERT INTO cliente VALUES ( '', '$n' , '$ap' )";
			$stm = $con->query($sql);
			$con->cerrarConexion();
			if( $stm ){
				echo 1;
			}else{
				echo 3;
			}
		}else{
			echo 2;
		}
		
		break;
	case 2:
		date_default_timezone_set('America/Lima');
		if ( !empty($_POST["nombrep"]) && !empty($_POST["medida"] ) && !empty($_POST["detalle"] ) ){
			$n = mysqli_escape_string($con->obtenerConexion(),$_POST["nombrep"]);
			$m = mysqli_escape_string($con->obtenerConexion(),$_POST["medida"]);
			$d = mysqli_escape_string($con->obtenerConexion(),$_POST["detalle"]);
			$id = mysqli_escape_string($con->obtenerConexion(),$_POST["id"]);
			$f = date('Y-m-d');
			$sql = "INSERT INTO pedido VALUES ( '', '$n' , '$m' , '$d' , $id , 1 , '$f' )";
			$stm = $con->query($sql);
			$con->cerrarConexion();
			if( $stm ){
				echo 1;
			}else{
				echo 3;
			}
		}else{
			echo 2;
		}
		break;
	case 3:
		$id = mysqli_escape_string($con->obtenerConexion(),$_POST["idcliente"]);
		$sql = "SELECT * FROM pedido WHERE idpedido = $id ";
		$stm = $con->query($sql);
		$con->cerrarConexion();
		if ( $row = mysqli_fetch_array($stm) ){
			$cliente = array('id' => $row[0],'nombre' => $row[1],'medida' => $row[2],'detalle' => $row[3],'cliente' => $row[4],'estado' => $row[5],'fecha' => $row[6]);
			echo json_encode($cliente);
		}
		break;
	case 4:
		if ( !empty($_POST["ednombre"]) && !empty($_POST["edmedida"] ) && !empty($_POST["eddetalle"] ) ){
			$n = mysqli_escape_string($con->obtenerConexion(),$_POST["ednombre"]);
			$m = mysqli_escape_string($con->obtenerConexion(),$_POST["edmedida"]);
			$d = mysqli_escape_string($con->obtenerConexion(),$_POST["eddetalle"]);
			$id = mysqli_escape_string($con->obtenerConexion(),$_POST["edid"]);
			$sql = "UPDATE pedido SET nombre = '$n' , medidas = '$m' , detalles='$d' WHERE idpedido = $id ";
			$stm = $con->query($sql);
			$con->cerrarConexion();
			if( $stm ){
				echo 1;
			}else{
				echo 3;
			}
		}else{
			echo 2;
		}
		break;
	case 5:
		if ( !empty($_POST["nombrep"]) && !empty($_POST["talla"] ) && !empty($_POST["tipo"]) && !empty($_POST["marca"]) && !empty($_POST["color"]) && !empty($_POST["detalle"]) && !empty($_POST["stock"]) ){
			$n = mysqli_escape_string($con->obtenerConexion(),$_POST["nombrep"]);
			$ta = mysqli_escape_string($con->obtenerConexion(),$_POST["talla"]);
			$ti = mysqli_escape_string($con->obtenerConexion(),$_POST["tipo"]);
			$ma = mysqli_escape_string($con->obtenerConexion(),$_POST["marca"]);
			$co = mysqli_escape_string($con->obtenerConexion(),$_POST["color"]);
			$de = mysqli_escape_string($con->obtenerConexion(),$_POST["detalle"]);
			$st = mysqli_escape_string($con->obtenerConexion(),$_POST["stock"]);
			$sql = "INSERT INTO producto VALUES ( '', '$n' , '$ta' , '$ti' , '$ma' , '$co' , '$de' , $st )";
			$stm = $con->query($sql);
			$con->cerrarConexion();
			if( $stm ){
				echo 1;
			}else{
				echo 3;
			}
		}else{
			echo 2;
		}
		break;	
	case 6:
		if ( !empty($_POST["ednombrep"]) && !empty($_POST["edtalla"] ) && !empty($_POST["edtipo"]) && !empty($_POST["edmarca"]) && !empty($_POST["edcolor"]) && !empty($_POST["eddetalle"]) && !empty($_POST["edstock"]) ){
			$n = mysqli_escape_string($con->obtenerConexion(),$_POST["ednombrep"]);
			$ta = mysqli_escape_string($con->obtenerConexion(),$_POST["edtalla"]);
			$ti = mysqli_escape_string($con->obtenerConexion(),$_POST["edtipo"]);
			$ma = mysqli_escape_string($con->obtenerConexion(),$_POST["edmarca"]);
			$co = mysqli_escape_string($con->obtenerConexion(),$_POST["edcolor"]);
			$de = mysqli_escape_string($con->obtenerConexion(),$_POST["eddetalle"]);
			$st = mysqli_escape_string($con->obtenerConexion(),$_POST["edstock"]);
			$id = mysqli_escape_string($con->obtenerConexion(),$_POST["edid"]);
			$sql = "UPDATE producto SET nombre = '$n',talla='$ta',tipo='$ti',marca='$ma',color='$co',detalle='$de',stock=$st WHERE idproducto = $id ";
			$stm = $con->query($sql);
			$con->cerrarConexion();
			if( $stm ){
				echo 1;
			}else{
				echo 3;
			}
		}else{
			echo 2;
		}
		break;
	case 7:
		$id = mysqli_escape_string($con->obtenerConexion(),$_POST["idproducto"]);
		$sql = "SELECT * FROM producto WHERE idproducto = $id ";
		$stm = $con->query($sql);
		$con->cerrarConexion();
		if ( $row = mysqli_fetch_array($stm) ){
			$producto = array('id' => $row[0],'nombre' => $row[1],'talla' => $row[2],'tipo' => $row[3],'marca' => $row[4],'color' => $row[5],'detalle' => $row[6],'stock' => $row[7]);
			echo json_encode($producto);
		}
		break;	
	case 8:
		date_default_timezone_set('America/Lima');
		if ( !empty($_POST["cantidad"]) && is_numeric($_POST["cantidad"]) && $_POST["cantidad"] > 0){
			$c = mysqli_escape_string($con->obtenerConexion(),$_POST["cantidad"]);
			$id = mysqli_escape_string($con->obtenerConexion(),$_POST["deid"]);
			$sql = "UPDATE producto SET stock = stock - $c WHERE idproducto = $id ";
			$stm = $con->query($sql);
			if( $stm ){
				$f = date('Y-m-d');
				$sql2 = "INSERT INTO registro_descuento VALUES( '' , $id , $c , '$f' )";
				$stm2 = $con->query($sql2);
				$con->cerrarConexion();
				if ( $stm2){
					echo 1;
				}
			}else{
				echo 3;
			}
		}else{
			echo 2;
		}
		break;		
	case 9:
		if ( !empty($_POST["cantidad"]) && is_numeric($_POST["cantidad"]) && $_POST["cantidad"] > 0 ){
			$c = mysqli_escape_string($con->obtenerConexion(),$_POST["cantidad"]);
			$id = mysqli_escape_string($con->obtenerConexion(),$_POST["deid"]);
			$sql = "SELECT stock FROM producto WHERE idproducto = $id ";
			$stm = $con->query($sql);
			$con->cerrarConexion();
			if( $row = mysqli_fetch_array($stm) ){
				if ( $row[0] >= $c ){
					echo 1;
				}else{
					echo 4;
				}
			}else{
				echo 3;
			}
		}else{
			echo 2;
		}
		break;	
	case 10:
		if ( !empty($_POST["nombrep"]) || !empty($_POST["marca"] ) || !empty($_POST["color"]) || !empty($_POST["tipo"]) | !empty($_POST["diseño"]) || !empty($_POST["tamaño"]) ){
			$n = mysqli_escape_string($con->obtenerConexion(),$_POST["nombrep"]);
			$ma = mysqli_escape_string($con->obtenerConexion(),$_POST["marca"]);
			$co = mysqli_escape_string($con->obtenerConexion(),$_POST["color"]);
			$ti = mysqli_escape_string($con->obtenerConexion(),$_POST["tipo"]);
			$di = mysqli_escape_string($con->obtenerConexion(),$_POST["diseño"]);
			$ta = mysqli_escape_string($con->obtenerConexion(),$_POST["tamaño"]);
			$sql = "INSERT INTO materia_prima VALUES ( '', '$n' , '$ma' , '$co' , '$ti' , '$di' , '$ta' )";
			$stm = $con->query($sql);
			$con->cerrarConexion();
			if( $stm ){
				echo 1;
			}else{
				echo 3;
			}
		}else{
			echo 2;
		}
		break;	
	case 11:
		$id = mysqli_escape_string($con->obtenerConexion(),$_POST["idmateria"]);
		$sql = "SELECT * FROM materia_prima WHERE idmateria = $id ";
		$stm = $con->query($sql);
		$con->cerrarConexion();
		if ( $row = mysqli_fetch_array($stm) ){
			$material = array('id' => $row[0],'nombre' => $row[1],'marca' => $row[2],'color' => $row[3],'tipo' => $row[4],'diseno' => $row[5],'tamano' => $row[6] );
			echo json_encode($material);
		}
		break;	
	case 12:
		if ( !empty($_POST["ednombrep"]) || !empty($_POST["edmarca"] ) || !empty($_POST["edcolor"]) || !empty($_POST["edtipo"]) || !empty($_POST["eddiseño"]) || !empty($_POST["edtamaño"]) ){
			$n = mysqli_escape_string($con->obtenerConexion(),$_POST["ednombrep"]);
			$ma = mysqli_escape_string($con->obtenerConexion(),$_POST["edmarca"]);
			$co = mysqli_escape_string($con->obtenerConexion(),$_POST["edcolor"]);
			$ti = mysqli_escape_string($con->obtenerConexion(),$_POST["edtipo"]);
			$di = mysqli_escape_string($con->obtenerConexion(),$_POST["eddiseño"]);
			$ta = mysqli_escape_string($con->obtenerConexion(),$_POST["edtamaño"]);
			$id = mysqli_escape_string($con->obtenerConexion(),$_POST["id"]);
			$sql = "UPDATE materia_prima SET nombre='$n',marca='$ma',color='$co',tipo='$ti',diseño='$di',tamaño='$ta' WHERE idmateria = $id ";
			$stm = $con->query($sql);
			$con->cerrarConexion();
			if( $stm ){
				echo 1;
			}else{
				echo 3;
			}
		}else{
			echo 2;
		}
		break;
	case 13:
		if ( !empty($_POST["usuario"]) && !empty($_POST["clave"] ) && !empty($_POST["nombre"]) && !empty($_POST["apellido"]) && !empty($_POST["cargo"]) && !empty($_POST["telefono"]) && !empty($_POST["direccion"]) ){
			$u = mysqli_escape_string($con->obtenerConexion(),$_POST["usuario"]);
			$ca = mysqli_escape_string($con->obtenerConexion(),$_POST["clave"]);
			$no = mysqli_escape_string($con->obtenerConexion(),$_POST["nombre"]);
			$ap = mysqli_escape_string($con->obtenerConexion(),$_POST["apellido"]);
			$cr = mysqli_escape_string($con->obtenerConexion(),$_POST["cargo"]);
			$te = mysqli_escape_string($con->obtenerConexion(),$_POST["telefono"]);
			$di = mysqli_escape_string($con->obtenerConexion(),$_POST["direccion"]);
			$sql = "INSERT INTO usuario VALUES ( '', '$u' ,'$ca' , '$no' , '$ap' , $cr , '$te' , '$di' , 1 )";
			$stm = $con->query($sql);
			$con->cerrarConexion();
			if( $stm ){
				echo 1;
			}else{
				echo 3;
			}
		}else{
			echo 2;
		}
		break;	
	case 14:
		$id = mysqli_escape_string($con->obtenerConexion(),$_POST["idusuario"]);
		$sql = "SELECT * FROM usuario WHERE idusuario = $id ";
		$stm = $con->query($sql);
		$con->cerrarConexion();
		if ( $row = mysqli_fetch_array($stm) ){
			$material = array('id' => $row[0],'usuario' => $row[1],'clave' => $row[2],'nombre' => $row[3],'apellido' => $row[4],'cargo' => $row[5],'telefono' => $row[6],'direccion' => $row[7],'estado' => $row[8] );
			echo json_encode($material);
		}
		break;
	case 15:
		if ( !empty($_POST["edusuario"]) && !empty($_POST["edclave"] ) && !empty($_POST["ednombre"]) && !empty($_POST["edapellido"]) && !empty($_POST["edtelefono"]) && !empty($_POST["eddireccion"]) ){
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
				echo 1;
			}else{
				echo 3;
			}
		}else{
			echo 2;
		}
		break;	
	case 16:
		if ( !empty($_POST["usuario"]) ){
			$u = mysqli_escape_string($con->obtenerConexion(),$_POST["usuario"]);
			$sql = "SELECT usuario FROM usuario WHERE usuario = '$u' ";
			$stm = $con->query($sql);
			$con->cerrarConexion();
			if ( $row = mysqli_fetch_array($stm) ){
				echo 3;
			}else{
				echo 1;
			}
		}else{	
			echo 2;
		}	
		break;
	case 17:
		$id = mysqli_escape_string($con->obtenerConexion(),$_POST["idusuario"]);
		$sql = "SELECT estado FROM usuario WHERE idusuario = $id ";
		$stm = $con->query($sql);
		if ( $row = mysqli_fetch_array($stm) ){
			if ( $row[0] == 1){
				$sql2 = "UPDATE usuario SET estado = 0 WHERE idusuario = $id ";
				$stm2 = $con->query($sql2);
				echo 1;
			}else{
				$sql2 = "UPDATE usuario SET estado = 1 WHERE idusuario = $id ";
				$stm2 = $con->query($sql2);
				echo 1;
			}
		}else{
			echo 2;
		}
		break;
	case 18:
		$sql = "SELECT nombre ,count(*) FROM producto GROUP BY nombre  ";
		$stm = $con->query($sql);
		$datos = array();
		$con->cerrarConexion();
		while (  $row = mysqli_fetch_array($stm) ){
			$datos[] = $row;
		}					
		echo json_encode($datos);
		break;
	case 19:
		$sql = "SELECT nombre , (fecha) as Fecha, count(*) FROM pedido GROUP BY nombre ORDER BY Fecha desc LIMIT 7";
		$stm = $con->query($sql);
		$datos = array();
		$con->cerrarConexion();
		while (  $row = mysqli_fetch_array($stm) ){
			$datos[] = $row;
		}					
		echo json_encode($datos);
		break;
	case 20:
		$id = mysqli_escape_string($con->obtenerConexion(),$_POST["idcliente"]);
		$sql = "DELETE from pedido WHERE idpedido = $id ";
		$stm = $con->query($sql);
		if ( $stm ){
			echo $sql;
		}else{
			echo $sql;
		}
		break;
	case 21:
		$operario = obtenerNombreOperaro($_GET["op"]);
		$sql = "SELECT idcontrol as id , idusuario as title , inicio as start, fin as end , prenda as prenda ,color as textColor , fondo as backgroundColor , estado as estado FROM control WHERE idusuario = '$operario' ";
		$stm = $con->query($sql);
		$datos = array();
		while($row = mysqli_fetch_array($stm)){
		   $datos[] = $row;
		}
		echo json_encode($datos); 
		break;
	case 22: 
		$operario = mysqli_escape_string($con->obtenerConexion(),obtenerNombreOperaro($_POST["operario"]));
		$inicio = mysqli_escape_string($con->obtenerConexion(),$_POST["inicio"]);
		$fin = mysqli_escape_string($con->obtenerConexion(),$_POST["fin"]);
		$prenda = mysqli_escape_string($con->obtenerConexion(),$_POST["prenda"]);
		$sql = "INSERT INTO control VALUES( '', '$operario' , '$inicio','$fin','$prenda','#ffffff', '#3788d8', 1)";
		$stm = $con->query($sql);
		echo json_encode($sql);
		break;
	case 23:
		$inicio = mysqli_escape_string($con->obtenerConexion(),$_POST["inicio"]);
		$fin = mysqli_escape_string($con->obtenerConexion(),$_POST["fin"]);
		$id = mysqli_escape_string($con->obtenerConexion(),$_POST["id"]);
		$e = mysqli_escape_string($con->obtenerConexion(),$_POST["estado"]);
		if ($e == 1){
			$sql  = "UPDATE control SET inicio = '$inicio' , fin = '$fin' , estado = $e , fondo = '#3788d8'  WHERE idcontrol = $id ";
		}else{
			$sql  = "UPDATE control SET inicio = '$inicio' , fin = '$fin' , estado = $e , fondo = '#d73737'  WHERE idcontrol = $id ";
		}
		$stm = $con->query($sql);
		echo json_encode($stm);
		break; 
	case 24:
		$id = mysqli_escape_string($con->obtenerConexion(),$_POST["id"]);
		$sql = "DELETE FROM control WHERE idcontrol = $id";
		$stm = $con->query($sql);
		echo json_encode($stm);
		break;
	case 25:
		$mes = mysqli_escape_string($con->obtenerConexion(),$_POST["mes"]);
		$anio = mysqli_escape_string($con->obtenerConexion(),$_POST["anio"]);
		$n = mysqli_escape_string($con->obtenerConexion(),obtenerNombreOperaro($_POST["nombre"]));
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
		$sql = "SELECT * FROM control WHERE estado = 2 AND idusuario = '$n' AND inicio >= '$fechai' AND fin <= '$fechaf'  ";
		$stm = $con->query($sql);
		while($row = mysqli_fetch_array($stm)){
		   $datos[] = $row;
		}
		echo json_encode($datos);
		break;
}

/*
NOTAS:

CASO 1 agregar cliente
CASO 2 agregar pedido
CASO 3 obtener datos del cliente
CASO 4 modificar un pedido
CASO 5 agregar producto
CASO 6 modificar producto
CASO 7 obtener datos del producto
CASO 8 modificar el stock del producto y agregar al registro la cantidad descontada
CASO 9 obtener el stock del producto
CASO 10 agregar material
CASO 11 obtener datos del material
CASO 12 modificar material
CASO 13 agregar usuario
CASO 14 obtener datos del usuario
CASO 15 modificar usuario
CASO 16 verificar la existencia del usuario
CASO 17 cambiar el estado del usuario
CASO 18 obtener datos de los productos para los graficos
CASO 19 obtener datos de las medidas hechas los ultimos 7 dias para los graficos
CAS0 20 eliminar medida del cliente
CASO 21 obtener los datos para el calendario
CASO 22 agregar día de trabajo al operario
CASO 23 modificar día de trabajo al operario
CASO 24 borrar día de trabajo al operario

SELECT idusuario, prenda, inicio, fin  FROM control WHERE inicio >= '2021-01-01' AND fin <= '2021-01-31'

*/

?>