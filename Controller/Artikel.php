<?php

namespace Controller;
use Model\Pdoartikel as Pdoartikel;
use Util\Viewer;

class Artikel
{
    
    //public $viewer;
    //Public $Pdoartikel;


    public function __construct(private Viewer $viewer, private Pdoartikel $Pdoartikel)
    {
        //$this->viewer = new Viewer;
        //$this->Pdoartikel = new Pdoartikel();
    }

    public function index()
    {
    
        $id = "all";
        $Artikels=$this->Pdoartikel->getArtikels();
        $this->viewer->render("artikel",[
            "Title" => "alle Artikel",
            "Artikels" => $Artikels,
            "id" => $id
        ]);

    }

    public function showone($number)
    {
        
        $id = $number;
        $Artikels=$this->Pdoartikel->getOneArtikel($id);
        $this->viewer->render("oneartikel",[
            "Title" => "Artikel",
            "Artikels" => $Artikels,
            "id" => $id
        ]);

    }

    public function edit($number)
    {
        
        $id = $number;
        $Artikels=$this->Pdoartikel->getOneArtikel($id);
        $this->viewer->render("editartikel",[
            "Title" => "Artikel bearbeiten",
            "Artikels" => $Artikels,
            "id" => $id,
            "errors" => "Mainhaeder darf nicht leer sein",
            "status" => "edit"
        ]);

    }

    public function safe($number)
    {
        
        $id = $number;
        //var_dump($_POST['feld']);
        //var_dump($id);


        if ($Artikels=$this->Pdoartikel->update($id, $_POST['feld'])){

            $Artikels=$this->Pdoartikel->getOneArtikel($id);
            $this->viewer->render("oneartikel",[
            "Title" => "speichern",
            "Artikels" => $Artikels,
            "id" => $id
        ]);

        } else 
        {
            $errors=$this->Pdoartikel->getErrors();
            $errors=$errors['mainhaeder'];
            $this->viewer->render("editartikel",[
            "errors" => $errors,
            "id" => $id
        ]);
        }
        

    }

    public function newone()
    {
    
        $id = "new";
        $this->viewer->render("newartikel",[
            "Title" => "neuer Artikel",
            "errors" => "Mainhaeder darf nicht leer sein",
            "id" => $id
        ]);

    }

    public function create()
    {
        $id = "new";

        //$Artikels=$this->Pdoartikel->insert($_POST['feld']); 
        //echo $Artikels;

        if ($Artikels=$this->Pdoartikel->insert($_POST['feld'])){

            $id = $this->Pdoartikel->getLastID();
            $Artikels=$this->Pdoartikel->getOneArtikel($id);
            $this->viewer->render("oneartikel",[
            "Title" => "Artikel erstellen",
            "Artikels" => $Artikels,
            "id" => $id
        ]);

        } else 
        {
            $errors=$this->Pdoartikel->getErrors();
            $errors=$errors['mainhaeder'];
            $id = "new";
            $this->viewer->render("newartikel",[
            "errors" => $errors,
            "id" => $id
        ]);
        }

    }

    public function delete($id){

        $referrer = $_SERVER['HTTP_REFERER'];
        $lastSegment = basename($referrer); // Den letzten Teil der URL extrahieren (in diesem Fall "8")
        $baseUrl = str_replace("/$lastSegment", "",$referrer);
        
        $tempid = $id;
        if ($baseUrl === 'http://localhost/home/artikelone')
        {
            if ($Artikels=$this->Pdoartikel->delete($id))
            {
                
                $id = "all";
                $Artikels=$this->Pdoartikel->getArtikels();
                $this->viewer->render("artikel",[
                "Title" => "Artikel löschen",
                "Artikels" => $Artikels,
                "id" => $id
            ]);
            }else
            {
                echo "Artikel konnte nicht gelöscht werden!";
            }
        }else
        {
            echo "noop!";
        }
    }
}