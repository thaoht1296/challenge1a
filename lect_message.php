<?php
  session_start();
  require 'dbcon.php';
  include 'lect_header.php';
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    
</head>
<body>
  <div style="display: flex; margin: 20px">
    <div style="margin: 10px; width: 50%">
      <div style="width: 90%">
        <h4>Message list sent to <?=$_SESSION['username']; ?></h4>
        <table class="table table-bordered table-striped">
          <thead>
              <tr>
                  <th>Date</th>
                  <th>From</th>
                  <th>Content</th>                                                                  
              </tr>
          </thead>
          <tbody>
          <?php
            if(isset($_SESSION['username'])) {
                $username = mysqli_real_escape_string($con, $_SESSION['username']);
                // echo $username;
                $query = "SELECT * FROM `message` WHERE `to` = '$username'";
                $query_run = mysqli_query($con, $query);
                if($query_run){
                  $numrows = mysqli_num_rows($query_run);
                  // echo $numrows;
                  if($numrows > 0)
                  {
                      foreach($query_run as $message1)
                      {
                          ?>
                          <tr>
                              <td><?= $message1['date']; ?></td>
                              <td><?= $message1['from']; ?></td>
                              <td><?= $message1['content']; ?></td>                               
                              
                          </tr>
                    <?php
                    }
                  }
                } else{
                    echo "<h5> No Record Found </h5>";
                }
            }  
          ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <div style="display: flex; margin: 20px">
    <div style="margin: 10px; width: 50%">
      <div style="width: 90%">
        <h4>Message list from <?=$_SESSION['username']; ?></h4>
        <table class="table table-bordered table-striped">
          <thead>
              <tr>
                  <th>Date</th>
                  <th>From</th>
                  <th>Content</th>
                  <th>Action</th>                                                                  
              </tr>
          </thead>
          <tbody>
          <?php
            if(isset($_SESSION['username'])) {
                $username = mysqli_real_escape_string($con, $_SESSION['username']);
                // echo $username;
                $query = "SELECT * FROM `message` WHERE `from` = '$username'";
                $query_run = mysqli_query($con, $query);
                if($query_run){
                  $numrows = mysqli_num_rows($query_run);
                  // echo $numrows;
                  if($numrows > 0)
                  {
                      foreach($query_run as $message1)
                      {
                          ?>
                          <tr>
                              <td><?= $message1['date']; ?></td>
                              <td><?= $message1['to']; ?></td>
                              <td><?= $message1['content']; ?></td>                               
                              <td>
                                <div style="display:flex; justify-content:flex-start">
                                   
                                    <div style="margin-right:10px">
                                        <a href="message_edit.php?id=<?= $message1['id']; ?>" class="btn btn-success btn-sm ">Edit</a>
                                    </div>
                                    <form action="stu_query.php" method="POST" class="d-inline">
                                        <button type="submit" name="delete_message" value="<?=$message1['id'];?>" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </div>

                              </td>
                          </tr>
                    <?php
                    }
                  }
                } else{
                    echo "<h5> No Record Found </h5>";
                }
            }  
          ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>


      
  </div>
    <div style="width: 25%; background: #ffffebe3; padding: 20px; min-height: 400px">
      <div style="width: 50px; height: 50px; margin: auto">
          <img style="width: 50px; height: 50px" src="icon.png" alt="user-image">
      </div>
      <div style="line-height: 2; width: fit-content; margin: auto;">
        <?php
          if(isset($_SESSION['username'])){
            $username = mysqli_real_escape_string($con, $_SESSION['username']);
            $query = "SELECT * FROM user WHERE username = '$username' ";
            $query_run = mysqli_query($con, $query);
            $numrows = mysqli_num_rows($query_run);
            $row = mysqli_fetch_assoc($query_run);
        ?>
          <div><b>Full name:</b> <?= $row['fullname']; ?></div>
          <div><b>Email:</b> <?= $row['email']; ?></div>
          <div style="margin-bottom: 10px"><b>Phone:</b> <?= $row['phone']; ?></div>
          <div style="text-align: center;">
            <a href="stu_update.php" class="btn btn-success btn-sm">Edit</a>
          </div>
          
      <?php } 
      ?>
      </div>
  </div>          
</body>
</html>