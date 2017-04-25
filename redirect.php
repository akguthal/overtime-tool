<?php
    session_start();

    $_SESSION['name'] = $_POST['name'];
    $_SESSION['email'] = $_POST['email'];
    $_SESSION['psw'] = $_POST['password'];

    if(isset($_POST['recruiter'])){
        header("Location: recruiterProfile.php");
    }else if(isset($_POST['student'])) {
        header("Location: studentProfile.php");
    }