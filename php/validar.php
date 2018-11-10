<?php 
    session_start(); 
    error_reporting(E_ALL ^ E_NOTICE);

    $usuario = $_POST['docdeudor'];
    $ref = $_POST['ref'];	

    include("conexion.php");

    $proceso = "SELECT * FROM placetopay.usuario WHERE documento = '$usuario'";

    $ejec_sql_user = $conexion->query($proceso);

    if ($resultado = mysqli_fetch_array($ejec_sql_user)) {

    	$_SESSION['u_usuario'] = $usuario;

        $proceso2 = "SELECT * FROM placetopay.facturas WHERE ref = '$ref '"; 

        $ejec_sql_user2 = $conexion->query($proceso2);

        if ($resultado = mysqli_fetch_array($ejec_sql_user2)) {
            
            header("Location: principal.php");    
        
        }else{
            header("Location: ../index.php?error2=No hay facturas asociadas a ese documento!#prin");
        }
    	    
    }else{
    	header("Location: ../index.php?error1=Documento invalido!#prin");    	
    }
?> 	