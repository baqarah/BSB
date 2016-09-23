<?php
echo "<h> Test rozdan<h>";
$pth = $_SERVER['DOCUMENT_ROOT'];


include_once $pth . "/common/base.php";
include_once $pth . "/common/header.php";
include_once $pth . "/inc/class.rozdanie.inc.php";

$rozdanie = new Rozdanie($db, 42);
//print_r($rozdanie->getHits());
//print_r($rozdanie->getTxts());
//print_r($rozdanie->getIDTxts());
//echo "<br>";
$rozdanie->showRozdanie();


?>
<button type="button" onlick="eskuel()" >klikmnie</button>
<p><span id="text" ></span></p>
<script>
 function eskuel() {
     var xhttp;
     if (window.XMLHttpRequest) {
         // code for modern browsers
         xhttp = new XMLHttpRequest();
     } else {
         // code for IE6, IE5
         xhttp = new ActiveXObject("Microsoft.XMLHTTP");
     }
     document.getElementById("text").innerHTML = this.responseText;
     xhttp.open("GET", "test_ajax.php", true);
     xhttp.send();

 }
</script>
