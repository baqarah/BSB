<?php
$pth = $_SERVER['DOCUMENT_ROOT'];
include_once $pth . "/common/base.php";
include_once $pth . "/common/header.php";
include_once $pth . "/inc/class.events.inc.php";

$events = new Events($db);

print_r($events->wrocPart());
//print_r($events->_activelist


//echo $events->showEvent(4);
echo '<a href="/event_add.php">DODAJ EVENT</a>';

?>




<?php
include_once $pth . "/common/footer.php";

?>
