<?php
include "blogFunction/connections.php";

function createAccount($firstName, $lastName, $address, $contactNum, $username, $passw){
  $conn = connection();
  $passw = password_hash($passw,PASSWORD_DEFAULT);
  $sql = "INSERT INTO accounts (username, passw) VALUES('$username', '$passw')";

  if($conn->query($sql)){
    $id = $conn->insert_id;
    $sql = "INSERT INTO users (first_name, last_name, `address`, contact_number, account_id) VALUES ('$firstName', '$lastName', '$address', '$contactNum',$id )";
    
    if($conn->query($sql)){
      header ("location: login.php");
      exit;
    } else {
      die("Error creating new account:" . $conn->error);
    }
  } else {
    die("Error creating new account:" . $conn->error);
  }
}

if(isset($_POST['btnSignUp'])){
  $firstName = $_POST['firstName'];
  $lastName = $_POST['lastName'];
  $address = $_POST['address'];
  $contactNum = $_POST['contactNum'];
  $username = $_POST['username'];
  $passw = $_POST['passw'];
  $confirmPassw = $_POST['confirmPassw'];

  if($passw == $confirmPassw){
    createAccount($firstName, $lastName, $address, $contactNum, $username, $passw);
  } else {
    echo "<p class='text-danger'>Password and Confirm Password are not same.</p> ";
  }  
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="Description" content="Enter your description here"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
<link rel="stylesheet" href="assets/css/style.css">
<title>Register</title>
</head>
<body>
  <header class="jumbotron bg-success text-white w-75 mx-auto">
    <h1 class="display-4 text-capitalize">Create Account</h1>
  </header>

  <main>
    <form action="" method="post">
      <div class="card w-25 mx-auto my-5">
        <div class="card-header bg-success text-white">
          <h2 class="card-title h4 mb-0 ">
            Sign Up
          </h2>
        </div>
        <div class="catd-body">
          <!-- <label for="firstName" class="small">First Name</label> -->
          <input type="text" name="firstName" id="firstName" class="form-control my-2 mb-2" placeholder="First Name" required autofocus>
          
          <!-- <label for="lastName" class="small">Last Name</label> -->
          <input type="text" name="lastName" id="lastName" class="form-control mb-2" placeholder="Last Name" required>

          <!-- <label for="address" class="small">Address</label> -->
          <input type="text" name="address" id="address" class="form-control mb-2" placeholder="Address" required>
          
          <!-- <label for="contactNum" class="small">Contact Number</label> -->
          <input type="text" name="contactNum" id="contactNum" class="form-control mb-2" placeholder="Contact Number" required>

          <!-- <label for="username" class="small">Username</label> -->
          <input type="text" name="username" id="username" class="form-control mb-2" placeholder="Username" required>

          <!-- <label for="passw" class="small">Password</label> -->
          <input type="password" name="passw" id="passw" class="form-control mb-2" placeholder="Password" required>

          <!-- <label for="confirmPassw" class="small">Confirm Password</label> -->
          <input type="password" name="confirmPassw" id="confirmPassw" class="form-control mb-3" placeholder="Confirm Password" required>
          
          <button type="submit" class="btn btn-sm btn-block btn-success" name="btnSignUp">Sign Up!</button>
        </div>
      </div>
    </form>  
  </main>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>
</html>