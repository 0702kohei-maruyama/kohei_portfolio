<?php
  include '../action/userAction.php';
  $cards = $card->getCC($_SESSION['user_id']);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>PAYMENT</title>

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
  <?php include "menubar.php"?>

  <div class="container w-50 mx-auto mt-5 mb-3 pt-5">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title text-center">
          Shopping Cart
        </h3>
      </div>
      <div class="card-body">
        <div class="row text-center">
          <p class="h3 col-md-6">Name:</p>
          <p class="h3 col-md-6"><?=$_SESSION['team_home']?> VS <?=$_SESSION['team_away']?></p>
        </div>

        <div class="row text-center mt-2">
          <p class="h3 col-md-6">Date:</p>
          <p class="h3 col-md-6"><?=$_SESSION['date']?></p>
        </div>

        <div class="row text-center mt-2">
          <p class="h3 col-md-6">Unit Price:</p>
          <p class="h3 col-md-6">$<?=$_SESSION['price']?></p>
        </div>

        <div class="row text-center mt-2">
          <p class="h3 col-md-6">Quantity:</p>
          <p class="h3 col-md-6"><?=$_SESSION['order_quantity']?></p>
        </div>

        <div class="row text-center mt-2">
          <p class="h3 col-md-6">Child:</p>
          <p class="h3 col-md-6">( <?=$_SESSION['order_child']?> )</p>
        </div>

      </div>
    </div>
  </div>
  
  <div class="container w-50 mx-auto mb-5">
    <div class="row text-center">
      <p class="col-md-6">Adult Price</p>
      <p class="col-md-6">$<?=$_SESSION['price_adult']?></p>
    </div>
    <div class="row text-center border-bottom">
      <p class="col-md-6">Child Price</p>
      <p class="col-md-6">$<?=$_SESSION['price_child']?></p>
    </div>
    <div class="row text-center mt-1">
      <h3 class="h3 col-md-6">Total Price</h3>
      <p class="h3 col-md-6">$<?=$_SESSION['total']?></p>
    </div>
  </div>

  <div class="container w-50 mx-auto mb-5">
    <div class="row">
      <a href="buyTicket.php?ticket_id=<?=$_SESSION['ticket_id']?>" class="btn btn-success btn-block">Back</a>
    </div>
  </div>
  
  <form action="../action/userAction.php" method="post" id="payment">
    <div class="container w-50 mx-auto my-3 text-center">
      <div class="card">
        <div class="card-header text-center">
          <h3 class="card-title">
            Credit Card Information
          </h3>
        </div>
        <div class="card-body">
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

          <div class="form-group row mt-3 justify-content-center  text-center">
            <div class="form-check">
              <input type="checkbox" name="save" value="save" id="save" class="form-check-input">
              <label for="save" class="form-check-label">Save this credit card information.</label>
            </div>
          </div>
        </div>
      </div>    
    </div>

    <div class="container w-50 mx-auto my-3">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title text-center">
            Receiver Information
          </h3>
        </div>
        <div class="card-body">
          <div class="form-row text-center">
            <label for="fullName" class="col-md-4">Receiver Name:</label>
            <input type="text" name="firstName" id="fullName" class="form-control col-md-4 text-center" value="<?=$_SESSION['first_name']?>" placeholder="First Name">
            <input type="text" name="lastName" class="form-control col-md-4 text-center" value="<?=$_SESSION['last_name']?>" placeholder="Last Name">
          </div>

          <div class="form-row text-center mt-2">
            <label for="email" class="col-md-4">Email:</label>
            <input type="text" name="email" id="email" class="form-control col-md-8 text-center" value="<?=$_SESSION['email']?>" required>
          </div>

          <div class="form-row text-center mt-2">
            <label for="contactNum" class="col-md-4">Contact Number:</label>
            <input type="text" name="contactNum" id="contactNum" class="form-control col-md-8 text-center" value="<?=$_SESSION['contact_number']?>">
          </div>
        </div>
      </div>
    </div>

    <div class="container w-50 mx-auto mb-5">
      <div class="row text-center">
        <p class="col-md-6">Adult Price</p>
        <p class="col-md-6">$<?=$_SESSION['price_adult']?></p>
      </div>
      <div class="row text-center border-bottom">
        <p class="col-md-6">Child Price</p>
        <p class="col-md-6">$<?=$_SESSION['price_child']?></p>
      </div>
      <div class="row text-center mt-1">
        <h3 class="h3 col-md-6">Total Price</h3>
        <p class="h3 col-md-6">$<?=$_SESSION['total']?></p>
      </div>
    </div>

    <div class="container w-50 mx-auto mb-5">
      <div class="form-row justify-content-center">
        <button type="submit" name="btnConfirm" class="btn btn-danger btn-block">Confirm</button>
      </div>
      <div class="form-row justify-content-center mt-2">
        <a href="buyTicket.php?ticket_id=<?=$_SESSION['ticket_id']?>" class="btn btn-success btn-block">Back</a>
      </div>
    </div>

  </form> 

  <!-- Footer -->
  <!-- <footer class="py-5 bg-black">
    <div class="container">
      <p class="m-0 text-center text-white small">Copyright &copy; Your Website 2020</p>
    </div>

  </footer> -->

  <!-- Bootstrap core JavaScript -->
  <script src="../vendor/jquery/jquery.min.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
