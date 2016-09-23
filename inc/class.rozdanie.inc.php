<?php
class Rozdanie
{

    private $_db;
    private $_rozdanie_info;
    //private $_bstexts;
    //private $_hits;
    
    
    public function __construct($db = NULL, $id_rozdanie)
    {
        if(is_object($db)) {
            $this->_db = $db;
        } else {
            $this->_db = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
        }        
        
        //$sql = "SELECT r.ID_BS id, r.CzyTrafione hit, s.BSText txt FROM LinieRozdan as r JOIN Bshits as s WHERE ID_Rozdanie = " . $id_rozdanie;  
        $sql = "SELECT r.PoleRozdania pole, r.ID_BS id, r.CzyTrafione hit, s.BSText txt " 
              ."FROM BSB.LinieRozdan as r JOIN BSB.BShits as s ON r.ID_BS = s.ID_BS WHERE r.ID_Rozdanie = " . $id_rozdanie;
        $this->_rozdanie_info = $this->_db->query($sql);
                   
    }

    public function getHits()
    {
        $a = array();
        while ($row = $this->_rozdanie_info->fetch_assoc()) {
            $a[]=$row['hit'];
        }
        return $a;
    }

    public function getTxts()
    {
        $a = array();
        while ($row = $this->_rozdanie_info->fetch_assoc()) {
            $a[]=$row['txt'];
        }
        return $a;
    }

    public function getIDTxts()
    {
        $a = array();
        while ($row = $this->_rozdanie_info->fetch_assoc()) {
            $a[]=$row['id'];
        }
        return $a;
    }

    public function showRozdanie()
    {
        
    }

    

    
}
?>
