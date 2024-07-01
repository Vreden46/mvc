<?php

use Util\Router;
use Util\Dispatcher;

if (isset($_SERVER["PATH_INFO"])){
    $request = $_SERVER["PATH_INFO"];
}else {
    $request = $_SERVER["REQUEST_URI"];
}

ini_set("display_errors", true);
require_once "../Loader/Autoloader.php";

/**
 * Sessions
 */
session_start();



$dispatcher = new Dispatcher($request);
$dispatcher->handle();
