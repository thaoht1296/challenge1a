<?php 
    session_start();
    include("dbcon.php");
    
    // User login
    if (isset($_POST['login_user'])) {
        
        // Data sanitization to prevent SQL injection
        // $username = mysqli_real_escape_string($con, $_POST['username']);
        $password = mysqli_real_escape_string($con, $_POST['password']);
        $username = $_POST['username'];
        // echo $username;
    
        // Error message if the input field is left blank
        if (empty($username)) {
            array_push($errors, "Username is required");
        }
        if (empty($password)) {
            array_push($errors, "Password is required");
        }
    
        // Checking for the errors
        if (count($errors) == 0) {
            
            // Password matching
            $password = md5($password);
            
            $query = "SELECT * FROM user WHERE username=
                    '$username' AND password='$password'";
            echo $query;
            $results = mysqli_query($con, $query);
    
            // $results = 1 means that one user with the
            // entered username exists
            $count = mysqli_num_rows($results);


            if ( $count == 1) {
                $row = mysqli_fetch_assoc($results);

                // Storing username in session variable
                $_SESSION['username'] = $username;
                
                // Welcome message
                $_SESSION['success'] = "You have logged in!";
                $_SESSION['role'] = $row['role'];

                if($_SESSION['role'] == '0'){
                    header('location: lect_home.php');
                }
                else{
                    header('location: stu_home.php');
                }
            }
            else {
                
                // If the username and password doesn't match
                array_push($errors, "Username or password incorrect");
            }
        }
        else{
            echo "error";
            header('location: index.php');
        }
    }

?>
