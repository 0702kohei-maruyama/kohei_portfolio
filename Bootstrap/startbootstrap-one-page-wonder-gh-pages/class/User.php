<?php
  require_once 'Database.php';

  class User extends Database{

    public function createUser($firstName, $lastName, $username, $email, $contactNum, $address, $passw){
      $sql = "INSERT INTO users (first_name, last_name, username, email, contact_number, address, password) VALUES ('$firstName', '$lastName', '$username', '$email', '$contactNum', '$address' , '$passw')";

      $result = $this->conn->query($sql);

      if($result == false){
        die ("CANNOT CREATE NEW USER: " . $this->conn->error);
      }else{
        $id = $this->conn->insert_id;
        $sql = "INSERT INTO cards (user_id) VALUES ('$id')";

        $result2 = $this->conn->query($sql);
        if($result2 == false){
          die ("CANNOT CREATE NEW CC: " . $this->conn->error);
        }else{
         header("Location: ../views/login.php");
        }
      }
    }
    
    public function login($username, $email, $passw){
      $sql = "SELECT * FROM users WHERE email = '$email' AND username = '$username' AND password ='$passw'";

      $result = $this->conn->query($sql);

      if($result->num_rows == 1){
        return $result->fetch_assoc();
      }else{
        return false;
      }    
    }

    public function getUser($user_id){
      $sql = "SELECT * FROM users WHERE user_id = '$user_id'";

      $result = $this->conn->query($sql);

      if($result->num_rows == 1){
        return $result->fetch_assoc();
      }else{
        die("CANNOT GET USER INFORMATION:" . $this->conn->error);
      }
    }

    public function updateUser($user_id, $firstName, $lastName, $username, $email, $contactNum, $address, $passw  ){
      $sql = "UPDATE users SET first_name = '$firstName', last_name = '$lastName', username = '$username', email = '$email', contact_number = '$contactNum', address ='$address' WHERE user_id = '$user_id' AND password = '$passw'";

      $result = $this->conn->query($sql);

      if($result == false){
        die("CANNNOT UPDATE: ". $this->conn->error);
      }else{
        header("Location: ../views/editUser.php");
      }
    }
  }
?>