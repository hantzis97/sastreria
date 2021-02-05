<?php

$a = $_GET["action"];

switch($a){
	case 1:
		require_once "../modelo/producto.php";
		$p = new Producto();
		$r = $p->getCantidad();
		echo json_encode($r);
		break;
	case 2:
		require_once "../modelo/medida.php";
		$m = new Medida();
		$r = $m->getCantidad();
		echo json_encode($r);
		break;
			
}

?>