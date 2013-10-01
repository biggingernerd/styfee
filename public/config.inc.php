<?php
/**
 * Base config values
 * 
 * @package Styfee
 */

define('BASEPATH', realpath(dirname(__FILE__))."/..");

$includePaths = array(
		BASEPATH."/vendor/",
		BASEPATH."/library/",
);

// Set include path & Register autoload
set_include_path(implode(PATH_SEPARATOR, $includePaths)); 
spl_autoload_register(function($c){@include preg_replace('#\\\|_(?!.+\\\)#','/',$c).'.php';}); include 'autoload.php';

function exception_handler($exception) {
	\Ginger\Response::$Status = $exception->getCode();
	if(\Ginger\Response::$Status == 0)
	{
		\Ginger\Response::$Status = 500;
	}
	
	\Ginger\Response::$Data = array("message" => $exception->getMessage());
	
	$request		= new \Ginger\Request(false);
	$response		= new \Ginger\Response($request);
	
}

set_exception_handler('exception_handler');
