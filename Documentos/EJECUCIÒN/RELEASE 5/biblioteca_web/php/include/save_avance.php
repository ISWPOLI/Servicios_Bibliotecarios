<?php
session_start();

include ($_SERVER['DOCUMENT_ROOT']."/biblioteca_web/php/include/conexion_bd.php");

$mysqli->query("UPDATE usuario_misiones SET estado='".$_POST['estado']."' WHERE codigo='".$_SESSION['cod_adm']."' AND personaje='".$_POST['personaje']."' AND mision='".$_POST['mision']."'");

?>