<?php
function inRange($a, $b)
{
    if (($a >= 100 && $a <= 200) || ($b >= 100 && $b <= 200)) {
        return true;
    } else {
        return false;
    }
}

var_dump(inRange(100, 199));
var_dump(inRange(250, 300));
var_dump(inRange(105, 190));

function same($c, $d)
{
    $sum = $c + $d;
    if ($c === $d) {
        return $sum * 3;
    } else {
        return $sum;
    }
}

echo same(1, 2);
echo same(3, 2);
echo same(2, 2);


function equal(array $arr, $f)
{
    $firstFour = array_slice($arr, 0, 4);

    if (in_array($f, $firstFour)) {
        return true;
    } else {
        return false;
    }
}

var_dump(equal([1, 2, 9, 3], 3));
var_dump(equal([1, 2, 3, 4, 5, 6], 2));
var_dump(equal([1, 2, 3, 4, 5, 6], 6));
var_dump(equal([1, 2, 2, 3], 9));

function matchLetters($str1, $str2)
{
    $count = 0;

    for ($i = 0; $i < strlen($str1) - 1; $i++) {
        $sub1 = substr($str1, $i, 2);

        for ($j = 0; $j < strlen($str2) - 1; $j++) {
            $sub2 = substr($str2, $j, 2);

            if ($sub1 === $sub2) {
                $count++;
            }
        }
    }

    echo $count . "<br>";
}
matchLetters("abcdefgh", "abijsklm");
matchLetters("abcde", "osuefrcd");
matchLetters("pqrstuvwx", "pqkdiewx");


function sumOfThree($x, $y, $z)
{
    $x = ($x >= 10 && $x <= 20 && $x != 13 && $x != 17) ? 0 : $x;
    $y = ($y >= 10 && $y <= 20 && $y != 13 && $y != 17) ? 0 : $y;
    $z = ($z >= 10 && $z <= 20 && $z != 13 && $z != 17) ? 0 : $z;

    $sum = $x + $y + $z;

    echo $sum . "<br>";
}

echo sumOfThree(4, 5, 7);
echo sumOfThree(7, 4, 12);
echo sumOfThree(10, 13, 12);
echo sumOfThree(17, 12, 18);
