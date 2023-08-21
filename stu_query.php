<?php
session_start();
require 'dbcon.php';

if(isset($_POST['submit']) && isset($_SESSION['username'])){
    echo 'hellloo';
    $username = mysqli_real_escape_string($con, $_SESSION['username']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $newpass = md5($password);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);

    $query = "UPDATE user SET password ='$newpass', email='$email', phone='$phone' WHERE username='$username'";

    $query_run = mysqli_query($con, $query);
    if($query_run)
    {
        
        header("Location: stu_message.php");
        exit(0);
    }
    else
    {
        header("Location: stu_update.php");
        exit(0);
    }
  }       

?>