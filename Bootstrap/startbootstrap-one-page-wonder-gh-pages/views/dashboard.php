<?php
  include '../action/userAction.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="Description" content="Enter your description here"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
<link rel="stylesheet" href="assets/css/style.css">
<title>DASHBOARD</title>
</head>
<body>
  <div class="container">
    <div class="container text-center">
      <h2 class="display-3">Welcome,<?php echo $_SESSION['first_name']." ".$_SESSION['last_name']?></h2>
      <a href="logout.php" class="btn btn-danger" type="button">LOGOUT</a>
    </div>
    <table class="table table-hover table-striped table-bordered mx-auto text-center my-5">
      <thead class="thead-dark text-uppercase">
        <th>USER ID</th>
        <th>FULL NAME</th>
        <th>USERNAME</th>
        <th></th>
        <th></th>
      </thead>
      <tbody>
        <?php
          $user_list = $user->getAllUsers();
          // print_r ($user_list);
          foreach($user_list as $user_detail){
        ?>
        <tr>
          <td><?php echo $user_detail['user_id']?></td>
          <td><?php echo $user_detail['first_name']." ".$user_detail['last_name']?></td>
          <td><?php echo $user_detail['username']?></td>
          <td><a href="editUser.php?user_id=<?php echo $user_detail['user_id']?>" class="btn btn-outline-warning" role="button">UPDATE</a></td>
          <td><a href="deleteUser.php?user_id=<?php echo $user_detail['user_id']?>" class="btn btn-outline-danger" role="button">DELETE</a></td>
        </tr>
        <?php
          }
        ?>
      </tbody>
    </table>
  </div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>