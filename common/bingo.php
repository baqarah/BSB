<?php 
$pth = $_SERVER['DOCUMENT_ROOT'];

$pageTitle = "Tabela";
include_once $pth . "/common/base.php";
//include_once $pth . "/common/cookie.php";
include_once $pth . "/common/header.php";
include_once $pth . "/inc/class.rozdanie.inc.php";


if ($_SESSION['LoggedIn'] == 1) { 
    //include_once $pth . "/common/tabela.php";
    $rozdanie = new Rozdanie($db, 43);
    $rozdanie->showRozdanie();

    $h[] = $rozdanie->getHits();
    print_r($h[0]);
} 
?>
<script>
 var wynik =[
     [<?php echo $h[0][0] . "," . $h[0][1] . "," . $h[0][2] . "," . $h[0][3] . "," . $h[0][4]; ?>],
     [<?php echo $h[0][5] . "," . $h[0][6] . "," . $h[0][7] . "," . $h[0][8] . "," . $h[0][9]; ?>],
     [<?php echo $h[0][10] . "," . $h[0][11] . "," . $h[0][12] . "," . $h[0][13] . "," . $h[0][14]; ?>],
     [<?php echo $h[0][15] . "," . $h[0][16] . "," . $h[0][17] . "," . $h[0][18] . "," . $h[0][19]; ?>],
     [<?php echo $h[0][20] . "," . $h[0][21] . "," . $h[0][22] . "," . $h[0][23] . "," . $h[0][24]; ?>]
 ]; 
</script>
<script type="text/javascript" src = "/common/script.js"></script>

<?php include_once $pth . "/common/footer.php"; ?>
