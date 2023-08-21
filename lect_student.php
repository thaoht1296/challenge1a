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
    <div class="container mt-4">

        <?php include('message.php'); ?>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Student Details
                            <a href="lect_student_create.php" class="btn btn-primary float-end">Add Students</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Username</th>
                                    <th>Fullname</th>
                                    <th>Email</th>
                                    <th>Phone</th>                                                                    
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    if(isset($_SESSION['username'])) {
                                        $username = mysqli_real_escape_string($con, $_SESSION['username']);
                                        $query = "SELECT * FROM user WHERE role = '1'";
                                        $query_run = mysqli_query($con, $query);
                                        $numrows = mysqli_num_rows($query_run);
                                        if($numrows > 0)
                                        {
                                            foreach($query_run as $student)
                                            {
                                                ?>
                                                <tr>
                                                    <td><?= $student['username']; ?></td>
                                                    <td><?= $student['fullname']; ?></td>
                                                    <td><?= $student['email']; ?></td>
                                                    <td><?= $student['phone']; ?></td>                                 
                                                    <td>
                                                        <div style="display:flex; justify-content:flex-start">
                                                            <div style="margin-right:10px">
                                                                <a href="lect_student_view.php?id=<?= $student['id']; ?>" class="btn btn-info btn-sm ">View</a>
                                                            </div>
                                                            <div style="margin-right:10px">
                                                                <a href="lect_student_edit.php?id=<?= $student['id']; ?>" class="btn btn-success btn-sm ">Edit</a>
                                                            </div>
                                                            <form action="lect_student_query.php" method="POST" class="d-inline">
                                                                <button type="submit" name="delete_student" value="<?=$student['id'];?>" class="btn btn-danger btn-sm">Delete</button>
                                                            </form>
                                                        </div>

                                                    </td>
                                                </tr>
                                                <?php
                                            }
                                        }
                                        else
                                        {
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
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>