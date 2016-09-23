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
<button type="button" onlick="funsql()" >klikmnie</button>
<p><span id="text" >UMCUMSCUMSC</span></p>
<script>
 function funsql() {
     document.getElementById("text").innerHTML = "kurwa, dzialaj";
 }
</script>
<!-- 
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

     xhttp.open("GET", "test_ajax.php", true);
     xhttp.send();

 }

</script>
-->
