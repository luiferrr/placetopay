<?php 
	session_start(); 
	error_reporting(E_ALL ^ E_NOTICE);

	if (isset($_SESSION['u_usuario'])){
?>

<!DOCTYPE html>
<html>
<head>
	<title>Consulta de factura</title>
	<link rel="icon" href="../imagenes/favicon.png" sizes="32x32">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minumum-scale=1.0">

	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

	<!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

    	<link rel="stylesheet" href="../estilos/estilos.css" />
</head>
<body>

<?php
	include("conexion.php"); 
	$id_cliente = $_GET['id_clt'];
	include("sql.php"); 
?>

	<div class="container">
		<div class="row" style="margin-top: 10px;">
			<div style="margin: 0 auto;">
				<img src="../imagenes/logo.png" class="img-responsive imgprin" alt="Responsive image">
			</div>
		</div>

		<div id="cont" class="row">
			<div class="col-md-12" style="margin-top:50px;">
				<spam class="titulo">Pagos electr&oacute;nicos</spam>
			</div>
		</div>

		<div class="row">
			<div class="col-md-12" style="margin-top: 5px;">
				<p class="texto">Desde su casa, oficina o cualquier lugar, pague de forma segura a través de nuestro sistema de pago. Use nuestro servicio las 24 horas y los 7 días de la semana</p>
			</div>
		</div>

		<div style="margin-top:10px;" class="row">
			<div class="col-md-6">
				<ul class="pagination pagination-md">				  
				  <li class="page-item"><a class="page-link" href="principal.php">Facturas pendientes</a></li>
				  <li class="page-item"><a class="page-link page" href="#">Historial de pagos</a></li>
				</ul>
			</div>	
			<div class="col-md-6">
				<a href="logout.php"><button type="button" class="btn btn-outline-secondary btn-sm salir">Salir</button></a>
			</div>		
		</div>

		<div class="table-responsive-xl">          
		  <table class="table tab">
		    <thead class="thead-light">
		      <tr>
		        <th>Referencia</th>
		        <th>Valor</th>
		        <th>Descripci&oacute;n</th>
		        <th>Estado</th>
		        <th></th>
		      </tr>
		    </thead>

		    <?php foreach ($ejec_fac_histo as $key){

		    	$id = $key["id"];
				$ref = $key["ref"];
				$desc = $key["desc"];
				$deudor = $key["deudor"];
				$docdeudor = $key["docdeudor"];
				$refalt = $key["refalt"];
				$consecutivo = $key["consecutivo"];
				$iva = $key["iva"];
				$subtotal = $key["subtotal"];
				$valor = $key["valor"];
				$estado = $key["estado"];
				$fechacrea = $key["fechacrea"];
				$sinrec = $key["sinrec"];	
				$pagado = $key["pagado"];
				$id_cliente = $key["id_user"];
		    ?>
		    	<tbody>
			      <tr>
			        <td><?php echo $ref ?></td>
			        <td>COP <?php echo number_format($valor) ?></td>
			        <td><?php echo $desc ?></td>
			        <td><?php echo $estado ?></td>
			        <td><a class="ver" href="resumen.php?tipo=<?php echo $estado ?>&id_fac=<?php echo $id ?>&id_clt=<?php echo $id_cliente ?>" class="btn btn-primary" target="_blank">Resumen de pago</a></td>
			      </tr>
			    </tbody>
		    	
		    <?php } ?>

		  </table>
	  </div>
	  

	  <div class="modal" id="myModal">
	    <div class="modal-dialog">
	      <div class="modal-content">
	      
	        <!-- Modal Header -->
	        <div class="modal-header">
	          <h4 class="modal-title">Detalles de la factura</h4>
	          <button type="button" class="close" data-dismiss="modal">&times;</button>
	        </div>
	        
	        <!-- Modal footer -->
	        <div class="modal-footer">
	          <a href=""><button type="submit" style="border: none;" class="bbtn btn-primary btn-sm">Pagar</button></a>
	        </div>
	        
	      </div>
	    </div>
	  </div>

		<div class="row foot">
			<div class="col-md-6">
				<img style="float:left;" src="../imagenes/logofoot.png">
			</div>
			<div class="col-md-6">
				<div class="info">
					<div>admin@placetopay.com</div>
					<div>+57 1111111111</div>
				</div>
			</div>
		</div>

	</div>
</body>
</html>

<?php }else{

	header("Location: ../index.php");
} ?>