<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chỉnh sửa thông tin</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/EditProfile.css">
</head>
<body>
    <?php include "Header.php"; ?>
    
    <div class="container">
        <div class="edit-navigation">
            <p>Chỉnh sửa hồ sơ</p>
            <p>Chỉnh sủa tài khoản</p>
        </div>
        <div class="edit">
            <div class="edit-profile" id="edit-profile">
                <h2>Thông tin cơ bản</h2>
                <form action="#" method="post" id="edit-profile-form">
                    <div class="edit-avatar">
                        <img src="./webimg/userDefaultAvatar.png" alt="">
                        <p><i class="fa-solid fa-camera"></i> Thay đổi</p>
                    </div>
                    
                    <div>
                        <label for="username" class="firstname">Tên tài khoản</label>
                        <input type="text" name="username" class="username" id="username" value="<?php echo $_SESSION['Login']['username'] ?>">
                    </div>
                    <div style="display: flex;">
                        <div>
                            <label for="firstname">Tên</label>
                            <input type="text" name="firstname" class="firstname" id="firstname">
                        </div>
                        <div style="margin-left: 20px;">
                            <label for="lastname">Họ</label>
                            <input type="text" name="lastname" class="lastname" id="lastname">
                        </div>
                    </div>
                    <div>
                        <label for="ocupation">Nghề nghiệp</label>
                        <input type="text" name="ocupation" class="ocupation" id="ocupation">
                    </div>
                    <div>
                        <label for="location">Vị trí</label>
                        <input type="text" name="location", class="location" id="location">
                    </div>
                    <div>
                        <label for="introduction">Giới thiệu</label>
                        <textarea name="introduction" class="introduction" id="introduction" cols="75" rows="10"></textarea>
                    </div>
                </form>    
            </div>
            <div class="edit-account" id="edit-account"></div>
        </div>
    </div>
</body>
</html>