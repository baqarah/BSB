<?php
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
              ."FROM Events e, Rozdanie r "
              ."WHERE e.ID_Event = r.ID_Event "
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
        $sql = "SELECT r.ID_Event as IDs "
              ."FROM Events e, Rozdanie as r "
              ."LEFT JOIN (SELECT ID_Event, 1 as test FROM Rozdanie WHERE UserID = " . $this->_userid . ") as s "
              ."ON r.ID_Event = s.ID_Event "
              ."WHERE test IS NULL AND e.ID_Event = r.ID_Event AND e.Aktywny = 1";
        //trzba dodac wyrzucanie nieaktywnych !!!;
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
        // tutaj trzeba bedzie dodac czasowe ograniczenie
        
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

    public function showEvent($id, $mode="non-aktywne")
    {
        $nazwa = "";
        $start = "";
        $koniec = "";
        $arrayuser = array();
        
        $sql = <<<EOT
        SELECT e.EventNazwa as Nazwa, e.EventStart as Start, e.EventEnd as Koniec, u.UserName as User 
        FROM Events e, Rozdanie r, Users u 
        WHERE e.ID_Event = $id
        AND e.ID_Event = r.ID_Event AND r.UserID = u.UserID
EOT;

        
        $result = $this->_db->query($sql);
        
        while ($row = $result->fetch_assoc()) {
            //$row = $result->fetch_assoc();
            $nazwa = $row['Nazwa'];
            $start = $row['Start'];
            $koniec = $row['Koniec'];
            $arrayuser[] = $row['User'];
        }

        //---- Dodac sprawdzanie czy jest cos powyzszychj zmiennych
        require $_SERVER['DOCUMENT_ROOT'] . "/inc/class.events.showevent.php";

    }

    public function joinEvent($id)
    {

        $sql = "INSERT INTO Rozdanie(UserID) VALUES (" . $this->_userid . ")";
       
        $result = $this->_db->query($sql);
        $last_id = $this->_db->insert_id;

        $sql = "INSERT INTO Events_Rozdanie(ID_Event, ID_Rozdanie) VALUES (" . $id . ", " . $last_id . ")";
        $result = $this->_db->query($sql);
        
        echo $sql;
        
        return $last_id;
    }
}
    
?>
