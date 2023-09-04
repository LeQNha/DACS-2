<?php
    session_start();
// include ("dbc.php");
    require 'dbc.php';
    // if(isset($_POST["submit"])){
        $email = $_POST["email"];
        $username = $_POST["username"];
        $password = $_POST["password"];
        $confirmpassword = $_POST["confirmpassword"];
        $duplicate = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username' OR email = '$email'");
        if(empty($email) || empty($username) || empty($password) || empty($confirmpassword)){
            echo "empty";
        }
        if(mysqli_num_rows($duplicate) > 0){
            echo "duplicate";
        }else{
            if($password == $confirmpassword){
                $query = "INSERT INTO user VALUES(3,'$email','$username','$password',0)";
                mysqli_query($conn,$query);
                
                echo "success";
                $_SESSION['Login']['username'] = $username;
            }else{
                
                echo "password not match";
            }
        }
    // }
?>