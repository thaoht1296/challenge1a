<?php
    $host = 'localhost';
    $user = 'root';
    $password = '123456aA@';
    $database = 'qlsv';
    $errors = array();
    $_SESSION['success'] = "";

    $con = mysqli_connect($host, $user, $password, $database);
 
    if (!$con){
        ?>
            <script>alert("Connection Unsuccessful!!!");</script>
        <?php
    }
?>