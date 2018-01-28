<?php
/**
 * @package co.com.ingenio.php.io
 * @subpackage io
 */
/**/
/**
 * Clase obstracta que representa una conexion a una fuente de datos
 * no especifica.
 * <p>
 * @author Francisco Jose Lizcano, <francisco.jose.lizcano.reyes@gmail.com>
 * @since 2010/09/10
 * @version 1.0
 * @package co.com.ingenio.php.io
 * @subpackage io
 */

/**
 * Clase obstracta que representa un conjunto de registros obtenidos desde una
 * fuente de datos.
 * <p>
 * @author Francisco Jose Lizcano, <francisco.jose.lizcano.reyes@gmail.com>
 */
require_once('RecordSet.php');

/**
 * Clase obstracta que representa una conexion a una fuente de datos
 * no especifica.
 * <p>
 * @abstract
 * @access public
 * @author Francisco Jose Lizcano, <francisco.jose.lizcano.reyes@gmail.com>
 * @since 2010/09/10
 * @version 1.0
 * @package co.com.ingenio.php.io
 * @subpackage io
 */

abstract class Conexion{
    /**
     * Recurso de conexion.
     * <p>
     * @access protected
     * @var resource
     */
    protected $conexion = null;
    /**
     * Ultimo conjunto de registros accedido por la conexion a la fuente de
     * datos.
     * <p>
     * @access protected
     * @var RecordSet
     */
    protected $ultimosRegistros = null;

    /**
     * Nombre de la base de datos a la cual se esta conectando
     * <p>
     * @var string
     */
    protected $baseDeDatos=null;

    /**
     * Contructor de la clase.
     * <p>
     * Inicializa los atributos de la clase.
     * <p>
     * @access public
     * @author Francisco Jose Lizcano, <francisco.jose.lizcano.reyes@gmail.com>
     */
    public function __construct(){
        $this->conexion=null;
        $this->ultimosRegistros=null;
        $this->baseDeDatos="No Definida";
    }

    /**
     * Retorna el nombre de la base de datos a la que se esta conectado
     * <p>
     * @return string
     */
    public function getBaseDeDatos(){
        return $this->baseDeDatos;
    }

    /**
     * Obtiene el ultimo conjunto de datos accedido por la conexion a la fuente
     * datos.
     * <p>
     * @access public
     * @author Francisco Jose Lizcano, <francisco.jose.lizcano.reyes@gmail.com>
     * @return RecordSet
     */
    public function getUltimosRegistros(){
        return $this->ultimosRegistros;
    }

    /**
     * Ejecuta una consultaSQL sobre la fuente de datos.
     * <p>
     * La sentencia ejecutada debe correponder a un SELECT segun el standar
     * SQL. Para ejecucion de inserciones, actualizaciones y eliminaciones de
     * registros se debe usar el metodo Ejecutar de la clase.
     * <p>
     * @abstract
     * @access public
     * @author Francisco Jose Lizcano, <francisco.jose.lizcano.reyes@gmail.com>
     * @param  string $sql Sentencia SQL que define la consulta a la fuente de
     * datos.
     * <p>
     * @return RecordSet
     */
    public abstract function consultar($sql);

    /**
     * Ejecuta una insercion, actualizacion o borrado de registros sobre la
     * de datos.
     * <p>
     * @abstract
     * @access public
     * @author Francisco Jose Lizcano, <francisco.jose.lizcano.reyes@gmail.com>
     * @param  string $sql Sentencia SQL que define la ejecucion. Esta debe
     * corresponder un UPDATE, INSERT o DELETE segun el standar SQL.
     * <p>
     * @return int Numero de registros afectados por la sentencia SQL
     */
    public abstract function ejecutar($sql);

    /**
     * Obtiene el recurso de conexoin nativo a la base de datos
     *
     * @return resourse
     */
    public function getConexion(){
        return $this->conexion;
    }
/**/
}
?>