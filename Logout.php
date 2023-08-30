<?php
    session_start();
    unset($_SESSION['Login']);
    header("location: Home.php");
?>