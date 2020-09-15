<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>REGISTRATION</title>

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
      <a class="navbar-brand" href="index.php">Buy e-Ticket</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="views/register.php">
              <i class="fas fa-user-plus"></i> 
              Sign Up
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="views/login.php">
              <i class="fas fa-sign-in-alt"></i>
              Log In
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="container mt-5 text-center">
    <div class="card mx-auto w-50 mt-5 border border-0">
      <div class="card-header bg-white text-dark border-0">
        <h2 class="pt-4">
          <i class="fas fa-user-plus"></i>
          REGISTRATION
        </h2>
      </div>
      <div class="card-body">
        
        <form action="../action/userAction.php" method="post">
        
          <div class="form-row">
            <div class="form-group col-md-6 mt-3">
              <input type="text" name="firstName" placeholder="FIRST NAME" class="form-control p-4" required>
            </div>

            <div class="form-group col-md-6 mt-3">
              <input type="text" name="lastName" placeholder="LAST NAME" class="form-control p-4" required>
            </div>
          </div>
                 
          <div class="form-row">
            <div class="form-group col-md-12">
              <input type="text" name="username" placeholder="USERNAME" class="form-control p-4" required>
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-md-12">
              <input type="email" name="email" placeholder="E-MAIL" class="form-control p-4" required>
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-md-12">
              <input type="text" name="contactNum" placeholder="CONTACT NUMBER" class="form-control p-4" required>
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-md-12">
              <input type="text" name="address" placeholder="ADDRESS" class="form-control p-4" required>  
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-md-12">
              <input type="password" name="passw" placeholder="PASSWORD" class="form-control p-4" required>
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-md-12">
              <button type="submit" name="btnRegister" class="btn btn-danger form-control text-uppercase">REGISTER</button>
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-md-12">
              <a href="index.php" class="btn btn-sm btn-dark border-0 rounded-pill px-4 float-right">Login</a>
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