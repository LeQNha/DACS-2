<?php
    include ('dbc.php');
    $pid = "s";

    if(isset($_POST['pid'])){
        $pid = $_POST['pid'];
        
        $title="";
        $imagePath="";

        $query = "SELECT * FROM imgupload WHERE decription = '$pid'";
        $rs = mysqli_query($conn, $query);
        if(mysqli_num_rows($rs) > 0){
            foreach($rs as $row){
                $title = $row['title'];
                $imagePath = $row['decription'];
            }
        }
        $message = array("title"=>$title, "path"=>$imagePath);
        echo json_encode($message);
    };

?>
