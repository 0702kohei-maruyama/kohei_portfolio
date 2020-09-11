<?php
  include '../action/userAction.php';

  $ticket_id = $_GET['ticket_id'];

  $ticket->deleteTicket($ticket_id);
?>