<?php
    require 'dbcon.php';
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Student View Details 
                            <a href="stu_index.php" class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        
                        <?php
                        if(isset($_GET['id']))
                        {
                            $stu_id = mysqli_real_escape_string($con, $_GET['id']);
                            $query = "SELECT * FROM user WHERE id='$stu_id' ";
                            $query_run = mysqli_query($con, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                $user = mysqli_fetch_array($query_run);
                                ?>
                                
                                    
                                    <div class="mb-3">
                                        <label>Fullname</label>
                                        <p class="form-control">
                                            <?=$user['fullname'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>Email</label>
                                        <p class="form-control">
                                            <?=$user['email'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>Phone</label>
                                        <p class="form-control">
                                            <?=$user['phone'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <form action="send_message.php" method="POST">
                                            <div class="form-group pt-4 mb-2">
                                                <input type="hidden" name='from' id="from" value='<?=$_SESSION['username']?>'>
                                                <input type="hidden" name='to' id="to" value='<?= $user['username'] ?>'>
                                                <input type="text" class="form-control" name='content' id="content" placeholder="Nhập tin nhắn" required minlength="1">
                                            </div>
                                            <!-- <div class="btn btn-primary">Gửi</div> -->
                                            <button type="submit" class="btn btn-primary" name="send">Send</button>
            
                                        </form>
                                    </div>

                                <?php
                            }
                            else
                            {
                                echo "<h4>No Such Id Found</h4>";
                            }
                        }
                        ?>
                    </div>


                    
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html> 


