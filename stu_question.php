<?php
    session_start();
    require 'dbcon.php';
    include 'stu_header.php';
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>

    <div class="container mt-5">
        <?php include('message.php'); ?>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Exercise Date</th>
                                    <th>Exercise Name</th>
                                    <th>Exercise Files </th>

                                    <th>The Answer</th>                                                             
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    if(isset($_SESSION['username'])) {
                                        $username = mysqli_real_escape_string($con, $_SESSION['username']);
                                        $query = "SELECT * FROM question";
                                        $query_run = mysqli_query($con, $query);
                                        $numrows = mysqli_num_rows($query_run);
                                        if($numrows > 0)
                                        {
                                            foreach($query_run as $question)
                                            {
                                                ?>
                                                <tr>
                                                    <td><?= $question['date']; ?></td>
                                                    <td><?= $question['name']; ?></td> 
                                                    <td><a href="uploads/<?= $question['file']; ?>" download>Download question </a></td> 
                                                    <?php
                                                        $questionid = $question['id'];
                                                        $query2 = "SELECT * FROM answer WHERE username = '$username' AND question_id = '$questionid'";
                                                        $query_run2 = mysqli_query($con, $query2);
                                                        $numrows2 = mysqli_num_rows($query_run2);
                                                        if($numrows2 == 1){
                                                            $row2 = mysqli_fetch_assoc($query_run2);
                                                            ?>
                                                            <td><?= $row2['file']; ?></td>
                                                        <?php }else{?>
                                                        <td>
                                                            
                                                                <div>
                                                                    <a href="stu_answer_create.php?id=<?= $question['id']; ?>" class="btn btn-danger btn-sm">Submit</a>
                                                                    
                                                                </div>
                                                            
    
                                                        </td>
                                                    </tr>
                                                        <?php }

                                                   
                                        }
                                        }

                                    } else{
                                        echo "<h5> No Record Found </h5>";
                                    }

                                    
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