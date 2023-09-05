<?php
    session_start();
    require 'dbc.php';

    $username = $_POST['username'];
    $password = $_POST['password'];

    $username = $_POST["username"];
    $password = $_POST["password"];

    if (empty($username) || empty($password)) {
        // $response = array('status' => 'empty');
        // header('Content-Type: application/json');
        // echo json_encode($response);
        echo "Không được để trống!";
    }else{
        $query = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";
        $result = mysqli_query($conn, $query);

        if(mysqli_num_rows($result) == 1){
            echo "success";
            $_SESSION['Login']['username'] = $username;
        }else{
            echo "Sai tài khoản hoặc mật khẩu!";
        }
    }

?>