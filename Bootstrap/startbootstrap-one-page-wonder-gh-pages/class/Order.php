  <?php
  require_once "Database.php"; 

  class Order extends Database {

    public function createOrder($user_id, $ticket_id, $orderChild, $orderQuantity, $totalPrice, $receiverFirstName, $receiverLastName, $receiverAddress, $contactNum, $cardNum, $ccMonth, $ccYear, $pinCode){
      $sql = "INSERT INTO orders (user_id, ticket_id, order_child, order_quantity, total_price, receiver_first_name, receiver_last_name, receiver_address, receiver_contact, cc_number, cc_month, cc_year, pincode) VALUES ('$user_id', '$ticket_id', '$orderChild', '$orderQuantity', '$totalPrice', '$receiverFirstName', '$receiverLastName', '$receiverAddress', '$contactNum', '$cardNum', '$ccMonth', '$ccYear', '$pinCode')";

      $result = $this->conn->query($sql);

      if($result == false){
        die ("CANNOT CREATE NEW ORDER: " . $this->conn->error);
      }
    }

    function getOrder($user_id){
      $sql = "SELECT 
              *
              FROM orders
              INNER JOIN tickets
              ON tickets.ticket_id = orders.ticket_id
              WHERE orders.user_id = '$user_id'
              ";

      $result = $this->conn->query($sql);

      $order = array();

      if($result->num_rows > 0){
        while($order_details = $result->fetch_assoc()){
          $orders[] = $order_details;
        }
        return $orders;
      }else{
        echo "<h4 class='text-center'>";
        die("No Records" . $this->conn->error);
        echo "</h4>";
      }
    }

  }
?>