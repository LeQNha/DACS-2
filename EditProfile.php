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
    
    <div class="alert-message">Thay đổi thành công!</div>

    <ul class="actions">
        <li class="save" id="save">
            <i class="fa-solid fa-floppy-disk save-icon"></i>
            <span> Lưu</span>
        </li>
        <!-- <li class="set-back" id="set-back>
            <i class="fa-solid fa-arrow-rotate-left set-back-icon"></i>
            <span> Thiết lập lại</span>
        </li> -->
    </ul>
    <div class="container">
        <div class="edit-navigation">
            <a href="#edit-profile">Chỉnh sửa hồ sơ</a>
            <!-- <p>Chỉnh sủa tài khoản</p> -->
        </div>
        <div class="edit">
            <div class="edit-profile" id="edit-profile">
                <h2>Thông tin cơ bản</h2>
                <form action="#" id="edit-profile-form">
                    <div class="edit-avatar">
                        <div class="user-avatar-img-container">
                            <img src="profileimg/<?php echo $avatar; ?>" alt="" class="user-avatar" id="user-avatar">
                        </div>
                        <p class="change-avatar-btn" id="change-avatar-btn"><i class="fa-solid fa-camera"></i> Thay đổi</p>
                        <input type="file" name="avatar-file" class="avatar-file" id="avatar-file">
                    </div>
                    
                    <!-- <div>
                        <label for="username" class="firstname">Tên tài khoản</label>
                        <input type="text" name="username" class="username" id="username" value="<?php echo $_SESSION['Login']['username'] ?>" hidden>
                    </div> -->
                    <div style="display: flex;">
                        <div>
                            <label for="firstname">Tên</label>
                            <input type="text" name="firstname" class="firstname" id="firstname" value="<?php echo $firstname; ?>">
                        </div>
                        <div style="margin-left: 20px;">
                            <label for="lastname">Họ</label>
                            <input type="text" name="lastname" class="lastname" id="lastname" value="<?php echo $lastname; ?>">
                        </div>
                    </div>
                    <div>
                        <label for="ocupation">Nghề nghiệp</label>
                        <input type="text" name="ocupation" class="ocupation" id="ocupation" value="<?php echo $ocupation; ?>">
                    </div>
                    <div>
                        <label for="location">Vị trí</label>
                        <input type="text" name="location", class="location" id="location" value="<?php echo $location; ?>">
                    </div>
                    <div>
                        <label for="introduction">Giới thiệu</label>
                        <textarea name="introduction" class="introduction" id="introduction" cols="55" rows="10"> <?php echo $introduction; ?> </textarea>
                    </div>
                </form>    
            </div>
            <div class="edit-account" id="edit-account"></div>
        </div>
    </div>

    <script src="EditProfile.js"></script>
    <a href="#" class="scroll-up">
        <i class="fa-sharp fa-solid fa-angle-up"></i>
    </a>
</body>
</html>