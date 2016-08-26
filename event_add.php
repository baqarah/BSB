<?php
$pth = $_SERVER['DOCUMENT_ROOT'];
include_once $pth . "/common/base.php";
$pageTitle = "Add Event";
include_once $pth . "/common/header.php";
//include_once $pth . "/
if (empty($_POST["eventnazwa"]) || empty($_POST["start"]) || empty($_POST["koniec"])) {
?>    
    <head>
        <link rel="stylesheet" type="text/css" href="/datepick/DateTimePicker.css" />
	
        <script type="text/javascript" src="/datepick/jquery-1.11.0.min.js"></script>
        <script type="text/javascript" src="/datepick/DateTimePicker.js"></script>
    </head>
    <form method="post" action="event_add.php" id="eventadd">
        <div class ="formularz" >
            <h2 class="tytul">Add Event</h2>
            <label for="eventname" ></label>
            <input type="text" name="eventname" id="eventname" placeholder="Event Name" /><br>

            <label for="start" ></label>
            <input type="text" name="start" id="start" data-field="date-time" /><br>
        </div>
    </form>
    
    <script type="text/javascript">
		
     $(document).ready(function()
	 {
	     $("#dtBox").DateTimePicker({
                 minuteInterval: 30
             });
	 });
		
    </script>

<?php

include_once $pth . "/common/footer.php";
?>
