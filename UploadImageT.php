<?php
    session_start();
    require "dbc.php";
    // if(isset($_POST["submit"])){
        $title = $_POST["title"];
        $description = $_POST["description"];
        $uploader = $_SESSION['Login']['username'];
        // if(isset($_FILES["myImage"])){

        // }
        if(empty($title)){
            echo "invalid title";
        }else{
            if($_FILES["myImage"]["error"] === 4){
                // echo "<script> alert('File does not exist'); </script>";
                echo "Ảnh chưa tải lên!";
            }else{
                $fileName = $_FILES["myImage"]["name"];
                $fileSize = $_FILES["myImage"]["size"];
                $tmpName = $_FILES["myImage"]["tmp_name"];

                $validImageExtension = ['jpg','jpeg','png'];
                $imageExtension = explode('.', $fileName);
                $imageExtension = strtolower(end($imageExtension));
                if(!in_array($imageExtension, $validImageExtension)){
                    
                    echo "Ảnh không hợp lệ";
                }elseif($fileSize > 10000000){
                    
                    echo "Kích thước ảnh quá lớn!";
                }else{
                    $newImageName = uniqid();
                    $newImageName .='.'.$imageExtension;
                    $newDestination = "img/".$newImageName;
                    
                    move_uploaded_file($tmpName, $newDestination);
                    $query = "INSERT INTO imgupload(title, path, description, username) VALUES('$title','$newImageName','$description','$uploader')";
                    mysqli_query($conn, $query);
                    echo "success";
                    
                }
            }
        }
    // }else{
    //     echo "<script> alert('Ko submit???'); </script>";
    // }
?>