<?php
    session_start();
    include ('dbc.php');
    if(isset($_SESSION['Login']['username'])){
        $username = $_SESSION['Login']['username'];
    }

    $query = "SELECT * FROM users WHERE username = '$username'";
        $result = mysqli_query($conn, $query);

        if ($result && $result->num_rows > 0) {
            $row = $result->fetch_assoc();
        
            echo "<script> console.log('lai header'); </script>";
            // Truy cập vào dữ liệu
            $email = $row['email'];
            $username = $row['username'];
            $password = $row['password'];
            $firstname = $row['firstname'];
            $lastname = $row['lastname'];
            $ocupation = $row['ocupation'];
            $location = $row['location'];
            $introduction = $row['introduction'];
            $avatar = $row['avatar'];
        }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/Header.css">
    <title>Header</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body>
<header class="header">
        <div class="top-bar">
            <ul class="nav-bar">
                <a href="Home.php"><li><h2>See</h2></li></a>
                <li>About</li>
                <li>Rank</li>
                <li>Challenge</li>
                <li>Event</li>
            </ul>
            <ul class="account">
                    
                    <li><i class="fa-solid fa-bell"></i></li>
                    <li style="font-size: 22px; cursor: pointer;" onclick="ShowSubmenu()"> <?php echo $_SESSION['Login']['username']; ?> </li>
                    <li class="user-avatar-container"><img src="/profileimg/<?php echo $avatar; ?>" alt="aa" class="avatar" onclick="ShowSubmenu()"></li>
                    <li><i class="fa-solid fa-angle-down"></i><li></li>
                
            </ul>
            <div class="sub-menu" id="submenu">
                <div class="profile">
                    <div class="user-avatar-container">
                        <img src="profileimg/<?php echo $avatar; ?>" alt="avatar">
                    </div>
                    
                        <h2><?php echo $username; ?></h2> 
                        <h3><?php echo $email; ?></h3>
                
                </div>
                <ul>
                    <a href="EditProfile.php"><li>Cài đặt</li></a>
                    <a href="PersonalPage.php"><li>Trang cá nhân</li></a>
                    <hr>
                    <a href="Logout.php"><li>Đăng xuất</li></a>
                </ul>
            </div>   
        </div>
        <div class="second-bar">
            <form action="" class="search-form">
                <input type="search" name="" placeholder="Tìm kiếm" autocomplete="off" id="search-box" style="outline: none;">
                <label for="search-box" class="fas-fa-search"><i class="fa-solid fa-magnifying-glass"></i></label>         
            </form>
            <a href="UploadT.php">Tạo ảnh</a>
            <a href="#">Bộ sưu tập</a>
        </div>
    </header>
    <script src="Script.js"></script>

</body>
</html>
