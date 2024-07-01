<?php
namespace Util;

class Router 
{
    public $domaen = "http://localhost";
    public $replacement = '{id}';
    public $id;

    public $routes = [

        '/home/D' => ['Controller' => 'Home', 'Action' => 'indexd', 'stufe' => 0, 'name' => "Home (deutsch)"], 
        '/home/E' => ['Controller' => 'Home', 'Action' => 'indexe', 'stufe' => 0, 'name' => "Home (english)"], 
        '/home/artikelone/{id}' => ['Controller' => 'Artikel', 'Action' => 'showone', 'stufe' => 1, 'name' => "Artikel"],
        '/home/artikelall' => ['Controller' => 'Artikel', 'Action' => 'index', 'stufe' => 0, 'name' => "alle Artikel"],
        '/home/artikelnew' => ['Controller' => 'Artikel', 'Action' => 'newone', 'stufe' => 0, 'name' => "neuer Artikel"],
        '/home/artikelcreate' => ['Controller' => 'Artikel', 'Action' => 'create', 'stufe' => 1, 'name' => "neuer Artikel"],
        '/home/artikeledit/{id}' => ['Controller' => 'Artikel', 'Action' => 'edit', 'stufe' => 1, 'name' => "bearbeite Artikel"],
        '/home/artikelsafe/{id}' => ['Controller' => 'Artikel', 'Action' => 'safe', 'stufe' => 1, 'name' => "bearbeite Artikel"],
        '/home/artikeldelete/{id}' => ['Controller' => 'Artikel', 'Action' => 'delete', 'stufe' => 1, 'name' => "bearbeite Artikel"],
        '/home/usernew' => ['Controller' => 'User', 'Action' => 'newuser', 'stufe' => 0, 'name' => "neuer User"],
        '/home/usercreate' => ['Controller' => 'User', 'Action' => 'create', 'stufe' => 1, 'name' => "User speichern"],
        '/home/login' => ['Controller' => 'User', 'Action' => 'login', 'stufe' => 0, 'name' => "Login"],
    
    ];
    
    public $actroute = [];
    
    public function __construct($route) {
        
        $route = $this->changepath($route);
        
        if (array_key_exists($route, $this->routes)) 
        {
            $controller = $this->routes[$route]['Controller'];
            $action = $this->routes[$route]['Action'];
            $this->actroute[] = $controller;
            $this->actroute[] = $action;
            $this->actroute[] = $this->id;
        }
        

        //$this->sendroute();

        
    }

    public function sendroute():array|bool
        {
            
            if (empty($this->actroute[0])) {
                return false;
            }else
            {
                return $this->actroute;
            }
            
            //return $this->actroute;
        }   
        
    
    public function matchreg(string $path): array|bool
    {
        $pattern = "#^/(?<controller>[a-z]+)/(?<action>[a-z]+)$#";

        if (preg_match($pattern, $path, $matches)) {

            $matches = array_filter($matches, "is_string", ARRAY_FILTER_USE_KEY);

            return $matches;
        }

        return false;
    }
    
    public function links($stufe): array
    {
        $linkArray = [];

        foreach ($this->routes as $route => $details) {
            if ($details['stufe'] === $stufe) {
                $linkArray[] = [$this->domaen.$route, $details['name']];
            }
        }

        return $linkArray;
    }
    
    public function changepath(string $path, $replacement = '{id}')
    {
        //$path = "/home/artikelone/756754/hgf";
        //$replacement = '{id}';

        $pattern = '/\/\d+/';

        if (preg_match($pattern, $path, $matches)) {
            $this->id = substr($matches[0], 1);
            $searchstring = str_replace($this->id, $replacement, $path);
            return $searchstring;
        } else {
            return $path;
        }

    }
    


}