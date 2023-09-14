<?php
    session_start();
    include "dbc.php";

    $username = $_SESSION['Login']['username'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $ocupation = $_POST['ocupation'];
    $location = $_POST['location'];
    $introduction = $_POST['introduction'];
    $avatar = "";

    $query = "SELECT * FROM user WHERE username = '$username'";
        $result = mysqli_query($conn, $query);

        if ($result && $result->num_rows > 0) {
            $row = $result->fetch_assoc();
        
            // Truy cập vào dữ liệu
                $avatar = $row['avatar'];
        }

    if($_FILES['avatar-file']['error'] === 4){
        
    }else{
        $imgName = $_FILES['avatar-file']['name'];
        $imgSize = $_FILES['avatar-file']['size'];
        $tmpName = $_FILES['avatar-file']['tmp_name'];

        $validImageExtension = ['jpg','jpeg','png'];
        $imageExtension = explode('.', $imgName);
        $imageExtension = strtolower(end($imageExtension));
        if(!in_array($imageExtension, $validImageExtension)){
                    
            echo "Ảnh không hợp lệ";
        }elseif($imgSize > 10000000){
            
            echo "Kích thước ảnh quá lớn!";
        }else{
            $newImageName = uniqid();
            $newImageName .='.'.$imageExtension;
            $newDestination = "profileimg/".$newImageName;
                    
            move_uploaded_file($tmpName, $newDestination);
            
            if($avatar != $newImageName){
                $avatar = $newImageName;
            }
            
        }
    }

    $query = "UPDATE user
              SET firstname = '$firstname', lastname = '$lastname', ocupation = '$ocupation', location = '$location', introduction ='$introduction', avatar = '$avatar' 
              WHERE username = '$username';";
              
    $result = mysqli_query($conn, $query);

    echo "success";
    // echo $introduction;

?>
