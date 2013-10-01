<?php
/**
 * Index file. Autoload and fire Dispatch
 * 
 * @package Styfee
 */

include("config.inc.php");

\Ginger\Registry::set('Request', new \Ginger\Request());
\Ginger\Registry::get('Request')->go();
