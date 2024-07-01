<?php

namespace Controller;
use Util\Viewer;
//use model\mypdoartikel as mypdoartikel;

class Start
{
    
    //public $viewer;


    public function __construct(private Viewer $viewer)
    {
        //$this->viewer = $viewerref;
    }

    public function start($start)
    {
        
        $this->viewer->render("start",[
            "Title" => "Bootstrap in Bad Arolsen",
            "start" => $start
        ]);
        
        
    }

    

}