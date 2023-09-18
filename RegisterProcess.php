<?php
    session_start();
    include("dbc.php");

    $email = $_POST["email"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $confirmpassword = $_POST["confirmpassword"];

    // Kiểm tra xác nhận mật khẩu
    if($password !== $confirmpassword){
        echo "Xác nhận lại mật khẩu!";
        exit;
    }

    // Kiểm tra xem username hoặc email đã tồn tại trong cơ sở dữ liệu
    $query = "SELECT * FROM users WHERE username = '$username' OR email = '$email'";
    $result = mysqli_query($conn, $query);
    if(empty($email) || empty($username) || empty($password) || empty($confirmpassword)){
        echo "Không được để trống!";
    }else{
        if(mysqli_num_rows($result) > 0){
            echo "Tài khoản đã tồn tại";
        }else{
            $query = "INSERT INTO user (username, email, password, avatar) VALUES ('$username', '$email', '$password','userDefaultAvatar.png')";
        
                echo "success";
                $_SESSION['Login']['username'] = $username;

        }
    }

?>