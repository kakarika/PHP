<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <!-- <table>
        <thead>
            <tr>
                <td>Filter Name</td>
                <td>Filter ID</td>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach (filter_list() as $id => $filter) {
                echo '<tr><td>' . $filter . '</td><td>' . filter_id($filter) . '</td></tr>';
            }
            ?>
        </tbody>
        <?php
        ?>
    </table> -->

    <?php
    // $str = "<h1>Hello World!</h1>";
    // echo $str;
    // echo filter_var($str, FILTER_SANITIZE_STRING);
    // echo strip_tags($str);

    // $int = 10;

    // if (!filter_var($int, FILTER_VALIDATE_INT) === false || filter_var($int, FILTER_VALIDATE_INT) === 0) {
    //     echo ("Integer is valid");
    // } else {
    //     echo "Integer is not valid";
    // }

    // $ip = "1.255.255.255";

    // if (!filter_var($ip, FILTER_VALIDATE_IP) === false) {
    //     echo "$ip is a valid IP address";
    // } else {
    //     echo "$ip is note a valid IP address";
    // }

    // $email = "john@example.com";

    // $email = filter_var($email, FILTER_SANITIZE_EMAIL);

    // if (!filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
    //     echo " $email is a valid email address";
    // } else {
    //     echo "$email is not a valid email address";
    // }

    // function myCallback($item)
    // {
    //     return strrev($item);
    // }

    // $strings = ["apple", "orange", "banana", "coconut"];
    // $lengths = array_map("myCallback", $strings);

    // print_r($lengths);

    // function exclaim($str)
    // {
    //     return $str . "!";
    // }

    // function ask($str)
    // {
    //     return $str . "?";
    // }

    // function printMessage($message, $format)
    // {
    //     echo $format($message) . "<br>";
    // }

    // printMessage("Happy new year", "exclaim");
    // printMessage("Happy new year", "ask");

    // $number = [1, 2, 4, 6, 9];
    // $ans = array_map(function ($n) {
    //     return $n * $n;
    // }, $number);

    // print_r($ans);

    $age = ["Peter" => 35, "Ben" => 20, "john" => 39];
    // echo json_encode($age);

    // $cars = ["BMW", "TOYOTA", "MAZDA"];
    // echo json_encode($cars);

    $jsonObj = '{"Peter":35,"Ben":20,"john":39}';
    // var_dump(json_decode($jsonObj, true));
    $obj = json_decode($jsonObj);
    // echo $obj->Peter . "<br>";
    // echo $obj->Ben . "<br>";
    // echo $obj->john;

    foreach ($obj as $key => $value) {
        echo "$key => $value";
    }

    $arr = json_decode($jsonObj, true);

    // echo $arr["Peter"] . "<br>";
    // echo $arr["Ben"] . "<br>";
    // echo $arr["john"] . "<br>";

    foreach ($arr as $key => $value) {
        echo "$key => $value";
    }

    ?>
</body>

</html>