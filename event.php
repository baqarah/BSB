<?php
$pth = $_SERVER['DOCUMENT_ROOT'];
include_once $pth . "/common/base.php";
include_once $pth . "/common/header.php";
include_once $pth . "/inc/class.events.inc.php";


$events = new Events($db);
echo "test  >" . $events->testas() . "< <br>";

echo $events->showEvent(4);

echo "<h2>Tutaj bedzie strona z eventami wszystkimi</h2>";
echo '<a href="/event_add.php">DODAJ EVENT</a>';


include_once $pth . "/common/footer.php";

?>
