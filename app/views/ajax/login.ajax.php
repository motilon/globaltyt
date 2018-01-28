<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/private/config.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/clases/Framework.php';

require_once "../../inc/funciones_globales.php";

require_once "../../controllers/login.controlador.php"; 
require_once "../../models/login.modelo.php";

/*=============================================
Conexion
=============================================*/
$miFramework = new FrameWork($DBVARS);  
$db=$miFramework->getConexion();

/*=============================================
Saneamos las variables
=============================================*/
sanitiseVariables();



class AjaxLogin
{
	/*=============================================
	VALIDAR DATOS DE ENTRADA
	=============================================*/
	
	public $usuario;
	public $clave;

	public function ajaxValidarDatos() {

		$datos = array( "usuario" => $this->usuario,
				"clave" => $this->clave);
		$respuesta = Login::ctrIniciarSesion($datos);

		echo $respuesta;
	}

}

if(isset($_POST['frmLogin_usuario'])) {
	$login = new AjaxLogin();
	$login->usuario = $_POST['frmLogin_usuario'];
	$login->clave = $_POST['frmLogin_clave'];
	$login->ajaxValidarDatos();
}



