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

    <
</head>
<body>
  
    <div class="container mt-5">

        <?php include('message.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Edit Message
                            <a href="lect_message.php" class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <?php
                        if(isset($_GET['id']))
                        {
                            $mess_id = mysqli_real_escape_string($con, $_GET['id']);
                            // echo $student_id, "ttttt";
                            $query = "SELECT * FROM user WHERE id='$mess_id' ";
                            $query_run = mysqli_query($con, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                foreach($query_run as $mess){
                                ?>
                                <form action="lect_student_query.php" method="POST">
                                    
                                    <input type="hidden" name="id" value="<?= $mess['id']; ?>">
                                    <div class="mb-3">
                                        <input type="text" class="form-control" name='content'> 
                                    </div>
    
                                    <div class="mb-3">
                                        <button type="submit" name="edit_message" class="btn btn-primary">
                                            Update
                                        </button>
                                    </div>

                                </form>
                                <?php }
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