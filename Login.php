<?php
    session_start();
    include ("dbc.php");
    // if(isset($_POST['submit'])){
        $username = $_POST["username"];
        $password = $_POST["password"];

        $query = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";
        $result = mysqli_query($conn, $query);
        if(mysqli_num_rows(mysqli_query($conn, $query)) == 1){
            $response = array('status'=>'success');
            // echo 'success';
            echo json_encode($response);
            $_SESSION['Login']['username'] = $username;
        }else{
            $response = array('status'=>'failed');
            // echo "<script> alert('Login Failed!'); </script>";
            // echo "error";
            echo json_encode($response);
        }
    // }

?>
