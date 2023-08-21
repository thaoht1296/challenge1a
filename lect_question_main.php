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

   
</head>
<body>
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Add question
                            <a href="lect_question_create.php" class="btn btn-primary float-end">Add question</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Name</th>
                                    <th>File name</th>                                                                  
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    if(isset($_SESSION['username'])) {
                                        $username = mysqli_real_escape_string($con, $_SESSION['username']);
                                        // echo $username;
                                        $query = "SELECT * FROM question WHERE username = '$username'";
                                        $query_run = mysqli_query($con, $query);
                                        $numrows = mysqli_num_rows($query_run);
                                        // echo $numrows;
                                        if(mysqli_num_rows($query_run) > 0)
                                        {
                                            foreach($query_run as $question)
                                            {
                                                ?>
                                                <tr>
                                                    <td><?= $question['date']; ?></td>
                                                    <td><?= $question['name']; ?></td>
                                                    <td><?= $question['file']; ?></td>                               
                                                    <td>
                                                        <a href="lect_question_view.php?id=<?= $question['id']; ?>" class="btn btn-info btn-sm">View</a>
                                                    </td>
                                                </tr>
                                                <?php
                                            }
                                        }
                                        else
                                        {
                                            echo "<h5> No Record Found </h5>";
                                        }
                                    } else{ echo "Error!!!!!";}
                                
                                ?>
                                
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>