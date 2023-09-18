<?php
    include ('dbc.php');
    $pid = "s";

    if(isset($_POST['pid'])){
        $pid = $_POST['pid'];
        
        $title="";
        $imagePath="";
        $description ="";
        $dateuploaded = "";
        $uploader = "";
        $uploaderAvatar = "";


        // $query = "SELECT * FROM imgupload WHERE path = '$pid'";
        $query = "SELECT *
                  FROM imgupload INNER JOIN users
                  ON imgupload.username = users.username 
                  WHERE path = '$pid'";

        $rs = mysqli_query($conn, $query);
        if(mysqli_num_rows($rs) > 0){
            $row = $rs->fetch_assoc();
            
                $title = $row['title'];
                $imagePath = $row['path'];
                $description = $row['description'];
                $dateuploaded = $row['dateuploaded'];
                $datemonthyear = explode('-', $dateuploaded);
                $dateuploaded = $datemonthyear[2]." thg ".$datemonthyear[1].", ".$datemonthyear[0];
                $uploader = $row['username'];
                $uploaderAvatar = $row['avatar'];
        
        }
        $message = array(
                            "title"=>$title, 
                            "path"=>$imagePath, 
                            "description"=>$description,
                            "dateuploaded"=>$dateuploaded,
                            "uploader"=>$uploader,
                            "uploaderAvatar"=>$uploaderAvatar
                        );
        echo json_encode($message);
    };

?>
