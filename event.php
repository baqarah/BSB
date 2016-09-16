<?php
$pth = $_SERVER['DOCUMENT_ROOT'];


include_once $pth . "/common/base.php";
include_once $pth . "/common/header.php";
include_once $pth . "/inc/class.events.inc.php";

$events = new Events($db, $_SESSION['Username']);

if (!empty($_POST['eventjoinid'])) {
    echo "<h>";
    echo $events->joinEvent($_POST['eventjoinid']);
    echo "</h>";
}

echo "<h2>Partycypujesz w: </h2>";
foreach ($events->getPartList() as $value) {
    $events->showEvent($value);
}

echo "<h2>Inne aktywne: </h2>";
foreach ($events->getActiveList() as $value) {
    $events->showEvent($value); //, "aktywne");
}

echo "<h2>Nieaktyne: </h2>";
foreach ($events->getOtherList() as $value) {
    $events->showEvent($value);
}

// $events->showEvent(4);
echo '<a href="/event_add.php">DODAJ EVENT</a>';

?>




<?php
include_once $pth . "/common/footer.php";

?>
