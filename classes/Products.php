<?php

    class Products
    {
        // Read all Products 
        public function index()
        {
            global $conn; 
            
            // query used for get data join all tables 
            $sql = "SELECT users.username , products.* , product_imgs.img_id , product_imgs.img 
            FROM users JOIN products JOIN product_imgs 
            ON users.user_id = products.user_id 
            AND products.product_id = product_imgs.product_id 
            ORDER BY products.product_id DESC"; 
            
            $result = $conn->query($sql);
            $productView = []; 

            if ($result->num_rows > 0) {
                // output data of each row 
                while($row = $result->fetch_assoc()) 
                {
                   array_push($productView , $row );
                }
                return $productView; 
            }
            else 
            {
                return false; 
            }
            
        }

        // Show all products 
        public function show($product_id)
        {
            global $conn; 
            
            // query used for get data which determined by id  
            $sql = "SELECT users.username , products.* , product_imgs.img_id , product_imgs.img 
            FROM users JOIN products JOIN product_imgs 
            ON users.user_id = products.user_id 
            AND products.product_id = product_imgs.product_id 
            WHERE  products.product_id = '$product_id'";
            
            $result = $conn->query($sql);

            if ($result->num_rows == 1) {
                $product = $result->fetch_assoc(); 
                return $product;
            }
            else 
            {
                return false; 
            }
        }


        // Read User Products 
        public function yourProducts($user_id)
        {
            global $conn; 
            
            // query used for get data join all tables 
            $sql = "SELECT users.username , products.* , product_imgs.img_id , product_imgs.img 
            FROM users JOIN products JOIN product_imgs 
            ON users.user_id = products.user_id 
            AND products.product_id = product_imgs.product_id 
            WHERE products.user_id = '$user_id'
            ORDER BY products.product_id DESC"; 
            
            $result = $conn->query($sql);
            $productContainer = []; 

            if ($result->num_rows > 0) {
                // output data of each row 
                while($row = $result->fetch_assoc()) 
                {
                   array_push($productContainer , $row );
                }
                return $productContainer; 
            }
            else 
            {
                return false; 
            }
        }

        // Adding New Products 
        public function store($user_id, $name, $description, $price, $pieces_no, $img)
        {
            global $conn; 

            // prepare values coming before query 
            $name = mysqli_real_escape_string($conn , $name); 
            $description = mysqli_real_escape_string($conn , $description); 
            
            // make a query  and return last_id inserted
            $sql = "INSERT INTO products (`user_id`, `name`, `description`, price, pieces_no, created_at)
                    VALUES ('$user_id', '$name', '$description', '$price', '$pieces_no', CURRENT_DATE())";

            if ($conn->query($sql) === TRUE) {
                $last_id = $conn->insert_id;

                $sql = "INSERT INTO product_imgs (`product_id`, `img`)
                VALUES ('$last_id', '$img')
                ";

                if ($conn->query($sql) === TRUE) {
                return true;
                } else {
                return false;
                }
            } else {
                return false;
            }
        }

        // Update Products
        public function update($product_id, $name, $description, $price, $pieces_no)
        {
            global $conn; 
            // prepare values coming before query 
            $name = mysqli_real_escape_string($conn , $name); 
            $description = mysqli_real_escape_string($conn , $description);

            $sql = "UPDATE products  
                SET `name` = '$name' , 
                    `description` = '$description' , 
                    `price` = '$price' , 
                    `pieces_no` = '$pieces_no' 
                WHERE `product_id` = '$product_id' "; 


            if ($conn->query($sql) === TRUE) 
            {
                return true;
            } else 
            {
                return false;
            }
        }

        //Delete Product 
        public function delete($product_id , $user_id)
        {
            global $conn; 
            $sql = "DELETE FROM products 
                    WHERE product_id = '$product_id'
                    AND `user_id` = '$user_id'
                    ";

            if ($conn->query($sql) === TRUE) 
            {
                return true;
            } else 
            {
                return false;
            }
        }
            


    }

?>