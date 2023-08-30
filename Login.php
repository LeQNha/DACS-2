<?php
    session_start();
    include ("dbc.php");
    // if(isset($_POST['submit'])){
        $username = $_POST["username"];
        $password = $_POST["password"];

        $query = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";
        $result = mysqli_query($conn, $query);
        if(mysqli_num_rows(mysqli_query($conn, $query)) == 1){
        
            echo 'success';
            $_SESSION['Login']['username'] = $username;
        }else{
            // echo "<script> alert('Login Failed!'); </script>";
            echo "error";
        }
    // }

?>