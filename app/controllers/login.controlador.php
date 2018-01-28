<?php
class Login {

	public static function ctrIniciarSesion($datos) {

		$datosController = array( "usuario" => $datos['usuario'],
								"clave" => $datos['clave']);

		//$login = new LoginModel();
		//$respuesta = $login->verificarDatos($datosController);
		$respuesta = LoginModel::mdlIniciarSesion($datosController);


		if(isset($respuesta->usuario_nombre)) {

			$clave = md5($datos['clave']);

			if($respuesta->usuario_clave == $clave ) {

				$_SESSION['usuario_id'] = $respuesta->usuario_id;
				$_SESSION['usuario_nombre'] = $respuesta->usuario_nombre; 
			    $_SESSION['usuario_avatar']= $respuesta->usuario_avatar;
				$_SESSION['acceso'] = 1;
				$_SESSION['validarSesionBackend'] = 'ok';
				$_SESSION['rol_id'] = $respuesta->rol_id;
				$_SESSION['rol_descripcion'] = $respuesta->rol_descripcion;

				$resp = new stdClass();
				$resp->estado = 1;
				$resp->type = 'success';
				$resp->mensaje = 'Bienvenido, '.$respuesta->usuario_nombre;

				echo json_encode($resp);
			}else {
				$resp = new stdClass();
				$resp->estado = 2;
				$resp->type = 'error';
				$resp->mensaje = 'Acceso denegado: Error al verificar los datos.';

				echo json_encode($resp);
			}

		}else {

			$resp = new stdClass();
			$resp->estado = 2;
			$resp->type = 'error';
			$resp->mensaje = 'Acceso denegado: Error al verificar los datos.';

			echo json_encode($resp);
		}

	}

}