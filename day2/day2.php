<?php
// function xc($a)
// {
//     if (!$a) {
//         throw new Exception('Division by zero');
//     }
//     return 1 / $a;
// }

// try {
//     echo xc(5) . "<br>";
//     echo xc(0) . "<br>";
//     echo "hello";
// } catch (Exception $e) {
//     echo 'Caught exception: ', $e->getMessage(), "<br>";
// }

// echo "hello world\n";

// function myFunction()
// {
//     echo "This text come from a function";
// }

// $myArr = ['Volvo', 15, ['apples', 'bananas'], 'myFunction'];
// $myArr[10] = 'hello';
// array_push($myArr, 'new');
// array_unshift($myArr, 'first');
// // $myArr[3]();
// echo "<br>" . count($myArr);
// var_dump($myArr);

// $cars = ["brand" => "Ford", "model" => "Mustang"];
// $cars += ["color" => "red", "year" => 1964];
// // unset($cars["color"]);
// $newArr = array_diff($cars, ['Ford', 'red']);
// var_dump($newArr);

// $cars = ["Volvo", "BMW", "Toyota"];
// // array_splice($cars, 2, 1);
// // unset($cars[2]);
// array_pop($cars);
// array_push($cars, "Honda", "Tesla");
// array_shift($cars);
// var_dump($cars);

// $numbers = [4, 6, 2, 22, 11];
// sort($numbers);

// print_r($numbers);

// $ages = ["Peter" => 35, "Ben" => 37, "Joe" => 43];

// ksort($ages);

// var_dump($ages);

function sum($a, $b)
{
    $sum = $a + $b;
    if ($sum >= 10 && $sum <= 20) {
        echo 30;
    } else {
        echo $sum;
    }
}

sum(9, 0);
