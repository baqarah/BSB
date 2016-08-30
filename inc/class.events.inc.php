<?php

class Events
{
    private $_db;
    private $_userid;    // username, ulatwi robienie kwerend eventowych
    private $_activelist;  // lista aktywnych eventow w ktorych sie nie partycypuje
    private $_partlist;    // lista aktywnych eventow w ktorych sie partycypuje
    private $_otherlist;     // lista nieaktywnych eventow

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
        $this->_userid = $row['UserID'];
       
        // bierze liste eventow:

        //_partlist:
        $sql = "SELECT e.ID_Event as IDs "
              ."FROM Events e, Events_Rozdanie b, Rozdanie r "
              ."WHERE e.ID_Event = b.ID_Event "
              ."AND b.ID_Rozdanie = r.ID_Rozdanie "
              ."AND e.Aktywny = 1 AND r.UserID =" . $this->_userid;

        //echo $sql;
        $result = $this->_db->query($sql);
        $row = $result->fetch_assoc(); 
        $this->_partlist = $row['IDs'];

        //_activelist:
        $sql = "SELECT e.ID_Event as IDs "
              ."FROM Events e, Events_Rozdanie b, Rozdanie r "
              ."WHERE e.ID_Event = b.ID_Event "
              ."AND b.ID_Rozdanie = r.ID_Rozdanie "
              ."AND e.Aktywny = 1 AND r.UserID <>" . $this->_userid;

        //echo $sql;

        //_otherlist;
        $result = $this->_db->query($sql);
        $row = $result->fetch_assoc(); 
        $this->_activelist = $row['IDs'];

        $sql = "SELECT e.ID_Event as IDs "
              ."FROM Events e "
              ."WHERE e.Aktywny = 0";

        //echo $sql;
        $result = $this->_db->query($sql);
        $row = $result->fetch_assoc(); 
        $this->_otherlist = $row['IDs'];
        
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

        // --- TUTAJ TRZEBA DODAC AUTO LOSOWANIE ROZDANIA
        
    }

    public function testas()
    {
        return $this->_otherlist;
    }   

    public function showEvent($id)
    {
        $sql = "SELECT e.EventNazwa as Nazwa, e.EventStart as Start, e.EventEnd as Koniec, u.UserName as User "
              ."FROM Events e, Events_Rozdanie b, Rozdanie r, Users u "
               ."WHERE e.ID_Event = " . $id
              ." AND e.ID_Event = b.ID_Event AND b.ID_Rozdanie = r.ID_Rozdanie AND r.UserID = u.UserID";
        //echo $sql;



        
        $result = $this->_db->query($sql);

        //while ($row = $result->fetch_assoc()) {
        //    echo $row['User'];
        //}

        //$row = $result->fetch_assoc();
        //$efekt = $row['Nazwa'] . " | " . $row['Start'] . " | " . $row['Koniec'] . "<br>";

            //$a = $kwer->fetchAll(PDO::FETCH_ASSOC);
            $a = $result->fetch_assoc();
            print_r($a);
        
            return "dziala";        
            
    }
    
}
?>
