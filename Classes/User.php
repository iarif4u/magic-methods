<?php


class User
{
    protected $name = 'Md. Arif';
    protected $email = 'iarif4u@gmail.com';

    public static function staticName()
    {
        echo "Hello, Arif";
    }

    private function setName($name)
    {
        $this->name = $name;
    }

    private function getName()
    {
        return $this->name;
    }

    public function __get($property)
    {
        echo "You are trying to get undefined property: <b>{$property}</b><br>";
    }

    public function __set($property, $value)
    {
        echo "You are trying to set undefined property: <b>{$property}</b> to {$value}<br>";
    }

    public function __call($method, $args)
    {
        $arguments = implode(",", $args);
        try {
            $reflection = new ReflectionMethod($this, $method);
            $method_type = $reflection->isPrivate() ? "private" : "protected";
        } catch (ReflectionException $e) {
            $method_type = "undefined";
        }
        echo "You call an {$method_type} method: <b>{$method}</b> with arguments: <b>{$arguments}</b><br>";
    }

    public static function __callStatic($name, $args)
    {
        $arguments = implode(",", $args);
        echo "You call an undefined static method: <b>{$name}</b> with arguments: <b>{$arguments}</b><br>";
    }

    public function __toString()
    {
        $className = get_class($this);
        return "You print <b>{$className}</b> class";
    }

    public function __isset($name)
    {
        return isset($this->$name);
    }

    public function __unset($name)
    {
        $reflector = new ReflectionClass($this);

        try {
            $property = $reflector->getProperty($name);
            $type = $property->isPrivate() ? 'private' : "protected";
        } catch (ReflectionException $e) {
            $type = "undefined";
        }
        echo "You are trying to unset {$type} property {$name}";
    }
    public function __sleep()
    {
        //return only email when serialize object
        return ['email'];
    }
    public function __wakeup()
    {
        //return only email when serialize object
        return ['email'];
    }

    public function __invoke(...$arguments)
    {
        $arguments = implode(", ", $arguments);
        echo "You call object as a function with arguments: <b>{$arguments}</b><br>";
    }

}