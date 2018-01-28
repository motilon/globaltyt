<?php

/**
 * @package co.com.ingenio.php.io
 * @subpackage io
 */
/**
 * Clase que representa un conjunto de registros obtenidos desde una
 * base de datos residente en un servidor MySQL.
 * <p>
 * @author Francisco Jose Lizcano, <francisco.jose.lizcano.reyes@gmail.com>
 * @since 2010/09/15
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
 * Clase que representa un conjunto de registros obtenidos desde una
 * base de datos residente en un servidor MySQL.
 * <p>
 * @access public
 * @author Francisco Jose Lizcano, <francisco.jose.lizcano.reyes@gmail.com>
 * @since 2010/09/15
 * @version 1.0
 * @package co.com.ingenio.php.io
 * @subpackage io
 */
class RecordSetMySQL extends RecordSet {

    public static $types;

    /**
     * Constructor de la clase.
     * <p>
     * Crea un record set a aprtir de un recurso de resultados devuelto por una
     * conexion a una base de datos MySQL.
     * <p>
     * @access public
     * @author Francisco Jose Lizcano, <francisco.jose.lizcano.reyes@gmail.com>
     * @param  resource $recurso Recurso devuelto por una consulta a base de
     * datos MySQL
     * <p>
     */
    public function __construct($recurso) {
        parent::__construct();

        $this->cantidadCampos = mysqli_num_fields($recurso);
        for ($i = 0; $i < $this->cantidadCampos; $i++) {
            $this->campos[] = mysqli_fetch_field($recurso);
        }

        $this->cantidad = mysqli_num_rows($recurso);
        if ($this->cantidad > 0) {
            $this->numeroCampos = mysqli_num_fields($recurso);
            if (empty($this->numeroCampos))
                throw new Exception("No fue posible contar el numero de compos del record set");
        }

        for ($i = 0; $i < $this->cantidad; $i++) {
            $this->registros[$i] = mysqli_fetch_object($recurso);
            for ($k = 0; $k < $this->cantidadCampos; $k++) {
                $nombreCampo = $this->campos[$k]->name;

                if (RecordSetMySQL::type2text($this->campos[$k]->type) == 'BIT' || RecordSetMySQL::type2text($this->campos[$k]->type) == 'SHORT' || RecordSetMySQL::type2text($this->campos[$k]->type) == 'LONG' || RecordSetMySQL::type2text($this->campos[$k]->type) == 'LONGLONG' || RecordSetMySQL::type2text($this->campos[$k]->type) == 'INT24') {
                    $this->registros[$i]->$nombreCampo = (int) $this->registros[$i]->$nombreCampo;
                    continue;
                }

                if (RecordSetMySQL::type2text($this->campos[$k]->type) == 'FLOAT' || RecordSetMySQL::type2text($this->campos[$k]->type) == 'DOUBLE' || RecordSetMySQL::type2text($this->campos[$k]->type) == 'DECIMAL' || RecordSetMySQL::type2text($this->campos[$k]->type) == 'NEWDECIMAL') {
                    $this->registros[$i]->$nombreCampo = (double) $this->registros[$i]->$nombreCampo;
                    continue;
                }
            }
        }
    }

    public static function type2text($type_id) {
        if (!isset(RecordSetMySQL::$types)) {
            RecordSetMySQL::$types = array();
            $constants = get_defined_constants(true);
            foreach ($constants['mysqli'] as $c => $n)
                if (preg_match('/^MYSQLI_TYPE_(.*)/', $c, $m))
                    RecordSetMySQL::$types[$n] = $m[1];
        }

        return array_key_exists($type_id, RecordSetMySQL::$types) ? RecordSetMySQL::$types[$type_id] : NULL;
    }

}

?>