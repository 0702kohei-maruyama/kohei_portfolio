<?php
  include '../action/userAction.php';
  $ticket_id = $_GET['ticket_id'];
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
<title>HOME TEAM PICTURE UPLOAD INPUT</title>
</head>
<body>
<?php
    if($_SESSION['role'] == "A"){
      include "adminMenu.php";
    }else{
      include "userMenu.php";
    }
  ?>
  <div class="container w-50 mx-auto mt-5 pt-5">
    <form action="../action/userAction.php" method="post" enctype="multipart/form-data">
      <div class="card">
        <div class="card-header">
          <h2 class="card-title text-center py-3">
            Upload Home Team Picture
          </h2>
        </div>
        <div class="card-body">
          <div class="form-row">
            <div class="form-group col-md-6">
              <p class="text-center h4">Home Team Img: </p>
            </div>
            <div class="form-group col-md-6">
              <input type="file" name="imgHome" class="form-control border border-0">
              <input type="hidden" name="ticketID"  value="<?php echo $ticket_id;?>">
            </div>
          </div>
          
          <div class="form-row justify-content-center mt-3">
            <input type="hidden" name="ticketID"  value="<?php echo $ticket_id;?>">
            <input type="submit" value="Upload" name="uploadHome" class="form-control btn btn-success col-md-6">
          </div>
        </div>
      </div>
    </form>
  </div>
  <div class="container w-50 mx-auto text-right">
    <a href="addTicket.php" class="">Back to Add Ticket</a>
  </div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

<!-- <form action="../action/userAction.php" method="post" enctype="multipart/form-data">
    
    <div class="form-row my-5">
      <div class="form-group col-md-12">
        <p class="text-center h4">Home Team Img: </p>
      </div>
      <div class="form-group col-md-6">
        <input type="file" name="imgHome" class="form-control border border-0">
        <input type="hidden" name="ticketID"  value="<?php echo $ticket_id;?>">
      </div>
      <div class="form-group col-md-6">
        <input type="submit" value="Upload Home" name="uploadHome" class="form-control btn btn-success">
      </div>
    </div>

    <div class="form-row">
      <div class="form-group col-md-12">
        <p class="text-center h4">Away Team Img: </p>
      </div>
      <div class="form-group col-md-6">
        <input type="file" name="imgAway" class="form-control border border-0">
      </div>
      <div class="form-group col-md-6">
        <input type="submit" value="Upload Away" name="uploadAway" class="form-control btn btn-success">
        <input type="hidden" name="ticketID"  value="<?php echo $ticket_id;?>">
      </div>
    </div>
  
  </form> -->