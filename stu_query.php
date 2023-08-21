<?php
session_start();
require 'dbcon.php';

if(isset($_POST['submit']) && isset($_SESSION['username'])){
    // echo 'hellloo';
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
  
if(isset($_POST['delete_message']))
{
    $mess_id = mysqli_real_escape_string($con, $_POST['delete_message']);

    $query = "DELETE FROM `message` WHERE id='$mess_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        
        header("Location: stu_message.php");
        exit(0);
    }
    else
    {
        
        header("Location: stu_message.php");
        exit(0);
    }
}


if(isset($_POST['edit_message']))
{
    $mess_id = mysqli_real_escape_string($con, $_POST['id']);
    $content = mysqli_real_escape_string($con, $_POST['content']);
    
    // var_dump($username,$newpass,$fullname,$email, $phone);
    // die();

    $query = "UPDATE `message` SET `content`='$content' WHERE id='$mess_id'";

    $query_run = mysqli_query($con, $query);
    
    if($query_run)
    {
       
        // echo $mess_id;
        // echo $content;
        header("Location: stu_message.php");
        exit(0);
    }
    else
    {
        // echo 'empty';
        header("Location: stu_message.php");
        exit(0);
    }

}

?>