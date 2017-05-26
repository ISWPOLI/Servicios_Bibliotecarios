<?php
session_start();

include ($_SERVER['DOCUMENT_ROOT']."/biblioteca_web/php/include/conexion_bd.php");

$mysqli->query("UPDATE usuario_save SET data = '".$_POST['data_post']."' WHERE codigo = '".$_SESSION['cod_adm']."' AND save_id = ".$_POST['save_id']." AND key_data = '".$_POST['key_post']."'");


?>