<?php

echo "<h> Test rozdan<h>";
$pth = $_SERVER['DOCUMENT_ROOT'];


include_once $pth . "/common/base.php";
include_once $pth . "/common/header.php";
include_once $pth . "/inc/class.rozdanie.inc.php";

$rozdanie = new Rozdanie($db, 43);
//print_r($rozdanie->getHits());
//print_r($rozdanie->getTxts());
//print_r($rozdanie->getIDTxts());
//echo "<br>";
$rozdanie->showRozdanie();


?>

<button type="button" onclick="funsql();" >klikmnie</button>
<p><span id="text" >UMCUMSCUMSC</span></p>
<script src ="/common/script.js"></script>


