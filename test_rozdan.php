<?php
/*
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

*/
?>

<button type="button" onlick="funsql();" >klikmnie</button>
<p><span id="text" >UMCUMSCUMSC</span></p>
<script>
 function funsql() {
     var xhttp;
     alert("kurwa");
     
     if (window.XMLHttpRequest) {
         xhttp = new XMLHttpRequest();
         alert("chrome");
     } else {
         xhttp = new ActiveXObject("Microsoft.XMLHTTP");
         alert("windoza");
     }
     
     xhttp.onreadystatechange = function() {
         if (this.readyState == 4 && this.status == 200) {
             document.getElementById("text").innerHTML = this.responseText;
         }
     };

     document.getElementById("text").innerHTML = "elo";
     xhttp.open("GET", "http://www.w3schools.com/ajax/ajax_info.txt", true);
     xhttp.send();
 
 }

</script>

