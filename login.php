<?php include('inc/session.php') ?>

<?php
    if(isset($_SESSION['user_id']))
    {
        header('location:index.php') ; 
    }
?>

<!-- html head tag -->
<?php include('inc/head.php') ;  ?>

<body>

<!--Navbar-->

<?php include('inc/navbar.php') ; ?>
<div class="stl"></div>
<!--content for each page -->

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
    <div class="container form-cont mt-5">
        <div class="row">
            <div class="col-md-6 m-auto form-border">
                <form action="handlelogin.php" method="post">

                    <h5 class="text-center mb-4">LOGIN FORM</h5>
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

                    <div class="text-center">
                        <input class="btn btn-primary mt-3 px-5" type="Submit" name="submit" value="Login">
                    </div>          
                </form>
            </div>

        </div>
    </div>
 
<!--footer-->
<?php include('inc/footer.php') ; ?>

<!--scripts -->
<?php include('inc/scripts.php') ; ?>

</body>
</html> 