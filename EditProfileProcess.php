<?php
    session_start();
    include "dbc.php";

    $username = $_SESSION['Login']['username'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $ocupation = $_POST['ocupation'];
    $location = $_POST['location'];
    $introduction = $_POST['introduction'];

    $query = "UPDATE user
              SET firstname = '$firstname', lastname = '$lastname', ocupation = '$ocupation', location = '$location', introduction ='$introduction' 
              WHERE username = '$username';";
              
    $result = mysqli_query($conn, $query);

    echo "success";
    // echo $introduction;

?>
