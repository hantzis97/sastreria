<?php
require_once "../modelo/conexion.php";

function obtenerNombreCLiente($id){
	$con = new Conexion();
	$sql = "SELECT * FROM cliente WHERE idcliente = $id ";
	$stm = $con->query($sql);
	if ( $row = mysqli_fetch_array($stm) ){
		 return strtoupper($row[1]." ".$row[2] );
	}
	$con->cerrarConexion();

} 

function obtenerNombreOperaro($id){
	$con = new Conexion();
	$sql = "SELECT * FROM usuario WHERE idusuario = $id ";
	$stm = $con->query($sql);
	$con->cerrarConexion();
	if ( $row = mysqli_fetch_array($stm) ){
		return $row[3]." ".$row[4];
	}
}


function cbxOperarios(){
	$con = new Conexion();
	$sql = "SELECT * FROM usuario where idcargo = 3 ";
	$stm = $con->query($sql);
	while ( $row = mysqli_fetch_array($stm)){
		?>	
		<option value="<?php echo $row[3]." ".$row[4]?>"><?php echo $row[3]." ".$row[4]?></option> 
		<?php
	}
	$con->cerrarConexion();
}

function listarPrendas(){
	$con = new Conexion();
	$sql = "SELECT nombre FROM pedido GROUP BY nombre";
	$stm = $con->query($sql);
	while ( $row = mysqli_fetch_array($stm)){
		?>	
		<option value="<?php echo $row[0]?>"><?php echo $row[0]?></option> 
		<?php
	}
	$con->cerrarConexion();
}


function obtenerCantidad($obj){
	$con = new Conexion();
	switch ( $obj ){
		case 1 : 
			$sql = "SELECT count(*) FROM cliente";
			break;
		case 2:
			$sql = "SELECT count(*) FROM producto";
			break;
		case 3:
			$sql = "SELECT count(*) FROM materia_prima";
			break;
		case 4:
			$sql = "SELECT count(*) FROM pedido";
			break;
		case 5:
			$sql = "SELECT count(*) FROM usuario";
			break;
	}

	$stm = $con->query($sql);
	if ( $row = mysqli_fetch_array($stm) ){
		$cont=$row[0];
	}
	return $cont;

	/* 
		NOTAS:
			CASO 1 = cliente
			CASO 2 = producto
			CASO 3 = materia
			CASO 4 = medida
			CASO 5 = usuario


	*/
}


?>
