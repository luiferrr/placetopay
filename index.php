
<!DOCTYPE html>
<html>
<head>
	<title>Consulta de factura</title>
	<link rel="icon" href="imagenes/favicon.png" sizes="32x32">
	
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minumum-scale=1.0">

	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

	<!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

    	<link rel="stylesheet" href="estilos/estilos.css" />
</head>
<body>
	<div class="container">
		<div class="row" style="margin-top: 10px;">
			<div style="margin: 0 auto;">
				<img src="imagenes/logo.png" class="img-responsive" alt="Responsive image">
			</div>
		</div>
	
		<div class="row">
			<div id="prin" class="col-md-12" style="margin-top:40px;">
				<spam class="titulo">Pagos electr&oacute;nicos</spam>
			</div>

			<div class="col-md-12" style="margin-top: 5px;">
				<p class="texto">Desde su casa, oficina o cualquier lugar, pague de forma segura a través de nuestro sistema de pago. Use nuestro servicio las 24 horas y los 7 días de la semana</p>
			</div>
		</div>

		<div class="border">
			<div class="divtit">
				Dig&iacute;te la siguiente informaci&oacute;n para continuar el proceso de pago.
			</div>
			<div style="padding: 17px;">
				<form action="php/validar.php" method="post">

				  <div class="form-group">
				    <label for="documento"></label>
				    <input type="text" class="form-control box"name="docdeudor" id="documento" placeholder="Documento">
				  </div>

				  <div class="form-group">
				    <label for="referencia"></label>
				    <input type="number" class="form-control box"name="ref" id="referencia" placeholder="Referencia">
				  </div>
				  				  	
		            <?php 
		              if (isset($_GET['error1'])) {
		            ?>  
			            <div class="col-md-5 er">	
				            <?php
				                echo $_GET['error1'];
				            ?>
			            </div>
		            <?php    
		              }else if (isset($_GET['error2'])) {
		            ?>  
		            	<div class="col-md-5 er">	
			            	<?php  	
		                		echo $_GET['error2'];
		            		?>
		            	</div>
		            <?php    		
		              }
		            ?>
		          

				  <button type="submit" style="border: none;" class="bbtn btn-primary btn-sm">Ingresar</button>

				</form>
			</div>
		</div>

		<div class="row foot">
			<div class="col-md-6">
				<img style="float:left;" src="imagenes/logofoot.png">
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