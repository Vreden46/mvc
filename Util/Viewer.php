<?php
namespace Util;

class Viewer
{

    public $pfad = [

        'artikel' => ['pfad' => 'Detail/Artikel/Allartikel.php'], 
        'start' => ['pfad' => 'Detail/Start/Viewstart.php'], 
        'home' => ['pfad' => 'Detail/Home/Viewhome.php'],
        'oneartikel' => ['pfad' => 'Detail/Artikel/Oneartikel.php'],
        'newartikel' => ['pfad' => 'Detail/Artikel/Newartikel.php'],
        'editartikel' => ['pfad' => 'Detail/Artikel/Editartikel.php'],
        'newuser' => ['pfad' => 'Detail/User/Newuser.php'],
        'login' => ['pfad' => 'Detail/User/Login.php']

    ];

    public function render(string $template, array $data = [], string $spezial = "kein")
    {   
        
        $templatepfad = $this->getpfad($template);
        extract($data, EXTR_SKIP);
        
        if ($spezial == "kein")
        {
                       
                $myssesion =  $this->sessionset();

            require "../View/Viewindex.php";
        
        }else
        {
            
            
            
            require "../View/Viewfehler.php";
        }
        

    }

    public function getpfad(string $template):string|bool
    {
        if (array_key_exists($template, $this->pfad)) 
        {
            return $this->pfad[$template]['pfad'];            
        }else
        {
            return false;
        }
    }

    public function redirect()
    {
        header('Location: http://' . $_SERVER['HTTP_HOST'] . '/', true, 303);
        exit;
    }

    public function sessionset()
    {
        if (isset($_SESSION['email'])) {
            return "Die Email-Adresse ist: " . $_SESSION['email'];
        } else {
            return "Keine Email-Adresse gesetzt.";
        }
    }

}