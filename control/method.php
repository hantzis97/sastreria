<?php
require_once "../modelo/conexion.php";
function listarCliente(){
	$con = new Conexion();
	$sql = "SELECT * FROM cliente";
	$stm = $con->query($sql);
	while ( $row = mysqli_fetch_array($stm)){
		?>	
		<tr>
		    <td><?php echo $row[0]?></td>
		    <td class="text-center"><?php echo $row[1]?></td>
		    <td class="text-center"><?php echo $row[2]?></td>
		    <td class="text-center">
                <a class="btn btn-info btn-sm" href="medida.php?id=<?php echo $row[0]?>">
                    <i class="fas fa-pencil-alt"></i>
                      Medidas
                </a>
                <?php if ( $_SESSION["cargo"] != 2 && $_SESSION["cargo"] != 3 ) {  ?>
               	<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" onclick="obtenerId(<?php echo $row[0] ?>)" data-target="#modal-medida">
                  <i class="fas fa-folder"></i>
                     Nueva Medida
                </button>
                <?php  } ?>
		    </td>
		</tr>  
		<?php
	}
	$con->cerrarConexion();
}


function obtenerNombreCLiente($id){
	$con = new Conexion();
	$sql = "SELECT * FROM cliente WHERE idcliente = $id ";
	$stm = $con->query($sql);
	if ( $row = mysqli_fetch_array($stm) ){
		?>
		<spam><?php echo strtoupper($row[1]." ".$row[2] )?></span>
		<?php
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


function listaMedida($id){
	$con = new Conexion();
	$sql = "SELECT * FROM pedido where idcliente = $id ";
	$stm = $con->query($sql);
	while ( $row = mysqli_fetch_array($stm)){
		?>	
		<tr>
		    <td><?php echo $row[0]?></td>
		    <td class="text-center"><?php echo $row[1]?></td>
		    <td class="text-center"><?php echo $row[2]?></td>
		    <td class="text-center"><?php echo $row[3]?></td>
		    <td class="text-center"><?php echo $row[6]?></td>
		    <td class="text-center">
               	<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" onclick="editar(<?php echo $row[0] ?>)" data-target="#modal-editar">
                  <i class="fas fa-pencil-alt"></i>
                     Editar
                </button>
                <button type="button" class="btn btn-danger btn-sm"  onclick="eliminar(<?php echo $row[0] ?>)" >
                  <i class="fas fa-trash"></i>
                     Eliminar
                </button>
		    </td>
		</tr>  
		<?php
	}
	$con->cerrarConexion();
}

function listarOperarios(){
	$con = new Conexion();
	$sql = "SELECT * FROM usuario where idcargo = 3  ";
	$stm = $con->query($sql);
	while ( $row = mysqli_fetch_array($stm)){
		?>	
		<tr>
		    <td><?php echo $row[0]?></td>
		    <td class="text-center"><?php echo $row[3]?></td>
		    <td class="text-center"><?php echo $row[4]?></td>
		    <td class="text-center"><span class='badge badge-danger'>Operario</span></td>
		    <td class="text-center"><?php echo $row[6]?></td>
		    <td class="text-center"><?php echo $row[7]?></td>
		    <td class="text-center">
               	<a href="calendario.php?id=<?php echo $row[0]?>" class="btn btn-primary btn-sm">
                  <i class="fas fa-folder"></i>
                     Ver Trabajo
                </a>
		    </td>
		</tr>  
		<?php
	}
	$con->cerrarConexion();
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


function listarProductos(){
	$con = new Conexion();
	$sql = "SELECT * FROM producto";
	$stm = $con->query($sql);
	while ( $row = mysqli_fetch_array($stm)){
		?>	
		<tr>
		    <td><?php echo $row[0]?></td>
		    <td class="text-center"><?php echo $row[1]?></td>
		    <td class="text-center"><?php echo $row[2]?></td>
		    <td class="text-center"><?php echo $row[3]?></td>
		    <td class="text-center"><?php echo $row[4]?></td>
		    <td class="text-center"><?php echo $row[5]?></td>
		    <td class="text-center"><?php echo $row[6]?></td>
		    <td class="text-center"><?php echo $row[7]?></td>
		    <td class="text-center">
		    	<?php if( $_SESSION["cargo"] != 2 ) { ?>
               	<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" onclick="editar(<?php echo $row[0] ?>)" data-target="#modal-editar">
                  <i class="fas fa-pencil-alt"></i>
                     Editar
                </button>
            	<?php } ?>
                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" onclick="descontar(<?php echo $row[0] ?>)" data-target="#modal-descontar">
                  <i class="fas fa-trash"></i>
                     Descontar
                </button>
		    </td>
		</tr>  
		<?php
	}
	$con->cerrarConexion();
}

function listarMateria(){
	$con = new Conexion();
	$sql = "SELECT * FROM materia_prima";
	$stm = $con->query($sql);
	while ( $row = mysqli_fetch_array($stm)){
		?>	
		<tr>
		    <td><?php echo $row[0]?></td>
		    <td class="text-center"><?php echo $row[1]?></td>
		    <td class="text-center"><?php echo $row[2]?></td>
		    <td class="text-center"><?php echo $row[3]?></td>
		    <td class="text-center"><?php echo $row[4]?></td>
		    <td class="text-center"><?php echo $row[5]?></td>
		    <td class="text-center"><?php echo $row[6]?></td>
		    <td class="text-center">
               	<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" onclick="editar(<?php echo $row[0] ?>)" data-target="#modal-editar">
                  <i class="fas fa-pencil-alt"></i>
                     Editar
                </button>
		    </td>
		</tr>  
		<?php
	}
	$con->cerrarConexion();
}

function listarUsuarios(){
	$con = new Conexion();
	$sql = "SELECT * FROM usuario";
	$stm = $con->query($sql);
	while ( $row = mysqli_fetch_array($stm)){
		?>	
		<tr>
		    <td><?php echo $row[0]?></td>
		    <td class="text-center"><?php echo $row[1]?></td>
		    <td class="text-center"><?php echo $row[2]?></td>
		    <td class="text-center"><?php echo $row[3]?></td>
		    <td class="text-center"><?php echo $row[4]?></td>
		    <td class="text-center">
		    	<?php 
		    		if ( $row[5] == 1){
		    			echo "<span class='badge badge-success'>Sastre</span>";
		    		}else if( $row[5] == 2 ){
		    			echo "<span class='badge badge-warning'>Vendedor</span>";
		    		}else if( $row[5] == 3 ){
		    			echo "<span class='badge badge-danger'>Operario</span>";
		    		}else if( $row[5] == 4 ){
		    			echo "<span class='badge badge-primary'>Administrador</span>";
		    		}

		    	?>
		    </td>
		    <td class="text-center"><?php echo $row[6]?></td>
		    <td class="text-center"><?php echo $row[7]?></td>
		    <td class="text-center">
		    	<?php 
		    		if ( $row[8] == 1 ){
		    			echo "<span class='badge badge-success'>Activo</span>";
		    		}else{
		    			echo "<span class='badge badge-danger'>Inactivo</span>";
		    		}
		    	?>
		    </td>
		    <td class="text-center">
               	<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" onclick="editar(<?php echo $row[0] ?>)" data-target="#modal-editar">
                  <i class="fas fa-pencil-alt"></i>
                     Editar
                </button>
                <button type="button" class="btn btn-success btn-sm" onclick="estado(<?php echo $row[0] ?>)">
                  <i class="fas fa-folder"></i>
                     Cambiar Estado
                </button>
		    </td>
		</tr>  
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

function listarResumen($op,$m,$a){
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

	$sql = "SELECT * FROM control WHERE estado = 2 AND idusuario = '$op' AND inicio >= '$fechai' AND fin <= '$fechaf'  ";
	$stm = $con->query($sql);
	$con->cerrarConexion();
	while ( $row = mysqli_fetch_array($stm) ){
		?>
		<tr>
			<td class="text-center"><?php echo $row[0]?></td>
			<td class="text-center"><?php echo $row[2]?></td>
			<td class="text-center"><?php echo $row[3]?></td>
			<td class="text-center"><?php echo $row[4]?></td>
		</tr>
		<?php		
	}
}

?>
