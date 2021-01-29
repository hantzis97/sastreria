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
			return $p->add($n,$ta,$ti,$ma,$co,$de,$st);
		}else{
			return 2;
		}
	case 2:
		if ( !empty($_POST["ednombrep"]) && !empty($_POST["edtalla"] ) && !empty($_POST["edtipo"]) && !empty($_POST["edmarca"]) && !empty($_POST["edcolor"]) && !empty($_POST["eddetalle"]) && !empty($_POST["edstock"]) ){
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
			return $p->edit($n,$ta,$ti,$ma,$co,$de,$st,$id);
		}else{
			return 2;
		}	

?>