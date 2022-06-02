<?php include('inc/session.php') ?>

<?php
    include('classes/Db.php') ; 
    include('classes/Products.php') ; 
    if (isset($_GET['product_id']))
    {
        $product_id = $_GET['product_id'] ; 

        $product = new Products() ;
        $productView = $product-> show($product_id) ;
    }
?>

<!-- html head tag -->
<?php include('inc/head.php') ;  ?>

<body>
    <!--Navbar-->
    <?php include('inc/navbar.php') ; ?>
    
    <!--content for each page -->
    <?php if(isset($_GET['product_id']) && $productView !== FALSE ){?>

        <!--View Products If there are products found  -->
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-6 m-auto">
                    <h3 class=" text-center">
                        <?php echo $productView['name'] ;  ?>
                    </h3>
                    <img src="uploads/<?php echo $productView['img'];?>" class="w-100 " alt="1.jpg" title="Laptop">
                    
                    <div class="d-flex justify-content-between "> 
                        <p class="price">
                            <?php echo "$".number_format($productView['price']) ;?>     
                        </p>
                        <p class="pieces-no">
                            <?php echo $productView['pieces_no'] ." Places Avaliable" ;  ?> 
                        </p>
                    </div>
                    <p class="text-center username">
                        <strong>Added At : </strong>
                        <?php echo $productView['created_at'] ;  ?>
                    </p>

                    <p class="text-center username">
                        <strong>Added By : </strong>
                        <?php echo  $productView['username'] ;  ?>
                    </p>

                    <p class="text-muted text-center">
                        <?php echo $productView['description'];  ?>                            
                    </p>  
                        
                    <div class="d-flex justify-content-center mt-4" >
                        <div>

                        <?php if(isset($_SESSION['user_id']) && $productView['user_id'] == $_SESSION['user_id']) { ?>
                            <a href="editProduct.php?product_id=<?php echo $productView['product_id']; ?>"title="Edit" class=" btn btn-info">
                                <i class="fas fa-edit"></i>
                            </a>

                            <a href="handleDeleteProduct.php?product_id=<?php echo $productView['product_id']; ?>"title="Delete" class=" btn btn-danger"
                            onclick="return confirm('Are You Sure You Want To Delete This Product');" >
                                <i class="fas fa-trash"></i>
                             </a>
                        <?php } ?>
                         
                            <a href="index.php"title="Go Home" class=" btn btn-success"
                            onclick="return confirm('Are You Sure You Want To Go Home')">
                                <i class="fas fa-home"></i>
                            </a>
                        </div>
                    </div>
                       
                </div>
                
            </div>
             
        </div>

    <?php }else { ?>
        <div class="not-found d-flex justify-content-center align-items-center">
            <p>You Haven't The Permession To Enter Here  .</p>
        </div>
    <?php } ?>

    <!--footer-->
    <?php include('inc/footer.php') ; ?>

    <!--scripts -->
    <?php include('inc/scripts.php') ; ?>

</body>
</html> 