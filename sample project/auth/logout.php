<?php


require("../functions.php");
require("../database.php");
const BASE_PATH = __DIR__ . '/';
?>

<?php
$_SESSION["user"] = null;
session_destroy();

$params = session_get_cookie_params();
print_r($params);

setcookie(session_name(), '', time() - 3600);

header('location: /sample%20project/auth/login.php');
exit();
