<?php
###############################################################################
## Retorna nombres de meses en español
###############################################################################
function meses_espannol($mes) {
  settype($mes, "integer");
  switch($mes) {
    case 1:   { $cad = "Enero"; break; }
    case 2:   { $cad = "Febrero"; break; }
    case 3:   { $cad = "Marzo"; break; }
    case 4:   { $cad = "Abril"; break; }
    case 5:   { $cad = "Mayo";  break; }
    case 6:   { $cad = "Junio"; break; }
    case 7:   { $cad = "Julio"; break; }
    case 8:   { $cad = "Agosto";  break; }
    case 9:   { $cad = "Septiembre";  break; }
    case 10:  { $cad = "Octubre"; break; }
    case 11:  { $cad = "Noviembre"; break; }
    case 12:  { $cad = "Diciembre"; break; }
    }//switch
  return($cad);
}
function meses_espannol_abr($mes) {
  settype($mes, "integer");
  switch($mes) {
    case 1:   { $cad = "Ene"; break; }
    case 2:   { $cad = "Feb"; break; }
    case 3:   { $cad = "Mar"; break; }
    case 4:   { $cad = "Abr"; break; }
    case 5:   { $cad = "May"; break; }
    case 6:   { $cad = "Jun"; break; }
    case 7:   { $cad = "Jul"; break; }
    case 8:   { $cad = "Ago"; break; }
    case 9:   { $cad = "Sep"; break; }
    case 10:  { $cad = "Oct"; break; }
    case 11:  { $cad = "Nov"; break; }
    case 12:  { $cad = "Dic"; break; }
    }//switch
  return($cad);
}

function meses_espannol_abr_ing($mes) {
  settype($mes, "integer");
  switch($mes) {
    case 1:   { $cad = "Jan"; break; }
    case 2:   { $cad = "Feb"; break; }
    case 3:   { $cad = "Mar"; break; }
    case 4:   { $cad = "Apr"; break; }
    case 5:   { $cad = "May"; break; }
    case 6:   { $cad = "Jun"; break; }
    case 7:   { $cad = "Jul"; break; }
    case 8:   { $cad = "Aug"; break; }
    case 9:   { $cad = "Sep"; break; }
    case 10:  { $cad = "Oct"; break; }
    case 11:  { $cad = "Nov"; break; }
    case 12:  { $cad = "Dec"; break; }
    }//switch
  return($cad);
}
###############################################################################
## Retorna nombres de dias de la semana
###############################################################################
function diaSemana($dia) {
  settype($dia, "integer");
  switch($dia) {
    case 0:   { $cad = "Domingo";  break; }
    case 1:   { $cad = "Lunes";    break; }
    case 2:   { $cad = "Martes";   break; }
    case 3:   { $cad = "Miércoles";break; }
    case 4:   { $cad = "Jueves";   break; }
    case 5:   { $cad = "Viernes";  break; }
    case 6:   { $cad = "Sábado";   break; }
    }//switch
  return($cad);
}

function diaSemana_abr($dia) {
  settype($dia, "integer");
  switch($dia) {
    case 0:   { $cad = "Dom";  break; }
    case 1:   { $cad = "Lun";    break; }
    case 2:   { $cad = "Mar";   break; }
    case 3:   { $cad = "Mi&eacute;";break; }
    case 4:   { $cad = "Jue";   break; }
    case 5:   { $cad = "Vie";  break; }
    case 6:   { $cad = "S&aacute;b";   break; }
    }//switch
  return($cad);
}

###############################################################################
## Retorna fecha actual formateada (formato 1)
###############################################################################
function fechaActualFormato1() {
  $fechaActual  = mktime(gmdate("G")-5,gmdate("i"),gmdate("s"),gmdate("m"),gmdate("d"),gmdate("Y"));
  $dia    = date("d", $fechaActual);
  $mes    = meses_espannol(date("m", $fechaActual));
  $anno   = date("Y", $fechaActual);
  $diaSem   = diaSemana(date("w", $fechaActual));
  $hora   = date("g", $fechaActual);
  $min    = date("i", $fechaActual);
  $jornada  = date("a", $fechaActual);
  $fecha    = "$diaSem, $dia de $mes de $anno, $hora:$min $jornada";
  return ($fecha);
}#fechaActualFormato1

function fechaActualFormato2() {
  $fechaActual  = mktime(gmdate("G")-5,gmdate("i"),gmdate("s"),gmdate("m"),gmdate("d"),gmdate("Y"));
  $dia    = date("d", $fechaActual);
  $mes    = meses_espannol_abr(date("m", $fechaActual));
  $anno   = date("Y", $fechaActual);
  $diaSem   = diaSemana(date("w", $fechaActual));
  $hora   = date("g", $fechaActual);
  $min    = date("i", $fechaActual);
  $jornada  = date("a", $fechaActual);
  $fecha    = "$diaSem, $dia de $mes de $anno, $hora:$min $jornada";
  return ($fecha);
}#fechaActualFormato1

function fechaActualFormatoMySQL() {
  $fechaActual  = mktime(gmdate("G")-5,gmdate("i"),gmdate("s"),gmdate("m"),gmdate("d"),gmdate("Y"));
  $dia    = date("d", $fechaActual);
  $mes    = date("m", $fechaActual);
  $anno   = date("Y", $fechaActual);
  $hora   = date("G", $fechaActual);
  $min    = date("i", $fechaActual);
  $seg    = date("s", $fechaActual);
  $fecha    = "$anno-$mes-$dia";

  return ($fecha);

}#fechaActualFormatoMySQL

###############################################################################
## Retorna una fecha formateada (formato 2)
function fechaFormato2b($fechaP) {
###############################################################################
  $fechaP2 = strtotime($fechaP);
  $dia    = date("d", $fechaP2);
  $mes    = meses_espannol(date("m", $fechaP2));
  $anno   = date("Y", $fechaP2);
  $fecha    = "$dia/$mes/$anno";
  $fecha    = "$mes $dia / $anno";
  return ($fecha);

}#fechaFormato2

###############################################################################
## Retorna una fecha formateada (formato 2)
function fechaFormato2($fechaP) {
###############################################################################
  $fechaP2 = strtotime($fechaP);
  $dia    = date("d", $fechaP2);
  $mes    = meses_espannol(date("m", $fechaP2));
  $anno   = date("Y", $fechaP2);
  //$fecha    = "$mes $dia de $anno";
  $fecha    = "$dia $mes";
  return ($fecha);

}#fechaFormato2

###############################################################################
## Retorna una fecha formateada (formato 3)
function fechaFormato3($fechaP) {
###############################################################################
  $fechaP2 = strtotime($fechaP);
  $dia    = date("d", $fechaP2);
  $mes    = meses_espannol(date("m", $fechaP2));
  $anno   = date("Y", $fechaP2);
  //$fecha    = "$mes $dia de $anno";
  $fecha    = "$dia de $mes de $anno";
  return ($fecha);
}#fechaFormato3

function sinTildes($cadena) {
  $cadena = ereg_replace("á", "a", $cadena);
  $cadena = ereg_replace("é", "e", $cadena);
  $cadena = ereg_replace("í", "i", $cadena);
  $cadena = ereg_replace("ó", "o", $cadena);
  $cadena = ereg_replace("ú", "u", $cadena);
  $cadena = ereg_replace("Á", "A", $cadena);
  $cadena = ereg_replace("É", "E", $cadena);
  $cadena = ereg_replace("Í", "I", $cadena);
  $cadena = ereg_replace("Ó", "O", $cadena);
  $cadena = ereg_replace("Ú", "U", $cadena);
  $cadena = ereg_replace("Ñ", "NN", $cadena);
  $cadena = ereg_replace("ñ", "nn", $cadena);
  $cadena = ereg_replace("Ü", "U", $cadena);
  $cadena = ereg_replace("ü", "u", $cadena);
  return($cadena);
} // sinTildes

function tildesHTML($cadena) {
  $cadena = ereg_replace("á", "&aacute;", $cadena);
  $cadena = ereg_replace("é", "&aacute;", $cadena);
  $cadena = ereg_replace("í", "&iacute;", $cadena);
  $cadena = ereg_replace("ó", "&oacute;", $cadena);
  $cadena = ereg_replace("ú", "&uacute;", $cadena);
  $cadena = ereg_replace("Á", "&Aacute;", $cadena);
  $cadena = ereg_replace("É", "&Eacute;", $cadena);
  $cadena = ereg_replace("Í", "&Iacute;", $cadena);
  $cadena = ereg_replace("Ó", "&Oacute;", $cadena);
  $cadena = ereg_replace("Ú", "&Uacute;", $cadena);
  $cadena = ereg_replace("Ñ", "&Ntilde;", $cadena);
  $cadena = ereg_replace("ñ", "&ntilde;", $cadena);
  return($cadena);
} // sinTildes


###############################################################################
## Retorna una fecha formateada (formato 2)
function fechaFormatoAbrev($fechaP) {
###############################################################################
  $fechaP2 = strtotime($fechaP);
  $dia    = date("d", $fechaP2);
  $mes    = meses_espannol_abr(date("m", $fechaP2));
  $anno   = date("Y", $fechaP2);
  //$fecha    = "$dia/$mes/$anno";
  $fecha    = "$mes $dia, $anno";
  return ($fecha);

}#fechaFormato2

###############################################################################
## Retorna una fecha formateada (formato 2)
function fechaFormato4($fechaP) {
###############################################################################
  $fechaP2 = strtotime($fechaP);
  $dia    = date("d", $fechaP2);
  $mes    = meses_espannol(date("m", $fechaP2));
  $anno   = date("Y", $fechaP2);
  //$fecha    = "$dia/$mes/$anno";
  $fecha    = "$mes $dia, $anno";
  return ($fecha);

}#fechaFormato2


###############################################################################
## Retorna una fecha formateada (formato 2)
function fechaFormatoDDMMAbrev($fechaP) {
###############################################################################
  $fechaP2 = strtotime($fechaP);
  $dia    = date("d", $fechaP2);
  $mes    = meses_espannol_abr(date("m", $fechaP2));
  $anno   = date("Y", $fechaP2);
  //$fecha    = "$dia/$mes/$anno";
  $fecha    = "$dia $mes";
  return ($fecha);

}#fechaFormato2

function horaFormato1($hora)
{
 // hh:mm:ss.dddddd-05
 $t=explode("-",$hora);
 $hora=$t[0];
 $t1=explode(":",$hora);
 $mer=strcmp($t1[0],'12')==-1?"a.m":"p.m";
 $mn=explode(".",$t1[2]);
 $min=$mn[0];
 $hora=((($t1[0]%12)==0 && strcmp($mer,"p.m")==0)?"12":($t1[0]%12)).":".($t1[1]).$mer;
 return $hora;
}

###############################################################################
## Retorna una fecha formateada (formato 2)
function fechaFormatoSTIRPE($fechaP) {
###############################################################################
  $fechaP2 = strtotime($fechaP);
  $dia    = date("d", $fechaP2);
  $mes    = meses_espannol(date("m", $fechaP2));
  $anno   = date("Y", $fechaP2);
  $fecha    = "$dia de $mes";
  return ($fecha);

}#fechaFormato2

function fechaFormatoDiaSemana($fechaP) {
  $fechaP2  = strtotime($fechaP);
  $dia    = date("d", $fechaP2);
  $mes    = meses_espannol_abr(date("m", $fechaP2));
  $anno   = date("Y", $fechaP2);
  $diaSem   = diaSemana_abr(date("w", $fechaP2));
  $hora   = date("g", $fechaP2);
  $min    = date("i", $fechaP2);
  $jornada  = date("a", $fechaP2);
  $fecha    = "$diaSem, $dia de $mes de $anno, $hora:$min $jornada";
  //$fecha    = "$diaSem, $dia de $mes/$anno";
  return $fecha;
}
function fechaFormatoDiaSemana2($fechaP) {
  $fechaP2  = strtotime($fechaP);
  $dia    = date("d", $fechaP2);
  $mes    = meses_espannol_abr(date("m", $fechaP2));
  $anno   = date("Y", $fechaP2);
  $diaSem   = diaSemana_abr(date("w", $fechaP2));
  $hora   = date("g", $fechaP2);
  $min    = date("i", $fechaP2);
  $jornada  = date("a", $fechaP2);
  //$fecha    = "$diaSem, $dia de $mes de $anno, $hora:$min $jornada";
  $fecha    = "$diaSem, $dia de $mes/$anno";
  return $fecha;
}

function fechaCalendario($fechaP) {
  $fechaP2  = strtotime($fechaP);
  $dia    = date("d", $fechaP2);
  $mes    = meses_espannol_abr(date("m", $fechaP2));
  $anno   = date("Y", $fechaP2);
  $diaSem   = diaSemana_abr(date("w", $fechaP2));
//  $hora   = date("g", $fechaP2);
//  $min    = date("i", $fechaP2);
//  $jornada  = date("a", $fechaP2);
//  $fecha    = "$diaSem, $dia de $mes de $anno, $hora:$min $jornada";
  $fecha    = "<strong>$diaSem</strong> $mes $dia";
  return $fecha;
}

###############################################################################
## Retorna una fecha formateada (formato 1)
function fechaFormato($fechaP) {
###############################################################################
  $fecha_temp=explode(" ",$fechaP);
  $fecha=fechaFormatoAbrev($fecha_temp[0]);
  $hora=horaFormato1($fecha_temp[1]);
  return $fecha." ".$hora;

  /*$fechaP2  = strtotime($fechaP);
  $dia    = date("d", $fechaP2);
  $mes    = meses_espannol(date("m", $fechaP2));
  $anno   = date("Y", $fechaP2);
  $diaSem   = diaSemana(date("w", $fechaP2));
  $hora   = date("g", $fechaP2);
  $min    = date("i", $fechaP2);
  $jornada  = date("a", $fechaP2);
  $fecha    = "$diaSem, $dia de $mes de $anno, $hora:$min $jornada";
  return $fecha;*/

}#fechaFormato1

###############################################################################
## Retorna una fecha formateada (formato 1)
function fechaFormatoCupo($fechaP) {
###############################################################################
  $fecha_temp=explode(" ",$fechaP);
  $fecha=fechaFormatoDiaSemana2($fecha_temp[0]);
  $hora=$fecha_temp[1];
  return $fecha." ".$hora;
}#fechaFormato1

function calcularDias($fdesde,$fhasta) {
  $f1 = explode('-',$fdesde);
  $ano1 = $f1[0];
  $mes1 = $f1[1];
  $dia1 = $f1[2];

  $f2 = explode('-',$fhasta);
  $ano2 = $f2[0];
  $mes2 = $f2[1];
  $dia2 = $f2[2];

  //calculo timestam de las dos fechas
  $timestamp1 = mktime(0,0,0,$mes1,$dia1,$ano1);
  $timestamp2 = mktime(4,12,0,$mes2,$dia2,$ano2);

  //resto a una fecha la otra
  $segundos_diferencia = $timestamp1 - $timestamp2;
  //echo $segundos_diferencia;

  //convierto segundos en días
  $dias_diferencia = $segundos_diferencia / (60 * 60 * 24);

  //obtengo el valor absoulto de los días (quito el posible signo negativo)
  $dias_diferencia = abs($dias_diferencia);

  //quito los decimales a los días de diferencia
    //estaba floor pero pero en mi caso media dia es un dia
  $dias_diferencia = ceil($dias_diferencia);

  return $dias_diferencia;
}
