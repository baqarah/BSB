<?php

class Events
{
    private $_db;
    private $_userid;    // username, ulatwi robienie kwerend eventowych
    public $_activelist;  // lista aktywnych eventow w ktorych sie nie partycypuje
    public $_partlist;    // lista aktywnych eventow w ktorych sie partycypuje
    public $_otherlist;     // lista nieaktywnych eventow

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
        $a = array();
        
        $result = $this->_db->query($sql);
        while ($row = $result->fetch_assoc()) { 
            $a[]=$row['IDs'];
        }
        $this->_partlist = $a;
        
        //_activelist:
        $sql = "SELECT e.ID_Event as IDs "
              ."FROM Events e, Events_Rozdanie b, Rozdanie r "
              ."WHERE e.ID_Event = b.ID_Event "
              ."AND b.ID_Rozdanie = r.ID_Rozdanie "
              ."AND e.Aktywny = 1 AND r.UserID <>" . $this->_userid;
        //echo $sql;
        $b = array();
        
        $result = $this->_db->query($sql);
        while ($row = $result->fetch_assoc()) { 
            $b[]=$row['IDs'];
        }
        $this->_activelist = $b;
        


        
        
        $sql = "SELECT e.ID_Event as IDs "
              ."FROM Events e "
              ."WHERE e.Aktywny = 0";

        //echo $sql;

        //echo $sql;
        $c = array();
        
        $result = $this->_db->query($sql);
        while ($row = $result->fetch_assoc()) { 
            $c[]=$row['IDs'];
        }
        $this->_otherlist = $c;
        
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
        $headerevent = "";
        $javascript = "";
        $userlist = "";
        
        $sql = "SELECT e.EventNazwa as Nazwa, e.EventStart as Start, e.EventEnd as Koniec, u.UserName as User "
              ."FROM Events e, Events_Rozdanie b, Rozdanie r, Users u "
               ."WHERE e.ID_Event = " . $id
              ." AND e.ID_Event = b.ID_Event AND b.ID_Rozdanie = r.ID_Rozdanie AND r.UserID = u.UserID";
        //echo $sql;



        
        $result = $this->_db->query($sql);

        // --- jakis sposob, zeby nie fetchowac po linijce? :/
        
        while ($row = $result->fetch_assoc()) {
            $headerevent = "<div class='headevent' onclick='ukryj" . $id . "()'>"
                          ."<p>"
                          ."<span>" . $row['Nazwa'] . " |  </span>"
                          ."<span>" . $row['Start'] . " | </span>"
                          ."<span>" . $row['Koniec'] . "</span>"
                          ."</p>"
                          ."</div>";
            $userlist .= "<p class='usersevent" . $id ."'>" . $row['User'] . "</p>";
        }


        $javascript = "<script>"
                     ."function ukryj" . $id . "(){"
                     ."var x = document.getElementsByClassName('usersevent".$id ."');"
                     ."x[0].style.visibility = 'hidden';"
                     ."}"
                     ."</script>";
        
        return $headerevent . $userlist . $javascript;
            
    }

    public function wrocPart() {
        return $this->_partlist;
    }
    

    
}
?>
