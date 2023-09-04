<?php
    session_start();
// include ("dbc.php");
    require 'dbc.php';
    if(isset($_POST["submit"])){
        $email = $_POST["email"];
        $username = $_POST["username"];
        $password = $_POST["password"];
        $confirmpassword = $_POST["confirmpassword"];
        $duplicate = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username' OR email = '$email'");
        if(empty($email) || empty($username) || empty($password) || empty($confirmpassword)){
            // echo "empty";
        }
        if(mysqli_num_rows($duplicate) > 0){
            // echo "duplicate";
            echo '<script> alert("Tài khoản đã tồn tại"); </script>';
        }else{
            if($password == $confirmpassword){
                $query = "INSERT INTO user VALUES(3,'$email','$username','$password',0)";
                mysqli_query($conn,$query);
                
                // echo "success";
                $_SESSION['Login']['username'] = $username;
                echo '<script> alert("Đăng ký thành công"); window.location.href = "Home.php" </script>';
                
            }else{
                // echo "password not match";
                echo '<script> alert("Xác nhận lại mật khẩu"); </script>';
            }
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
    <title>Register</title>
</head>
<body>
    <div class="container">
        <div class="form-box sign-up-form" id="sign-up-form">
            <h1>Đăng ký</h1>
            <form action="Register.php" method="post" id="registerForm">
                
                    <input type="email" name="email" placeholder="Email" required>
             
                    <input type="text" name="username" placeholder="Tên tài khoản" required>
                
                    <input type="password" name="password" placeholder="Mật khẩu" required>

                    <input type="password" name="confirmpassword" placeholder="Xác nhận mật khẩu" required>
            
                <label for=""><input type="checkbox" class="checkbox"> <span>Tôi đồng ý với các</span> <a href="#">Điều khoản & Chính sách</a></label> 
                
                <button type="submit" name="submit">Đăng ký</button>
                <p class="not-have-account">Đã có tài khoản? <a href="Login.php" class="switch" id="switch-to-login">Đăng nhập</a></p>
            </form>
        </div>
    </div>
</body>
</html>