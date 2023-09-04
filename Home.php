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


        <a href="#" class="scroll-up">
            <i class="fa-sharp fa-solid fa-angle-up"></i>
        </a>

        <script src="./Script.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>
</html>