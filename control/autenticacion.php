<?php

if ( !empty($_POST["usuario"]) && !empty($_POST["clave"])){
	require_once "../modelo/usuario.php";
	$u = new Usuario();
	$r = $u->validar($_POST["usuario"],$_POST["clave"]);
	if ( !empty($r) ){
		session_start();
		$_SESSION["usuario"] = $r["idusuario"];
		$_SESSION["nombre"] = $r["nombre"]." ".$r["apellido"];
		$_SESSION["cargo"] = $r["idcargo"];
		echo 4;
 	}else{
		echo 3;
	}
}else{
	echo 2;
	}



/*
CODIGO DE ERRORES

COD 2 : Datos vacios
COD 3 : Usuario no encontrado/inactivo
COD 4 : Correcto 


*/

?>