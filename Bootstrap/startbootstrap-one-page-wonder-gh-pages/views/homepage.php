<?php
  include '../action/userAction.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Home</title>

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

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark navbar-custom fixed-top">
    <div class="container">
      <a class="navbar-brand" href="#">Buy e-Ticket</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="logout.php">
            <i class="fas fa-sign-out-alt fa-lg"></i> Log Out
          </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <header class="masthead text-center text-white">
    <div class="masthead-content">
      <div class="container">
        <p class="masthead-subheading lead mb-0">Welcome <?=$_SESSION['username']?></p>
        <h1 class="masthead-heading mb-0">Buy e-Ticket</h1>
        <h2 class="masthead-subheading mb-0">You Can Buy Sport e-Ticket</h2>
        <a href="shop.php" class="btn btn-primary btn-xl rounded-pill mt-5">
          
          View All Ticket</a>
      </div>
    </div>
    <div class="bg-circle-1 bg-circle"></div>
    <div class="bg-circle-2 bg-circle"></div>
    <div class="bg-circle-3 bg-circle"></div>
    <div class="bg-circle-4 bg-circle"></div>
  </header>

  <section>
    <h3 class="text-center mt-3">CATEGORY</h3>
    <div class="container">
      <div class="row justify-content-between">
        <div class="col-lg-4">
          <div class="p-5">
            <a href="shopSoccer.php">
              <img class="img-fluid rounded-circle" src="../img/soc.jpg" alt="">
            </a>
            <a href="shopSoccer.php">
              View
            </a>
          </div>
        </div>

        <div class="col-lg-4">
          <div class="p-5">
            <a href="shopBaseball.php">
              <img class="img-fluid rounded-circle" src="../img/base.jpg" alt="">
            </a>
            <a href="shopBaseball.php">
              View
            </a>
          </div>
        </div>

        <div class="col-lg-4">
          <div class="p-5">
            <a href="shopBasketball.php">
              <img class="img-fluid rounded-circle" src="../img/basket.jpg" alt="">
            </a>
            <a href="shopBasketball.php">
              
              View
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer class="py-5 bg-black">
    <div class="container">
      <p class="m-0 text-center text-white small">Copyright &copy; Your Website 2020</p>
    </div>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="../vendor/jquery/jquery.min.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
