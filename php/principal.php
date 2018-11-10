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
	include("sql.php"); 

?>

	<div class="container">
		<div class="row" style="margin-top: 10px;">
			<div style="margin: 0 auto;">
				<img src="../imagenes/logo.png" class="img-responsive imgprin" alt="Responsive image">
			</div>
		</div>

		<div class="row">
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
				  <li class="page-item"><a class="page-link page" href="#">Facturas pendientes</a></li>
				  <li class="page-item"><a class="page-link" href="historial.php?id_clt=<?php echo $id_clien ?>#cont">Historial de pagos</a></li>
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
		        <th>Ref.Alterna</th>
		        <th>Sin recargo hasta</th>
		        <th>Fecha l&iacute;mite de pago</th>
		        <th></th>
		        <th></th>
		      </tr>
		    </thead>

		    <?php
		    	foreach ($ejec_fac_prin as $row){
					$id = $row["id"];
					$ref = $row["ref"];
					$desc = $row["desc"];
					$deudor = $row["deudor"];
					$docdeudor = $row["docdeudor"];
					$refalt = $row["refalt"];
					$consecutivo = $row["consecutivo"];
					$iva = $row["iva"];
					$subtotal = $row["subtotal"];
					$valor = $row["valor"];
					$estado = $row["estado"];
					$fechacrea = $row["fechacrea"];
					$sinrec = $row["sinrec"];	
					$pagado = $row["pagado"];
					$id_cliente = $row["id_user"];							
		    ?>

		    <tbody>
		      <tr>
		        <td><?php echo $ref ?></td>
		        <td>COP <?php echo number_format($valor) ?></td>
		        <td><?php echo $desc ?></td>
		        <td><?php echo $refalt ?></td>
		        <td><?php echo $sinrec ?></td>
		        <td><?php echo $pagado ?></td>
		        <td><a href=""><button type="submit" style="border: none;" class="bbtn btn-primary btn-sm">Pagar</button></a></td>
		        <td><a class="ver" href="" class="btn btn-primary" data-toggle="modal" data-target="#myModal_<?php echo $id ?>">Ver detalle</a></td>
		      </tr>
		    </tbody>

		    <div class="modal" id="myModal_<?php echo $id ?>">
		    <div class="modal-dialog">
		      <div class="modal-content">
		      
		        <!-- Modal Header -->
		        <div class="modal-header">
		          <spam class="titulo">Detalles de la factura</spam>
		          <button type="button" class="close" data-dismiss="modal">&times;</button>
		        </div>
		        
		        <!-- Modal body -->
		        <div class="modal-body">
		        	<div class="row hid">					
						<div style="text-align: right;" class="col-md-5">
							<div class="infofc">Referencia</div>
							<div class="infofc">Descripci&oacute;n</div>
							<div class="infofc">Nombre del deudor</div>
							<div class="infofc">Documento del deudor</div>
							<div class="infofc">Ref. Alterna</div>
							<div class="infofc">Consecutivo</div>
							<div class="infofc">IVA</div>
							<div class="infofc">Subtotal</div>
							<div class="infofc">Valor</div>
							<div class="infofc">Estado</div>
							<div class="infofc">Fecha de craci&oacute;n</div>
							<div class="infofc">Sin recargo hasta</div>
							<div class="infofc">Pagado hasta</div>
						</div>
						<div class="col-md-7">
							<div class="infofct"><?php echo $ref ?></div>
							<div class="infofct"><?php echo $desc ?></div>
							<div class="infofct"><?php echo $deudor ?></div>
							<div class="infofct"><?php echo $docdeudor ?></div>
							<div class="infofct"><?php echo $refalt ?></div>
							<div class="infofct"><?php echo $consecutivo ?></div>
							<div class="infofct"><?php echo $iva ?></div>
							<div class="infofct">COP <?php echo number_format($subtotal) ?></div>
							<div class="infofct">COP <?php echo number_format($valor) ?></div>
							<div class="infofct"><?php echo $estado ?></div>
							<div class="infofct"><?php echo $fechacrea ?></div>
							<div class="infofct"><?php echo $sinrec ?></div>
							<div class="infofct"><?php echo $pagado ?></div>
						</div>					
			        </div>  

			        <div class="row hidd">					
						<div style="text-align: left;" class="col-md-12">
							<div class="infofc">Referencia: <?php echo $ref ?></div>
							<div class="infofc">Descripci&oacute;n: <?php echo $desc ?></div>
							<div class="infofc">Nombre del deudor: <?php echo $deudor ?></div>
							<div class="infofc">Documento del deudor: <?php echo $docdeudor ?></div>
							<div class="infofc">Ref. Alterna: <?php echo $refalt ?></div>
							<div class="infofc">Consecutivo: <?php echo $consecutivo ?></div>
							<div class="infofc">IVA: <?php echo $iva ?></div>
							<div class="infofc">Subtotal: COP <?php echo number_format($subtotal) ?></div>
							<div class="infofc">Valor: COP <?php echo number_format($valor) ?></div>
							<div class="infofc">Estado: <?php echo $estado ?></div>
							<div class="infofc">Fecha de craci&oacute;n: <?php echo $fechacrea ?></div>
							<div class="infofc">Sin recargo hasta: <?php echo $sinrec ?></div>
							<div class="infofc">Pagado hasta: <?php echo $pagado ?></div>
						</div>				
			        </div> 
		        </div>
		        
		        <!-- Modal footer -->
		        <div class="modal-footer">
		          <a href=""><button type="submit" style="border: none;" class="bbtn btn-primary btn-sm">Pagar</button></a>
		        </div>
		        
		      </div>
		    </div>
		  </div>

		    <?php } ?>

		  </table>
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