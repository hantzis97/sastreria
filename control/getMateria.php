<?php

$a = $_GET["action"];

switch ($a){
	case 1:
		if ( !empty($_POST["nombrep"]) || !empty($_POST["marca"] ) || !empty($_POST["color"]) || !empty($_POST["tipo"]) | !empty($_POST["diseño"]) || !empty($_POST["tamaño"]) ){
			require_once "../modelo/materia.php";
			$m = new Materia();
			$n = $_POST["nombrep"];
			$ma = $_POST["marca"];
			$co = $_POST["color"];
			$ti = $_POST["tipo"];
			$di = $_POST["diseño"];
			$ta = $_POST["tamaño"];
			echo $m->add($n,$ma,$co,$ti,$di,$ta);
		}else{
			echo 2;
		}
		break;
	case 2:
		if ( !empty($_POST["ednombrep"]) || !empty($_POST["edmarca"] ) || !empty($_POST["edcolor"]) || !empty($_POST["edtipo"]) || !empty($_POST["eddiseño"]) || !empty($_POST["edtamaño"]) ){
			require_once "../modelo/materia.php";
			$m = new Materia();
			$n = $_POST["ednombrep"];
			$ma = $_POST["edmarca"];
			$co = $_POST["edcolor"];
			$ti = $_POST["edtipo"];
			$di = $_POST["eddiseño"];
			$ta = $_POST["edtamaño"];
			$id = $_POST["id"];
			echo $m->edit($n,$ma,$co,$ti,$di,$ta,$id);
		}else{
			echo 2;
		}
		break;
	case 3:
		$id = $_POST["idmateria"];	
		require_once "../modelo/materia.php";
		$m = new Materia();	
		echo json_encode($m->get($id));
		break;
}

?>