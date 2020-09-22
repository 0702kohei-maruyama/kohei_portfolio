<?php
  require_once 'Database.php';

  class Ticket extends Database{

    public function addTicket($ticketName, $ticketDate, $ticketCategory, $ticketPrice, $ticketQuantity){

      $sql = "INSERT INTO tickets (ticket_name, ticket_date, ticket_category, ticket_price, ticket_quantity) VALUES ('$ticketName', '$ticketDate', '$ticketCategory', '$ticketPrice', '$ticketQuantity')";

      $result = $this->conn->query($sql);

      if($result == false){
        die("CANNOT ADD TICKET: ".$this->conn->error);
      }else{
        header ("Location: ../views/addTicket.php");
      }
      
    }

    public function getAllTickets(){
      $sql = "SELECT * FROM tickets";
      $result = $this->conn->query($sql);
  
      $ticket = array();
      
      if($result->num_rows > 0){
        while($ticket_details = $result->fetch_assoc()){
          $tickets[] = $ticket_details;
        }
        return $tickets;
      }else{
        return false;
      }
    }

    public function getSoccerTicket(){
      $sql = "SELECT * FROM tickets WHERE ticket_category = 'soccer'";
      $result = $this->conn->query($sql);
  
      $ticket = array();
      
      if($result->num_rows > 0){
        while($ticket_details = $result->fetch_assoc()){
          $tickets[] = $ticket_details;
        }
        return $tickets;
      }else{
        return false;
      }

    }

    public function getBaseballTicket(){
      $sql = "SELECT * FROM tickets WHERE ticket_category = 'baseball'";
      $result = $this->conn->query($sql);
  
      $ticket = array();
      
      if($result->num_rows > 0){
        while($ticket_details = $result->fetch_assoc()){
          $tickets[] = $ticket_details;
        }
        return $tickets;
      }else{
        return false;
      }
    }  

      public function getBasketballTicket(){
        $sql = "SELECT * FROM tickets WHERE ticket_category = 'basketball'";
        $result = $this->conn->query($sql);
    
        $ticket = array();
        
        if($result->num_rows > 0){
          while($ticket_details = $result->fetch_assoc()){
            $tickets[] = $ticket_details;
          }
          return $tickets;
        }else{
          return false;
        }
    }


    public function getSpecificTicket($ticket_id){
      $sql = "SELECT  * FROM tickets WHERE ticket_id = '$ticket_id'";
  
      $result = $this->conn->query($sql);
  
      if($result->num_rows == 1){
        return $result->fetch_assoc();
      }else{
        die("No Records Found: ".$this->conn->error);
      }
    }

    public function deleteTicket($ticket_id){
      $sql = "DELETE FROM tickets WHERE ticket_id = '$ticket_id'";

      $result = $this->conn->query($sql);

      if($result == false){
        die("Cannot Delete: ".$this->conn->error);
      }else{
        header ("Location: ../views/addTicket.php");
      }
    }

    public function updateTicket($newQuantity, $ticket_id){
      $sql = "UPDATE tickets SET ticket_quantity = '$newQuantity' WHERE ticket_id = '$ticket_id'";

      $result = $this->conn->query($sql);

      if($result == false){
        die("CANNNOT UPDATE: ".$this->conn->error);
      }else{
        header("Location: ../views/confirmed.php");
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

    public function deleteImgHome($ticket_id, $imgHome){
      $sql ="UPDATE tickets SET ticket_img_home = ' ' WHERE ticket_id = '$ticket_id'";

      $result = $this->conn->query($sql);

      if($result == false){
        die("CANNOT DELETE IMG: " . $this->conn->error);
      }else{
        header("Location: ../views/addTicket.php");
      }
    }

    public function deleteImgAway($ticket_id, $imgAway){
      $sql ="UPDATE tickets SET ticket_img_away = ' ' WHERE ticket_id = '$ticket_id'";
      $result = $this->conn->query($sql);

      if($result == false){
        die("CANNOT DELETE IMG: " . $this->conn->error);
      }else{
        header("Location: ../views/addTicket.php");
      }

    }

    public function getImgName($ticket_id){
      $sql = "SELECT * FROM tickets WHERE ticket_id = '$ticket_id'";
      $result = $this->conn->query($sql);

      if($result->num_rows == 1){
        return $result->fetch_assoc();
      }else{
        die("CANNOT GET IMG Name:" . $this->conn->error);
      }
    }

    public function getTicket($ticket_id){
      $sql = "SELECT * FROM tickets WHERE ticket_id = '$ticket_id'";
      $result = $this->conn->query($sql);

      if($result->num_rows == 1){
        return $result->fetch_assoc();
      }else{
        die("CANNOT GET TICKET DETAILS:" . $this->conn->error);
      }
    }

    public function updateTicketDetails($ticketName, $ticketDate, $ticketCategory, $ticketPrice, $ticketQuantity, $ticket_id){
      $sql = "UPDATE tickets SET ticket_name = '$ticketName', ticket_date = '$ticketDate', ticket_category = '$ticketCategory', ticket_price = '$ticketPrice', ticket_quantity = '$ticketQuantity' WHERE ticket_id = '$ticket_id'";

      $result = $this->conn->query($sql);

      if($result == false){
        die("CANNOT UPDATED: " . $this->conn->error);
      }else{
        header("Location: ../views/addTicket.php");
      }

    }

  }
?>