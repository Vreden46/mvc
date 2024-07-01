<?php

namespace Util;
use ReflectionMethod;
use ReflectionClass;

class Dispatcher
{
    public $params;
    public $router; //Variable für RouterKlasse !?!?!
    public $Container; // Variable für den Container

    public function __construct($request) {
        
        $this->router = new Router($request);
        $this->params = $this->router->sendroute();
        $this->Container = new Container;
        $this->Container->set(\Model\Pdoartikel::class, function() {

            return new \Model\Pdoartikel(HOST, DATABASE, USER, PW);
        
        });
        $this->Container->set(\Model\Pdouser::class, function() {

            return new \Model\Pdouser(HOST, DATABASE, USER, PW);
        
        });

        
    }
    
    public function handle ()
    {

        if ($this->params === false) {

            //echo "Start<br>";
            //exit("No route matched");
            $controller_object = new \Controller\Start(new Viewer);
            $controller_object->start($this->router->links(0));
            
        
        }else
        {
            $controller = "Controller\\" . ucwords($this->params[0]);
            $action = $this->params[1];
            
            $args = $this->getActionArguments($controller, $action, $this->params[2]);
            
            $controller_object = $this->Container->get($controller);

            //$output = new $controller_object;
            $controller_object->$action(...$args);
        }
        
    }


    private function getActionArguments(string $controller, string $action, $value): array
    {
        $args = [];
        
        $method = new ReflectionMethod($controller, $action);

        foreach ($method->getParameters() as $parameter) {

            $name = $parameter->getName();

            $args[$name] = $value;

        }

        return $args;
    }

    

}