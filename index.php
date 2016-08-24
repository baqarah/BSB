<?php 
include_once "common/base.php";
include_once "common/cookie.php";
include_once "common/header.php";

if ($_SESSION['LoggedIn'] == 1) { 
    php include_once 'common/tabela.php';
}
?>

<br>
<br>
to ze tu jestes oznacza, ze akceptujesz wszystkie polityki,
w tym cookies, polityke obronna Macierewicza i pucz w Turcji <br>
Zeby zresetowac cookiesy: <a href="http://89.77.118.160:8080/cook.php">Kliknij tutaj</a> 
<script src = "common/script.js"></script>

<?php include_once "common/footer.php"; ?>
