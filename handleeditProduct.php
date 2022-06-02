<?php
    include('inc/session.php') ; 
    include('classes/Db.php')  ; 
    include('classes/Products.php');
    include('classes/Validator.php') ;  

    if (isset($_POST['submit']))
    {
        $name = $_POST['name'] ; 
        $description = $_POST['description'] ; 
        $price = $_POST['price'] ; 
        $pieces_no = $_POST['pieces_no'] ; 
         
        /*
            Validation 
        */
        $validator = new Validator() ; 

        $name = $validator->name($name) ; 
        if ($description !== '')
        {
            $description = $validator->description($description) ; 
        }
        $price = $validator->price($price) ;
        $pieces_no = $validator->pieces_no($pieces_no) ;

        $errors = $validator->errors ; 
        if ($errors !== [])
        {
            $_SESSION['errors'] = $errors ; 
            header('location:editProduct.php?product_id=' .$_SESSION['product_id']) ;  
        }
        else 
        {
            $productAdded = new Products() ;
            $is_added = $productAdded->update($_SESSION['product_id'], $name, $description, $price, $pieces_no);

            if ($is_added === TRUE)
            {
                header('location:showProduct.php?product_id=' .$_SESSION['product_id']);
            }
            else
            {
                header('location:editProduct.php?product_id=' .$_SESSION['product_id']) ; 
            }
        }
    }

    else
    {
        header('location:index.php');
    }

?>