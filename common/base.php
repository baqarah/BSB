<?php
session_start();
include_once "http://89.77.118.160:8080/inc/constants.inc.php";

$db = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
if (!$db) {
    die("Failed to connect to MySQL: " .  mysqli_connect_error());
}
?>
