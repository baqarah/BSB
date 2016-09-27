<?php 
$pth = $_SERVER['DOCUMENT_ROOT'];

$pageTitle = "Tabela";
include_once $pth . "/common/base.php";
//include_once $pth . "/common/cookie.php";
include_once $pth . "/common/header.php";
include_once $pth . "/inc/class.rozdanie.inc.php";


if ($_SESSION['LoggedIn'] == 1) { 
    include_once $pth . "/common/tabela.php";

    $rozdanie = new Rozdanie($db, 43);
    $rozdanie->showRozdanie();
    


} 
?>

<br>
<br>
Zeby zresetowac cookiesy: <a href="http://89.77.118.160:8080/cook.php">Kliknij tutaj</a> 
<script src = "/common/script.js"></script>

<?php include_once $pth . "/common/footer.php"; ?>
