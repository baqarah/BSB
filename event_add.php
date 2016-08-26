<?php
$pth = $_SERVER['DOCUMENT_ROOT'];
include_once $pth . "/common/base.php";
$pageTitle = "Add Event";
include_once $pth . "/common/header.php";
//include_once $pth . "/

if (empty($_POST["eventname"]) || empty($_POST["start"]) || empty($_POST["koniec"])) {
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
            
            <p>Start Date and Time:</p>
            <input type="text" data-field="datetime" name="start" id="start" readonly /><br>
            <div id="dtBox"></div>
    
            <p>End Date and Time : </p>
            <input type="text" data-field="datetime" name="koniec" id="koniec" readonly />
            <div id="dtBox"></div>
    
            <script type="text/javascript">
     
             $(document).ready(function()
	         {
	             $("#dtBox").DateTimePicker({
                         minuteInterval: 30
                     });
	         });
             
            </script>

            <br>
            <input type="submit" name="create" id="create" value="Add event" />


            

            
            
        </div>
    </form>
    


      

<?php
exit;
}

if (!empty($_POST['eventnazwa']) && !empty($_POST['start']) && !empty $POST['koniec']) {
    include_once $pth . "/inc/class.events.inc.php";
    $events = new Events($db);
    echo $users ->createEvent();
}

include_once $pth . "/common/footer.php";
?>
