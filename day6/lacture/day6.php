<?php

$cookie_name = "user";
// $cookie_value = "Mg Mg";
$cookie_value = "Aye Aye";
setcookie($cookie_name, $cookie_value, time() + 10, "/");
// setcookie("user", "", time() - 3600);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    if (!isset($_COOKIE[$cookie_name])) {
        echo "Cookie Named" . $cookie_name . "is not set!";
    } else {
        echo "Cookie $cookie_name is set! <br>";
        echo "Value is " . $_COOKIE[$cookie_name];
    }
    if (count($_COOKIE) > 0) {
        echo "Cookies are enabled";
    } else {
        echo "Cookies are disabled";
    }
    ?>
</body>

</html>