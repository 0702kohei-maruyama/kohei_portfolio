  <?php
  require_once "Database.php"; 

  class Order extends Database {

    function createOrder($user_id, $ticket_id, $orderChild, $orderQuantity, $totalPrice){
      $sql = "INSERT INTO orders(user_id, ticket_id, amount_child, buy_quantity, total_price) VALUES ('$user_id', '$ticket_id', '$orderChild', '$orderQuantity', '$totalPrice')";

      $result = $this->conn->query($sql);

      if(result == false){
        die ("CANNOT CREATE NEW ORDER: " . $this->conn->error);
      }
    }

    

  }
?>