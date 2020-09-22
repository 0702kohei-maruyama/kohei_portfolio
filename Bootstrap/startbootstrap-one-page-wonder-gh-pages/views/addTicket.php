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

  <title>ADD TICKET</title>

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
  <div class="container text-center mt-5">
    <div class="card mx-auto my-5 w-50 border border-0">
      <div class="card-header bg-white text-danger border-0">
        <h2 class="display-4 pt-4">Add Ticket</h2>
      </div>

      <div class="card-body">
        <form action="../action/userAction.php" method="post">

          <div class="form-row">
            <div class="form-group col-md-12 mb-4">
              <input type="text" name="ticketName" placeholder="Ticket Name" class="form-control p-4" required>
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-md-12 mb-4">
              <input type="date" name="ticketDate" placeholder="Date" class="form-control p-4" required>
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-md-12 mb-4">
              <select name="ticketCategory" class="form-control ">
                <option value="" hidden>SELECT TICKET CATEGORY</option>
                <option value="soccer">SOCCER</option>
                <option value="baseball">BASEBALL</option>
                <option value="basketball">BASEKETBALL</option>
              </select>
            </div>
          </div>

          <div class="form-row contetn-justify-between">
            <div class="form-group col-md-6 mb-4">
              <input type="number" name="ticketPrice" placeholder="Ticket Price" class="form-control p-4" required>
            </div>

            <div class="form-group col-md-6 mb-4">
              <input type="number" name="ticketQuantity" placeholder="Ticket Quantity" class="form-control p-4" required>
            </div>
          </div>
          
          <div class="form-row">
            <div class="form-group col-md-12 mb-4">
              <button type="submit" name="btnAdd" class="btn btn-danger btn-block  form-control text-uppercase">ADD</button>
            </div>
          </div>

        </form>
      </div>
    </div>
  </div>
  
  <div class="container">  
    <table class="table table-hover table-striped table-bordered mx-auto text-center my-5">
      <thead class="thead-dark text-uppercase">
        <th>TICKET ID</th>
        <th>NAME</th>
        <th>HOME</th>
        <th>AWAY</th>
        <th>DATE</th>
        <th>CATEGORY</th>
        <th>PRICE</th>
        <th>QUANTITY</th>
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
            <br>
            <form action="../action/userAction.php" method="post">
            <div class="form-row justify-content-around">
              <input type="hidden" name="imgHome" value="<?= $ticket_detail['ticket_img_home']?>">
              <input type="hidden" name="ticket_id" value="<?=$ticket_detail['ticket_id']?>">
              <a href="imgHome.php?ticket_id=<?=$ticket_detail['ticket_id']?>" class="btn btn-danger col-md-5">add</a>
              <button type="submit" name="btnDeleteImgHome" class="btn btn-success col-md-5">delete</button>
            </div>
            </form>
          </td>
          <td>
            <img src="../uploads/<?= $ticket_detail['ticket_img_away']?>" alt="" class="img-thumbnail w-25">
            <br>
            <form action="../action/userAction.php" method="post">
            <div class="form-row justify-content-around">
              <input type="hidden" name="imgAway" value="<?= $ticket_detail['ticket_img_away']?>">
              <input type="hidden" name="ticket_id" value="<?=$ticket_detail['ticket_id']?>">
              <a href="imgAway.php?ticket_id=<?=$ticket_detail['ticket_id']?>" class="btn btn-danger col-md-5" role="button">add</a>
              <button type="submit" name="btnDeleteImgAway" class="btn btn-success col-md-5">delete</button>
            </div>
            </form>
          </td>
          <td><?=$ticket_detail['ticket_date']?></td>
          <td><?=$ticket_detail['ticket_category']?></td>
          <td>$<?=$ticket_detail['ticket_price']?></td>
          <td><?=$ticket_detail['ticket_quantity']?></td>
          <td>
            <a href="editTicket.php?ticket_id=<?=$ticket_detail['ticket_id']?>" class="btn btn-info">Edit</a>
            <a href="deleteTicket.php?ticket_id=<?=$ticket_detail['ticket_id']?>" class="btn btn-warning" role="button">Delete</a>
          </td>
        </tr>
        <?php
          }
        }else{
        ?>
            <tr>
              <td colspan='9'>
                No Records Found
              </td>
            </tr>
        <?php
        }
        ?>
      </tbody>
    </table>
  </div>
  
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>