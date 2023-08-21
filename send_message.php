<?php
session_start();
require 'dbcon.php';

if(isset($_POST['send']) && isset($_SESSION['username']))
{
    $from = mysqli_real_escape_string($con, $_SESSION['username']);
    echo $from;
    $content = mysqli_real_escape_string($con, $_POST['content']);
    echo $content;
    $to = mysqli_real_escape_string($con, $_POST['to']);
    echo $to;
    

    $query = "INSERT INTO `message` (content, `from`,`to`) VALUES ('$content', '$from', '$to')";

    // $error = mysqli_error($con);
    // print("Error Occurred: ".$error);
    $query_run = mysqli_query($con, $query);


    if($query_run)
    {
        echo "send success";
        header("Location: stu_index.php");
        exit(0);
    }
    else
    {
        echo "send failed";
        header("Location: stu_student_view.php");
        exit(0);
    }
}else{
    echo "failed";
}

?>