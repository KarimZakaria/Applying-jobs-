<?php 
    
    class Db 
    {
        var $servername ; 
        var $db_username ; 
        var $db_password ; 
        var $dbname ; 

        // Make Constructor
        public function __construct($servername , $db_username , $db_password , $dbname)
        {
            $this->servername = $servername;
            $this->db_username = $db_username ; 
            $this->db_password = $db_password ; 
            $this->dbname = $dbname ;
        }
        
        // Make Connection 
        public function getConnection()
        {
            $conn =new mysqli($this->servername , $this->db_username , $this->db_password , $this->dbname) ;
            return $conn ;  
        }
    }

    // Take An Object From Class Db 
    $db = new Db("localhost" , "root" , "" , "karimdatabase" ); 
    $conn = $db->getConnection();

?>