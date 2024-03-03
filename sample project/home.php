<?php


require("functions.php");
require("database.php");
const BASE_PATH = __DIR__ . '/';
?>

<?php view("header.view.php", [
    "title" => "Home"
]); ?>
<?php view("nav.view.php"); ?>
<h1>Home</h1>
<?php view("footer.view.php"); ?>