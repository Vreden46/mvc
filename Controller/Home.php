<?php

namespace controller;
use Util\Viewer;
//use model\mypdoartikel as mypdoartikel;

class Home
{
    //public $viewer;


    public function __construct(private Viewer $viewer)
    {
        //$this->viewer = new Viewer;
    }

    public function indexd()
    {
        $h1 = "Heimseite";
        $p = "Ganz viel Heimseitentext!?!?!?!";
        //echo "Hello!";
        $this->viewer->render("home",[
            "Title" => "Home Deutsch",
            "h1" => $h1,
            "p" => $p
        ]);

    }

    public function indexe()
    {
        $h1 = "Home-site";
        $p = "Lots of home page text!?!?!?!";
        //echo "Hello!";
        $this->viewer->render("home",[
            "Title" => "Home English",
            "h1" => $h1,
            "p" => $p
        ]);
    }

}