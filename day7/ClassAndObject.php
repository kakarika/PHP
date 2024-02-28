<?php
// class Fruit
// {
//     public $name;
//     public $color;

//     function setName($name)
//     {
//         $this->name = $name;
//     }

//     function getName()
//     {
//         return $this->name;
//     }

//     function setColor($color)
//     {
//         $this->color = $color;
//     }

//     function getColor()
//     {
//         return $this->color;
//     }
// }

// $apple = new Fruit();
// $apple->setName('apple');
// $apple->setColor('red');
// echo 'name: ' . $apple->getName();
// echo "<br>";
// echo "color: " . $apple->getColor();

// echo "<hr>";
// $mango = new Fruit();
// $mango->setName('mango');
// $mango->setColor('green');
// echo 'name: ' . $mango->getName();
// echo "<br>";
// echo "color: " . $mango->getColor();

// echo "<hr>";
// $banana = new Fruit();
// $banana->setName('banana');
// $banana->setColor('yellow');
// echo 'name: ' . $banana->getName();
// echo "<br>";
// echo "color: " . $banana->getColor();

// echo "<hr>";
// $grapefruit = new Fruit();
// $grapefruit->setName('grapefruit');
// $grapefruit->setColor('black');
// echo 'name: ' . $grapefruit->getName();
// echo "<br>";
// echo "color: " . $grapefruit->getColor();

// echo "<hr>";
// var_dump($apple instanceof Fruit);

// class Fruit
// {
//     public $name;
//     public $color;

//     function __construct($name, $color)
//     {
//         $this->name = $name;
//         $this->color = $color;
//     }

//     function getName()
//     {
//         return $this->name;
//     }
// }

// $apple = new Fruit("Apple", "Red");
// echo "Name is: " . $apple->getName();
// echo "<br>";
// echo "Color is: " . $apple->color;

// class Fruit
// {
//     public $name;
//     public $color;

//     function __construct($name, $color)
//     {
//         $this->name = $name;
//         $this->color = $color;
//     }

//     function __destruct()
//     {
//         echo "The fruit is {$this->name} and color is {$this->color} <br>";
//     }
// }

// new Fruit("dragonfruit", "red");
// new Fruit("Apple", "Red");
// new Fruit("Mango", "Green");
// new Fruit("banana", "yellow");

/***************** Fruit class with access modifiers */

// class Fruit
// {
//     public $name;
//     protected $color;
//     private $weight;
// }

// $mango = new Fruit();
// $mango->name = "Mango";
// $mango->color = "Green";
// $mango->weight = "400";

// echo $mango->name;

// class Fruit
// {
//     public $name;
//     protected $color;
//     private $weight;

//     function setName($n)
//     {
//         $this->name = $n;
//     }

//     protected function setColor($n)
//     {
//         $this->color = $n;
//     }

//     private function setWeight($n)
//     {
//         $this->weight = $n;
//     }
// }

// $mango = new Fruit();
// $mango->setName("Mango");
// $mango->setColor("Green");
// $mango->setWeight("400");

// echo $mango->name;

/***************** fruit class with inheritance */

// class Fruit
// {
//     public $name;
//     public $color;

//     public function __construct($name, $color)
//     {
//         $this->name = $name;
//         $this->color = $color;
//     }

//     public function intro()
//     {
//         echo "The fruit is {$this->name} and the color is {$this->color}.";
//     }
// }

// class Strawberry extends Fruit
// {
//     public function message()
//     {
//         echo "Am I a fruit or a berry?";
//     }
// }

// $strawberry = new Strawberry("Strawberry", "Red");
// $strawberry->message();
// $strawberry->intro();

// class Fruit
// {
//     public $name;
//     public $color;

//     public function __construct($name, $color)
//     {
//         $this->name = $name;
//         $this->color = $color;
//     }

//     protected function intro()
//     {
//         echo "The fruit is {$this->name} and the color is {$this->color}.";
//     }
// }

// class Strawberry extends Fruit
// {
//     public function message()
//     {
//         echo "Am I a fruit or a berry?";
//     }
// }

// $strawberry = new Strawberry("Strawberry", "Red");
// $strawberry->message();
// $strawberry->intro();

// class Fruit
// {
//     public $name;
//     public $color;

//     public function __construct($name, $color)
//     {
//         $this->name = $name;
//         $this->color = $color;
//     }

//     protected function intro()
//     {
//         echo "The fruit is {$this->name} and the color is {$this->color}.";
//     }
// }

// class Strawberry extends Fruit
// {
//     public function message()
//     {
//         echo "Am I a fruit or a berry?";
//         $this->intro();
//     }
// }

// $strawberry = new Strawberry("Strawberry", "Red");
// $strawberry->message();

// class Fruit
// {
//     public $name;
//     public $color;

//     public function __construct($name, $color)
//     {
//         $this->name = $name;
//         $this->color = $color;
//     }

//     protected function intro()
//     {
//         echo "The fruit is {$this->name} and the color is {$this->color}.";
//     }
// }

// class Strawberry extends Fruit
// {
//     public $weight;

//     public function __construct($name, $color, $weight)
//     {
//         $this->name = $name;
//         $this->color = $color;
//         $this->weight = $weight;
//     }
//     public function message()
//     {
//         echo "Am I a fruit or a berry?";
//         $this->intro();
//     }

//     public function intro()
//     {
//         echo "The fruit is {$this->name} and the color is {$this->color} and the weight is {$this->weight}g.";
//     }
// }

// $strawberry = new Strawberry("Strawberry", "Red", 90);
// $strawberry->intro();

// final class Fruit
// {
// }

// class Strawberry extends Fruit
// {
// }

// class Fruit
// {
//     final public function intro()
//     {
//     }
// }

// class Strawberry extends Fruit
// {
//     public function intro()
//     {
//     }
// }

// class Fruit
// {
//     const MESSAGE = "Thank you for buying fruits!";
// }

// echo Fruit::MESSAGE;

class Order
{
    const PAID = 6;
    const PENDING = 7;
}

echo Order::PAID;

class Fruit
{
    const MESSAGE = "Thank you for buying fruits!";
    public function thankYou()
    {
        echo self::MESSAGE;
    }
}

$goodbye = new Fruit();
$goodbye->thankYou();
echo $goodbye::MESSAGE;
