<?php
function sanitise($string) {
    $string = filter_var($string,FILTER_SANITIZE_STRING);
    $string = mb_convert_encoding($string, 'UTF-8', 'UTF-8');
    $string = htmlentities($string, ENT_QUOTES, 'UTF-8');
	return $string;
}

function sanitiseVariables() {
	// Sanitise all POST requests:
	foreach ($_POST as $param_name => $param_val) {
	    $_POST[$param_name] = sanitise($param_val);
	}

	// Sanitise all GET requests:
	foreach ($_GET as $param_name => $param_val) {
	    $_GET[$param_name] = sanitise($param_val);
	}

	// Sanitise all cookies:
	foreach ($_COOKIE as $param_name => $param_val) {
	    $_COOKIE[$param_name] = sanitise($param_val);
	}

	// Sanitise all request variables:
	foreach ($_REQUEST as $param_name => $param_val) {
	    $_REQUEST[$param_name] = sanitise($param_val);
	}
}