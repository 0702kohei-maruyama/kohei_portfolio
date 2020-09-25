<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>MENUBAR</title>

  <!-- Bootstrap core CSS -->
  <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://kit.fontawesome.com/f7ad5e1e35.js" crossorigin="anonymous"></script>
  <!-- Custom fonts for this template -->
  <link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="../css/one-page-wonder.min.css" rel="stylesheet">
</head>
<body>
  <?php
  if(empty($_SESSION['role'])){
  ?>
    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom fixed-top">
    <div class="container">
      <a class="navbar-brand" href="homepage.php">Buy E-Ticket</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">

        <ul class="navbar-nav">
          <li class="nav-item">
            <a href="homepage.php#buyTicket" class="nav-link">
              Buy Ticket
            </a>
          </li>

          <li class="nav-item">
            <a href="homepage.php#aboutUs" class="nav-link">
              About Us
            </a>
          </li>

          <li class="nav-item">
            <a href="homepage.php#contact" class="nav-link">
              Contact
            </a>
          </li>

        </ul>

        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="createAccount.php">
              <i class="fas fa-user-plus"></i>  
              Sign Up
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="login.php">
              <i class="fas fa-sign-in-alt"></i>
              Log In
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav> 
  <?php
  }elseif($_SESSION['role'] == "A"){
    ?>
    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom fixed-top">
      <div class="container">
        <a class="navbar-brand" href="homepage.php">Buy E-Ticket</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a href="addTicket.php" class="nav-link">
                Add Ticket
              </a>
            </li>

            <li class="nav-item">
              <a href="homepage.php#buyTicket" class="nav-link">
                Buy Ticket
              </a>
            </li>

            <li class="nav-item">
              <a href="homepage.php#aboutUs" class="nav-link">
                About us
              </a>
            </li>
            
            <li class="nav-item">
              <a href="homepage.php#contact" class="nav-link">
                Contact
              </a>
            </li>
          </ul>

          
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="editUser.php">
                <?= $_SESSION['username']?>'s Page
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="logout.php">
              <i class="fas fa-sign-out-alt fa-lg"></i> Log Out</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  <?php
  }elseif($_SESSION['role'] == "U"){
  ?> 
    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom fixed-top">
      <div class="container">
        <a class="navbar-brand" href="homepage.php">Buy E-Ticket</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">

          <ul class="navbar-nav">
            <li class="nav-item">
              <a href="homepage.php#buyTicket" class="nav-link">
                Buy Ticket
              </a>
            </li>

            <li class="nav-item">
              <a href="homepage.php#aboutUs" class="nav-link">
                About Us
              </a>
            </li>

            <li class="nav-item">
              <a href="homepage.php#contact" class="nav-link">
                Contact
              </a>
            </li>

          </ul>

          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="editUser.php">
                <?= $_SESSION['username']?>'s Page
              </a>
            </li>

            <li class="nav-item">
              <a href="shopCart.php" class="nav-link">
              <i class="fas fa-shopping-cart"></i>
                Cart
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="logout.php">
              <i class="fas fa-sign-out-alt fa-lg"></i> Log Out</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  <?php
  }
  ?>
  <!-- <nav class="navbar navbar-expand-lg navbar-dark navbar-custom fixed-top">
    <div class="container">
      <a class="navbar-brand" href="homepage.php">Buy E-Ticket</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">

        <ul class="navbar-nav">
          <li class="nav-item">
            <a href="homepage.php#buyTicket" class="nav-link">
              Buy Ticket
            </a>
          </li>

          <li class="nav-item">
            <a href="homepage.php#aboutUs" class="nav-link">
              About Us
            </a>
          </li>

        </ul>

        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="createAccount.php">
              <i class="fas fa-user-plus"></i>  
              Sign Up
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="login.php">
              <i class="fas fa-sign-in-alt"></i>
              Log In
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav> -->
  

</html>
