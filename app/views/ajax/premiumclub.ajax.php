<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/private/config.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/clases/Framework.php';

require_once "../../inc/funciones_globales.php";
require_once "../../inc/perf_sql.php";

/*=============================================
Conexion
=============================================*/
$miFramework = new FrameWork($DBVARS);  
$db=$miFramework->getConexion();

/*=============================================
Saneamos las variables
=============================================*/

$fecha = isset($_POST['tc-fecha']) ? filter_var($_POST['tc-fecha'],FILTER_SANITIZE_STRING) : '';
$horaentrada = isset($_POST['tc-horaentrada']) ? filter_var($_POST['tc-horaentrada'],FILTER_SANITIZE_STRING) : '';
$horasalida = isset($_POST['tc-horasalida']) ? filter_var($_POST['tc-horasalida'],FILTER_SANITIZE_STRING) : '';
$nroregistro = isset($_POST['tc-nroregistro']) ? filter_var($_POST['tc-nroregistro'],FILTER_SANITIZE_STRING) : '';


$nombre = isset($_POST['tc-nombre']) ? filter_var($_POST['tc-nombre'],FILTER_SANITIZE_STRING) : '';
$profesion = isset($_POST['tc-profesion']) ? filter_var($_POST['tc-profesion'],FILTER_SANITIZE_STRING) : '';
$celular = isset($_POST['tc-celular']) ? filter_var($_POST['tc-celular'],FILTER_SANITIZE_STRING) : '';
$edad = isset($_POST['tc-edad']) ? filter_var($_POST['tc-edad'],FILTER_SANITIZE_STRING) : '';

$nombre_acomp = isset($_POST['tc-nombre_acomp']) ? filter_var($_POST['tc-nombre_acomp'],FILTER_SANITIZE_STRING) : '';
$profesion_acomp = isset($_POST['tc-profesion_acomp']) ? filter_var($_POST['tc-profesion_acomp'],FILTER_SANITIZE_STRING) : '';
$celular_acomp = isset($_POST['tc-celular_acomp']) ? filter_var($_POST['tc-celular_acomp'],FILTER_SANITIZE_STRING) : '';
$edad_acomp = isset($_POST['tc-edad_acomp']) ? filter_var($_POST['tc-edad_acomp'],FILTER_SANITIZE_STRING) : '';

$estadocivil = isset($_POST['tc-estadocivil']) ? filter_var($_POST['tc-estadocivil'],FILTER_SANITIZE_STRING) : '';
$ingresos = isset($_POST['tc-ingresos']) ? filter_var($_POST['tc-ingresos'],FILTER_SANITIZE_STRING) : '';

$v_tarjetas = array();
$str_tarjetas = '';


if(!empty($_POST['tc_tarjeta'])) {
	foreach ($_POST['tc_tarjeta'] as $tarjeta) {
		$v_tarjetas[] = $tarjeta;
	}

	$str_tarjetas = implode(',',$v_tarjetas);
}

$banco =  isset($_POST['tc-banco']) ? filter_var($_POST['tc-banco'],FILTER_SANITIZE_STRING) : '';


$cols = get_commas(false,'fecha','horaentrada','horasalida','nroregistro','nombre','profesion','celular','edad','nombre_acomp','profesion_acomp','celular_acomp','edad_acomp','estadocivil','ingresos','tarjetas','banco');

$vals = get_commas(true,$fecha,$horaentrada,$horasalida,$nroregistro,$nombre,$profesion,$celular,$edad,$nombre_acomp,$profesion_acomp,$celular_acomp,$edad_acomp,$estadocivil,$ingresos,$str_tarjetas,$banco);

$sql=get_insert('travelcart', $cols, $vals);
$id= $db->insertar($sql);

echo $id; 



