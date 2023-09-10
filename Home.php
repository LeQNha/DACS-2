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
    <?php include ("Header.php"); ?>
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
    <div class="show-details-container">
            <ul class="behavior-list">
                <li class=" close-show-details"><i class="fa-solid fa-xmark"></i></li>
                <li>
                    <i class="fa-solid fa-thumbs-up"></i>
                    <span>Yêu thích</span>
                </li>
                <li style="padding: 0px 20px;">
                    <i class="fa-regular fa-heart"></i>
                    <span>Lưu</span>
                </li>
            </ul>
        <div class="show-details">
            <div class="image-details">
                <div class="uploader">
                    <img class="detail-avatar" src="webimg/defaultAvatar.png" alt="">
                    <div>
                        <span class="detail-uploader">uploader</span>
                        <span>Follow</span>
                    </div>
                </div>
                <img class="detail-img" src="" alt="">
                <h1 class="detail-title"></h1>
            </div>
        </div>
    </div>
        <a href="#" class="scroll-up">
            <i class="fa-sharp fa-solid fa-angle-up"></i>
        </a>

        <script src="Script.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>
</html>