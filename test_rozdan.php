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
<script>
 function funsql() {
     var xhttp;
         
     if (window.XMLHttpRequest) {
         xhttp = new XMLHttpRequest();
     } else {
         xhttp = new ActiveXObject("Microsoft.XMLHTTP");
     }
     
     xhttp.onreadystatechange = function() {
         if (this.readyState == 4 && this.status == 200) {
             document.getElementById("text").innerHTML = this.responseText;
         }
     };

     document.getElementById("text").innerHTML = "tutaj ma wyladowac";
     xhttp.open("GET", "test_ajax.php?string=hejka", true);
     xhttp.send();
 
 }

</script>

