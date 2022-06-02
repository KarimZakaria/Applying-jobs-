<?php 

    class User 
    {
        public function register($username , $email , $password )
        {
            global $conn ; 

            // prepare values coming before query 
            $password = sha1($password) ; 
            $username = mysqli_real_escape_string($conn , $username) ; 
            $email = mysqli_real_escape_string($conn , $email) ; 
            
            // make a query  and return last_id inserted
            $sql = "INSERT INTO users (username , email , `password` , created_at)
            VALUES ('$username' , '$email' , '$password' , CURRENT_DATE() )" ; 

            if ($conn->query($sql) === TRUE) 
            {
                $last_id = $conn->insert_id;
                return $last_id ; 
            } else {
                return false ; 
            }

        }


        function login($email , $password)
        {
            global $conn ;

            // prepare values coming before query 
            $password = sha1($password) ; 
            $email = mysqli_real_escape_string($conn , $email) ;
            
            //make query and return row
            $sql = "SELECT user_id , username FROM users 
                    WHERE email = '$email' 
                    AND password = '$password'";

            $result = $conn->query($sql);

            if ($result->num_rows == 1) {
                $row = $result->fetch_assoc() ; 
                return $row ;  
                   
            } else {
                return false ; 
           }
            $conn->close();
        }
        
    }

    



?>
 