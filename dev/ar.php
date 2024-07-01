<?php
class MeinKlasse {
    public function meineMethode($param1, $param2) {
        echo "<br>aus der Klasse P1: ".$param1. " und P2: ".$param2;
    }
}

$klasse = new ReflectionClass('MeinKlasse');
$methoden = $klasse->getMethods();

foreach ($methoden as $methode) {
    if ($methode->getName() === 'meineMethode') {
        $parameter = $methode->getParameters();
        foreach ($method->getParameters() as $parameter) {

            $name = $parameter->getName();

            $args[$name] = $params[$name];

        }

        return $args;
    }
}

$MK = new MeinKlasse();
$MK->meineMethode(1,2);

?>

