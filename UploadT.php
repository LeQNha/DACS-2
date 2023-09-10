
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
        <form action="#" method="post" id="upload-form" enctype="multipart/form-data">
            <div class="image-container">
            <div id="trash-can"><i class="fa-solid fa-trash-can"></i></div>
                <div class="image-show">
                    <img id="selected-image" src="" alt="">
                    <p>Nhấp vào để tải lên</p>
                    <i class="fa-solid fa-cloud-arrow-up"></i>
                </div>
            </div>
            <div class="image-infor">
                <input type="file" name="myImage" class="myImage">
                <div class="upload-date"> <?php echo date('d/m/Y') ?> </div>
                <input type="text" name="title" id="title" placeholder="Tiêu đề">
                <div class="title-bottom-border bottom-border" id="title-bottom-border"></div>
                <!-- <input type="" name="description" id="description" placeholder="Description"> -->
                <textarea name="description" id="description" placeholder="Mô tả" oninput="autoResize()"></textarea>
                <div class="description-bottom-border bottom-border" id="description-bottom-border"></div>
                <input type="submit" name="submit" value="Đăng tải" id="submit">
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