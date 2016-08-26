<?php
$pth = $_SERVER['DOCUMENT_ROOT'];
include_once $pth . "/common/base.php";
$pageTitle = "Add Event";
include_once $pth . "/common/header.php";
//include_once $pth . "/

if (empty($_POST["eventnazwa"]) || empty($_POST["start"]) || empty($_POST["koniec"])) {
?>
    <form method="post" action="event_add.php" id="eventadd">
        <div class ="formularz" >
            <h2 class="tytul">Add Event</h2>
            <label for="eventname" ></label>
            <input type="text" name="eventname" id="eventname" placeholder="Event Name" /><br>

            <label for="start" ></label>
            <input type=""


<?php
include_once $pth . "/common/footer.php";
?>
