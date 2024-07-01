<?php

namespace Model\Main;
use PDO;



abstract class Model extends \Model\Con\Mypdo
{
    protected $table;

    //*********Validation********/
    protected array $errors = [];

    protected function validate(array &$data) //array als Referenz "Zeiger" übergeben, nicht als Kopie !!!!!
    {
    }

    protected function addError(string $field, string $message): void
    {
        $this->errors[$field] = $message;
    }

    public function getErrors(): array
    {
        return $this->errors;
    }

    function validateInput($input) {
        
    }
    //*********Modelinfos********/
    private function getTable(): string
    {
        if ($this->table !== null) {

            return $this->table;

        }
    }

    public function getLastID(): string
    {
        $conn = $this->pdo->lastInsertId();
        return $conn;
    }

    //********Databasefunction*******/
    function getArtikels():array
    {
        
        if (!empty($this->pdo)){
        $table = $this->getTable();
            $Artikels = $this->pdo->prepare("SELECT * FROM `$table`");
            $Artikels->execute();
        }
        return $Artikels->fetchAll(PDO::FETCH_ASSOC);
    }

    function getOneArtikel($id):array
    {
        
        if (!empty($this->pdo)){
        $table = $this->getTable();
            $Artikel = $this->pdo->prepare("SELECT * FROM `$table` WHERE `ID` = :ID");
            $Artikel->execute([
                'ID' => $id
            ]);
        }
        return $Artikel->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insert(array $data): bool
    {
        var_dump($data);
        echo "<br>";
        $this->validate($data);
        echo "Nach Validtate:<br>";
        var_dump($data);

        if ( ! empty($this->errors)) {
            return false;
        }
        
        $table = $this->getTable();
        /*$sql = "INSERT INTO `$table` (mainhaeder, haeder, text, link, pic)
                VALUES (?, ?, ?, ?, ?)";*/

        $columns = implode(", ", array_keys($data));
        $placeholders = implode(", ", array_fill(0, count($data), "?"));

        $sql = "INSERT INTO `$table` ($columns) VALUES ($placeholders)";

        //exit($sql);

        $Artikel = $this->pdo->prepare($sql);
        $i = 1;

        foreach ($data as $value) {

            $type = match(gettype($value)) {
                "boolean" => PDO::PARAM_BOOL,
                "integer" => PDO::PARAM_INT,
                "NULL" => PDO::PARAM_NULL,
                default => PDO::PARAM_STR
            };

            $Artikel->bindValue($i++, $value, $type);

        }

        /*
        $Artikel->bindValue(1, $data["mainhaeder"], PDO::PARAM_STR);
        $Artikel->bindValue(2, $data["haeder"], PDO::PARAM_STR);
        $Artikel->bindValue(3, $data["text"], PDO::PARAM_STR);
        $Artikel->bindValue(4, $data["link"], PDO::PARAM_STR);
        $Artikel->bindValue(5, $data["pic"], PDO::PARAM_STR);*/

        return $Artikel->execute();
    }

    public function update(int $id, array $data): bool
    {
        var_dump($data);
        echo "<br>";
        $this->validate($data);
        echo "Nach Validtate:<br>";
        var_dump($data);

        if ( ! empty($this->errors)) {
            return false;
        }
        
        $table = $this->getTable();
        unset($data["id"]);
        $columns = array_keys($data);
        $sql = "UPDATE `$table` ";

        array_walk($columns, function (&$value) {
            $value = "$value = ?";
        });

        $sql .= " SET " . implode(", ", $columns);
        $sql .= " WHERE id = $id";       ////muss noch geändert werden******!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
        $Artikel = $this->pdo->prepare($sql);

        $i = 1;
        foreach ($data as $value) {

            $type = match(gettype($value)) {
                "boolean" => PDO::PARAM_BOOL,
                "integer" => PDO::PARAM_INT,
                "NULL" => PDO::PARAM_NULL,
                default => PDO::PARAM_STR
            };

            $Artikel->bindValue($i++, $value, $type);

        }
        
        //$Artikel->bindValue($i, $id, $value, $type);

        return $Artikel->execute();
        
    }

    
    public function delete($id): bool
    {
        $table = $this->getTable();
        
        $sql = "DELETE FROM `$table`
                WHERE id = :id";

        $Artikel = $this->pdo->prepare($sql);

        $Artikel->bindValue(":id", $id, PDO::PARAM_INT);

        return $Artikel->execute();
    }
   
    public function isthere(array $check, string $there):bool
    {
        $table = $this->getTable();

        //SQL zusammenbauen: 
        $columns = array_keys($check);
        $columnname = implode(", ", $columns);
        //echo "<br>Spalten: " . $columnname;
        $sql = "select `$columnname` FROM `$table` WHERE `$columnname` = ? ";

        //SQL-Prepare vorbereiten
        //echo "<br>SQL: ". $sql;
        $isthere = $this->pdo->prepare($sql);

        //value binden
        $isthere->bindParam(1, $there, PDO::PARAM_STR);

        //ausführen und Ergebniss fangen
        $isthere->execute();
        $result = $isthere->fetchColumn();

        //Ausgeben
        //var_dump($result);

        if ($result) {
            return false;
        } else {
            return true;
        }
        
        
    }

    public function findit(array $check, string $there):array
    {
        $table = $this->getTable();

        //SQL zusammenbauen: 
        $columns = array_keys($check);
        $columnname = implode(", ", $columns);
        //echo "<br>Spalten: " . $columnname;
        $sql = "select * FROM `$table` WHERE `$columnname` = ? ";

        //SQL-Prepare vorbereiten
        //echo "<br>SQL: ". $sql;
        $isthere = $this->pdo->prepare($sql);

        //value binden
        $isthere->bindParam(1, $there, PDO::PARAM_STR);

        //ausführen und Ergebniss fangen
        $isthere->execute();
        $result = $isthere->fetchAll(PDO::FETCH_ASSOC);

        //Ausgeben
        //var_dump($result);

        return $result;
        
    }
}