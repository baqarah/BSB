<?php
session_start();

echo $path;
echo $path . "/inc/costam";
include_once $path . "/inc/constants.inc.php"; 

$db = mysqli_connect('89.77.118.160', DB_USER, DB_PASS, DB_NAME);
if (!$db) {
    die("Failed to connect to MySQL: " .  mysqli_connect_error());
}
?>
