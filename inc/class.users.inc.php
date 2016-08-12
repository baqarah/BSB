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
        //$u = trim($_POST['username']);
        //tak sie robi hashe - nie ebedize to mi narazie potrzebne, ignoruje wysylanie maila
        //$v = sha1(time());
        //$sql = 'SELECT COUNT(UserName) as theCount FROM Users'; // WHERE UserName="' .$u.'"';
        
        //$result = $this->_db->query($sql);
        //or die("Oh shit, whaddap");
            
        //$row = $result->fetch_assoc();
        //if($row['theCount']!=0){
        //    return "<h2> Error</h>"
        //         . "<p> Your account name is already in use. </p>"
        //         . "<p> Try again. Or not.<br> I am not your supervisor </p>";
        //}
        return "przynajmniej dziala";
        //$sql = "INSERT INTO BSBUsers(UserName) VALUES(" .$u. ")";
        //$result = $this->_db->query($sql);
        //$row = $result->fetch_assoc();
        //if(
           
    }
}
?>
