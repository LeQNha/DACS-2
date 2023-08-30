<?php
// include ("dbc.php");
require 'dbc.php';
    if(isset($_POST["submit"])){
        $email = $_POST["email"];
        $username = $_POST["username"];
        $password = $_POST["password"];
        $confirmpassword = $_POST["confirmpassword"];
        $duplicate = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username' OR email = '$email'");
        if(mysqli_num_rows($duplicate) > 0){
            // echo "<script> alert('DUPLICATE ACCOUNT!'); </script>";
            echo "DUPLICATE ACCOUNT!";
        }else{
            if($password == $confirmpassword){
                $query = "INSERT INTO user VALUES(3,'$email','$username','$password',0)";
                mysqli_query($conn,$query);
                // echo "<script> alert('Registion Complete!'); </script>";
                echo "Registion Complete!";
            }else{
                // echo "<script> alert('Password does not match!'); </script>";
                echo "Password does not match!";
            }
        }
    }
?>