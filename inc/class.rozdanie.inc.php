<?php
class Rozdanie
{

    private $_db;
    //private $_rozdanie_info;
    private $_txts = array();
    private $_idtxts = array();
    private $_hits = array();
    
    
    public function __construct($db = NULL, $id_rozdanie)
    {
        if(is_object($db)) {
            $this->_db = $db;
        } else {
            $this->_db = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
        }        
        
        //$sql = "SELECT r.ID_BS id, r.CzyTrafione hit, s.BSText txt FROM LinieRozdan as r JOIN Bshits as s WHERE ID_Rozdanie = " . $id_rozdanie;  
        $sql = "SELECT r.PoleRozdania pole, r.ID_BS id, r.CzyTrafione hit, s.BSText txt " 
              ."FROM BSB.LinieRozdan as r JOIN BSB.BShits as s ON r.ID_BS = s.ID_BS WHERE r.ID_Rozdanie = " . $id_rozdanie
              ." ORDER BY pole ASC";
        $rozdanie_info = $this->_db->query($sql);
        
        while ($row = $rozdanie_info->fetch_assoc()) {
            $this->_txts[] = $row['txt'];
            $this->_idtxts[] = $row['id'];
            $this->_hits[] = $row['hit'];
        }
            
    }

    public function getHits()
    {
        return $this->_hits;
    }

    public function getTxts()
    {
        return $this->_txts;
    }

    public function getIDTxts()
    {
        return $this->_idtxts;
    }

    public function showRozdanie()
    {
        $html = <<<EOT
        hello
        EOT;

        return $html;
    }
}
?>
