<?php include('inc/session.php') ?>

<?php
    include('classes/Db.php') ; 
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
            $product = new Products() ;
            $productView = $product-> show($product_id) ;

            // Save Product_id in  a SESSION 
            $_SESSION['product_id'] = $product_id ; 
        }
    }

    
?>

<!-- html head -->
<?php include('inc/head.php') ; ?>

<!--Navbar-->

<?php include('inc/navbar.php')?>

<?php if(isset($_SESSION['errors']) and $_SESSION['errors'] != []) { ?>
    <div class="container mt-5">
      <div class="row">
        <div class="col-md-6 m-auto">
          <ul class="errors-list bg-danger">
            <?php foreach($_SESSION['errors'] as $error) { ?>
              <li class="text-center"><?php echo $error; ?></li>
            <?php } ?>
          </ul>
        </div>
      </div>
    </div>
  <?php } ?>

  <?php $_SESSION['errors'] = [] ;  ?>
<!--form-->
    <?php if(isset($_GET['product_id']) && $productView !== FALSE && $productView['user_id'] == $_SESSION['user_id']) { ?>
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-6 m-auto form-border">
                    <form action="handleeditProduct.php" method="post">
                    <div class="form-group">
                <label for="name">Product name</label>
                <input type="text" class="form-control" name="name" id="name" value="<?php echo $productView['name']; ?>">
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" name="description" id="description" rows="8">
                    <?php echo $productView['description']; ?>
                </textarea>
            </div>
            <div class="row">
                <div class="col-md-6">
                <div class="form-group">
                    <label for="price">Price</label>
                    <input type="number" class="form-control" name="price" id="price" value="<?php echo $productView['price']; ?>">
                </div>
                </div>
                <div class="col-md-6">
                <div class="form-group">
                    <label for="pieces_no">Pieces Number</label>
                    <input type="number" class="form-control" name="pieces_no" id="pieces_no" value="<?php echo $productView['pieces_no']; ?>">
                </div>
                </div>
            </div>

                <div class="text-center">
                    <!--submit button has a name so that if send data he will check if data sent or not  -->
                    <input class="btn btn-primary mt-3" type="Submit" name="submit" value="Confirm">
                </div>          
                    
                </div>

            </div>
        </div>
       
    <?php }else { ?>
        <div class="not-found d-flex justify-content-center align-items-center">
            <p>You Haven't The Permession To Edit Here  .</p>
        </div>
    <?php } ?>

<!--footer-->
<?php include('inc/footer.php')?>
 
<!-- scripts -->
<?php include('inc/scripts.php') ; ?>

</body>
</html>