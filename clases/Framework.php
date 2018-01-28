<?php

/**
 * @package co.com.ingenio.php
 */
//function __autoload($class_name) {
//    require_once $class_name.'.php';
//}

/**
 * Clase que conforma un marco general de programacion para un proyecto php.
 * <p>
 * Este marco general define un conjunto de caracteristicas generales a la
 * aplicacion que son utilizadas por todas las clases del proyecto.
 * <p>
 * @author Francisco Jose Lizcano, <francisco.jose.lizcano.reyes@gmail.com>
 * @since 2010/09/15
 * @version 1.0
 * @package co.com.ingenio.php
 */

/**
 * Clase que conforma un marco general de programacion para un proyecto php.
 * <p>
 * Este marco general define un conjunto de caracteristicas generales a la
 * aplicacion que son utilizadas por todas las clases del proyecto.
 * <p>
 * @access public
 * @author Francisco Jose Lizcano, <francisco.jose.lizcano.reyes@gmail.com>
 * @since 2010/09/15
 * @version 1.0
 * @package co.com.ingenio.php
 */
class FrameWork {

    /**
     * Nombre del sitio al cual hace parte el marco de trabajo.
     * <p>
     * Este nombre de sitio debe ser el nombre de la caprta raiz en donde se
     * encuentra el archivo index.php que da la entrada al sitio web.
     * <p>
     * @access private
     * @static
     * @var String
     */
    private static $sitio = null;
    public static $servidor = null;
    public static $baseDeDatos = null;
    public static $usuario = null;
    public static $contrasena = null;
    public static $host = null;
    public static $puerto = null;

    /**
     * Ruta relativa hasta la raiz del sitio.
     * <p>
     * @access private
     * @static
     * @var String
     */
    private static $rootPath = "";

    /**
     * Conexion a la base de datos del sitio web al que pertenece el marco de
     * trabajo.
     * <p>
     * @access private
     * @static
     * @var Conexion
     */
    private static $conexion = null;

    /**
     * Ontiene la ruta relativa hasta la raiz del sitio web.
     * <p>
     * @access public
     * @author Francisco Jose Lizcano, <francisco.jose.lizcano.reyes@gmail.com>
     * @return String Ruta relativa hasta la raiz del sitio web
     * <p>
     */
    public static function getRootPath() {
        return (string) FrameWork::$rootPath;
    }

    /**
     * Obtiene la conexion a la base de datos del sitio web.
     * <p>
     * @access public
     * @author Francisco Jose Lizcano, <francisco.jose.lizcano.reyes@gmail.com>
     * @return ConexionMySQL Conexion a la base de datos del sitio web
     * <p>
     */
    public static function getConexion() {
        return FrameWork::$conexion;
    }

    /**
     * Este metodo se ejecuta siempre que sea lanzada una excepcion por el
     * sistema y esta no sea capturada explicitamente por el codigo fuente.
     * Devuelve la excepcion al cliente como una cadena en formato JSON.
     * <p>
     * @param AppException $excepcion Excepcion capturada por el sistema.
     * @access public
     * @static
     */
    public static function ManejarExcepcion(Exception $excepcion) {
        $json = new stdClass();
        $json->success = false;
        $json->estado = 0;
        $json->msg = $excepcion->getMessage();
        $json->archivo = $excepcion->getFile();
        $json->linea = $excepcion->getLine();
        if (get_class($excepcion) == "AppException") {
            $json->errors = $excepcion->getErrores();
        }

        if (ob_get_length() !== false) {
            ob_end_clean();
        }
        die(json_encode($json));
    }

    /**
     * Captura errores de usuario de php y los convierte en excepciones.
     * <p>
     * Los errores capturados son de tipo warning, notice y error, los
     * errores de sintaxis no son cpturados por esta funcion debido a que
     * php no permite su captura.
     * <p>
     * @param int $errno Codigo de error
     * @param string $errstr Descripcion del error
     * @param string $errfile Archivo donde se genera el error
     * @param int $errline Linea de codigo donde se genera el error
     * @return boolean
     */
    public static function ManejarError($errno, $errstr, $errfile, $errline) {
        throw new AppException($errstr . ', archivo:' . $errfile . ', linea: ' . $errline . ', numero:' . $errno);
    }

    /**
     *
     * Calculo en FrameWork::$rootPath la ruta relativa al sitio
     * @param type $sitio
     * @throws Exception
     */
    public static function crearRootPath($rutaAlRoot) {
        //FrameWork::$rootPath=$rutaAlRoot;
        FrameWork::$rootPath = $_SERVER['DOCUMENT_ROOT'];
    }

    /**
     * Establece si se deben o no mostrar los errores y si el manejador de
     * errores debe ser cambiado
     *
     * Si se muestran los errores, se muestra todo menos los deprecados
     *
     * @param type $mostrarErrores
     * @param type $cambiarmanejadorDeErrores
     */
    public static function mostrarErrores($mostrarErrores = true, $cambiarmanejadorDeErrores = true) {

        if ($mostrarErrores == true) {
            ini_set("display_errors", 1);
            error_reporting(E_ALL & ~E_DEPRECATED);
        }

        if ($cambiarmanejadorDeErrores == true) {
            set_exception_handler(array("FrameWork", "ManejarExcepcion"));
            set_error_handler(array("FrameWork", "ManejarError"));
        }
    }

    /**
     * Inicializa sesion php
     * @param type $creacionSesion
     */
    public static function iniciarSesion($creacionSesion = true) {
        $idSesion = session_id();
        if (empty($idSesion) && $creacionSesion)
            session_start();
    }

    /**
     * Establece la zona horaria por defecto
     * @param type $timeZone
     */
    public static function setTimezone($timeZone = 'America/Bogota') {
        date_default_timezone_set($timeZone);
    }

    /**
     * Crea una conexion a la base de datos a partir del archivo de
     * configuracion
     * @param type $archivoConfiguracion
     * @return ConexionPostgreSQL
     */
    public static function crearConexion() {
        require_once('ConexionMySQL.php');
        $nuevaConexion = new ConexionMySQL(FrameWork::$baseDeDatos, FrameWork::$usuario, FrameWork::$contrasena, FrameWork::$host, FrameWork::$puerto);

        return $nuevaConexion;
    }

    /**
     * Agrega un directorio al include path de php.
     * <p>
     * Al incluir un directorio al include path de php no se hace necesario
     * especificar la ruta completa de un archivo al llamar las funciones
     * include o requery, basta con solo especificar el nombre del archivo
     * para que php lo busque en los directorios del include path. Esta funcion
     * agrega al include path el directorio especificado y todos los sub
     * contenidos en el.
     * <p>
     * @access public
     * @static
     * @author Francisco Jose Lizcano, <francisco.jose.lizcano.reyes@gmail.com>
     * @param  String $directorio Directorio a agregar al include path
     * <p>
     */
    public static function agregarIncludePath($directorio) {
        if (!is_dir($directorio))
            throw new Exception("El directorio $directorio no existe o no es
                    valido, no se puede agregar al INCLUDE_PATH");

        @$recurso = opendir($directorio);
        if ($recurso == FALSE)
            throw new Exception("No fue posible abrir el directorio $directorio
                    para incluirlo al INCLUDE_PATH");

        set_include_path(get_include_path() . PATH_SEPARATOR . $directorio);
        //echo "agregado: $directorio<br>";
        do {
            @$archivo = readdir($recurso);
            //echo 'leido: '.$archivo.'<br>';
            if ($archivo != FALSE && $archivo != "." && $archivo != "..") {
                //echo "es dir?".$directorio.'/'.$archivo.": ";
                if (is_dir($directorio . '/' . $archivo)) {
                    //echo "Si<br>";
                    FrameWork::agregarIncludePath($directorio . '/' . $archivo);
                } else {
                    //echo "No<br>";
                }
            }
        } while ($archivo != FALSE);

        @closedir($recurso);
    }

    /**
     * Constructor de la clase.
     * <p>
     * Define algunas caracteristicas generales de sitio web creando asi un
     * marco de trabajo general para las clases usadas dentro del sitio web.
     * Entre las caracteristicas definidas estan la conexion general a la
     * base de datos, rutas relativas al sitio web, creación de una sesión de
     * trabajo php y otras caracteristicas.
     * <p>
     * @access public
     * @author Francisco Jose Lizcano, <francisco.jose.lizcano.reyes@gmail.com>
     * @param string $rutaAlRoot Ruta relativa al index
     */
    public function __construct($DBVARS) {
        require_once 'AppException.php';
        FrameWork::setTimezone('America/Bogota');
        FrameWork::mostrarErrores(true, true);
        FrameWork::iniciarSesion(true);
        FrameWork::crearRootPath('');
        FrameWork::agregarIncludePath(FrameWork::$rootPath . "/clases/");

        FrameWork::$host = isset($DBVARS['host']) ? $DBVARS['host'] : 'localhost';
        FrameWork::$puerto = isset($DBVARS['port']) ? $DBVARS['port'] : '3306';
        FrameWork::$baseDeDatos = isset($DBVARS['dbname']) ? $DBVARS['dbname'] : 'root';
        FrameWork::$usuario = isset($DBVARS['usuario']) ? $DBVARS['usuario'] : 'root';
        FrameWork::$contrasena = isset($DBVARS['clave']) ? $DBVARS['clave'] : 'root';

        FrameWork::$conexion = FrameWork::crearConexion();
    }

}

?>