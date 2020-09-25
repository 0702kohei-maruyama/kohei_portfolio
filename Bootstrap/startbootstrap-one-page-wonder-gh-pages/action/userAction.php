<?php
  require_once '../class/User.php';
  require_once '../class/Ticket.php';
  require_once '../class/Picture.php';
  require_once '../class/Order.php';
  require_once '../class/Card.php';

  $user = new User();
  $ticket = new Ticket();
  $picture_object = new Picture();
  $order = new Order();
  $card = new Card();
  session_start();

  if(isset($_POST['btnRegister'])){
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $contactNum = $_POST['contactNum'];
    $address = $_POST['address'];
    $passw = md5($_POST['passw']);
    
    $user->createUser($firstName, $lastName, $username, $email, $contactNum, $address, $passw);
  }elseif(isset($_POST['btnLogin'])){
    $username = $_POST['username'];
    $email = $_POST['email'];
    $passw = md5($_POST['passw']);

    $login = $user->login($username, $email, $passw);

    if($login){
      if(empty($_SESSION['ticket_id'])){
        $_SESSION['user_id'] = $login['user_id'];
        $_SESSION['first_name'] = $login['first_name'];
        $_SESSION['last_name'] = $login['last_name'];
        $_SESSION['username'] = $login['username'];
        $_SESSION['email'] = $login['email'];
        $_SESSION['contact_number'] = $login['contact_number'];
        $_SESSION['address'] = $login['address'];
        $_SESSION['role'] = $login['role'];
        $_SESSION['password'] = $login['passw'];

        header("Location: ../views/homepage.php");
      }elseif($_SESSION['ticket_id']){
        $_SESSION['user_id'] = $login['user_id'];
        $_SESSION['first_name'] = $login['first_name'];
        $_SESSION['last_name'] = $login['last_name'];
        $_SESSION['username'] = $login['username'];
        $_SESSION['email'] = $login['email'];
        $_SESSION['contact_number'] = $login['contact_number'];
        $_SESSION['address'] = $login['address'];
        $_SESSION['role'] = $login['role'];
        $_SESSION['password'] = $login['passw'];

        header("Location: ../views/payment.php");
      }
    }else{
      echo "Incorrect Username , Email and Passeword";
    }
  }elseif(isset($_POST['btnAdd'])){
    $teamHome = $_POST['teamHome'];
    $teamAway = $_POST['teamAway'];
    $ticketDate = $_POST['ticketDate'];
    $venue = $_POST['venue'];
    $ticketCategory = $_POST['ticketCategory'];
    $ticketPrice = $_POST['ticketPrice'];
    $ticketQuantity = $_POST['ticketQuantity'];

    $ticket->addTicket($teamHome, $teamAway, $ticketDate, $venue, $ticketCategory, $ticketPrice, $ticketQuantity);
  }elseif(isset($_POST['uploadImg'])){
    $picHome = $_FILES['imgHome']['name'];
    $picAway = $_FILES['imgAway']['name'];
    $ticket_id = $_POST['ticketID'];

    $target_dir = "../uploads/"; 

    $target_file1 = $target_dir . basename($_FILES['imgHome']['name']);
    $target_file2 = $target_dir . basename($_FILES['imgAway']['name']);

    $result = $picture_object->insertImg($picHome, $picAway, $ticket_id);

    if($result == 1){
      move_uploaded_file($_FILES['imgHome']['tmp_name'], $target_file);
      move_uploaded_file($_FILES['imgAway']['tmp_name'], $target_file); 
      header("Location: ../views/addTicket.php");
    }else{
      echo "Error in Uploading the picture.";
    }
  }elseif(isset($_POST['uploadHome'])){
    $picHome = $_FILES['imgHome']['name'];
    $ticket_id = $_POST['ticketID'];

    $target_dir = "../uploads/";

    $target_file = $target_dir . basename($_FILES['imgHome']['name']);

    $result = $picture_object->insertHomeImgToTable($picHome, $ticket_id);

    if($result == 1){
      move_uploaded_file($_FILES['imgHome']['tmp_name'], $target_file);
      header("Location: ../views/addTicket.php");
    }else{
      echo "Error in Uploading the picture.";
    }
  }elseif(isset($_POST['uploadAway'])){
    $picAway = $_FILES['imgAway']['name'];
    $ticket_id = $_POST['ticketID'];

    $target_dir = "../uploads/";

    $target_file = $target_dir . basename($_FILES['imgAway']['name']);

    $result = $picture_object->insertAwayImgToTable($picAway, $ticket_id);

    if($result == 1){
      move_uploaded_file($_FILES['imgAway']['tmp_name'], $target_file);
      header("Location: ../views/addTicket.php");
    }else{
      echo "Error in Uploading the picture.";
    }
  }elseif(isset($_POST['btnUpdate'])){
    $user_id = $_SESSION['user_id'];
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $contactNum = $_POST['contactNum'];
    $address = $_POST['address'];
    $passw = md5($_POST['passw']);
    
    $user->updateUser($user_id, $firstName, $lastName, $username, $email, $contactNum, $address, $passw );
  }elseif(isset($_POST['btnBuy'])){
    if(empty($_SESSION['user_id'])){
      $ticket_id = $_POST['ticketID'];
      $team_home = $_POST['team_home'];
      $team_away = $_POST['team_away'];
      $date = $_POST['date'];
      $ticketCategory = $_POST['ticketCategory'];
      $ticketPrice = $_POST['ticketPrice'];
      $ticketQuantity = $_POST['ticketQuantity'];
      $orderQuantity = $_POST['orderQuantity'];
      $orderChild = $_POST['orderChild'];
  
      $orderAdult = $orderQuantity - $orderChild;
      $priceChild = $orderChild * $ticketPrice / 2;
      $priceAdult = $orderAdult * $ticketPrice;
      $totalPrice = $priceChild + $priceAdult;
  
      $newQuantity = $ticketQuantity - $orderQuantity;
      
      if($orderQuantity < $orderChild){
        echo "<div class='mt-5 pt-5'><div class='alert alert-warning alert-dismissible fade show text-center' role='alert'>
        <h3>We cannot accept your order.</h3>
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
        </button>
      </div></div>";
      }elseif($orderQuantity > $ticketQuantity){
        echo "<div class='mt-5 pt-5'><div class='alert alert-warning alert-dismissible fade show text-center' role='alert'>
        <h3>We cannot accept your order.</h3>
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
        </button>
      </div></div>";
      }else{
        $_SESSION['ticket_id'] = $ticket_id;
        $_SESSION['team_home'] = $team_home;
        $_SESSION['team_away'] = $team_away;
        $_SESSION['date'] = $date;
        $_SESSION['category'] = $ticketCategory;
        $_SESSION['price'] = $ticketPrice;
        $_SESSION['ticket_quantity'] = $ticketQuantity;
        $_SESSION['order_quantity'] = $orderQuantity;
        $_SESSION['order_child'] = $orderChild;
        $_SESSION['price_child'] = $priceChild;
        $_SESSION['order_adult'] = $orderAdult;
        $_SESSION['price_adult'] = $priceAdult;
        $_SESSION['total'] = $totalPrice;
        header("Location: ../views/login.php");
      }
    }else{
      $ticket_id = $_POST['ticketID'];
      $team_home = $_POST['team_home'];
      $team_away = $_POST['team_away'];
      $date = $_POST['date'];
      $ticketCategory = $_POST['ticketCategory'];
      $ticketPrice = $_POST['ticketPrice'];
      $ticketQuantity = $_POST['ticketQuantity'];
      $orderQuantity = $_POST['orderQuantity'];
      $orderChild = $_POST['orderChild'];
      $user_id = $_SESSION['user_id'];
  
      $orderAdult = $orderQuantity - $orderChild;
      $priceChild = $orderChild * $ticketPrice / 2;
      $priceAdult = $orderAdult * $ticketPrice;
      $totalPrice = $priceChild + $priceAdult;
  
      $newQuantity = $ticketQuantity - $orderQuantity;
  
      if($orderQuantity < $orderChild){
        echo "<div class='mt-5 pt-5'><div class='alert alert-warning alert-dismissible fade show text-center' role='alert'>
        <h3>We cannot accept your order.</h3>
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
        </button>
      </div></div>";
      }elseif($orderQuantity > $ticketQuantity){
        echo "<div class='mt-5 pt-5'><div class='alert alert-warning alert-dismissible fade show text-center' role='alert'>
        <h3>We cannot accept your order.</h3>
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
        </button>
      </div></div>";
      }else{
        $_SESSION['ticket_id'] = $ticket_id;
        $_SESSION['team_home'] = $team_home;
        $_SESSION['team_away'] = $team_away;
        $_SESSION['date'] = $date;
        $_SESSION['category'] = $ticketCategory;
        $_SESSION['price'] = $ticketPrice;
        $_SESSION['ticket_quantity'] = $ticketQuantity;
        $_SESSION['order_quantity'] = $orderQuantity;
        $_SESSION['order_child'] = $orderChild;
        $_SESSION['price_child'] = $priceChild;
        $_SESSION['order_adult'] = $orderAdult;
        $_SESSION['price_adult'] = $priceAdult;
        $_SESSION['total'] = $totalPrice;
  
        header("Location: ../views/payment.php");
      }
    }
  }elseif(isset($_POST['btnClearCart'])){
      $_SESSION['ticket_id'] = 0;

      header("Location: ../views/shopCart.php");
  }elseif(isset($_POST['btnConfirm'])){
      $user_id = $_SESSION['user_id'];
      $ticket_id = $_SESSION['ticket_id'];
      $team_home = $_SESSION['team_home'];
      $team_away = $_SESSION['team_away'];
      $date = $_SESSION['date'];
      $save = $_POST['save'];
      $ticketCategory = $_SESSION['category'];
      $ticketQuantity = $_SESSION['ticket_quantity'];
      $orderQuantity = $_SESSION['order_quantity'];
      $orderChild = $_SESSION['order_child'];
      $totalPrice = $_SESSION['total'];
      $cardNum = $_POST['cardNum'];
      $cardName = $_POST['ccName'];
      $ccMonth = $_POST['ccMonth'];
      $ccYear = $_POST['ccYear'];
      $pinCode = $_POST['pinCode'];
      $receiverFirstName = $_POST['firstName'];
      $receiverLastName = $_POST['lastName'];
      $receiverEmail = $_POST['email'];
      $contactNum = $_POST['contactNum'];

      $newQuantity = $ticketQuantity - $orderQuantity;

      $order->createOrder($user_id, $ticket_id, $orderChild, $orderQuantity, $totalPrice, $receiverFirstName, $receiverLastName, $receiverEmail, $contactNum, $cardNum, $cardName, $ccMonth, $ccYear, $pinCode);

      if($save == "save"){
        $card->updateCC($user_id, $cardNum, $cardName, $ccMonth, $ccYear, $pinCode);
      }

      $ticket->updateTicket($newQuantity, $ticket_id);

      $_SESSION['ticket_id'] = 0;
  }elseif(isset($_POST['btnDeleteImgHome'])){
    $ticket_id = $_POST['ticket_id'];
    $imgHome = $_POST['imgHome'];

    $ticket->deleteImgHome($ticket_id, $imgHome);
  }elseif(isset($_POST['btnDeleteImgAway'])){
    $ticket_id = $_POST['ticket_id'];
    $imgAway = $_POST['imgAway'];

    $ticket->deleteImgAway($ticket_id, $imgAway);
  }elseif(isset($_POST['btnUpdateTicket'])){
    $ticket_id = $_POST['ticket_id'];
    $teamHome = $_POST['teamHome'];
    $teamAway = $_POST['teamAway'];
    $ticketDate = $_POST['ticketDate'];
    $venue = $_POST['venue'];
    $ticketCategory = $_POST['ticketCategory'];
    $ticketPrice = $_POST['ticketPrice'];
    $ticketQuantity = $_POST['ticketQuantity'];

    $ticket->updateTicketDetails($teamHome, $teamAway, $ticketDate, $venue, $ticketCategory, $ticketPrice, $ticketQuantity);
  }elseif(isset($_POST['btnDeleteTicket'])){
    $ticket_id = $_POST['ticket_id'];

    $ticket->deleteTicket($ticket_id);
  }elseif(isset($_POST['btnSaveCC'])){
    $user_id = $_SESSION['user_id'];
    $cardNum = $_POST['cardNum'];
    $cardName = $_POST['ccName'];
    $ccMonth = $_POST['ccMonth'];
    $ccYear = $_POST['ccYear'];
    $pinCode = $_POST['pinCode'];

    $card->saveCC($user_id, $cardNum, $cardName, $ccMonth, $ccYear, $pinCode);
  }elseif(isset($_POST['btnDeleteCC'])){
    $user_id = $_SESSION['user_id'];

    $card->deleteCC($user_id);
  }
  
?>