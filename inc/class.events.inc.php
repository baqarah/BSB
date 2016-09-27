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


    public function getNextEvent()
    {
        $sql = "SELECT DISTINCT r.ID_Rozdanie as IDroz, e.ID_Event as IDeve "
              ."FROM Events e, Rozdanie r "
              ."WHERE e.ID_Event = r.ID_Event AND e.Aktywny = 1 AND r.UserID = " . $this->_userid
              ." AND e.EventStart > CURDATE() ORDER BY e.EventStart DESC";
        $result = $this->_db->query($sql);
        $row = $result->fetch_assoc();
        $n = $row['IDroz'];
        
        return $n;
    }

    
    public function getPartList()
    {
        $sql = "SELECT DISTINCT e.ID_Event as IDs "
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
        $sql = "SELECT DISTINCT r.ID_Event as IDs "
              ."FROM Events e, Rozdanie as r "
              ."LEFT JOIN (SELECT ID_Event, 1 as test FROM Rozdanie WHERE UserID = " . $this->_userid . ") as s "
              ."ON r.ID_Event = s.ID_Event "
              ."WHERE test IS NULL AND e.ID_Event = r.ID_Event AND e.Aktywny = 1";
        
        $a = array();
        
        $result = $this->_db->query($sql);
        while ($row = $result->fetch_assoc()) { 
            $a[]=$row['IDs'];
        }
        return $a;
    }

    public function getOtherList()
    {
        $sql = "SELECT DISTINCT e.ID_Event as IDs "
              ."FROM Events e "
              ."WHERE e.Aktywny = 0";
        // tutaj trzeba bedzie dodac czasowe ograniczenie Aktwyny jest bez sensu
        
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

            $new_event_id = $this->_db->insert_id;
            $new_rozdanie_id = $this->joinEvent($new_event_id);
            

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
        $sql = "INSERT INTO Rozdanie(ID_Event, UserID) VALUES (" . $id . "," . $this->_userid . ")";
        
        $result = $this->_db->query($sql);
        $last_id = $this->_db->insert_id;

        //historyczny kod przed zmiana bazy danych:
        //$sql = "INSERT INTO Events_Rozdanie(ID_Event, ID_Rozdanie) VALUES (" . $id . ", " . $last_id . ")";
        //$result = $this->_db->query($sql);
        
        echo $sql;
        
        $this->rngRozdanie($last_id);//losowanie rozdania bedzie tutaj!
        
        return $last_id;
    }
    
    public function leaveEvent($id)
    {
        $sql = "SELECT ID_Rozdanie FROM Rozdanie WHERE ID_Event = " . $id . " AND UserID = " . $this->_userid;
        $result = $this->_db->query($sql);
        $row = $result->fetch_assoc();
        $id_rozdanie  = $row['ID_Rozdanie'];

        $sql = "DELETE FROM LinieRozdan WHERE ID_Rozdanie = " . $id_rozdanie;
        $this->_db->query($sql);

        $sql = "DELETE FROM Rozdanie WHERE ID_Event = " . $id . " AND UserID = " . $this->_userid;
        $this->_db->query($sql);

        return "Event number " . $id . " left";       
    }

    public function rngRozdanie($id_rozdanie)
    {
        $sql = "SELECT ID_BS  FROM BSB.BShits";
        $result = $this->_db->query($sql);
        
        while($row = $result->fetch_assoc()) {
            $rows[] = $row['ID_BS'];
        }
        
        $rngArray = array();
        
        $i = 0;
        $temp_to_splice = $rows;
        array_splice($temp_to_splice, 0, 1);
        $lines = count($temp_to_splice);
        
        while ($i < 25) {
            if ($i != 12) { 
	        $rand_line = rand(0, $lines - 1);
	        $rngArray[$i] =  $temp_to_splice[$rand_line];
	        array_splice($temp_to_splice, $rand_line, 1); 
	        $lines--;
            } else {
	        $rngArray[$i] = 1;
            }
            $i++;
        }   
        
        for ($y = 0; $y <= 24; $y++) {
            
            if ($y == 12) {
                $hit = 1;
            } else {
                $hit = 0;
            }
            $z = $y + 1;
            
            $sql = "INSERT INTO LinieRozdan(ID_Rozdanie, PoleRozdania, ID_BS, CzyTrafione) VALUES("
                  . $id_rozdanie . ", " . $z . ", " . $rngArray[$y] . ", " . $hit . ")"; 
            $this->_db->query($sql);
            echo $sql . "\n";
        }

        //return $tempstring;
    }
}
    
?>
