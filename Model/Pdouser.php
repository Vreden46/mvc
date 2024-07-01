<?php

namespace Model;
use Model\Main\Model;



class Pdouser extends Model
{
    protected $table = "user";

    

    protected function validate(array &$data) //array als Referenz "Zeiger" übergeben, nicht als Kopie !!!!!
    {
        $password_hash = password_hash($data['password'], PASSWORD_DEFAULT);

        $data['password']= $password_hash;

    }

    function validateInput($input) {
        return filter_var($input, FILTER_VALIDATE_EMAIL) !== false;
    }

    public function pwcorrect($pw, $pwinput):bool
    {
        if (password_verify($pwinput, $pw)) {
            return true;
        } else {
            return false;
        }
    }

    
}