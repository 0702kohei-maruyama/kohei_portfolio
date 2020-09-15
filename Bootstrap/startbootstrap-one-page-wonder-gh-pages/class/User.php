<?php
  require_once 'Database.php';

  class User extends Database{

    public function createUser($firstName, $lastName, $username, $email, $contactNum, $address, $passw){
      $sql = "INSERT INTO users (first_name, last_name, username, email, contact_number, address, password) VALUES ('$firstName', '$lastName', '$username', '$email', '$contactNum', '$address' , '$passw')";

      $result = $this->conn->query($sql);

      if($result == false){
        die ("CANNOT CREATE NEW USER: " . $this->conn->error);
      }else{
        header("Location: ../views/index.php");
      }
    }
    
    public function login($username, $email, $passw){
      $sql = "SELECT * FROM users WHERE email = '$email' AND username = '$username'";

      $result = $this->conn->query($sql);

      if($result->num_rows == 1){
        return $result->fetch_assoc();
      }else{
        return false;
      }    
    }

    public function getUser($user_id){
      $sql = "SELECT * FROM users WHERE user_id = $user_id";

      $result = $this->conn->query($sql);

      if($result == false){
        die("CANNOT GET USER INFORMATION:" . $this->conn->error);
      }
    }
  }
?>