<?php

namespace Util;


use ReflectionClass;
use Closure;

class Container
{
    private array $registry = [];

    public function set(string $name, Closure $value): void
    {
        $this->registry[$name] = $value;
    }

    public function get(string $class_name): object
    {
        if (array_key_exists($class_name, $this->registry)) {

            return $this->registry[$class_name]();

        }

        $reflector = new ReflectionClass($class_name);

        $constructor = $reflector->getConstructor();

        $dependencies = [];

        if ($constructor === null) {

            return new $class_name;

        }

        foreach ($constructor->getParameters() as $parameter) {

            $type = $parameter->getType();

            if ($type->isBuiltIn()) {

                exit("Kann den Konstruktur-Parameter
                      '{$parameter->getName()}'
                      des Types '$type' in class $class_name nicht erstellen! (muss die Datenbankklasse vielleicht noch im Constructor vom Dispatcher eingetragen werden?");

            }

            $dependencies[] = $this->get($type);

        }

        return new $class_name(...$dependencies);
    }
}