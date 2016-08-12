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
            echo "already connected";
        } else {
            $this->_db = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
            echo "connected";
        } 


    }
}

?>
