<?php
session_start();
unset($_SESSION["usuario"]);
unset($_SESSION["nombre"]);
unset($_SESSION["cargo"]);
header('Location: ../index.php');

?>