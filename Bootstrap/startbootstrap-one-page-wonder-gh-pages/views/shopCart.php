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

  <title>CART</title>

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

  <div class="container w-50 px-auto my-5 pt-5">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title text-center">
          <?=$_SESSION['username']?>'s Cart
        </h3>
      </div>
      <div class="card-body">
        <?php
        if($_SESSION['ticket_id'] == "0"){
        ?>
         <div class="row text-center">
           <h3 class="col-md-12">
             Nothing is inside your cart.
           </h3>
         </div>
         <?php
         }else{
        ?>

        <div class="row text-center">
          <p class="h3 col-md-6">Name:</p>
          <p class="h3 col-md-6"><?=$_SESSION['ticketName']?></p>
        </div>

        <div class="row text-center mt-2">
          <p class="h3 col-md-6">Category:</p>
          <p class="h3 col-md-6"><?=$_SESSION['category']?></p>
        </div>

        <div class="row text-center mt-2">
          <p class="h3 col-md-6">Unit Price:</p>
          <p class="h3 col-md-6">$<?=$_SESSION['price']?></p>
        </div>

        <form action="../action/userAction.php" method="post">

          <div class="form-row text-center mt-2">
            <label for="orderQuantity" class="h3 col-md-6">Quantity:</label>
            <input type="number" name="orderQuantity" id="orderQuantity" class="form-control col-md-3 mx-auto text-center" value="<?=$_SESSION['order_quantity']?>">

            <input type="hidden" name="ticketID" value="<?=$_SESSION['ticket_id']?>">  
            <input type="hidden" name="ticketName" value="<?=$_SESSION['ticketName']?>">  
            <input type="hidden" name="ticketCategory" value="<?=$_SESSION['category']?>">  
            <input type="hidden" name="ticketPrice" value="<?=$_SESSION['price']?>">  
            <input type="hidden" name="ticketQuatitiy" value="<?$_SESSION['ticket_quantity']?>"> 
          </div>

          <div class="form-row text-center mt-2">
            <label for="orderChild" class="h3 col-md-6">Child:</label>
            <input type="number" name="orderChild" id="orderChild" class="form-control col-md-3 mx-auto text-center" value="<?=$_SESSION['order_child']?>">
          </div>

          <div class="form-row justify-content-around mt-2">
            <button type="submit" class="btn btn-danger btn-block col-md-8" name="btnBuy">Buy</button>
          </div>
          
          <div class="form-row justify-content-around">
            <div class="col-md-8 text-right">
              <button type="submit" class="btn btn-outline-primary text-primary bg-white border-0 border-bottom" name="btnClearCart">Clear Cart</button>
            </div>
          </div>
        </form>
        <?php
         }
        ?>
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
