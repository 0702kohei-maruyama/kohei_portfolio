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
        header("Location: ../views/shop.php");
      }
    }

    public function pdateTicket($orderQuantity, $ticket_id, $newQuantity){
      $sql = "UPDATE tickets SET ticket_quantity = '$newQuantity' WHERE ticket_id = '$ticket_id'";

      $result = $this->conn->query($sql);

      if($result == false){
        die("CANNNOT UPDATE: ".$this->conn->error);
      }
    }
  }
?>