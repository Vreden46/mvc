<?php

namespace Controller;
use Model\Pdouser as Pdouser;
use Util\Viewer;

class User
{
    
    //public $viewer;
    //Public $Pdoartikel;


    public function __construct(private Viewer $viewer, private Pdouser $Pdouser)
    {
        //$this->viewer = new Viewer;
        //$this->Pdoartikel = new Pdoartikel();
    }

    
    public function newuser()
    {
    
        $id = "new";
        $this->viewer->render("newuser",[
            "Title" => "neuer User",
        ]);

    }

    public function create()
    {
    
        //check ob e_mail vorhanden
        $check = array(
           
            'email' => $_POST['user']['email']
            
          );
        $there = $_POST['user']['email'];

        if ($this->Pdouser->isthere($check, $there))
        {
            if ($this->Pdouser->validateInput($there))
            {
                if ($Artikels=$this->Pdouser->insert($_POST['user'])){

                    echo "User eingefügt";

                } else 
                {
                    echo "Fehler";
                }
            }else
            {
                echo "Bitte gültige E-Mail-Adresse eingeben!";
            }
        
        }else
        {
            echo "E-Mail schon vorhanden";   
        }
    }


    public function login()
    {
    
        


        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Überprüfen, ob die Formularfelder gesetzt sind und nicht leer sind
            if (!empty($_POST['user']['email']) && !empty($_POST['user']['password'])) {
                $email = $_POST['user']['email'];
                $password = $_POST['user']['password'];
        
                // Hier kannst du die weiteren Logik wie Validierung, Authentifizierung, etc. einfügen
                //echo "E-Mail: " . htmlspecialchars($email) . "<br>";
                //echo "Passwort: " . htmlspecialchars($password);

                
                $auth = array(
           
                    'email' => $_POST['user']['email'],
                    
                  );
                  
                  $there = $_POST['user']['email'];
                  $user=$this->Pdouser->findit($auth, $there);

                  var_dump($user);
                  if (!empty($user)) {
                        if ($this->Pdouser->pwcorrect($user[0]['password'],$_POST['user']['password'] ))
                        {
                            $_SESSION['email'] = $user[0]['email'];
                            $this->viewer->redirect();
                        }else
                        {
                            $id = "new";
                            $this->viewer->render("login",[
                            "Title" => "login",
                            "info" => "das Passwort ist falsch.",
                        ]);
                        }
                  }else
                  {
                    $id = "new";
                    $this->viewer->render("login",[
                    "Title" => "login",
                    "info" => "die Eingaben sind falsch.",
                    ]);
                  }
                
            } else {

                $id = "new";
                $this->viewer->render("login",[
                "Title" => "login",
                "info" => "Bitte füllen Sie alle Felder aus.",
                ]);
               
            }

        } else {
            $id = "new";
            $this->viewer->render("login",[
            "Title" => "login",
            "info" => "",
            ]);
        }

    }
    
}