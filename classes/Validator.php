<?php

    class Validator
    {
        var $errors = []; 
        // Checking Validation Of User Name
        public function username($username)
        {
            if ($username == '')
            {
                $error = 'Please Fill in Your Name cat not be null ';
            }
            else if (!is_string($username))
            {
                $error = 'User Name Must Be String'; 
            }
            else if (strlen($username) < 4)
            {
                $error = 'User Name Must Be Greater Than 3 Characters '; 
            }
            else if (strlen($username) > 100)
            {
                $error = 'User Name Must Be Less Than 100 characters ';
            }
            else
            {
                return $username; 
            }
            // array if there were an error exists and dont send the user name
            array_push($this->errors , $error );
            return false;
        
        }

        // Checking Email Validation
        public function email($email)
        {
            if ($email == '')
            {
                $error = 'Email Cannot Be Null ';
            }
            else if (!filter_var($email , FILTER_VALIDATE_EMAIL))
            {
                $error = 'Your Email Is Wrong Please Insert invalid One'; 
            }
            else if (strlen($email) > 100)
            {
                $error = 'Email Must Be Less Than 100 characters '; 
            }
            else
            {
                return $email; 
            }
            // array if there were an error exists and dont send the user name
            array_push($this->errors , $error );
            return false;
        }

        // Cheking Password Validation 
        public function password($password , $confirm_password = null )
        {
            if ($password == '')
            {
                $error = 'Password Can not Be Empty ';
            }
            else if (!is_string($password))
            {
                $error = 'Password Must Be Number'; 
            }
            else if (strlen($password) < 8)
            {
                $error = 'Password Must Be Greater Than 8 Characters '; 
            }
            else if (strlen($password) > 50)
            {
                $error = 'Password Must Be Less Than 50 characters ';
            }
            else if ($confirm_password !== null && $password !== $confirm_password)
            {
                $error = 'Confirm Password Must Equal Password'; 
            }
            else
            {
                return $password; 
            }
            // array if there were an error exists and dont send the user name
            array_push($this->errors , $error );
            return false;
        } 

        // For Checking Name
        public function name($name)
        {
            if ($name == '')
            {
                $error = 'Please Fill in Name cat not be null ';
            }
            else if (!is_string($name))
            {
                $error = 'name Must Be String'; 
            }            
            else if (strlen($name) > 100)
            {
                $error = 'name Must Be Less Than 100 characters ';
            }
            else
            {
                return $name; 
            }
            // array if there were an error exists and dont send the user name
            array_push($this->errors , $error );
            return false;
        }

        // For Description 
        public function description($description)
        {
            
            if (!is_string($description))
            {
                $error = 'description Must Be String'; 
            }
            else if (strlen($description) > 1000)
            {
                $error = 'description Must Be Less Than 1000 characters ';
            }
            else
            {
                return $description; 
            }
            // array if there were an error exists and dont send the user name
            array_push($this->errors , $error );
            return false;
        }

        //For Price 
        public function price($price)
        {
            if ($price == '')
            {
                $error ='Price cannot Be Null';
            }
            else if (!is_numeric($price) )
            {
                $error = ' Price Must Be integer '; 
            }
            else 
            {
              return $price;  
            }
            // array if there were an error exists and dont send the user name
            array_push($this->errors , $error );
            return false;
        }

        // For Number Valid 
        public function pieces_no($pieces_no)
        {
            if ($pieces_no == '')
            {
                $error ='pieces_no cannot Be Null';
            }
            else if (!is_numeric($pieces_no) )
            {
                $error = ' pieces_no Must Be integer '; 
            }
            else 
            {
              return $pieces_no;  
            }
            // array if there were an error exists and dont send the user name
            array_push($this->errors , $error );
            return false;
        }

        //For Image 
        public function image($file_name , $file_error , $file_type)
        {
            $types = ['jpg' , 'png' , 'gif' , 'jpeg'];

            if ($file_name = '')
            {
                $error = 'image is required'; 
            }
            else if ($file_error !== 0)
            {
                $error = "Error In your Image Uploaded"; 
            }
            else if (!in_array($file_type ,$types ))
            {
                $error = "Your Uploaded File Is Not An Image "; 
            }
            else
            {
                return true; 
            }
            array_push($this->errors , $error);
            return false; 
        }
    
    
    
    }



?>