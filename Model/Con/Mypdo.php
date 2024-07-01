<?php

namespace Model\Con;
use PDO;


class Mypdo{

    protected $pdo;

    public function __construct(private string $host,
                                private string $name,
                                private string $user,
                                private string $password)
    {

        $dsn = "mysql:host={$this->host};dbname={$this->name};charset=utf8;port=3306";

        $this->pdo = new PDO($dsn, $this->user, $this->password, [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]);
        

    }

}