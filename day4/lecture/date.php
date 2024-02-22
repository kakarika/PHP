<?php
date_default_timezone_set("Asia/Yangon");

// echo "Today is " . date("Y/m/d") . "<br>";
// echo "Today is " . date("Y.m.d h:i:sa") . "<br>";
// echo "Today is " . date("y-M-D") . "<br>";
// echo "Today is " . date("l") . "<br>";

// $d = strtotime("10:34pm dec 15 2014");
// echo "Created date is " . date("Y-m-d h:i:sa", $d);

// $startDate = strtotime('fri');
// $endDate = strtotime("+50 weeks", $startDate);

// while ($startDate < $endDate) {
//     echo date("Y M d", $startDate) . "<br>";
//     $startDate = strtotime("+1 weeks", $startDate);
// }

$d1 = strtotime("July 04");
$d2 = ceil(($d1 - time()) / 60 / 60 / 24);
echo "there are $d2 days until 4th of july";


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <!-- &copy; 2010-<?php echo date("Y") ?> -->
    <!-- <?php echo "The time is " . date("h:i:sa"); ?> -->
</body>

</html>