<?php
echo "<h> Test rozdan<h>";
$pth = $_SERVER['DOCUMENT_ROOT'];


include_once $pth . "/common/base.php";
include_once $pth . "/common/header.php";
include_once $pth . "/inc/class.rozdanie.inc.php";

$rozdanie = new Rozdanie($db, 42);
print_r($rozdanie->getHits());
print_r($rozdanie->getTxts());
print_r($rozdanie->getIDTxts());


?>
