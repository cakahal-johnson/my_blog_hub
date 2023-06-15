<!-- Header -->
<header class="">
  <nav class="navbar navbar-expand-lg">
    <div class="container">
      <a class="navbar-brand" href="index.php"><img src="logo2.png" width="150" class="logo" alt="logo">
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="/">Home
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="about.php">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="blog.php">Blog</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="post-details.php">Post</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="contact.php">Contact</a>
          </li>

          <?php if (isset($_SESSION['id'])) : ?>
            <li class="nav-item">
              <div class="dropdown">
                <a class=" dropdown-toggle nav-link" href="#" role="" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <?php echo $_SESSION['username'];?>
                </a>
  
                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                  <a class="dropdown-item" href="#"></a>
                   <?php if($_SESSION['admin']):?>
                  <a class="dropdown-item" href="../../admin/dashboard.php">Dashboard</a>
                  <?php endif; ?>
                  <a class="dropdown-item" href="#">Logout</a>
                </div>
              </div>
            </li>
          <?php else: ?>
            <li class="nav-item">
              <a class="nav-link" style="outline: 2px solid gold;" href="login.php">Get Started</a>
            </li>
          <?php endif;?>

        </ul>
      </div>
    </div>
  </nav>
</header>