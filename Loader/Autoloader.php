<?php

$rootDir = '/app/';


$autoload = function($className) use($rootDir){

   
    $fileName = str_replace('\\', '/', $className);
    
    if(is_file($rootDir.$fileName.'.php')){
        require_once $rootDir.$fileName.'.php';
    }
    
    
};

spl_autoload_register($autoload);

require_once "config.php";

