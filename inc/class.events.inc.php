<?php
$pth = $_SERVER['DOCUMENT_ROOT'];

class Events
{
    private $_db;
    private $_userid;
    //private $_partlist;
    private $_activelist;
    private $_otherlist;


    public function __construct($db = NULL, $username)
    {
        if(is_object($db)) {
            $this->_db = $db;
        } else {
            $this->_db = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
        }

        $sql = "SELECT UserID FROM Users WHERE UserName = '" . $username . "'";
        $result = $this->_db->query($sql);
        $row = $result->fetch_assoc();
        $this->_userid = $row['UserID'];
    }

    public function getPartList()
    {
        $sql = "SELECT e.ID_Event as IDs "
              ."FROM Events e, Events_Rozdanie b, Rozdanie r "
              ."WHERE e.ID_Event = b.ID_Event "
              ."AND b.ID_Rozdanie = r.ID_Rozdanie "
              ."AND e.Aktywny = 1 AND r.UserID =" . $this->_userid;

        $a = array();
        
        $result = $this->_db->query($sql);
        while ($row = $result->fetch_assoc()) { 
            $a[]=$row['IDs'];
        }
        return $a;
    }

    public function getActiveList()
    {
        $sql = "SELECT e.ID_Event as IDs "
              ."FROM Events e, Events_Rozdanie b, Rozdanie r "
              ."WHERE e.ID_Event = b.ID_Event "
              ."AND b.ID_Rozdanie = r.ID_Rozdanie "
              ."AND e.Aktywny = 1 AND r.UserID <>" . $this->_userid;
        //echo $sql;
        $a = array();
        
        $result = $this->_db->query($sql);
        while ($row = $result->fetch_assoc()) { 
            $a[]=$row['IDs'];
        }
        return $a;
    }

    public function getOtherList()
    {
        $sql = "SELECT e.ID_Event as IDs "
              ."FROM Events e "
              ."WHERE e.Aktywny = 0";
        
        $a = array();
        
        $result = $this->_db->query($sql);
        while ($row = $result->fetch_assoc()) { 
            $a[]=$row['IDs'];
        }
        return $a;
        
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

    public function showEvent($id)
    {
//        $nazwa = "";
//        $start = "";
//        $koniec = "";
        $arrayuser = array();
        
        $sql = <<<EOT
        SELECT e.EventNazwa as Nazwa, e.EventStart as Start, e.EventEnd as Koniec, u.UserName as User 
        FROM Events e, Events_Rozdanie b, Rozdanie r, Users u 
        WHERE e.ID_Event = $id
        AND e.ID_Event = b.ID_Event AND b.ID_Rozdanie = r.ID_Rozdanie AND r.UserID = u.UserID EOT;
        $result = $this->_db->query($sql);
        
        while ($row = $result->fetch_assoc()) {
            //$row = $result->fetch_assoc();
            $nazwa = $row['Nazwa'];
            $start = $row['Start'];
            $koniec = $row['Koniec'];
            $arrayuser[] = $row["User"];
        }
        
        require $pth . "/inc/class.users.inc.showevent.php";

    }
}
    
?>
