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
        $files = $_FILES['img'] ; // Super Global Variable Work with Files 

        // Get UPloaded files info from its array -> ($_FILES)
        $file_name = $files['name'] ; 
        $file_type = $files['type'] ; 
        $file_tmp_name = $files['tmp_name'] ; 
        $file_error = $files['error'] ; 
        $file_size = $files['size'] ; 

        // get information about the image 
        $file_path_info = pathinfo($file_name) ; 
        // valid info in the array -> extension 
        $extension = $file_path_info['extension'];
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

        $img_upload = $validator->image($file_name , $file_error , $extension);

        $errors = $validator->errors ; 
        if ($errors !== [])
        {
            $_SESSION['errors'] = $errors ; 
            header('location:addProduct.php') ;  
        }
        else
        {
            
            // Get Name That Will be Mostly an unique using function uniqid(); and the new name will added in the data base 
            // Notice when we send the image name we will use this new name ($new_img_name) not ($img)
            $new_img_name = uniqid().'.'.$extension;
            // Make A Destenation To Save The Unique Image Name I Selected 
            $destenation = "uploads/".$new_img_name ; 
            // Function Used For Uploading the Image Using tmp to choose where it save into the second var -> $destenation
            move_uploaded_file($file_tmp_name , $destenation); 
            
            
            $productAdded = new Products() ; 
            // Because of Return in a function we save it in a variable  
            $is_added = $productAdded->store($_SESSION['user_id'], $name, $description, $price, $pieces_no, $new_img_name);
            header('location:yourProducts.php') ;
        }
    }
    else
    {
        header('location:index.php');
    }

?>