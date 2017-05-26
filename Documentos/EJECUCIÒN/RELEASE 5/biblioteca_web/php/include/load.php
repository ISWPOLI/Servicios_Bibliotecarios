<?php
session_start();

include ($_SERVER['DOCUMENT_ROOT']."/biblioteca_web/php/include/conexion_bd.php");

$resultado = $mysqli->query("SELECT data FROM usuario_save WHERE codigo = '".$_SESSION['cod_adm']."' AND save_id = ".$_POST['savefileId']." AND key_data = '".$_POST['key_post']."'");

$fila = $resultado->fetch_assoc();

echo $fila['data'];

?>