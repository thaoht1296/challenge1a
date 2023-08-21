<?php
session_start();
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

        <?php include('message.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Edit Profile 
                            <!-- <a href="stu_header.php" class="btn btn-danger float-end">BACK</a> -->
                        </h4>
                    </div>
                    <div class="card-body">

                        <?php
                        if(isset($_SESSION['username']))
                        {
                            $username = mysqli_real_escape_string($con, $_SESSION['username']);
                            // echo $student_id, "ttttt";
                            $query = "SELECT * FROM user WHERE username = '$username'";
                            $query_run = mysqli_query($con, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                $student = mysqli_fetch_array($query_run);
                                ?>
                                <form action="stu_query.php" method="POST">
                                    
                                    <div class="mb-3">
                                        <label>Password</label>
                                        <input type="text" name="password" value="<?=$student['password'];?>" class="form-control">
                                    </div>
                                    
                                    <div class="mb-3">
                                        <label>Email</label>
                                        <input type="email" name="email" value="<?=$student['email'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>Phone</label>
                                        <input type="text" name="phone" value="<?=$student['phone'];?>" class="form-control">
                                    </div>
                                    
                                    <div class="mb-3">
                                        <div style="display:flex; justify-content:flex-start">
                                            <button type="submit" name="submit" class="btn btn-primary" style="margin-right:10px">
                                                Update
                                            </button>
                                            <a href="stu_message.php" class="btn btn-danger">Cancel</a>
                                    </div>
                                        
                                    
                                </form>
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