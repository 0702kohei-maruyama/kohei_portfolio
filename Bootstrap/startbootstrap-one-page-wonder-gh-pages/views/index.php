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

  <title>LOGIN</title>

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

  <nav class="navbar navbar-expand-lg navbar-dark navbar-custom fixed-top">
    <div class="container">
      <a class="navbar-brand" href="index.php">Buy E-Ticket</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="register.php">
              <i class="fas fa-user-plus"></i>  
              Sign Up
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php">
              <i class="fas fa-sign-in-alt"></i>
              Log In
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="container mt-5 text-center">
    <div class="card mx-auto my-5 w-50 border border-0">
      <div class="card-header bg-white text-dark border-0">
        <h2 class="pt-5">
          <i class="fas fa-sign-in-alt"></i>  
          LOGIN
        </h2>
      </div>

      <div class="card-body">
        <form action="../action/userAction.php" method="post">

          <div class="form-row">
            <div class="form-group col-md-12 mb-4">
              <input type="text" name="username" placeholder="USERNAME" class="form-control p-4" required>
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-md-12">
              <input type="email" name="email" placeholder="E-MAIL" class="form-control p-4" required>
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-md-12 mb-4">
              <input type="password" name="passw" placeholder="PASSWORD" class="form-control p-4" required>
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-md-12 mb-4">
              <input type="submit" name="btnLogin" value="Login" class="btn btn-dark form-control text-uppercase">
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-md-12">
              <a href="register.php" class="btn btn-danger border-0 rounded-pill px-3 float-right">Creat Account</a>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

<?php

?>