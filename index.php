<?php include('inc/session.php') ?>

<?php
    include('classes/Db.php') ; 
    include('classes/Products.php') ; 

    $product = new Products() ;
    $productView = $product-> index() ;
?>

<!-- html head tag -->
<?php include('inc/head.php') ;  ?>

<body>
    <!--Navbar-->
    <?php include('inc/navbar.php') ; ?>
    
    <!--content for each page -->
    <?php if($productView !== FALSE){?>

        <!--View Products If there are product found  -->
        <div class="container mt-5">
            <div class="row">
            <!-- CURD Product  -->
            <?php foreach ($productView as $product ){?>
             <div class="col-md-4 mb-5">
                    <div class="card">
                        <img src="uploads/<?php echo $product['img'] ;  ?>" class="card-img-top" alt="<?php echo $product['img']; ?>" title="<?php echo $product['name']; ?>">
                        <div class="card-body bg-light">
                            <h3 class="card-title text-center">
                                <?php echo $product['name'] ;  ?>
                            </h3>
                            <p class="text-center">
                                <strong>Added By : </strong>
                                <?php echo $product['username'] ;  ?>
                            </p>

                            <p class="text-center">
                                <strong>Published At : </strong>
                                <?php echo $product['created_at'] ;  ?>
                            </p>

                            <p class="card-text text-muted text-center">
                                <?php echo substr($product['description'] , 0 , 100)."....." ;  ?>                            
                            </p>
                            <div class="d-flex justify-content-between align-items-start"> 
                                <div>
                                    <a href="showProduct.php?product_id=<?php echo $product['product_id']; ?>"title="Details" class=" btn btn-primary">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <?php if(isset($_SESSION['user_id']) && $product['user_id'] == $_SESSION['user_id']) { ?>
                                        <a href="editProduct.php?product_id=<?php echo $product['product_id']; ?>"title="Edit" class=" btn btn-info">
                                            <i class="fas fa-edit"></i>
                                        </a>

                                        <a href="handleDeleteProduct.php?product_id=<?php echo $product['product_id']; ?>"title="Delete" class=" btn btn-danger"
                                        onclick="return confirm('Are You Sure You Want To Delete This Product ?') ;" >
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    
                                    <?php } ?>
                                </div>
                                <p class="price">
                                <?php echo "$".number_format($product['price']) ;  ?>     
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            
             
            <?php } ?>
            </div>
        </div>
        
        <!-- No Products found -->
        <?php }else { ?>
            <div class="not-found d-flex justify-content-center align-items-center">
                <p>There Is No Jobs Added Yet .</p>
            </div>
        <?php } ?>

            

    <!--footer-->
    <?php include('inc/footer.php') ; ?>

    <!--scripts -->
    <?php include('inc/scripts.php') ; ?>

</body>
</html> 