<?php
session_start();

include ($_SERVER['DOCUMENT_ROOT']."/biblioteca_web/php/include/conexion_bd.php");

$mysqli->query("INSERT usuario_misiones (codigo,personaje,mision,fecha,estado) VALUES ('".$_SESSION['cod_adm']."','".$_POST['personaje']."',".$_POST['mision'].",curdate(),".$_POST['estado'].")");


?>