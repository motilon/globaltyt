<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/private/config.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/clases/Framework.php';

/*=============================================
Conexion
=============================================*/
$miFramework = new FrameWork($DBVARS);  
$db=$miFramework->getConexion();

$id = isset($_GET['id']) ? filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT) : 0;

if($id<1) 
	header('Location: http://globaltyt.com/app');


$sql = 'SELECT * FROM travelcart WHERE id="'.$id.'" LIMIT 1';
$rsFormato = $db->consultar($sql);
$formato = $rsFormato->get(0);
?>

<!doctype html>
<html lang="en">
  <head>
  	<base href="http://globaltyt.com/">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="app/views/lib/font-awesome/css/font-awesome.css" rel="stylesheet">

    <title>Global</title>
  </head>
  <body>

    <div class="container">

    	<div class="row justify-content-center">
    		<div class="col-11">
				<!--=====================================
				=            Section comment            =
				======================================-->
				<div class="py-3 text-center">
					<img class="d-block mx-auto mb-4" src="http://globaltyt.com/app/views/img/logo_travel1.png" alt="" width="267" height="100">
				</div>

				<div class="row">
					<div class="col-sm-3">
						<label>Fecha</label>
						<div class="input-group">
						  <div class="input-group-prepend">
						    <span class="input-group-text" id="basic-addon1"><i class="fa fa-calendar" aria-hidden="true"></i></span>
						  </div>
						  <input type="text" class="form-control" placeholder="Fecha" aria-label="Fecha" aria-describedby="basic-addon1" value="<?php echo $formato->fecha; ?>">
						</div>
					</div>
					<div class="col-sm-3">
						<label>Hora de Entrada</label>
						<div class="input-group">
						  <div class="input-group-prepend">
						    <span class="input-group-text" id="basic-addon1"><i class="fa fa-clock-o" aria-hidden="true"></i></span>
						  </div>
						  <input type="text" class="form-control" aria-label="Fecha" aria-describedby="basic-addon1" value="<?php echo $formato->horaentrada; ?>">
						</div>
					</div>
					<div class="col-sm-3">
						<label>Hora de Salida</label>
						<div class="input-group">
						  <div class="input-group-prepend">
						    <span class="input-group-text" id="basic-addon1"><i class="fa fa-clock-o" aria-hidden="true"></i></span>
						  </div>
						  <input type="text" class="form-control" aria-label="Fecha" aria-describedby="basic-addon1">
						</div>
					</div>
					<div class="mb-3 col-12 col-sm-3">
						<label>Nro Registro</label>
					  	<input type="text" class="form-control text-center" name='tc-nroregistro' id='tc-nroregistro' readonly placeholder="No. Registro" value="<?php echo $formato->id; ?>">
					</div>
				</div>

				<div class="row mt-4">
					<div class="col-md-6 order-md-1">
					    <h4 class="mb-3">Invitado(a)</h4>
					    <form class="needs-validation" novalidate>
							<div class="form-group row">
								<label for="inputPassword" class="col-sm-2 col-form-label">Nombre</label>
								<div class="col-sm-10">
								  <input type="text" class="form-control" value="<?php echo $formato->nombre; ?>">
								</div>
							</div>

							<div class="form-group row">
								<label for="inputPassword" class="col-sm-2 col-form-label">Profesión</label>
								<div class="col-sm-10">
								  <input type="text" class="form-control" value="<?php echo $formato->profesion; ?>">
								</div>
							</div>

							<div class="form-group row">
								<label for="inputPassword" class="col-sm-2 col-form-label">Celular</label>
								<div class="col-sm-10">
								  <input type="text" class="form-control" value="<?php echo $formato->celular; ?>">
								</div>
							</div>

							<div class="form-group row">
								<label for="inputPassword" class="col-sm-2 col-form-label">Edad</label>
								<div class="col-sm-10">
								  <input type="text" class="form-control" value="<?php echo $formato->edad; ?>">
								</div>
							</div>
						</form>
					</div>
					<div class="col-md-6 order-md-1">
					    <h4 class="mb-3">Acompañante</h4>
					    <form class="needs-validation" novalidate>
							<div class="form-group row">
								<label for="inputPassword" class="col-sm-2 col-form-label">Nombre</label>
								<div class="col-sm-10">
								  <input type="text" class="form-control" value="<?php echo $formato->nombre_acomp; ?>">
								</div>
							</div>

							<div class="form-group row">
								<label for="inputPassword" class="col-sm-2 col-form-label">Profesión</label>
								<div class="col-sm-10">
								  <input type="text" class="form-control" value="<?php echo $formato->profesion_acomp; ?>">
								</div>
							</div>

							<div class="form-group row">
								<label for="inputPassword" class="col-sm-2 col-form-label">Celular</label>
								<div class="col-sm-10">
								  <input type="text" class="form-control" value="<?php echo $formato->celular_acomp; ?>">
								</div>
							</div>

							<div class="form-group row">
								<label for="inputPassword" class="col-sm-2 col-form-label">Edad</label>
								<div class="col-sm-10">
								  <input type="text" class="form-control" value="<?php echo $formato->edad_acomp; ?>">
								</div>
							</div>
						</form>
					</div>
				</div>
				<!--====  End of Section comment  ====-->

				<hr class="mb-4">

				<div class="row mt-4">
					<div class="col-md-3">
						<div class="row">
							<div class="col-12">
				                <label for="cc-name">Estado Civil</label>
				                <input type="text" class="form-control" value='<?php echo $formato->estadocivil; ?>'>
							</div>
							<div class="col-12 mt-2">
				                <label for="cc-name">Ingresos Mensuales</label>
				                <input type="text" class="form-control" value='<?php echo $formato->ingresos; ?>'>
							</div>
						</div>

					</div>
					<div class="col-md-4">
						<div class="row">
							<div class="col-12">
				                <label for="cc-name">Tarjetas de Crédito</label>
				                <input type="text" class="form-control" value='<?php echo $formato->tarjetas; ?>'>
							</div>
							<div class="col-12 mt-2">
				                <label for="cc-name">Banco</label>
				                <input type="text" class="form-control" value='<?php echo $formato->banco; ?>'>
							</div>
						</div>
					</div>
					<div class="col-md-5">

				          <div class="row mb-2">
				            <label class="col-sm-4 form-control-label">Liner: </label>
				            <div class="col-sm-8 mg-t-10 mg-sm-t-0">
				              <input type="text" class="form-control" name='tc-liner' id='tc-liner'>
				            </div>
				          </div><!-- row -->
				          <div class="row mb-2">
				            <label class="col-sm-4 form-control-label">Closer: </label>
				            <div class="col-sm-8 mg-t-10 mg-sm-t-0">
				              <input type="text" class="form-control" name='tc-closer' id='tc-closer'>
				            </div>
				          </div><!-- row -->

				          <div class="row mb-2">
				            <label class="col-sm-4 form-control-label">TMK: </label>
				            <div class="col-sm-8 mg-t-10 mg-sm-t-0">
				              <input type="text" class="form-control" name='tc-tmk' id='tc-nombre_acomp'>
				            </div>
				          </div><!-- row -->

					</div>
				</div>

				<hr class="mb-4">

				<div class="row justify-content-center">
					<div class="col-12">
			            <div class="custom-control custom-checkbox">
			              <input type="checkbox" class="custom-control-input" id="same-address">
			              <label class="custom-control-label text-small">Autoriza en forma libre a Global Tours & Travel SAC, y sus derivados a incluir los datos suministrados al banco de datos personales de la empresa con la finalidad de suministrar información comercial en todas sus modalidades de contacto según ley 29733 Art. 5 al 7.</label>
			            </div>
					</div>
				</div>

				<div class="row justify-content-center mt-5">
					<div class="col-12 col-sm-4">
						<br>
						<hr style="color:#000;">
						<label><strong>Firma:</strong></label><br>
						<label><strong>DNI:</strong></label>
					</div>
				</div>

    		</div>

    	</div>
		




		<footer class="my-5 pt-5 text-muted text-center text-small">
			<p class="mb-1">&copy; 2017-2018 Global Travel Tour</p>
		</footer>
    </div>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>

