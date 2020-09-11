<?php
  include '../action/userAction.php';
  $ticket_id = $_GET['ticket_id'];
  $ticket_details = $ticket->getSpecificTicket($ticket_id);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="Description" content="Enter your description here"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootswatch/4.5.2/materia/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
<link rel="stylesheet" href="assets/css/style.css">
<title>ORDER</title>
</head>
<body>

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark navbar-custom fixed-top">
    <div class="container">
      <a class="navbar-brand" href="#">Buy E-Ticket</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="views/register.php">Sign Up</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="views/login.php">Log In</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  
  <div class="container">
    <div class="card mx-auto w-50 my-5 border border-0">

      <div class="card-header bg-white text-dark border-0">
        <h2 class="display-4 text-center"><?=$ticket_details['ticket_name']?></h2>
      </div>

      <div class="card-body">
        
        <form action="../action/userAction.php" method="post">
          <div class="form-row">
            <h3 class="text-center w-50 float-left display-4">Price: </h3>
            <h3 class="text-center w-50 float-right display-4">$<?=$ticket_details['ticket_price']?></h3>
          </div>

          <div class="form-row">
            <h3 class="text-center w-50 float-left display-4">Stock: </h3>
            <h3 class="text-center w-50 float-right display-4"><?=$ticket_details['ticket_quantity']?></h3>
          </div>

          <div class="form-row">
            <h3 class="text-center float-left w-50 display-4">Quantity: </h3>
            <input type="hidden" name="ticketID"  value="<?=$ticket_details['ticket_id']?>">
            <input type="hidden" name="ticketName"  value="<?=$ticket_details['ticket_name']?>">
            <input type="hidden" name="ticketCategory"  value="<?=$ticket_details['ticket_category']?>">
            <input type="hidden" name="ticketPrice"  value="<?=$ticket_details['ticket_price']?>">
            <input type="hidden" name="ticketQuatitiy"  value="<?=$ticket_details['ticket_quantity']?>">
            <input type="number" name="orderQuantity" class="form-control mt-2 text-center w-50 float-right border">
          </div>

          <div class="form-row">
            <h3 class="text-center w-50 display-4">Child: </h3>
            <input type="number" name="orderChild" class="form-control mt-2 text-center  w-50 float-right border">
          </div>
            <p class="text-center"><span class="text-danger">* </span> Child price is 50% of oridinal price.</p>
            <p class="text-center"><span class="text-danger">* </span> Child is defined as 6-12years old.</p>

          <button type="submit" name="btnBuy" class="btn btn-block btn-danger">Buy</button>

        </form>
      </div>
    </div>
  </div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>