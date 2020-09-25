<?php
  include '../action/userAction.php';
  $ticket_id = $_GET['ticket_id'];
  $ticket_details = $ticket->getSpecificTicket($ticket_id);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>ORDER</title>

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
  <?php include "menubar.php" ?>

  <div class="container mt-5 pt-5 bg-light">
    <div class="row text-center">
      <div class="col-md-4">
        <p>HOME</p>
        <h1 class="h2"><?=$ticket_details['team_home']?></h1>
        <img src="../uploads/<?= $ticket_details['ticket_img_home']?>" alt="" >
      </div>
      <div class="col-md-4">
        <div style="height: 33%;">
          <p class="h4"><?=$ticket_details['ticket_date']?></p>
        </div>
        <div style="height: 33%;">
         <p class="h2">VS</p>
        </div>
        <div style="height: 33%;">
         <p class="h2"><?=$ticket_details['ticket_venue']?></p>
        </div>
      </div>
      <div class="col-md-4">
        <p>AWAY</p>
        <h1 class="h2"><?=$ticket_details['team_away']?></h1>
        <img src="../uploads/<?= $ticket_details['ticket_img_away']?>" alt="">
      </div>
    </div>

  </div>
  
  <div class="container">
    <div class="card mx-auto w-50 my-5 border border-0">

      <div class="card-header bg-white text-dark border-0">
        <h2 class="display-4 text-center"><?=$ticket_details['team_home']?> vs <?=$ticket_details['team_away']?></h2>
      </div>

      <div class="card-body">
        
        <form action="" method="post">
          <div class="form-row">
            <h3 class="text-center w-50 float-left display-4">Price: </h3>
            <h3 class="text-center w-50 float-right display-4">$<?=$ticket_details['ticket_price']?></h3>
          </div>

          <div class="form-row">
            <h3 class="text-center float-left w-50 display-4">Quantity: </h3>
            <input type="hidden" name="ticketID" value="<?=$ticket_details['ticket_id']?>">
            <input type="hidden" name="team_home" value="<?=$ticket_details['team_home']?>">
            <input type="hidden" name="team_away" value="<?=$ticket_details['team_away']?>">
            <input type="hidden" name="date" value="<?=$ticket_details['ticket_date']?>">
            <input type="hidden" name="ticketCategory" value="<?=$ticket_details['ticket_category']?>">
            <input type="hidden" name="ticketPrice" value="<?=$ticket_details['ticket_price']?>">
            <input type="hidden" name="ticketQuantity" value="<?=$ticket_details['ticket_quantity']?>">
            <input type="number" name="orderQuantity" class="form-control mt-2 text-center w-50 float-right border" required>
          </div>

          <div class="form-row">
            <h3 class="text-center w-50 display-4">Child: </h3>
            <input type="number" name="orderChild" class="form-control mt-2 text-center  w-50 float-right border" required>
          </div>
          <p class="text-center"><span class="text-danger">* </span> Child price is 50% of oridinal price.</p>
          <p class="text-center"><span class="text-danger">* </span> Child is defined as 6-12years old.</p>
          <button type="submit" name="btnBuy" class="btn btn-block btn-danger">Buy</button>
        </form>
            
        <a href="shop.php" class="btn btn-success btn-block col-mb-6 mt-2" id="btnBuy">Cancel</a>
        
      </div>
    </div>
  </div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>































<?php
              if(isset($_POST['btnCalculate'])){
                $ticket_id = $_POST['ticketID'];
                $team_home = $_POST['team_home'];
                $team_away = $_POST['team_away'];
                $ticketCategory = $_POST['ticketCategory'];
                $ticketPrice = $_POST['ticketPrice'];
                $ticketQuantity = $_POST['ticketQuantity'];
                $orderQuantity = $_POST['orderQuantity'];
                $orderChild = $_POST['orderChild'];

                $orderAdult = $orderQuantity - $orderChild;
                $priceChild = $orderChild * $ticketPrice / 2;
                $priceAdult = $orderAdult * $ticketPrice;
                $totalPrice = $priceChild + $priceAdult;

                if($orderQuantity < $orderChild){
                  echo "<h3 class='text-center mt-3'>We cannot accept your order.</h3>";
                }elseif($orderQuantity > $ticketQuantity){
                  echo "<h3 class='text-center mt-3'>We cannot accept your order.</h3>";
                }else{
                echo "<div class='row mt-4'>";
                echo "<h3 class='col-md-6 text-center display-4'>Total: </h3>";
                echo "<p class='h3col-md-6 text-center display-4'>$$totalPrice</p>";
                echo "</div>";
                ?>
                <form action="payment.php" method="post">
                  <input type="hidden" name="ticketID"  value="<?=$ticket_details['ticket_id']?>">
                  <input type="hidden" name="team_home"  value="<?=$ticket_details['team_home']?>">
                  <input type="hidden" name="team_away"  value="<?=$ticket_details['team_away']?>">
                  <input type="hidden" name="ticketCategory"  value="<?=$ticket_details['ticket_category']?>">
                  <input type="hidden" name="ticketPrice"  value="<?=$ticket_details['ticket_price']?>">
                  <input type="hidden" name="ticketQuantity"  value="<?=$ticket_details['ticket_quantity']?>">
                  <input type="hidden" name="orderQuantity" value="<?=$orderQuantity?>">
                  <input type="hidden" name="orderChild" value="<?=$orderChild?>">
                  <input type="hidden" name="totalPrice" value="<?=$totalPrice?>">

                  <button type="submit" name="btnBuy" class="btn btn-danger btn-block">Buy</button>
                </form>
                <?php
                }
              }
            ?>