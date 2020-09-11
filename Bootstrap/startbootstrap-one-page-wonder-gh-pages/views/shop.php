<?php
  include '../action/userAction.php';
?>
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
<title>SHOP</title>
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark navbar-custom fixed-top">
    <div class="container">
      <a class="navbar-brand" href="#">BUY E-TICKET</a>
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
    <div class="container my-5 text-center">
      <h2 class="display-3 p-4">View All Ticket</h2>
      <table class="table table-hover table-striped table-bordered mx-auto text-center my-5">
        <thead class="thead-dark text-uppercase">
          <th>TICKET ID</th>
          <th>TICKET NAME</th>
          <th>HOME TEAM</th>
          <th>AWAY TEAM</th>
          <th>TICKET DATE</th>
          <th>TICKET CATEGORY</th>
          <th>TICKET PRICE</th>
          <th>TICKET QUANTITY</th>
          <th></th>
        </thead>
        <tbody>
            <?php
            $ticket_list = $ticket->getAllTickets();
            foreach($ticket_list as $ticket_detail){
            ?> 
          <tr>
            <td><?=$ticket_detail['ticket_id']?></td>
            <td><?=$ticket_detail['ticket_name']?></td>
            <td>
              <img src="../uploads/<?= $ticket_detail['ticket_img_home']?>" alt="" class="img-thumbnail w-50">
            </td>
            <td>
            <img src="../uploads/<?= $ticket_detail['ticket_img_away']?>" alt="" class="img-thumbnail w-50">
            </td>
            <td><?=$ticket_detail['ticket_date']?></td>
            <td><?=$ticket_detail['ticket_category']?></td>
            <td>$<?=$ticket_detail['ticket_price']?></td>
            <td><?=$ticket_detail['ticket_quantity']?></td>
            <td><a href="buyTicket.php?ticket_id=<?=$ticket_detail['ticket_id']?>" class="btn btn-danger" role="button">Buy</a></td>
          </tr>
          <?php
            }
          ?>
        </tbody>
      </table>
    </div>
  </div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>