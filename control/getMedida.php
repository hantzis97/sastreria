<?php

$a = $_GET["action"];

switch ($a){
	case 1:
		if ( !empty($_POST["nombrep"]) && !empty($_POST["medida"] ) && !empty($_POST["detalle"] ) ){
			require_once "../modelo/medida.php";
			$medida = new Medida();
			date_default_timezone_set('America/Lima');
			$n = $_POST["nombrep"];
			$m = $_POST["medida"];
			$d = $_POST["detalle"];
			$id = $_POST["id"];
			$f = date('Y-m-d');
			echo $medida->add($n,$m,$d,$id,$f);
		}else{
			echo 2;
		}
		break;
	case 2:
		if ( !empty($_POST["ednombre"]) && !empty($_POST["edmedida"] ) && !empty($_POST["eddetalle"] ) ){
			require_once "../modelo/medida.php";
			$medida = new Medida();
			$n = $_POST["ednombre"];
			$m = $_POST["edmedida"];
			$d = $_POST["eddetalle"];
			$id = $_POST["edid"];
			echo $medida->edit($n,$m,$d,$id);
		}else{
			echo 2;
		}
		break;
}

?>