<?php
  require_once "Database.php";

  class Card extends Database {
    public function updateCC($user_id, $cardNum, $cardName, $ccMonth, $ccYear, $pinCode){
      $sql ="UPDATE cards SET cc_number = '$cardNum', cc_name = '$cardName', cc_month = '$ccMonth', cc_year = '$ccYear', pincode = '$pinCode' WHERE user_id = '$user_id'";

      $result = $this->conn->query($sql);

      if($result == false){
        die("CANNOT UPDATE CC :" . $this->conn->error);
      }
    }

    public function saveCC($user_id, $cardNum, $cardName, $ccMonth, $ccYear, $pinCode){
      $sql ="UPDATE cards SET cc_number = '$cardNum', cc_name = '$cardName', cc_month = '$ccMonth', cc_year = '$ccYear', pincode = '$pinCode' WHERE user_id = '$user_id'";

      $result = $this->conn->query($sql);

      if($result == false){
        die("CANNOT UPDATE CC :" . $this->conn->error);
      }else{
        header("Location: ../views/editUser.php");
      }
    }

    public function getCC($user_id){
      $sql = "SELECT * FROM cards WHERE user_id = '$user_id'";
      $result = $this->conn->query($sql);

      if($result->num_rows == 1){
        return $result->fetch_assoc();
      }else{
        die("CANNOT GET USER INFORMATION:" . $this->conn->error);
      }
    }

    public function deleteCC($user_id){
      $sql = "UPDATE cards SET cc_number = NULL, cc_name = NULL, cc_month = NULL, cc_year = NULL, pincode = NULL WHERE user_id = '$user_id'";
      $result = $this->conn->query($sql);

      if($result == false){
        die("CANNOT DELETE CC:" . $this->conn->error);
      }else{
        header("Location: ../views/editUser.php");
      }
    }

  }

  // DELETE tickets.cc_number, tickets.cc_name, tickets.cc_month, tickets.cc_year, tickets.pincode
?>