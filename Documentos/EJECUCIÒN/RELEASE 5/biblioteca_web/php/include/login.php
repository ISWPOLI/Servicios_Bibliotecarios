<?php

include ($_SERVER['DOCUMENT_ROOT']."/biblioteca_web/php/include/conexion_bd.php");

$resultado = $mysqli->query("SELECT count(*) as cuenta FROM usuarios WHERE codigo='".$_POST['username']."'");
$fila = $resultado->fetch_assoc();

if ($fila['cuenta'] >0)
{
	$result_pass = $mysqli->query("SELECT codigo, clave FROM usuarios WHERE codigo='".$_POST['username']."' AND clave='".$_POST['password']."'");
	$fil_pass = $result_pass->fetch_assoc();
	
	if($fil_pass['codigo'] == '' ){
		?>
		<script>
			alert("Clave errada");
			location.href="/biblioteca_web/index.php";
		</script>
		<?php
	} else {
		session_start();
		$_SESSION['cod_adm']=$fil_pass['codigo'];
		?>
		<script>
			location.href="/biblioteca_web/game.html";
		</script>
		<?php
	}
	
} else { 
		
	//Guardar usuario
	$mysqli->query("INSERT INTO usuarios (codigo, clave, fecha_creacion, estado) values ('".$_POST['username']."','".$_POST['password']."',curdate(),'A')");
	//crear registros de save global	
	$mysqli->query("INSERT INTO usuario_save (codigo, save_id, key_data) values ('".$_POST['username']."',0,'RPG Global')");
	//crear registros de save file	
	for($i=1;$i<=20;$i++){		
		$mysqli->query("INSERT INTO usuario_save (codigo, save_id, key_data) values ('".$_POST['username']."',".$i.",'RPG File".$i."')");
	}
	session_start();
	$_SESSION['cod_adm']=$_POST['username'];
	?>
	<script>
		location.href="/biblioteca_web/game.html";
	</script>
	<?php
}

?>