<?php

    include('inc/session.php') ; 
    include('classes/Db.php') ; 
    include('classes/User.php') ; 
    include('classes/Validator.php') ;  


    if(isset($_POST['submit']))
    {
        // Read user inputs >> form 
        $username = $_POST['username'] ; 
        $email = $_POST['email'] ; 
        $password = $_POST['password'] ; 
        $confim_password = $_POST['confirm_password'] ;  
        
        /*
            Validation
        */

        $validator = new Validator() ; 
        // as we know any return value must be save in a variable
        $username = $validator->username($username) ;
        $email = $validator->email($email) ;
        $password = $validator->password($password , $confim_password) ;

        $errors = $validator->errors ;  
        if ($errors !== [])
        {
            $_SESSION['errors'] = $errors ; 
            header('location:register.php') ;
        }
        else
        {
            // Register using User Class 
        $user = new User() ; 
        $is_registered = $user->register($username , $email , $password) ; 

        // check if registered successfully
        if ($is_registered !== FALSE) {
            
            $_SESSION['user_id'] = $is_registered ; 
            $_SESSION['username'] = $username ; 

            // redirect to index page 
            header('location:index.php') ; 
        } else {
            // redirect to reguster page 
            $_SESSION['errors'] = ["Failed To Register"] ; 
            header('location:register.php') ; 
        }
            $conn->close();
        }
        }    
        
        else
        {
            header('location:index.php');
        }
?>