<?php

    include('inc/session.php') ; 
    include('classes/Db.php') ;
    include('classes/User.php') ; 
    include('classes/Validator.php') ;  
 

    if(isset($_POST['submit']))
    { 
        // Read user inputs from the form
        $email = $_POST['email'] ; 
        $password = $_POST['password'] ; 
      
         /*
            Validation 
         */
        $validator = new Validator() ;
        
        // as we know any return value must be save in a variable
        $email = $validator->email($email) ;
        $password = $validator->password($password) ;

        $errors = $validator->errors ;  
        if ($errors !== [])
        {
            $_SESSION['errors'] = $errors ; 
            header('location:login.php') ;
        }
        else
        {
            // login using User class
        $user = new User() ; 
        $is_logedin = $user->login($email , $password) ;

        // check if logged in 
        if($is_logedin !== FALSE)
        {
            // set session variables 
            $_SESSION['user_id'] = $is_logedin["user_id"] ; 
            $_SESSION['username']= $is_logedin["username"];
            // redirect to index page 
            header('location:index.php');
        }
        else 
        {
            // redirect to login page 
            $_SESSION['errors'] = ['Failed To Login Your Info Is Not Correct'] ; 
            header('location:login.php') ; 
        }
        $conn->close();
        }
        }

    else
    {
        header('location:index.php');
    }

?> 