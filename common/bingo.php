<?php 
$pth = $_SERVER['DOCUMENT_ROOT'];

$pageTitle = "Tabela";
include_once $pth . "/common/base.php";
//include_once $pth . "/common/cookie.php";
include_once $pth . "/common/header.php";
include_once $pth . "/inc/class.events.inc.php";
include_once $pth . "/inc/class.rozdanie.inc.php";




if ($_SESSION['LoggedIn'] == 1) { 

    $events = new Events($db, $_SESSION['Username']);
    $next_event = $events->getNextRozdanie();

    //include_once $pth . "/common/tabela.php";
    echo $next_event;
    if ($next_event != "no events") {
        $rozdanie = new Rozdanie($db, $next_event);
        $rozdanie->showRozdanie();
        $h = $rozdanie->getHits();
    }
} 
?>
<script>
 var id_rozdanie = <?php echo $next_event; ?>;
 var wynik =[
     [<?php echo $h[0] . "," . $h[1] . "," . $h[2] . "," . $h[3] . "," . $h[4]; ?>],
     [<?php echo $h[5] . "," . $h[6] . "," . $h[7] . "," . $h[8] . "," . $h[9]; ?>],
     [<?php echo $h[10] . "," . $h[11] . "," . $h[12] . "," . $h[13] . "," . $h[14]; ?>],
     [<?php echo $h[15] . "," . $h[16] . "," . $h[17] . "," . $h[18] . "," . $h[19]; ?>],
     [<?php echo $h[20] . "," . $h[21] . "," . $h[22] . "," . $h[23] . "," . $h[24]; ?>]
 ]; 
</script>
<script type="text/javascript" src = "/common/script.js"></script>

<?php include_once $pth . "/common/footer.php"; ?>
