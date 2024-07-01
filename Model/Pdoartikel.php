<?php

namespace Model;
use Model\Main\Model;



class Pdoartikel extends Model
{
    protected $table = "blog";

    
    protected function validate(array &$data): void
    {
        if (empty($data["mainhaeder"])) {
            
            $this->addError("mainhaeder", "Eine Ueberschrift wird benötigt!");

        }

    }   

    
}