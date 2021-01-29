<?php

$a = $_GET["action"];

switch ($a){
	case 1:
		$id = $_POST["idcliente"];	
		require_once "../modelo/pedido.php";
		$pedido = new Pedido();
		//echo json_decode($pedido->getDato($id));
		echo json_encode($pedido->getDato($id));
		break;
	case 2:
		$id = $_POST["idcliente"];	
		require_once "../modelo/pedido.php";
		$pedido = new Pedido();
		return $pedido->delete($id);
}

?>