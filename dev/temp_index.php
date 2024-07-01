<?php
    ini_set("display_errors", true);
    require_once "loader/autoloader.php";

    //use controller\mycontrollerartikel as mycontrollerartikel;
    //use controller\mycontrollerhome as mycontrollerhome;

    $controller = $_GET["controller"];
    $action = $_GET["action"];

    $controller = "controller\\" . $controller;

    $output = new $controller;
    $output->$action();





    
    


