<?php
  require_once '../class/User.php';
  require_once '../class/Ticket.php';
  require_once '../class/Picture.php';

  $user = new User();
  $ticket = new Ticket();
  $picture_object = new Picture();
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

    $login = $user->login($username, $email, $password);

    if($login){
      $_SESSION['user_id'] = $login['user_id'];
      $_SESSION['first_name'] = $login['first_name'];
      $_SESSION['last_name'] = $login['last_name'];
      $_SESSION['username'] = $login['username'];
      $_SESSION['email'] = $login['email'];
      $_SESSION['contactNum'] = $login['contactNum'];
      $_SESSION['address'] = $login['address'];
      $_SESSION['role'] = $login['role'];
      $_SESSION['passw'] = $login['passw'];

      if($_SESSION['role'] == "U"){
        header("Location: ../homepage.php");
      }elseif($_SESSION['role'] == "A"){
        header("Location: ../views/addTicket.php");
      }
    }else{
      echo "Incorrect Username , Email and Passeword";
    }
  }elseif(isset($_POST['btnAdd'])){
    $ticketName = $_POST['ticketName'];
    $ticketDate = $_POST['ticketDate'];
    $ticketCategory = $_POST['ticketCategory'];
    $ticketPrice = $_POST['ticketPrice'];
    $ticketQuantity = $_POST['ticketQuantity'];

    $ticket->addTicket($ticketName, $ticketDate, $ticketCategory, $ticketPrice, $ticketQuantity);

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
  }elseif(isset($_POST['Buy'])){
    $orderQuantity = $_POST['orderQuantity'];
    $ticketName = $_POST['ticketName'];
    $ticketPrice = $_POST['ticketPrice'];
    $ticketQuatitiy = $_POST['ticketQuatitiy'];
    $ticket_id = $_POST['ticketID'];
    $user_id = $_SESSION['user_id'];

    $newQuantity = $ticketQuatitiy - $orderQuantity;
    if($orderQuantity > $ticketQuatitiy){
      echo "We cannot accept your order.";
    }else{
      $ticket->updateTicket($orderQuantity, $ticket_id, $newQuantity);
      $order->createOrder($orderQuantity, $user_id, $ticket_id);
    }
  }elseif(isset($_POST['btnBuy'])){
    $ticket_id = $_POST['ticketID'];
    $ticketName = $_POST['ticketName'];
    $ticketCategory = $_POST['ticketCategory'];
    $ticketPrice = $_POST['ticketPrice'];
    $ticketQuatitiy = $_POST['ticketQuatitiy'];
    $orderQuantity = $_POST['orderQuantity'];
    $orderChild = $_POST['orderChild'];

    $orderAdult = $orderQuantity - $orderChild;
    $priceChild = $orderChild * $ticketPrice / 2;
    $priceAdult = $orderAdult * $ticketPrice;
    $totalPrice = $priceChild + $priceAdult;

    if($orderQuantity > $ticketQuatitiy){
      echo "Your order is not accetpable.";
    }else{
      $order->showOrder($ticket_id);
      header("Location: ../views/confirmOrder.php");
    }

  }
?>