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
	$id_fac = $_GET['id_fac'];	
	include("sql.php"); 
?>

	<div class="container">
		<div class="row" style="margin-top: 21px;">
			<div class="col-md-6">
				<img src="../imagenes/logofoot.png" class="img-responsive imgprin" alt="Responsive image">

				<div class="titapr">
					Transacci&oacute;n aprobada 					
				</div>
				<div class="pagdes">
					<span class="titdescint">Referencia: </span> <span class="descint"><?php echo $ref ?></span>
				</div>
				<div style="border-top:none;" class="pagdes">
					<span class="titdescint">Descripci&oacute;n: </span> <span class="descint"><?php echo $desc ?></span>
				</div>
				<div style="border-top:none;" class="pagdes">
					<span class="titdescint">fecha de pago: </span> <span class="descint">2018-07-28 21:09:23</span>
				</div>
				<div></div>
				<div class="titcop">
					<span class="tittot">Total pagado</span>					
					<div>
						COP $<?php echo number_format($valor) ?>
					</div>
				</div>
				<div style="margin-top:25px;">
					<p class="textoint">De ser necesario podra contactarnos en el correo admin@placetopay.com o al n&uacute;mero tele&oacute;nico +57 1111111111</p>
				</div>
			</div>
			<div class="col-md-6">
				<a href="historial.php?id_clt=<?php echo $id_cliente ?>#cont">
					<div class="volv">
						&larr; Volver al historial de pagos
					</div>
				</a>
				<a href="#">
					<div class="impr">
						Imprimir recibo
					</div>
				</a>

				<div class="titinf">
					Informaci&oacute;n del pago
				</div>
				<div style="margin-top:0px;" class="pagdesint">
					<span class="titinfint">N&uacute;mero de transacci&oacute;n: </span> <span class="descintinfo">1234567890</span>
				</div>
				<div style="border-top:none;" class="pagdesint">
					<span class="titinfint">Estado: </span> <span class="descintinfo"><?php echo $estado ?></span>
				</div>
				<div style="border-top:none;" class="pagdesint">
					<span class="titinfint">IVA: </span> <span class="descintinfo"><?php echo $iva ?></span>
				</div>
				<div style="border-top:none;" class="pagdesint">
					<span class="titinfint">Valor: </span> <span class="descintinfo">COP <?php echo number_format($valor) ?></span>
				</div>
				<div style="border-top:none;" class="pagdesint">
					<span class="titinfint">Banco: </span> <span class="descintinfo">Bancolombia</span>
				</div>
				<div style="border-top:none;" class="pagdesint">
					<span class="titinfint">Documento: </span> <span class="descintinfo"><?php echo $doc ?></span>
				</div>
				<div style="border-top:none;" class="pagdesint">
					<span class="titinfint">Nombre: </span> <span class="descintinfo"><?php echo $nombre ?></span>
				</div>
				<div style="border-top:none;" class="pagdesint">
					<span class="titinfint">Correo electronico: </span> <span class="descintinfo"><?php echo $email ?></span>
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