<?php
  require_once '../class/User.php';
  require_once '../class/Ticket.php';
  require_once '../class/Picture.php';
  require_once '../class/Order.php';

  $user = new User();
  $ticket = new Ticket();
  $picture_object = new Picture();
  $order = new Order();
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
      $_SESSION['user_id'] = $login['user_id'];
      $_SESSION['first_name'] = $login['first_name'];
      $_SESSION['last_name'] = $login['last_name'];
      $_SESSION['username'] = $login['username'];
      $_SESSION['email'] = $login['email'];
      $_SESSION['contact_number'] = $login['contact_number'];
      $_SESSION['address'] = $login['address'];
      $_SESSION['role'] = $login['role'];
      $_SESSION['password'] = $login['passw'];
      $_SESSION['ticket_id'] = 0;

      if($_SESSION['role'] == "U"){
        header("Location: ../views/homepage.php");
      }elseif($_SESSION['role'] == "A"){
        header("Location: ../views/addTicket.php");
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
    $ticket_id = $_POST['ticketID'];
    $ticketName = $_POST['ticketName'];
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

    if($orderQuantity > $ticketQuantity){
      echo "We cannot accept your order.";
    }else{
      $_SESSION['ticket_id'] = $ticket_id;
      $_SESSION['ticketName'] = $ticketName;
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
  }elseif(isset($_POST['btnClearCart'])){
      $_SESSION['ticket_id'] = 0;

      header("Location: ../views/shopCart.php");
  }elseif(isset($_POST['btnConfirm'])){
      $user_id = $_SESSION['user_id'];
      $ticket_id = $_SESSION['ticket_id'];
      $ticket_name = $_SESSION['ticketName'];
      $ticketQuantity = $_SESSION['ticket_quantity'];
      $orderQuantity = $_SESSION['order_quantity'];
      $orderChild = $_SESSION['order_child'];
      $totalPrice = $_SESSION['total'];
      $cardNum = $_POST['cardNum'];
      $ccMonth = $_POST['ccMonth'];
      $ccYear = $_POST['ccYear'];
      $pinCode = $_POST['pinCode'];
      $receiverFirstName = $_POST['firstName'];
      $receiverLastName = $_POST['lastName'];
      $receiverAddress = $_POST['address'];
      $contactNum = $_POST['contactNum'];

      $newQuantity = $ticketQuantity - $orderQuantity;

      $order->createOrder($user_id, $ticket_id, $orderChild, $orderQuantity, $totalPrice, $receiverFirstName, $receiverLastName, $receiverAddress, $contactNum, $cardNum, $ccMonth, $ccYear, $pinCode);

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
  }


  // $order->createOrder($user_id, $ticket_id, $orderChild, $orderQuantity, $totalPrice, $receiverFirstName, $receiverLastName, $receiverAddress, $contactNum, $cardNum, $ccMonth, $ccYear, $pinCode);
  
?>