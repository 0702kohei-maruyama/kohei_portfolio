<?php
  include '../action/userAction.php';
  if(!$_SESSION['user_id']){
    header("location: ../views/logout.php");
    exit;
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SHOP</title>

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
  <?php
    if($_SESSION['role'] == "A"){
      include "adminMenu.php";
    }else{
      include "userMenu.php";
    }
  ?>
  <div class="container">
    <div class="container my-5 text-center">
      <h2 class="display-3 p-4">View All Ticket</h2>
      <table class="table table-hover table-striped table-bordered mx-auto text-center my-5">
        <thead class="thead-dark text-uppercase">
          <th>TICKET ID</th>
          <th>NAME</th>
          <th>HOME</th>
          <th>AWAY</th>
          <th>DATE</th>
          <th>CATEGORY</th>
          <th>PRICE</th>
          <th>REMAINING</th>
          <th></th>
        </thead>
        <tbody>
            <?php
            $ticket_list = $ticket->getAllTickets();
            if($ticket_list){
              foreach($ticket_list as $ticket_detail){
            ?> 
          <tr>
            <td><?=$ticket_detail['ticket_id']?></td>
            <td><?=$ticket_detail['ticket_name']?></td>
            <td>
              <img src="../uploads/<?= $ticket_detail['ticket_img_home']?>" alt="" class="img-thumbnail w-25">
            </td>
            <td>
            <img src="../uploads/<?= $ticket_detail['ticket_img_away']?>" alt="" class="img-thumbnail w-25">
            </td>
            <td><?=$ticket_detail['ticket_date']?></td>
            <td><?=$ticket_detail['ticket_category']?></td>
            <td>$<?=$ticket_detail['ticket_price']?></td>
            <td>
              <?php
                if($ticket_detail['ticket_quantity'] > 30){
                  echo "<span class='bold'>○</span>";
                }elseif($ticket_detail['ticket_quantity'] < 30 && $ticket_detail['ticket_quantity'] > 0){

                  echo "<span class='text-success'>△</span>";
                  echo "<br>";
                  echo "<span class='text-success'>";
                  echo $ticket_detail['ticket_quantity'] , " tickets remaining";
                  echo "</span>";
                }elseif($ticket_detail['ticket_quantity'] == '0'){
                  echo "<span class='text-danger'>✖︎</span>";
                  echo "<br>";
                  echo "SOLD OUT";
                }
              ?>
            </td>
            <td><a href="buyTicket.php?ticket_id=<?=$ticket_detail['ticket_id']?>" class="btn btn-danger" role="button">Buy</a></td>
          </tr>
          <?php
              }
            }else{
              ?>
              <tr>
                <td colspan="9">
                  <h3 class="text-center">No records found.</h3>
                </td>
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