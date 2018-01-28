<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'].'/private/config.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/clases/Framework.php';
require_once 'inc/funciones_fecha.php';
require_once 'inc/funciones_globales.php';
require_once 'inc/config_app.php';
//$miFramework = new FrameWork($DBVARS);    
//$db=$miFramework->getConexion();

include 'views/template.php';