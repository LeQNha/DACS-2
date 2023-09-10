<?php
    include ('dbc.php');
    $pid = "s";

    if(isset($_POST['pid'])){
        $pid = $_POST['pid'];
        
        $title="";
        $imagePath="";
        $description ="";
        $dateuploaded = "";


        $query = "SELECT * FROM imgupload WHERE path = '$pid'";
        $rs = mysqli_query($conn, $query);
        if(mysqli_num_rows($rs) > 0){
            foreach($rs as $row){
                $title = $row['title'];
                $imagePath = $row['path'];
                $description = $row['description'];
                $dateuploaded = $row['dateuploaded'];
                $datemonthyear = explode('-', $dateuploaded);
                $dateuploaded = $datemonthyear[2]." thg ".$datemonthyear[1].", ".$datemonthyear[0];
            }
        }
        $message = array(
                            "title"=>$title, 
                            "path"=>$imagePath, 
                            "description"=>$description,
                            "dateuploaded"=>$dateuploaded
                        );
        echo json_encode($message);
    };

?>
