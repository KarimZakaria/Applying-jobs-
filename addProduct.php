<?php include('inc/session.php') ?>

<?php
  if(!isset($_SESSION['user_id']))
  {
    header('location:login.php') ; 
  }
?>
<!-- html head -->
<?php include('inc/head.php') ; ?>

<!--Navbar-->

<?php include('inc/navbar.php')?>

<?php if(isset($_SESSION['errors']) and $_SESSION['errors'] != []) { ?>
    <div class="container mt-5">
      <div class="row">
        <div class="col-md-6 m-auto errors-list">
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

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6 m-auto form-border">
                <form action="handleaddProduct.php" method="post" enctype="multipart/form-data">
                <h5 class="text-center"> Add Your Job </h5>
                <div class="form-group">
            <label for="name">Job name</label>
            <input type="text" class="form-control" name="name" id="name">
          </div>
          <div class="form-group">
            <label for="description">Job Details</label>
            <textarea class="form-control" name="description" id="description" rows="8"></textarea>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="price">Salary Price</label>
                <input type="number" class="form-control" name="price" id="price">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="pieces_no">Applicants Needed</label>
                <input type="number" class="form-control" name="pieces_no" id="pieces_no">
              </div>
            </div>
          </div>

          <div class="form-group">
            <label for="img">Image</label>
            <input type="file" class="form-control" name="img"  id="img">
          </div>
                    <div class="text-center">
                        <!--submit button has a name so that if send data he will check if data sent or not  -->
                        <input class="btn btn-primary mt-3" type="Submit" name="submit" value="Add Job">
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