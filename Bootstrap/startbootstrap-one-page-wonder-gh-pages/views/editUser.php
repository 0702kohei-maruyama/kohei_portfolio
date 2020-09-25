<?php
  include '../action/userAction.php';
  $users = $user->getUser($_SESSION['user_id']);
  $cards = $card->getCC($_SESSION['user_id']);
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
  <?php include "menubar.php" ?>

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
        <div id="cc-info">
          <div class="card">
            <div class="card-header bg-success text-center">
              <h4 class="card-title h2 text-white" data-toggle="collapse" data-target="#cc">
                Credit Card Information
                <i class="fas fa-angle-double-down ml-2"></i>
              </h4>
            </div>
            <div class="collapse" id="cc" data-parent="#cc-info">
              <div class="card-body">
                <form action="../action/userAction.php" method="post">
                  <div class="form-row my-2">
                    <label for="cardNum" class="col-md-4">Card Number</label>
                    <input type="text" name="cardNum" id="cardNum" class="form-control col-md-8 px-3" maxlength="16" minlength="16" placeholder="0000 0000 0000 0000" value="<?=$cards['cc_number']?>" required>
                  </div>

                  <div class="form-row my-2">
                    <label for="ccName" class="col-md-4">Card Owner</label>
                    <input type="text" name="ccName" id="ccName" class="form-control col-md-8 px-3" placeholder="John Smith" value="<?=$cards['cc_name']?>" required>
                  </div>

                  <div class="form-row my-2">
                    <label for="" class="col-md-4">Card Expiry</label>
                    <select name="ccMonth" id="" class="form-control col-md-4 px-3" required>
                      <?php
                        if(empty($cards['cc_month'])){
                          ?>
                          <option value="" hidden>MM</option>
                          <?php
                        }else{
                      ?>
                          <option value="<?=$cards['cc_month']?>" hidden><?=$cards['cc_month']?></option>
                      <?php
                        }
                      ?>
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                      <option value="5">5</option>
                      <option value="6">6</option>
                      <option value="7">7</option>
                      <option value="8">8</option>
                      <option value="9">9</option>
                      <option value="10">10</option>
                      <option value="11">11</option>
                      <option value="12">12</option>
                    </select>

                    <select name="ccYear" id="" class="form-control col-md-4 px-3" required>
                    <?php
                        if(empty($cards['cc_year'])){
                          ?>
                          <option value="" hidden>YYYY</option>
                          <?php
                        }else{
                      ?>
                          <option value="<?=$cards['cc_year']?>" hidden><?=$cards['cc_year']?></option>
                      <?php
                        }
                      ?>
                      <option value="2020">2020</option>
                      <option value="2021">2021</option>
                      <option value="2022">2022</option>
                      <option value="2023">2023</option>
                      <option value="2024">2024</option>
                      <option value="2025">2025</option>
                      <option value="2026">2026</option>
                      <option value="2027">2027</option>
                      <option value="2028">2028</option>
                      <option value="2029">2029</option>
                      <option value="2030">2030</option>
                    </select>
                  </div>

                  <div class="form-row my-2 justify-content-between">
                    <label for="pinCode" class="col-md-4">CVV</label>
                    <input type="text" name="pinCode" id="pinCode" class="form-control col-md-3 px-3" maxlength="3" minlength="3" placeholder="123" required>
                  </div>
                  
                  <div class="form-group row mt-3 justify-content-center text-center">
                    <button type="submit" name="btnSaveCC" class="btn btn-success col-md-6">Save</button>
                  </div>
                </form>
                <form action="../action/userAction.php" method="post">
                 <div class="form-group row justify-content-center text-right">
                  <button type="submit" name="btnDeleteCC" class="btn btn-danger col-md-6">Delete</button>
                 </div>
                </form>
              </div>
            </div>
          </div>
        </div>

        <div class="card mt-5">
          <div class="card-header">
            <h4 class="card-title text-center">
              Purchase History
            </h4>
          </div>
          <div class="card-body">
          <?php
            $order_list = $order->getOrder($_SESSION['user_id']);
            if($order_list){
              foreach($order_list as $order_details){
                // print_r($order_details);
          ?>
            <div class="container">
              <div class="row">
                <p class="col-md-6">Ticket Name:</p>
                <p class="col-md-6 text-center"><?=$order_details['team_home']?> VS <?=$order_details['team_away']?></p>
              </div>

              <div class="row">
                <p class="col-md-6">Mutch Date:</p>
                <p class="col-md-6 text-center"><?=$order_details['ticket_date']?></p>
              </div>

              <div class="row">
                <p class="col-md-6">Category:</p>
                <p class="col-md-6 text-center"><?=$order_details['ticket_category']?></p>
              </div>

              <div class="row">
                <p class="col-md-6">Unit Price:</p>
                <p class="col-md-6 text-center"><?=$order_details['ticket_price']?></p>
              </div>

              <div class="row">
                <p class="col-md-6">Order Quantity:</p>
                <p class="col-md-6 text-center"><?=$order_details['order_quantity']?></p>
              </div>

              <div class="row">
                <p class="col-md-6">Child:</p>
                <p class="col-md-6 text-center"><?=$order_details['order_child']?></p>
              </div>

              <div class="row">
                <p class="col-md-6">Total:</p>
                <p class="col-md-6 text-center">$<?=$order_details['total_price']?></p>
              </div>

            </div>
            <hr>
          <?php
              }
            }else{
              ?>
              <h4 class="text-center">No Records Founds.</h4>
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
