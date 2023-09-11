
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UserPage</title>
    <link rel="stylesheet" href="css/UserPage.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <?php include "Header.php" ?>

    <div class="banner">
        <div class="user-avatar">
            <img src="webimg/userDefaultAvatar.png" alt="">
            <i class="fa-solid fa-camera"></i>
        </div>
    </div>
    <div class="short-introduction">
        <h1 class="username"><?php echo $_SESSION['Login']['username'] ?></h1>
        <p class="user-job" style="color: grey;">st</p>
        <p class="number-follower">100 người theo dõi</p>
        <a href="EditProfile.php">Chỉnh sửa hồ sơ cá nhân</a>
    </div>
</body>
</html>