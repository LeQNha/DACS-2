<?php
    require "dbc.php";
    if(isset($_POST["submit"])){
        $title = $_POST["title"];
        $description = $_POST["description"];
        // if(isset($_FILES["myImage"])){

        // }
        if($_FILES["myImage"]["error"] === 4){
            echo "<script> alert('File does not exist'); </script>";
        }else{
            $fileName = $_FILES["myImage"]["name"];
            $fileSize = $_FILES["myImage"]["size"];
            $tmpName = $_FILES["myImage"]["tmp_name"];

            $validImageExtension = ['jpg','jpeg','png'];
            $imageExtension = explode('.', $fileName);
            $imageExtension = strtolower(end($imageExtension));
            if(!in_array($imageExtension, $validImageExtension)){
                echo "<script> alert('Invalid Image Extension!'); </script>";
            }elseif($fileSize > 10000000){
                echo "<script> alert('Image sizze is too large!'); </script>";
            }else{
                $newImageName = uniqid();
                $newImageName .='.'.$imageExtension;
                $newDestination = "img/".$newImageName;
                
                move_uploaded_file($tmpName, $newDestination);
                $query = "INSERT INTO imgupload VALUES('','$title','$newImageName')";
                mysqli_query($conn, $query);
                echo "SUCCESS!";
                echo "<script> alert('SUCCESS!'); </script>";
            }
        }
    }else{
        echo "<script> alert('Ko submit???'); </script>";
    }
?>