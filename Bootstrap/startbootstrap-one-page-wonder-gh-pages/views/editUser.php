<?php
  include '../action/userAction.php';
  $user_id = $_SESSION['user_id'];
  $users = $user->getUser($user_id);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Edit Profile</title>

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
  <?php
    if($_SESSION['role'] == "A"){
      include "adminMenu.php";
    }else{
      include "userMenu.php";
    }
  ?>

  <div class="container my-5 pt-5">
    <div class="row justify-content-between">
      <div class="col-md-6">
        <div class="card">
          <div class="card-header bg-warning py-3">
            <h2 class="card-title text-center display-4 py-5">
            <?= $_SESSION['username']?>'s Profile
            </h2>
          </div>
          <div class="card-body">
            <form action="../action/userAction.php" method="post">
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="firstName">First Name</label>
                  <input type="text" name="firstName" id="firstName" class="form-control" placeholder="<?=$users['first_name']?>" value="<?=$users['first_name']?>" required>
                </div>
    
                <div class="form-group col-md-6">
                  <label for="lastName">Last Name</label>
                  <input type="text" name="lastName" id="lastName" class="form-control" placeholder="<?=$users['last_name']?>" value="<?=$users['last_name']?>" required>
                </div>
              </div>
    
              <div class="form-row">
                <div class="form-group col-md-12">
                  <label for="username">Username</label>  
                  <input type="text" name="username" id="username" placeholder="<?=$users['username']?>" value="<?=$users['username']?>" class="form-control" required>
                </div>
              </div>
    
              <div class="form-row">
                <div class="form-group col-md-12">
                  <label for="email">Email</label>
                  <input type="email" name="email" id="email" placeholder="<?=$users['email']?>" value="<?=$users['email']?>" class="form-control" required>
                </div>
              </div>
    
              <div class="form-row">
                <div class="form-group col-md-12">
                  <label for="contactNum">Contact Number</label>
                  <input type="text" name="contactNum" id="contactNum" placeholder="<?=$users['contact_number']?>" value="<?=$users['contact_number']?>" class="form-control" required>
                </div>
              </div>
    
              <div class="form-row">
                <div class="form-group col-md-12">
                  <label for="address">Address</label>
                  <input type="text" name="address" id="address" placeholder="<?=$users['address']?>" value="<?=$users['address']?>" class="form-control" required>
                </div>
              </div>
    
              <div class="form-row">
                <div class="form-group col-md-12">
                  <label for="passw">Password</label>
                  <input type="password" name="passw" id="passw" class="form-control" placeholder="Please enter password to confirm" value="" required>
                  <input type="hidden" vaule="<?=$users['password']?>" name="confirmPassw">
                </div>
              </div>
    
              <button type="submit" class="btn btn-warning btn-block mt-3" name="btnUpdate">Update</button>
            </form>
          </div>
        </div>
      </div>

      <div class="col-md-5">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title text-center">
              Purchase History
            </h4>
          </div>
          <div class="card-body">
          <?php
            $order_list = $order->getOrder($user_id);
            foreach($order_list as $order_details){
          ?>
            <div class="container">
              <div class="row">
                <p class="col-md-6">Ticket Name:</p>
                <p class="col-md-6"><?$order_details['ticket_name']?></p>
              </div>

              <div class="row">
                <p class="col-md-6">Category:</p>
                <p class="col-md-6"><?$order_details['ticket_category']?></p>
              </div>

              <div class="row">
                <p class="col-md-6">Unit Price:</p>
                <p class="col-md-6"><?$order_details['ticket_price']?></p>
              </div>

              <div class="row">
                <p class="col-md-6">Order Quantity:</p>
                <p class="col-md-6"><?$order_details['ticket_quantity']?></p>
              </div>

              <div class="row">
                <p class="col-md-6">Child:</p>
                <p class="col-md-6"><?$order_details['ticket_child']?></p>
              </div>

              <div class="row">
                <p class="col-md-6">Total:</p>
                <p class="col-md-6">$<?$order_details['ticket_total']?></p>
              </div>

            </div>
          <?php
            }
          ?>
          </div>

        </div>
      </div>


    </div>
  </div>

 
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
