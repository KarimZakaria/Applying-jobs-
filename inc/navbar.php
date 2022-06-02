<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="index.php">JOBS APPLYING</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">All Jobs</a>
      </li>
      <?php if(isset($_SESSION['username'])) { ?>
        <li class="nav-item active">
          <a class="nav-link" href="yourProducts.php">Your jobs</a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="addProduct.php">Add New Job</a>
        </li>
      <?php } ?>

    </ul>
    
    <ul class="navbar-nav ml-auto">
      <?php if(!isset($_SESSION['username'])) { ?>
        <div class=" register">
          <li class="nav-item active">
            <a class="nav-link" href="register.php">Register</a>
          </li>
        </div>
        <div class=" login">
          <li class="nav-item active">
            <a class="nav-link" href="login.php">Login</a>
          </li>
       </div>
      <?php } else { ?>
        <li class="nav-item">
          <a class="nav-link disabled"><?php echo $_SESSION['username']; ?></a>
        </li>
        <div class="logout">
        <li class="nav-item active ">
          <a class="nav-link " href="handleLogout.php"
          onclick="return confirm('Do You Want To Logout ?') ;">Logout</a>
        </li>
       </div>
      <?php } ?>
    </ul>
  </div>
</nav>