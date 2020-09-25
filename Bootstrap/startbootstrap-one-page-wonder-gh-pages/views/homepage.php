<?php
  include '../action/userAction.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Home</title>

  <!-- Bootstrap core CSS -->
  <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://kit.fontawesome.com/f7ad5e1e35.js" crossorigin="anonymous"></script>
  <!-- Custom fonts for this template -->
  <link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="../css/one-page-wonder.min.css" rel="stylesheet">

</head>

<body>

  <!-- Navigation -->
  <?php include "menubar.php" ?>

  <header class="masthead text-center text-white">
    <div class="masthead-content">
      <div class="container">
        <p class="masthead-subheading lead mb-0">
          <?php
            if(empty($_SESSION['username'])){
              ?>
              Welcome!!
              <?php
            }else{
          ?>
              Welcome  <?=$_SESSION['username']?> !!
          <?php
            }
          ?>
        </p>
        <h1 class="masthead-heading mb-0">Buy e-Ticket</h1>
        <h2 class="masthead-subheading mb-0">You Can Buy Sport e-Ticket</h2>
        <a href="#buyTicket" class="btn btn-primary btn-xl rounded-pill mt-5">
          
          View All Ticket</a>
      </div>
    </div>
    <div class="bg-circle-1 bg-circle"></div>
    <div class="bg-circle-2 bg-circle"></div>
    <div class="bg-circle-3 bg-circle"></div>
    <div class="bg-circle-4 bg-circle"></div>
  </header>

  <section id="buyTicket">
    <h3 class="h1 text-center mt-3 p-3">BUY TICKET</h3>
    <div class="container">
      <ul class="nav nav-tabs w-50 mx-auto row justify-content-between">
        <li class="nav-item">
          <a href="#all" class="nav-link" data-toggle="tab">ALL</a>
        </li>
        <li class="nav-item">
          <a href="#soccer" class="nav-link" data-toggle="tab">SOCCER</a>
        </li>
        <li class="nav-item">
          <a href="#baseball" class="nav-link" data-toggle="tab">BASEBALL</a>
        </li>
        <li class="nav-item">
          <a href="#basketball" class="nav-link" data-toggle="tab">BASKETBALL</a>
        </li>
        
      </ul>
      <div class="tab-content">
        <div class="tab-pane fade show active" id="all">
          <div class="container my-5 text-center">
            <table class="table table-hover table-striped table-bordered mx-auto text-center my-5">
              <thead class="thead-dark text-uppercase">
                <th>TICKET ID</th>
                <th>HOME</th>
                <th>AWAY</th>
                <th>DATE</th>
                <th>PRICE</th>
                <th>REMAINING</th>
                <th></th>
              </thead>
              <tbody>
                  <?php
                  $ticket_list = $ticket->getAllTickets();
                  if($ticket_list){
                    foreach($ticket_list as $ticket_detail){
                  ?> 
                <tr>
                  <td><?=$ticket_detail['ticket_id']?></td>
                  <td>
                    <p><?=$ticket_detail['team_home']?></p>
                    <img src="../uploads/<?= $ticket_detail['ticket_img_home']?>" alt="" class="img-thumbnail w-25">
                  </td>
                  <td>
                    <p><?=$ticket_detail['team_away']?></p>
                    <img src="../uploads/<?= $ticket_detail['ticket_img_away']?>" alt="" class="img-thumbnail w-25">
                  </td>
                  <td><?=$ticket_detail['ticket_date']?></td>
                  <td>$<?=$ticket_detail['ticket_price']?></td>
                  <td>
                    <?php
                      if($ticket_detail['ticket_quantity'] > 30){
                        echo "<span class='bold'>○</span>";
                      }elseif($ticket_detail['ticket_quantity'] < 30 && $ticket_detail['ticket_quantity'] > 0){

                        echo "<span class='text-success'>△</span>";
                        echo "<br>";
                        echo "<span class='text-success'>";
                        echo $ticket_detail['ticket_quantity'] , " tickets remaining";
                        echo "</span>";
                      }elseif($ticket_detail['ticket_quantity'] == '0'){
                        echo "<span class='text-danger'>✖︎</span>";
                        echo "<br>";
                        echo "SOLD OUT";
                      }
                    ?>
                  </td>
                  <td><a href="buyTicket.php?ticket_id=<?=$ticket_detail['ticket_id']?>" class="btn btn-danger" role="button">Buy</a></td>
                </tr>
                <?php
                    }
                  }else{
                    ?>
                    <tr>
                      <td colspan="9">
                        <h3 class="text-center">No records found.</h3>
                      </td>
                    </tr>
                    <?php
                  }
                ?>
              </tbody>
            </table>
          </div>
        </div>
        <div class="tab-pane fade" id="soccer">
          <div class="container">
            <table class="table table-hover table-striped table-bordered mx-auto text-center my-5">
              <thead class="thead-dark text-uppercase">
                <th>TICKET ID</th>
                <th>HOME</th>
                <th>AWAY</th>
                <th>DATE</th>
                <th>PRICE</th>
                <th>REMAINING</th>
                <th></th>
              </thead>
              <tbody>
                  <?php
                  $ticket_list = $ticket->getSoccerTicket();
                  if($ticket_list){
                    foreach($ticket_list as $ticket_detail){
                  ?> 
                <tr>
                  <td><?=$ticket_detail['ticket_id']?></td>
                  <td>
                    <p><?=$ticket_detail['team_home']?></p>
                    <img src="../uploads/<?= $ticket_detail['ticket_img_home']?>" alt="" class="img-thumbnail w-25">
                  </td>
                  <td>
                    <p><?=$ticket_detail['team_away']?></p>
                    <img src="../uploads/<?= $ticket_detail['ticket_img_away']?>" alt="" class="img-thumbnail w-25">
                  </td>
                  <td><?=$ticket_detail['ticket_date']?></td>
                  <td><?=$ticket_detail['ticket_price']?></td>
                  <td>
                      <?php
                        if($ticket_detail['ticket_quantity'] > 30){
                          echo "<span class='bold'>○</span>";
                        }elseif($ticket_detail['ticket_quantity'] < 30 && $ticket_detail['ticket_quantity'] > 0){

                          echo "<span class='text-success'>△</span>";
                          echo "<br>";
                          echo "<span class='text-success'>";
                          echo $ticket_detail['ticket_quantity'] , " tickets remaining";
                          echo "</span>";
                        }elseif($ticket_detail['ticket_quantity'] == '0'){
                          echo "<span class='text-danger'>✖︎</span>";
                          echo "<br>";
                          echo "SOLD OUT";
                        }
                      ?>
                    </td>
                  <td>
                    <a href="buyTicket.php?ticket_id=<?=$ticket_detail['ticket_id']?>" class="btn btn-danger" role="button">Buy</a>
                  </td>
                </tr>
                <?php
                      }
                    }else{
                      ?>
                      <tr>
                        <td colspan="9">
                          <h3 class="text-center">No records found.</h3>
                        </td>
                      </tr>
                      <?php
                    }
                  ?>
              </tbody>
            </table>
          </div>
        </div>
        <div class="tab-pane fade" id="baseball">
          <div class="container my-5 text-center">
            <table class="table table-hover table-striped table-bordered mx-auto text-center my-5">
              <thead class="thead-dark text-uppercase">
                <th>TICKET ID</th>
                <th>HOME</th>
                <th>AWAY</th>
                <th>DATE</th>
                <th>PRICE</th>
                <th>REMAINING</th>
                <th></th>
              </thead>
              <tbody>
                  <?php
                  $ticket_list = $ticket->getBaseballTicket();
                  if($ticket_list){
                    foreach($ticket_list as $ticket_detail){
                  ?> 
                <tr>
                    <td><?=$ticket_detail['ticket_id']?></td>
                    <td>
                      <p><?=$ticket_detail['team_home']?></p>
                      <img src="../uploads/<?= $ticket_detail['ticket_img_home']?>" alt="" class="img-thumbnail w-25">
                    </td>
                    <td>
                      <p><?=$ticket_detail['team_away']?></p>
                      <img src="../uploads/<?= $ticket_detail['ticket_img_away']?>" alt="" class="img-thumbnail w-25">
                    </td>
                    <td><?=$ticket_detail['ticket_date']?></td>
                    <td>$<?=$ticket_detail['ticket_price']?></td>
                    <td>
                      <?php
                        if($ticket_detail['ticket_quantity'] > 30){
                          echo "<span class='bold'>○</span>";
                        }elseif($ticket_detail['ticket_quantity'] < 30 && $ticket_detail['ticket_quantity'] > 0){

                          echo "<span class='text-success'>△</span>";
                          echo "<br>";
                          echo "<span class='text-success'>";
                          echo $ticket_detail['ticket_quantity'] , " tickets remaining";
                          echo "</span>";
                        }elseif($ticket_detail['ticket_quantity'] == '0'){
                          echo "<span class='text-danger'>✖︎</span>";
                          echo "<br>";
                          echo "SOLD OUT";
                        }
                      ?>
                    </td>
                    <td><a href="buyTicket.php?ticket_id=<?=$ticket_detail['ticket_id']?>" class="btn btn-danger" role="button">Buy</a></td>
                  </tr>
                  <?php
                      }
                    }else{
                      ?>
                      <tr>
                        <td colspan="9">
                          <h3 class="text-center">No records found.</h3>
                        </td>
                      </tr>
                      <?php
                    }
                  ?>
              </tbody>
            </table>
          </div>
        </div>
        <div class="tab-pane fade" id="basketball">
          <div class="container">
            <table class="table table-hover table-striped table-bordered mx-auto text-center my-5">
              <thead class="thead-dark text-uppercase">
                <th>TICKET ID</th>
                <th>HOME</th>
                <th>AWAY</th>
                <th>DATE</th>
                <th>PRICE</th>
                <th>REMAINING</th>
                <th></th>
              </thead>
              <tbody>
                  <?php
                  $ticket_list = $ticket->getBasketballTicket();
                  if($ticket_list){
                    foreach($ticket_list as $ticket_detail){
                  ?> 
                <tr>
                <td><?=$ticket_detail['ticket_id']?></td>
                    <td>
                      <p><?=$ticket_detail['team_home']?></p>
                      <img src="../uploads/<?= $ticket_detail['ticket_img_home']?>" alt="" class="img-thumbnail w-25">
                    </td>
                    <td>
                      <p><?=$ticket_detail['team_away']?></p>
                      <img src="../uploads/<?= $ticket_detail['ticket_img_away']?>" alt="" class="img-thumbnail w-25">
                    </td>
                    <td><?=$ticket_detail['ticket_date']?></td>
                    <td>$<?=$ticket_detail['ticket_price']?></td>
                    <td>
                      <?php
                        if($ticket_detail['ticket_quantity'] > 30){
                          echo "<span class='bold'>○</span>";
                        }elseif($ticket_detail['ticket_quantity'] < 30 && $ticket_detail['ticket_quantity'] > 0){

                          echo "<span class='text-success'>△</span>";
                          echo "<br>";
                          echo "<span class='text-success'>";
                          echo $ticket_detail['ticket_quantity'] , " tickets remaining";
                          echo "</span>";
                        }elseif($ticket_detail['ticket_quantity'] == '0'){
                          echo "<span class='text-danger'>✖︎</span>";
                          echo "<br>";
                          echo "SOLD OUT";
                        }
                      ?>
                    </td>
                    <td><a href="buyTicket.php?ticket_id=<?=$ticket_detail['ticket_id']?>" class="btn btn-danger" role="button">Buy</a></td>
                </tr>
                <?php
                      }
                    }else{
                      ?>
                      <tr>
                        <td colspan="9">
                          <h3 class="text-center">No records found.</h3>
                        </td>
                      </tr>
                      <?php
                    }
                  ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section id="aboutUs" class="bg-light pt-4">
    <h3 class="text-center p-3">About Us</h3>

    <div class="container my-3">
      <div class="row justify-content-center">
        <div class="col-md-6 py-4">
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Ex eos minus aliquam, suscipit non neque placeat voluptas incidunt magnam quas pariatur laboriosam, eius nam est, sapiente fuga ducimus dolor. Aspernatur, molestiae voluptatum doloremque recusandae quaerat eum adipisci tenetur praesentium inventore mollitia delectus nam. Minus, laudantium? Error nemo quam obcaecati illo deleniti, aspernatur fugit reprehenderit quas ab delectus, beatae nostrum eveniet cupiditate sequi odit animi ad ducimus tenetur magnam necessitatibus id? Quae eius consequatur recusandae alias repellendus aperiam corrupti facere, veniam culpa minima mollitia voluptas dolore fugiat. Corporis quis magnam laudantium aut! Omnis, consequuntur sint eius enim voluptatum vitae ut dolorum?
        </div>
        <div class="col-md-6 py-4">
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Ex eos minus aliquam, suscipit non neque placeat voluptas incidunt magnam quas pariatur laboriosam, eius nam est, sapiente fuga ducimus dolor. Aspernatur, molestiae voluptatum doloremque recusandae quaerat eum adipisci tenetur praesentium inventore mollitia delectus nam. Minus, laudantium? Error nemo quam obcaecati illo deleniti, aspernatur fugit reprehenderit quas ab delectus, beatae nostrum eveniet cupiditate sequi odit animi ad ducimus tenetur magnam necessitatibus id? Quae eius consequatur recusandae alias repellendus aperiam corrupti facere, veniam culpa minima mollitia voluptas dolore fugiat. Corporis quis magnam laudantium aut! Omnis, consequuntur sint eius enim voluptatum vitae ut dolorum?
        </div>
      </div>
    </div>
  </section>

  <section id="contact" class="mb-5">
  <h3 class="text-center py-3">Contact Us</h3>
  <div class="container w-50 mx-auto my-3">
    <form action="" method="post">
      <div class="form-group row pt-3">
        <div class="col-md-5">
          <label for="username">USERNAME</label>
          <input type="text" name="username" id="username" class="form-control text-center" required>
        </div>
        <div class="col-md-7">
          <label for="email">E-MAIL</label>
          <input type="text" name="email" id="email" class="form-control text-center" required>
        </div>
      </div>
      <div class="form-group row">
        <div class="col-md">
          <label for="message">MESSAGE</label>
          <textarea name="message" id="message" class="form-control" cols="30" rows="10"></textarea>
        </div>
      </div>
      <div class="form-group row">
        <div class="col-md">
        <button type="submit" class="btn btn-block btn-success mt-2">Send</button>
        </div>
      </div>
    </form>
  </div>
  </section>

  <!-- Footer -->
  <footer class="py-5 bg-black">
    <div class="container">
      <p class="m-0 text-center text-white small">Copyright &copy; Your Website 2020</p>
    </div>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="../vendor/jquery/jquery.min.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
