<?php
$pth = $_SERVER['DOCUMENT_ROOT'];
include_once $pth . "/common/base.php";
include_once $pth . "/inc/class.rozdanie.inc.php";

$rozdaniedozmiany = new Rozdanie($db, $_GET['idrozdania']);
$rozdaniedozmiany->changeHit($_GET['pole'], $_GET['wynik']);
echo "ID: " . $_GET['idrozdania'] . ", Pole: " . $_GET['pole'] . ", Wynik: " . $_GET['wynik']; 



?>
