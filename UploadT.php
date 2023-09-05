
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
    <?php include 'Header.php'; ?>
    
    <div class="container">
        <form action="UploadImageT.php" method="post" enctype="multipart/form-data">
            <div class="image-container">
                <div class="image-show">
                    <p>Nhấp vào để tải lên</p>
                </div>
            </div>
            <div class="image-infor">
                <input type="file" name="myImage" class="myImage">
                <input type="submit" name="submit" value="Đăng tải">
                <input type="text" name="title" id="title" placeholder="Tiêu đề">
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

    


        <a href="#" class="scroll-up">
            <i class="fa-sharp fa-solid fa-angle-up"></i>
        </a>

    <script src="Script.js"></script>
    <script src="UploadT.js"></script>
</body>
</html>