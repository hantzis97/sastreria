<?php

$a = $_GET["action"];

switch ($a){
	case 1:
		require_once "../modelo/control.php";
		$c = new Control();
		$op = $_GET["op"];
		echo json_encode($c->getData($op));
		break;
	case 2:
		require_once "../modelo/control.php";
		$c = new Control();
		$op =$_POST["operario"];
		$i = $_POST["inicio"];
		$f = $_POST["fin"];
		$p = $_POST["prenda"];
		$co = $_POST["cantidad"];
		echo $c->add($op,$i,$f,$p,$co);
		break;
	case 3:
		require_once "../modelo/control.php";
		$c = new Control();	
		$i =$_POST["inicio"];
		$f = $_POST["fin"];
		$id = $_POST["id"];
		$e = $_POST["cantidad"];
		echo json_encode($c->edit($i,$f,$id,$e));
		break;
	case 4:
		require_once "../modelo/control.php";
		$c = new Control();	
		$id = $_POST["id"];
		echo json_encode($c->delete($id));
		break;	
	case 5:
		require_once "../modelo/resumen.php";
		$c = new Resumen();
		$mes = $_POST["mes"];
		$anio = $_POST["anio"];
		$n = $_POST["nombre"];	
		echo json_encode($c->list($n,$mes,$anio));
		break;

}

?>