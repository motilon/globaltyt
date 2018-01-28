<?php
class LoginModel {

	public static function mdlIniciarSesion($datosModel) {

		$conexion=  FrameWork::getConexion();
		$sql = 'SELECT * FROM app_usuarios where usuario_login = "'.$datosModel['usuario'].'"';
		$resultados = $conexion->consultar($sql);
		$n = $resultados->getCantidad();
		$usuario = new stdClass();

		if($n>0) {
			$usuario = $resultados->get(0);
			$sql = 'select app_rol.* from app_usuarios_rol JOIN app_rol USING(rol_id) where usuario_id="'.$usuario->usuario_id.'" LIMIT 1 ';
			$rol = $conexion->consultar($sql);
			$nrol = $rol->getCantidad();
			if($nrol>0) {
				$usuario->rol_id = $rol->get(0)->rol_id;
				$usuario->rol_descripcion = $rol->get(0)->rol_descripcion;
			}
		}

		return $usuario;

	}

}
