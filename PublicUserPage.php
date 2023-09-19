<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PublicUserPage</title>
    <link rel="stylesheet" href="css/PublicUserPage.css">
</head>
<body>
    <?php
        include ("Header.php");
        $uploader = "â";
        $uploaderAvatar = "";
        if(isset($_GET['uploader'])){
            $uploader = $_GET['uploader'];

            $query = "SELECT * FROM users INNER JOIN imgupload ON users.username = imgupload.username WHERE users.username = '$uploader'";
            $result = mysqli_query($conn, $query);

            if ($result && $result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $email = $row['email'];
                $firstname = $row['firstname'];
                $lastname = $row['lastname'];
                $ocupation = $row['ocupation'];
                $location = $row['location'];
                $introduction = $row['introduction'];
                $uploaderAvatar = $row['avatar'];
            }
            
        }else{
            $uploader = "ko co";
        }
        
    ?>
    <div id="contain">
        <div id="aside1">
            <div id="introduction">
                <div class="avatar-container">
                    <img src="./profileimg/<?php echo $uploaderAvatar; ?>" alt="" class="image">
                </div>
                <h2><?php echo $uploader; ?></h2>
                <span><?php echo $firstname." ".$lastname ?></span>
                <br>
                <span><?php echo $email ?></span>
                <br><br>
                <span class="place"><?php echo $location ?></span>
            </div>
            <div id="button">
                <button id="bt1">Follow</button>
                <button id="bt2">Message</button>
            </div>
            <div id="statistics">
                <div class="line">
                    <div class="name">
                        <h3>Project Views</h3>
                    </div>
                    <div class="number">
                        <p>539,381</p>
                    </div>
                    
                </div>
                <div class="line">
                    <div class="name">
                        <h3>Appreciations</h3>
                    </div>
                    <div class="number">
                        <p>32,150</p>
                    </div>
                    
                </div>
                <div class="line">
                    <div class="name">
                        <h3>Followers</h3>
                    </div>
                    <div class="number">
                        <p>11,163</p>
                    </div>
                    
                </div>
                <div class="line">
                    <div class="name">
                        <h3>Following</h3>
                    </div>
                    <div class="number">
                        <p>338</p>
                    </div>
                    
                </div>
            </div>
            <div class="self-introduction">

            </div>
        </div>
        <div id="aside2">
            <div class="container">
                <?php
                    $query = "SELECT * FROM imgupload WHERE username = '$uploader'";
                    $rows = mysqli_query($conn, $query);
                
                    foreach($rows as $row){ ?>
                        <div class="paint" onclick="ShowDetails('<?php echo $row['path']; ?>')">
                            <p class="image-name"><?php echo $row['path'] ?></p>
                            <img src="img/<?php echo $row["path"] ?> " width="350px" alt="">
                            <!-- <h3> <?php echo $row["title"]; ?> </h3> -->
                            
                        </div>
                <?php }
                ?>
            </div>
        </div>
    </div>
    <div class="show-details-container">
            <ul class="behavior-list">
                <li class=" close-show-details"><i class="fa-solid fa-xmark"></i></li>
                <li>
                    <img src="webimg/defaultAvatar.png" alt="">
                    <span>Follow</span>
                </li>
                <li>
                    <i class="fa-regular fa-thumbs-up" id="like-button"></i>
                    <span>Yêu thích</span>
                </li>
                <li>
                    <i class="fa-regular fa-heart" id="save-button"></i>
                    <span>Lưu</span>
                </li>
            </ul>
            <div class="show-details">
                <div class="uploader">
                    <div class="detail-avatar-container">
                        <a href="#" onclick="ShowPublicUserPage()"><img class="detail-avatar" src="webimg/defaultAvatar.png" alt=""></a>
                    </div>
                    <div>
                        <a href="#" onclick="ShowPublicUserPage()"><span class="detail-uploader"></span></a>
                        <span>Follow</span>
                    </div>
                    <p class="detail-date-uploaded">111-111-111</p>
                </div>
                <div class="image-details">
                    <img class="detail-img" src="img/64c215a858da0.png" alt="">
                    <h1 class="detail-title">tes</h1>
                    <p class="detail-description">ádadada</p>
                </div>
            </div>
        </div>
    <script src="PublicUserPage.js"></script>
</body>
</html>
