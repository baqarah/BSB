<?php 
define('PTH', $_SERVER['DOCUMENT_ROOT']);
$pageTitle = "Home";

include_once PTH . "/common/base.php";
include_once PTH . "/common/cookie.php";
include_once PTH . "/common/header.php";



if ($_SESSION['LoggedIn'] == 1) { 
    include_once PTH . "/common/menu.php";
} else {
    echo '<h2 class="tytul">Login first</h2>';
}
?>

<br>
<br>
Zeby zresetowac cookiesy: <a href="http://89.77.118.160:8080/cook.php">Kliknij tutaj</a> 
<script src = "common/script.js"></script>

<?php include_once PTH . "/common/footer.php"; ?>
