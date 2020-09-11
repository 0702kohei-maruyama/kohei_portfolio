<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="Description" content="Enter your description here"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
<link rel="stylesheet" href="assets/css/style.css">
<title>REGISTRATION : Ticketter</title>
</head>
<body>
<div class="container">
    <div class="card mx-auto w-50 my-5 border border-0">
      <div class="card-header bg-white text-dark border-0">
        <h2 class="text-center">REGISTRATION</h2>
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


        </form>
      </div>
    </div>
  </div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>