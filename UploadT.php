<?php
    session_start();
    include ('dbc.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UploadT</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="/css/Upload.css">
</head>
<body>
    <div class="cover-div" id="cover-div"></div>
    <header>
        <div class="top-bar">
            <ul class="nav-bar">
                <li><a href="Home.php"><h2>Draint</h2></a></li>
                <li>About</li>
                <li>Rank</li>
                <li>Challenge</li>
                <li>Event</li>
            </ul>
            <ul class="account">
                <?php
                    if(isset($_SESSION['Login']['username'])){ 
                ?>
                    <li><i class="fa-solid fa-bell"></i></li>
                    <li style="font-size: 22px;"> <?php echo $_SESSION['Login']['username']; ?> </li>
                    <li><img src="/webimg/defaultAvatar.png" alt=""></li>
                    <li><a href="Logout.php">Logout</a></li>
                <?php 
                    }else{ 
                ?>
                    <li><i class="fa-solid fa-bell"></i></li>
                    <li><a href="#" class="dang-nhap" id="dang-nhap">ĐĂNG NHẬP</a></li>
                    <li><a href="#" class="dang-ky" id = "dang-ky">ĐĂNG KÝ</a></li>       
               <?php }
                ?>
            </ul>
        </div>
    </header>
    
    <div class="container">
        <form action="UploadImageT.php" method="post" enctype="multipart/form-data">
            <div class="image-container">
                <div class="image-show">
                    <p>Nhấp vào để tải lên</p>
                </div>
            </div>
            <div class="image-infor">
                <input type="file" name="myImage" class="myImage">
                <input type="submit" name="submit" value="upload">
                <input type="text" name="title" id="title" placeholder="Title">
                <input type="text" name="description" id="description" placeholder="Description">
            </div>
        </form>
    </div>
    
    <!-- <form action="UploadImageT.php" style="margin-top: 100px;" method="post" enctype="multipart/form-data">
        <div>
            <div>
                <input type="file" name="myImage">
            </div>
        </div>
        <input type="submit" name="submit" value="upload">
        <input type="text" name="title" id="title" placeholder="Title">
        <input type="text" name="description" id="description" placeholder="Description">
    </form> -->

    
    <div class="form-box login-form" id="login-form">
            <i class="fa-solid fa-xmark close" id="close-login"></i>
            <h2>ĐĂNG NHẬP</h2>
            <form action="Login.php" method="post">
                <div class="input-box">
                    <i class="fa-solid fa-user"></i>
                    <input type="text" name="username" placeholder="Tài khoản" required>                
                </div>
                <div class="input-box">
                    <i class="fa-solid fa-lock"></i>
                    <input type="password" name="password" placeholder="Mật khẩu" required>
                </div>
            
                <!-- <p class="remember-me"><input type="checkbox">Ghi nhớ đăng nhập</p> -->
                <a href="#" class="forgot-password"><p>Quên mật khẩu?</p></a>
                <a href="HomePage.html"><button type="submit" name="submit">Đăng nhập</button></a>
                <p class="not-have-account">Chưa có tài khoản? <a href="#" class="switch" id="switch-to-sign-up">Đăng ký</a></p>
                </form>
        </div>

        <div class="form-box sign-up-form" id="sign-up-form">
            <i class="fa-solid fa-xmark close" id="close-sign-up"></i>
            <h2>ĐĂNG KÝ</h2>
            <form action="Register.php" method="post">
                <div class="input-box">
                    <p>Email</p>
                    <input type="email" name="email" required>
                </div>
                <div class="input-box">
                    <p>Tên tài khoản</p> 
                    <input type="text" name="username" required>
                </div>
                <div class="input-box">
                    <p>Mật khẩu</p>
                    <input type="password" name="password" required>
                </div>
                <div class="input-box">
                    <p>Xác nhận mật khẩu</p>
                    <input type="password" name="confirmpassword" required>
                </div>
            
            <label for=""><input type="checkbox"> Tôi đồng ý với các <a href="#">Điều khoản & Chính sách</a></label>
            <button type="submit" name="submit">Đăng ký</button>
            <p class="not-have-account">Đã có tài khoản? <a href="#" class="switch" id="switch-to-login">Đăng nhập</a></p>
            </form>
        </div>

        <a href="#" class="scroll-up">
            <i class="fa-sharp fa-solid fa-angle-up"></i>
        </a>

    <script src="Script.js"></script>
    <script src="./UploadT.js"></script>
</body>
</html>