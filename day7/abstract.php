<?php
abstract class Car
{
    public $name;
    public function __construct($name)
    {
        $this->name = $name;
    }
    abstract public function intro(): string;
}

class Audi extends Car
{
    public function intro(): string
    {
        return "Choose German quality! I'm an $this->name!";
    }
}

class Volvo extends Car
{
    public function intro(): string
    {
        return "Proud to be Swedish! I'm a $this->name!";
    }
}

class Citroen extends Car
{
    public function intro(): string
    {
        return "French extravagence! I'm a $this->name!";
    }
}

$audi = new Audi("Audi");
echo $audi->intro();
echo "<br>";

$volvo = new Volvo("Volvo");
echo $volvo->intro();
echo "<br>";

$citroen = new Citroen("Citroen");
echo $citroen->intro();
echo "<br>";

abstract class ParentClass
{
    abstract protected function prefixName($name);
}

class ChildClass extends ParentClass
{
    public function prefixName($name, $sperator = ".", $greet = "Dear")
    {
        if ($name == "Aung Aung") {
            $prefix = "Mr";
        } elseif ($name == "Mya Mya") {
            $prefix = "Ms";
        } else {
            $prefix = "";
        }
        return "{$greet} {$prefix}{$sperator} {$name}";
    }
}
$class = new ChildClass;
echo $class->prefixName("Aung Aung", "__", "Hello");
echo "<br>";
echo $class->prefixName("Mya Mya");
