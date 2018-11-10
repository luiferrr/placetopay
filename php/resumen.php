<?php
	$estado = $_GET['tipo'];

	if ($estado=='Aprobado'){
		include("aprobado.php");
	}else{
		include("rechazado.php");
	}
?>