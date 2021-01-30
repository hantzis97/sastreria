<?php

$a = $_GET["action"];

switch ($a){
	case 1:
		if ( !empty($_POST["nombrep"]) && !empty($_POST["talla"] ) && !empty($_POST["tipo"]) && !empty($_POST["marca"]) && !empty($_POST["color"]) && !empty($_POST["detalle"]) && !empty($_POST["stock"]) ){
			$n = $_POST["nombrep"];
			$ta = $_POST["talla"];
			$ti = $_POST["tipo"];
			$ma = $_POST["marca"];
			$co = $_POST["color"];
			$de = $_POST["detalle"];
			$st = $_POST["stock"];
			require_once "../modelo/producto.php";
			$p = new Producto();
			echo $p->add($n,$ta,$ti,$ma,$co,$de,$st);
		}else{
			echo 2;
		}
	case 2:
		if ( !empty($_POST["ednombrep"]) || !empty($_POST["edtalla"] ) || !empty($_POST["edtipo"]) || !empty($_POST["edmarca"]) || !empty($_POST["edcolor"]) || !empty($_POST["eddetalle"]) || !empty($_POST["edstock"]) ){
			$n = $_POST["ednombrep"];
			$ta = $_POST["edtalla"];
			$ti = $_POST["edtipo"];
			$ma = $_POST["edmarca"];
			$co = $_POST["edcolor"];
			$de = $_POST["eddetalle"];
			$st = $_POST["edstock"];
			$id = $_POST["edid"];
			require_once "../modelo/producto.php";
			$p = new Producto();
			echo $p->edit($n,$ta,$ti,$ma,$co,$de,$st,$id);
		}else{
			echo 2;
		}
		break;
	case 3:
		if ( !empty($_POST["cantidad"]) && is_numeric($_POST["cantidad"]) && $_POST["cantidad"] > 0 ){
			$c = $_POST["cantidad"];
			$id = $_POST["deid"];
			require_once "../modelo/producto.php";
			$p = new Producto();
			echo $p->val($c,$id);
		}else{
			echo 2;
		}	
		break;
	case 4:
		if ( !empty($_POST["cantidad"]) && is_numeric($_POST["cantidad"]) && $_POST["cantidad"] > 0){
			$c = $_POST["cantidad"];
			$id = $_POST["deid"];
			require_once "../modelo/producto.php";
			$p = new Producto();
			echo $p->desct($c,$id);
		}else{
			echo 2;
		}	
		break;
	case 5:
		$id = $_POST["idproducto"];	
		require_once "../modelo/producto.php";
		$p = new Producto();
		echo json_encode($p->getDato($id));
		break;
}
?>