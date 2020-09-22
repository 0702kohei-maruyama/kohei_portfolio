<?php
  include '../action/userAction.php';
  $ticket_id = $_GET['ticket_id'];
  $ticket_details = $ticket->getTicket($ticket_id);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Edit Ticket</title>

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
  
  <div class="container text-center mt-5">
    <div class="card mx-auto my-5 w-50 border border-0">
      <div class="card-header bg-white text-info border-0">
        <h2 class="display-4 pt-4">Edit Ticket</h2>
      </div>

      <div class="card-body">
        <form action="../action/userAction.php" method="post">

          <div class="form-row">
            <div class="form-group col-md-12 mb-4">
              <input type="text" name="ticketName" placeholder="Ticket Name" class="form-control p-4" value="<?=$ticket_details['ticket_name']?>" required>
            </div>
            <input type="hidden" name="ticket_id" value="<?=$ticket_id?>">
          </div>

          <div class="form-row">
            <div class="form-group col-md-12 mb-4">
              <input type="date" name="ticketDate" placeholder="Date" class="form-control p-4" value="<?=$ticket_details['ticket_date']?>" required>
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-md-12 mb-4">
              <select name="ticketCategory" class="form-control">
                <option value="<?=$ticket_details['ticket_category']?>" hidden><?=$ticket_details['ticket_category']?></option>
                <option value="soccer">SOCCER</option>
                <option value="baseball">BASEBALL</option>
                <option value="basketball">BASEKETBALL</option>
              </select>
            </div>
          </div>

          <div class="form-row contetn-justify-between">
            <div class="form-group col-md-6 mb-4">
              <input type="number" name="ticketPrice" placeholder="Ticket Price" class="form-control p-4" value="<?=$ticket_details['ticket_price']?>" required>
            </div>

            <div class="form-group col-md-6 mb-4">
              <input type="number" name="ticketQuantity" placeholder="Ticket Quantity" class="form-control p-4" value="<?=$ticket_details['ticket_quantity']?>" required>
            </div>
          </div>
          
          <div class="form-row">
            <div class="form-group col-md-12 mb-4">
              <button type="submit" name="btnUpdateTicket" class="btn btn-info btn-block  form-control text-uppercase">CHANGE</button>
            </div>
          </div>

        </form>
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
