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
            <label for="eventnazwa" ></label>
            <input type="text" name="eventnazwa" id="eventnazwa" placeholder="Event Name" autofocus/><br>
            
            <p>Start Date and Time:</p>
            <input type="text" data-field="datetime" data-format="yyyy-MM-dd HH:mm" name="start" id="start" readonly /><br>
            <div id="dtBox"></div>
    
            <p>End Date and Time : </p>
            <input type="text" data-field="datetime" data-format="yyyy-MM-dd HH:mm" name="koniec" id="koniec" readonly />
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
}

if (!empty($_POST["eventnazwa"]) && !empty($_POST["start"]) && !empty($_POST["koniec"])) {
    include_once $pth . "/inc/class.events.inc.php";
    $events = new Events($db, $_SESSION['username']);
    echo $events->createEvent();
}

include_once $pth . "/common/footer.php";
?>
