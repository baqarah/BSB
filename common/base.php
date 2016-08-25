<?php
session_start();
$pth = $_SERVER['DOCUMENT_ROOT'];
include_once $pth . "/inc/constants.inc.php"; 

$db = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
if (!$db) {
    die("Failed to connect to MySQL: " .  mysqli_connect_error());
}
?>
