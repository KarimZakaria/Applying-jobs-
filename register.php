<?php include('inc/session.php') ?>

<?php
    if(isset($_SESSION['user_id']))
    {
        header('location:index.php') ; 
    }
?>

<!-- html head -->
<?php include('inc/head.php') ; ?>

<!--Navbar-->

<?php include('inc/navbar.php')?>

<!-- Show Errors -->
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
   <!-- session flash in laravel allows to enter any thing only once then as refresh its deleted -->
  <?php $_SESSION['errors'] = [] ;  ?>
<!--form-->

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6 m-auto form-border">
                <form action="handleregister.php" method="post">
                <div class="bg-dark">
                    <h5 class="text-center mb-4">REGISTERATION FORM</h5>
                </div>
                    <div class="form-group">
                        <label for="username">Company Name: </label> <!-- for satnds for id i recieved-->
                        <!-- id for SEO -->
                        <input class="form-control" id="username" type="text" name="username" placeholder="Enter Your Name">
                    </div>

                    <div class="form-group">
                        <label for="email"> Email: </label> <!-- for satnds for id i recieved-->
                        <!-- id for SEO -->
                        <input class="form-control" id="email" type="email" name="email" placeholder="Enter Your Email">
                    </div>

                    <div class="form-group">
                        <label for="password"> Password: </label> <!-- for satnds for id i recieved-->
                        <!-- id for SEO -->
                        <input class="form-control" id="password" type="password" name="password" placeholder="Enter Your Password">
                    </div>

                    <div class="form-group">
                        <label for="confirm-password">Confirm Password: </label> <!-- for satnds for id i recieved-->
                        <!-- id for SEO -->
                        <input class="form-control" id="confirm_password" type="password" name="confirm_password" placeholder="Confirm Your Password">
                    </div>
                    <div class="text-center">
                        <!--submit button has a name so that if send data he will check if data sent or not  -->
                        <input class="btn btn-dark px-5 mt-3  " type="Submit" name="submit" value="Register">
                        
                    </div>          
                </form>
            </div>

        </div>
    </div>

<!--footer-->
<?php include('inc/footer.php')?>
 
<!-- scripts -->
<?php include('inc/scripts.php') ; ?>

</body>
</html>