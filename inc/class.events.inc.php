<?php

class Events
{
    private $_db;
    private $_userid;    // username, ulatwi robienie kwerend eventowych
    private $_activelist;  // lista aktywnych eventow w ktorych sie nie partycypuje
    private $_partlist;    // lista aktywnych eventow w ktorych sie partycypuje
    private $_oterlist     // lista nieaktywnych eventow

    public function __construct($db=NULL)
    {
        if(is_object($db)) {
            $this->_db = $db;
        } else {
            $this->_db = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
        }

        $sql = "SELECT UserID FROM Users WHERE UserName = '" . $_SESSION['Username'] . "'";
        $result = $this->_db->query($sql);
        $row = $result->fetch_assoc();
        $_userid = $row['UserID'];
        

        // bierze liste eventow:

        //_activelist:
       // $sql = "SELECT ID_Event FROM"
       //       ."Events JOIN Event_Rozdanie JOIN 
        
    }

    public function createEvent()
    {
        $n = trim($_POST["eventnazwa"]);
        $s = $_POST["start"];
        $k = $_POST["koniec"];

        $sql = "SELECT COUNT(EventNazwa) as theCount FROM Events WHERE EventNazwa='" . $n . "'";
        $result = $this->_db->query($sql);

        $row = $result->fetch_assoc();
        if($row['theCount']!=0) {
            return "<h2>Error</h2>"
                 . "<p>The event name you've chosen is already in use.</p>"
                 . "<p>Try again. Or not. <br> I am not your supervisor</p>";
        } else {
            $sql = "INSERT INTO Events(EventNazwa, EventStart, EventEnd, Aktywny)"
                 . "VALUES ('" . $n . "', '" . $s . "', '" . $k . "',1)";
            $result = $this->_db->query($sql);
            return 'Event "' . $n . '" added. <br> Well done, you.';
        }
    }

    public testUserId()
    {
        
        return $this->$_userid;
    }
    
    
}
?>
