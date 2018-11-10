<?php

session_start(); 
error_reporting(E_ALL ^ E_NOTICE);

	$docuser = $_SESSION['u_usuario'];

	$fac_prin = "SELECT * FROM placetopay.facturas WHERE estado = 'Activo' AND docdeudor = '$docuser' ORDER BY id";
	$ejec_fac_prin = $conexion->query($fac_prin);
		



	$fac_prin_id = "SELECT * FROM placetopay.facturas WHERE estado = 'Activo' AND docdeudor = '$docuser' ORDER BY id";
	$ejec_fac_prin_id = $conexion->query($fac_prin_id);	

	foreach ($ejec_fac_prin_id as $id){
		$id_clien = $id["id_user"];			
	}



	$fac_histo = "SELECT * FROM placetopay.facturas WHERE id_user = '$id_clien' AND estado = 'Aprobado' OR estado = 'Rechazado' ORDER BY id";
	$ejec_fac_histo = $conexion->query($fac_histo);	


	$info_fac = "SELECT * FROM placetopay.facturas WHERE id = '$id_fac'";
	$ejec_info_fac = $conexion->query($info_fac);

	foreach ($ejec_info_fac as $fc) {
		$ref = $fc['ref'];
		$valor = $fc['valor'];
		$iva = $fc['iva'];
		$desc = $fc['desc'];
		$estado = $fc['estado'];
		$pagado	= $fc['pagado'];
	}


	$pro = "SELECT * FROM placetopay.usuario WHERE id = '$id_cliente'";
	$ejec_pro = $conexion->query($pro);

	foreach ($ejec_pro as $nom) {
		$nombre = $nom['nombre'];
		$email = $nom['email'];
		$doc = $nom['documento'];
	}
	
?>