<?php
    session_start();
    include ('dbc.php');
    if(isset($_SESSION['Login']['username'])){
        $username = $_SESSION['Login']['username'];
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="css/Home.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class="cover-div" id="cover-div"></div>
    <header>
        <div class="top-bar">
            <ul class="nav-bar">
                <li><h2 style="cursor: pointer;">See</h2></li>
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
                    <li><img src="/webimg/defaultAvatar.png" alt="aa" class="avatar" onclick="ShowSubmenu()"></li>
                <?php 
                    }else{ 
                ?>
                    <li><i class="fa-solid fa-bell"></i></li>
                    <li><a href="#" class="dang-nhap" id="dang-nhap">ĐĂNG NHẬP</a></li>
                    <li><a href="#" class="dang-ky" id = "dang-ky">ĐĂNG KÝ</a></li>       
               <?php }
                ?>
            </ul>
            <div class="sub-menu" id="submenu">
                <div class="profile">
                    <img src="webimg/defaultAvatar.png" alt="avatar">
                    <?php
                        echo "<h2>".$username."</h2>"; 
                        $sql = "SELECT * FROM user WHERE username = '$username'";
                        $rs = mysqli_query($conn, $sql);
                        foreach($rs as $r){
                            echo "<h3>".$r['email']."</h3>";
                        }
                    ?>
                </div>
                <ul>
                    <li><a href="#">Cài đặt</a></li>
                    <li><a href="#">Trang cá nhân</a></li>
                    <hr>
                    <li><a href="Logout.php">Đăng xuất</a></li>
                </ul>
            </div>   
        </div>
        <div class="second-bar">
            <form action="" class="search-form">
                <input type="search" name="" placeholder="Tìm kiếm" autocomplete="off" id="search-box">
                <label for="search-box" class="fas-fa-search"><i class="fa-solid fa-magnifying-glass"></i></label>         
            </form>
            <a href="UploadT.php">Tạo ảnh</a>
            <a href="#">Bộ sưu tập</a>
        </div>
    </header>

    <div class="container">
        <?php
            $query = "SELECT * FROM imgupload";
            $rows = mysqli_query($conn, $query);
            
            foreach($rows as $row){ ?>
                    <div class="paint" onclick="ShowDetails('<?php echo $row['decription']; ?>')">
                        <p class="image-name"><?php echo $row['decription'] ?></p>
                        <img src="img/<?php echo $row["decription"] ?> " width="350px" alt="">
                        <!-- <h3> <?php echo $row["title"]; ?> </h3> -->
                        
                    </div>
            <?php }
            ?>
    </div>
    <div class="show-details">
        <i class="fa-solid fa-xmark close-show-details"></i>
        <h1 class="detail-title"></h1>
        <img class="detail-img" src="" alt="">
    </div>


    <div class="form-box login-form" id="login-form">
            <i class="fa-solid fa-xmark close" id="close-login"></i>
            <h2>ĐĂNG NHẬP</h2>
            <form action="Login.php" method="post" id="loginForm">
                <div class="input-box">
                    <i class="fa-solid fa-user"></i>
                    <input type="text" name="username" id="username" placeholder="Tài khoản" required>                
                </div>
                <div class="input-box">
                    <i class="fa-solid fa-lock"></i>
                    <input type="password" name="password" id="password" placeholder="Mật khẩu" required>
                </div>
            
                <!-- <p class="remember-me"><input type="checkbox">Ghi nhớ đăng nhập</p> -->
                <a href="#" class="forgot-password"><p>Quên mật khẩu?</p></a>
                <!-- <a href="HomePage.html"><button type="submit" name="submit" onclick="submitData()">Đăng nhập</button></a> -->
                <button type="submit" name="submit" onclick="submitLoginData()">Đăng nhập</button>
                
                <p class="not-have-account">Chưa có tài khoản? <a href="#" class="switch" id="switch-to-sign-up">Đăng ký</a></p>
            </form>
        </div>

        <div class="form-box sign-up-form" id="sign-up-form">
            <i class="fa-solid fa-xmark close" id="close-sign-up"></i>
            <h2>ĐĂNG KÝ</h2>
            <form action="Register.php" method="post" id="registerForm">
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
                <button type="submit" name="submit" onclick="submitRegisterData()">Đăng ký</button>
                <p class="not-have-account">Đã có tài khoản? <a href="#" class="switch" id="switch-to-login">Đăng nhập</a></p>
            </form>
        </div>

        <a href="#" class="scroll-up">
            <i class="fa-sharp fa-solid fa-angle-up"></i>
        </a>

        <script src="./Script.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>
</html>