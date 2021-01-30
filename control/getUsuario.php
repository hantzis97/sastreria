<?php

$a = $_GET["action"];

switch ($a){
	case 1:
		if ( !empty($_POST["usuario"]) ){
			require_once "../modelo/usuario.php";
			$u = $_POST["usuario"];
			$us = new Usuario();
			echo $us->val($u);
		}else{
			echo 2;
		}
		break;
	case 2:
		if ( !empty($_POST["usuario"]) && !empty($_POST["clave"] ) && !empty($_POST["nombre"]) && !empty($_POST["apellido"]) && !empty($_POST["cargo"]) && !empty($_POST["telefono"]) && !empty($_POST["direccion"]) ){
			$u = $_POST["usuario"];
			$ca = $_POST["clave"];
			$no = $_POST["nombre"];
			$ap = $_POST["apellido"];
			$cr = $_POST["cargo"];
			$te = $_POST["telefono"];
			$di = $_POST["direccion"];
			require_once "../modelo/usuario.php";
			$u = new Usuario();
			echo $u->add($u,$ca,$no,$ap,$cr,$te,$di);
		}else{
			echo 2;
		}	
		break;
	case 3:
		if ( !empty($_POST["edusuario"]) && !empty($_POST["edclave"] ) && !empty($_POST["ednombre"]) && !empty($_POST["edapellido"]) && !empty($_POST["edtelefono"]) && !empty($_POST["eddireccion"]) ){
			$u = $_POST["edusuario"];
			$ca = $_POST["edclave"];
			$no = $_POST["ednombre"];
			$ap = $_POST["edapellido"];
			$te = $_POST["edtelefono"];
			$di = $_POST["eddireccion"];
			$id = $_POST["id"];
			require_once "../modelo/usuario.php";
			$u = new Usuario();
			echo $u->edit($u,$ca,$no,$ap,$te,$di,$id);
		}else{
			echo 2;
		}
		break;
	case 4:
		require_once "../modelo/usuario.php";
		$id = $_POST["idusuario"];
		$u = new Usuario();
		echo json_encode($u->getData($id));
		break;	
	case 5:
		require_once "../modelo/usuario.php";	
		$id = $_POST["idusuario"];
		$u = new Usuario();
		echo $u->editEst($id);
		break;
}

?>