<?php
// $num1 = '1';
// $num2 = 1;

// if ($num1 === $num2) {
//     echo 'equal';
// } else {
//     echo 'not equal';
// }

// echo '<br>';

// $ans = 4;

// $result = $ans > 4 ? 'correct' : 'incorrect';
// $result = $ans <= 4 ? $ans : '10';

// echo $result;

// $roll = rand(1, 6);

// echo 'You rolled a ' . $roll;
// echo '<br>';

// if ($roll === 6) {
//     echo 'you win';
// }

// $d = date('D');
// if ($d === 'Fri')
//     echo 'have a nice weekend';
// elseif ($d === 'Mon')
//     echo 'good luck!';
// else
//     echo 'have a nice day';

// switch ($d) {
//     case "Mon":
//         echo 'Today is Monday';
//         break;
//     case "Tue":
//         echo 'Today is Tuesday';
//         break;
//     case "Wed":
//         echo 'Today is Wednesday';
//         break;
//     case "Thu":
//         echo 'Today is Thursday';
//         break;
//     case "Fri":
//         echo 'Today is Friday';
//         break;
//     case "Sat":
//         echo 'Today is Saturday';
//         break;
//     case "Sun":
//         echo 'Today is Sunday';
//         break;
//     default:
//         echo "Wonder which day is this?";
// }

// $cars = ['Honda', 'Lexus', 'BMW', 'Toyota'];
// $cars[4] = 'Supra';
// // echo "<br> $cars[0], $cars[1] and $cars[3] are Japanese cars. $cars[4]";
// foreach ($cars as $key => $car) {
//     echo $car . '<br>';
// }

// $ages = ['KoPhyo' => 32, 'KoNaing' => 30, 'KoMyo' => 34];
// $ages['MgMg'] = 20;
// // echo "<br> KoMyo is {$ages['KoMyo']} years old. Mg Mg is {$ages['MgMg']} years old";
// foreach ($ages as $name => $age) {
//     echo "$name : $age <br>";
// }

$marks = [
    'mgmg' => [
        'physics' => 30,
        'maths' => 40,
        'chem' => 60,
    ],
    'agag' => [
        'physics' => 49,
        'maths' => 40,
        'chem' => 90,
    ]
];

foreach ($marks as $name => $subs) {
    echo "Marks for student $name : <br>";
    foreach ($subs as $sub => $mark) {
        echo "$sub : $mark <br>";
    }
    echo "<br>";
}
