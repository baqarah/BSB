<?php

class BSBUsers
{
    //Database object:
    private $_db;

    //checks for db object and creates one if not found
    public function __construct($db=NULL)
    {
        if(is_object($db)) {
            $this->_db = $db;
        } else {
            $this->_db = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
            //echo "connected";
        } 
    }     

    public function testowa()
    {
        return "test pomyslny";
    }      
     
       public function createAccount()
    {
       $u = trim($_POST["username"]);
       
       $sql = "SELECT COUNT(UserName) as theCount FROM Users WHERE UserName='" . $u . "'";
       echo $sql; 
       $result = $this->_db->query($sql);
        
            
       $row = $result->fetch_assoc();
       if($row['theCount']!=0){
            return "<h2> Error</h>"
                 . "<p> Your account name is already in use. </p>"
                 . "<p> Try again. Or not.<br> I am not your supervisor </p>";
       } else {
       
           $sql = "INSERT INTO Users(UserName) VALUES('" .$u. "')";
           $result = $this->_db->query($sql);
           return $u . " added";
       }    
    }
}
?>
