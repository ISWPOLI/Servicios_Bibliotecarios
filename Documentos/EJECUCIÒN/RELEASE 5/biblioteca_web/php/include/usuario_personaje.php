<?php
session_start();

include ($_SERVER['DOCUMENT_ROOT']."/biblioteca_web/php/include/conexion_bd.php");

$mysqli->query("INSERT personajes (codigo, personaje, fecha_creacion) VALUES ('".$_SESSION['cod_adm']."', '".$_POST['personaje']."', curdate())");


?>