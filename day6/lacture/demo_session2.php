<?php session_start() ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    // echo "Favourite color is " . $_SESSION["favcolor"] . "<br>";
    // echo "Favourite animal is " . $_SESSION["favanimal"] . "<br>";
    $_SESSION["favcolor"] = "blue";
    session_unset();
    session_destroy();
    print_r($_SESSION);
    ?>
</body>

</html>