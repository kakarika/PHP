<?php
// trait Message1
// {
//     public function msg1()
//     {
//         echo "OOP is fun!";
//     }
// }

// class Welcome
// {
//     use Message1;
// }

// $obj = new Welcome();
// $obj->msg1();

// trait message1
// {
//     public function msg1()
//     {
//         echo "OOP is fun!";
//     }
// }

// trait message2
// {
//     public function msg2()
//     {
//         echo "OOP reduces code duplication!";
//     }
// }

// class Welcome
// {
//     use message1;
// }

// class Welcome2
// {
//     use message1, message2;
// }

// $obj1 = new Welcome();
// $obj1->msg1();
// echo "<br>";

// $obj2 = new Welcome2();
// $obj2->msg1();
// $obj2->msg2();

/********************************** Static example */
class Greeting
{
    public static function welcome()
    {
        echo "Hello World";
    }
}

Greeting::welcome();

class PI
{
    public static $value = 3.14159;
}

echo PI::$value;
