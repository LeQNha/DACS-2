<?php
    session_start();
    include ("dbc.php");
    if(isset($_POST['submit'])){
        $username = $_POST["username"];
        $password = $_POST["password"];

        $query = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";
        $result = mysqli_query($conn, $query);
        if(mysqli_num_rows(mysqli_query($conn, $query)) == 1){
            // $response = array('status'=>'success');
            // echo json_encode($response);
            $_SESSION['Login']['username'] = $username;
            echo '<script> window.location.href="Home.php"; </script>';
        }else{
            // $response = array('status'=>'failed');
            // echo "<script> alert('Login Failed!'); </script>";
            // echo json_encode($response);
            echo '<script> alert("Sai tài khoản hoặc mật khẩu"); </script>';
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/LoginRegister.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Login</title>
</head>
<body>
    <div class="container">
        <div class="form-box login-form" id="login-form">
            <h1>Đăng nhập</h1>
            <form action="Login.php" method="post" id="loginForm">
                <input type="text" name="username" id="username" placeholder="Tài khoản" required>                
                <input type="password" name="password" id="password" placeholder="Mật khẩu" required>
            
                <a href="#" class="forgot-password"><p>Quên mật khẩu?</p></a>

                <button type="submit" name="submit">Đăng nhập</button>
                
                <p class="not-have-account">Chưa có tài khoản? <a href="Register.php" class="switch" id="switch-to-sign-up">Đăng ký</a></p>
            </form>
        </div>
    </div>
</body>
</html>
