<?php
session_start();
require 'dbcon.php';

if(isset($_POST['delete_student']))
{
    $student_id = mysqli_real_escape_string($con, $_POST['delete_student']);

    $query = "DELETE FROM user WHERE id='$student_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Student Deleted Successfully";
        header("Location: lect_student.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Student Not Deleted";
        header("Location: lect_student.php");
        exit(0);
    }
}

if(isset($_POST['edit1_student']))
{
    $student_id = mysqli_real_escape_string($con, $_POST['id']);

    $username = mysqli_real_escape_string($con, $_POST['username']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $newpass = md5($password);
    $fullname = mysqli_real_escape_string($con, $_POST['fullname']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
    // var_dump($username,$newpass,$fullname,$email, $phone);
    // die();
    $query = "UPDATE user SET username='$username', password ='$newpass', fullname='$fullname', email='$email', phone='$phone' WHERE id='$student_id'";

    $query_run = mysqli_query($con, $query);
    
    if($query_run)
    {
       
        $_SESSION['message'] = "Student Updated Successfully";
        header("Location: lect_student.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Student Not Updated";
        header("Location: lect_student_view.php");
        exit(0);
    }

}


if(isset($_POST['create_student']))
{
    $username = mysqli_real_escape_string($con, $_POST['username']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $newpass = md5($password);
    $fullname = mysqli_real_escape_string($con, $_POST['fullname']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
    

    $query = "INSERT INTO user (username,password,role,email,phone,fullname) VALUES ('$username', '$newpass', '1' ,'$email','$phone','$fullname')";

    $query_run = mysqli_query($con, $query);
    if($query_run)
    {
        $_SESSION['message'] = "Student Created Successfully";
        header("Location: lect_student.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Student Not Created";
        header("Location: lect_student_create.php");
        exit(0);
    }
}

?>