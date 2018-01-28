<?php

/**
 * @package co.com.ingenio.php.io
 * @subpackage io
 */
/**
 * Clase que representa una conexion a una base de datos albergada
 * en un servidor de base de datos MySQL.
 * <p>
 * @author Francisco Jose Lizcano, <francisco.jose.lizcano.reyes@gmail.com>
 * @since 2010/09/10
 * @version 1.0
 * @package co.com.ingenio.php.io
 * @subpackage io
 */
/**
 * Clase obstracta que representa una conexion a una fuente de datos
 * no especifica.
 * <p>
 * @author Francisco Jose Lizcano, <francisco.jose.lizcano.reyes@gmail.com>
 */
require_once('Conexion.php');

/**
 * Clase que representa un conjunto de registros obtenidos desde una
 * base de datos residente en un servidor MySQL.
 * <p>
 * @author Francisco Jose Lizcano, <francisco.jose.lizcano.reyes@gmail.com>
 */
require_once('RecordSetMySQL.php');

/**
 * Clase que representa una conexion a una base de datos albergada
 * en un servidor de base de datos MySQL.
 * <p>
 * @access public
 * @author Francisco Jose Lizcano, <francisco.jose.lizcano.reyes@gmail.com>
 * @since 2010/09/10
 * @version 1.0
 * @package co.com.ingenio.php.io
 * @subpackage io
 */
class ConexionMySQL extends Conexion {

    /**
     * Crea una conexion a una fuente de datos MySQL iniciando una
     * transaccion.
     * <p>
     * @access public
     * @author Francisco Jose Lizcano, <francisco.jose.lizcano.reyes@gmail.com>
     * @param  String $baseDeDatos Nombre de la base de datos a la cual se
     * pretende conectar
     * @param  String $usuario Nombre del usuario que tiene permiso de conexion
     * a la base de datos
     * @param  String $contrasena Contraseña del usuario que posee permiso de
     * conexion a la base de datos
     * @param  String $host Direccion IP o nombre del host que alberga el
     * servidor de bases de datos MySQL
     * @param  Integer $puerto [opcional]<p>
     * Numero del puerto por el cual se el servidor de bases de datos atiende
     * las petciones de conexion
     * <p>
     */
    public function __construct($baseDeDatos, $usuario, $contrasena, $host, $puerto = 3306) {
        parent::__construct();

        $this->conexion = mysqli_connect($host, $usuario, $contrasena, $baseDeDatos, $puerto);
        mysqli_set_charset($this->conexion, 'utf8');

        if ($this->conexion === FALSE)
            throw new Exception("No fue posible establecer conexion con la base el servidor MYSQL en $host:$puerto $usuario, $contrasena, base de datos $baseDeDatos");
    }

    /**
     * Destruye el objeto.
     * <p>
     * Si la conexion no se ha cerrado de manera explicita, el destructor
     * cierra la conexion aplicando una descarte a todas las operaciones
     * realizadas durante la ultima transaccion.
     * <p>
     * @access public
     * @author Francisco Jose Lizcano, <francisco.jose.lizcano.reyes@gmail.com>
     */
    public function __destruct() {
        $this->cerrar(FALSE);
    }

    /**
     * Cierra la conexion a la fuente de datos permitiendo la manipulacion de
     * la transaccion en curso.
     *
     * @access public
     * @author Francisco Jose Lizcano, <francisco.jose.lizcano.reyes@gmail.com>
     * @param  Boolean $aplicarCambios [opcional]<p>
     * Especifica si los cambios hechos a la base de datos durante la conexion
     * deben ser aplicados aplicando un COMMIT o un ROLLBACK sobre la
     * transaccion abierta durante la conexion.
     * <p>
     */
    public function cerrar() {
        if (!empty($this->conexion)) {
            if (mysqli_close($this->conexion) === FALSE)
                throw new Exception("No fue posible cerrar la conexion");
            $this->conexion = null;
        }
    }

    /**
     * @return RecordSetMySQL
     */
    public function consultar($sql) {
        $sql = trim(trim($sql), " ;");

        if (empty($sql))
            throw new Exception("La sentencia de consulta esta vacia");

        $resultado = mysqli_query($this->conexion, $sql);
        if ($resultado === FALSE)
            throw new Exception("No fue posible consultar: |$sql|");

        $recordSet = new RecordSetMySQL($resultado);
        mysqli_free_result($resultado);

        return $recordSet;
    }

    /**
     *
     * @param string $sql
     * @return int
     * @throws Exception
     */
    public function insertar($sql) {
        $sql = trim(trim($sql), " ;");

        if (empty($sql))
            throw new Exception("La sentencia de ejecucion esta vacia");

        $resultado = mysqli_query($this->conexion, $sql);

        if ($resultado === FALSE)
            throw new Exception("No fue posible consultar: |$sql|");

        return $this->getUltimoId();
    }

    /**
     *
     * @param string $sql
     * @return int
     * @throws Exception
     */
    public function ejecutar($sql) {
        $sql = trim(trim($sql), " ;");

        if (empty($sql))
            throw new Exception("La sentencia de ejecucion esta vacia");

        $resultado = mysqli_query($this->conexion, $sql);

        if ($resultado === FALSE)
            throw new Exception("No fue posible consultar: |$sql|");

        return $resultado;
    }

    public function borrar($sql) {
        $sql = trim(trim($sql), " ;");

        if (empty($sql))
            throw new Exception("La sentencia de ejecucion esta vacia");

        $resultado = mysqli_query($this->conexion, $sql);

        if ($resultado === FALSE)
            throw new Exception("No fue posible consultar: |$sql|");

        return $resultado;
    }

    /**
     *
     * @return int
     */
    public function getUltimoId() {
        return (int) mysqli_insert_id($this->conexion);
    }

}

?>