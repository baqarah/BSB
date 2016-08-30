<?php
$pth = $_SERVER['DOCUMENT_ROOT'];
include_once $pth . "/common/base.php";
include_once $pth . "/common/header.php";
include_once $pth . "/inc/class.events.inc.php";

$events = new Events($db);


echo "Partycypujesz w: ";
foreach ($events->_partlist as $value) {
    echo $events->showEvent($value);
}

echo "Inne aktywne: ";
foreach ($events->_activelist as $value) {
    echo $events->showEvent($value);
}

echo "Nieaktyne: ";
foreach ($events->_otherlist as $value) {
    echo $events->showEvent($value);
}




// $events->showEvent(4);
echo '<a href="/event_add.php">DODAJ EVENT</a>';

?>




<?php
include_once $pth . "/common/footer.php";

?>
