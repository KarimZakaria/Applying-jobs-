<?php

    include('inc/session.php');
    include('classes/Db.php');
    include('classes/Products.php') ;

    if(!isset($_SESSION['user_id']))
    {
        header('location:login.php') ;
    }
    else
    {
    
        if (isset($_GET['product_id']))
        {
            $product_id = $_GET['product_id'] ; 
            // Check If he delete product he owns -> Important 
            $user_id = $_SESSION['user_id'] ; 
            $productDelete = new Products() ; 
            $is_deleted = $productDelete->delete($product_id , $user_id) ; 

            if ($is_deleted == FALSE)
            {
            /*
                    Error Message ! 
            */
            }
            header('location:index.php') ;
        }
    }


 
?>