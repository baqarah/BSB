<?php
$pth = $_SERVER['DOCUMENT_ROOT'];
include_once $pth . "/common/base.php";
include_once $pth . "/common/header.php";
include_once $pth . "/inc/class.events.inc.php";

$events = new Events;
echo "ID User:" . $events->testUserId() . "koniec";

echo "<h2>Tutaj bedzie strona z eventami wszystkimi</h2>";
echo '<a href="/event_add.php">DODAJ EVENT</a>';




include_once $pth . "/common/footer.php";

?>
