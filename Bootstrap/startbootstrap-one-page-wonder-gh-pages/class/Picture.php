<?php

  require_once 'Database.php';

  class Picture extends Database{
    public function insertImg($picHome, $picAway, $ticket_id){
      $sql = "UPDATE tickets SET ticket_img_home = '$picHome', ticket_img_away = '$picAway' WHERE ticket_id = '$ticket_id'";

      if($this->conn->query($sql)){
        return 1;
      }else{
        die("No Img Found: ".$this->conn->error);
      }
    }

    public function insertAwayImgToTable($picAway, $ticket_id){
      $sql = "UPDATE tickets SET ticket_img_away = '$picAway' WHERE ticket_id = '$ticket_id'";

      if($this->conn->query($sql)){
        return 1;
      }else{
        die("No Img Found: ".$this->conn->error);
      }
    }

    public function deleteImg($ticket_id, $imgHome, $imgAway){
      $sql ="DELETE ticket_img_home  FROM tickets WHERE  ";
    }
  }
  
?>