<?php
    require_once("dblogin.php");

    session_start();

    $db_connection = new mysqli($host, $user, $pass, $database);
        if ($db_connection->connect_error) {
            die($db_connection->connect_error);
    }

    $currentEmail = $_SESSION['email'];
    $connectionEmail = "ajones@gmail.com";//$_SESSION['email'];
    $isStudent = true;//$_SESSION['isStudent'];
    
    if ($isStudent) {
        $query = "insert into studentRecruiterConnection(studentEmail, recruiterEmail) values('{$currentEmail}', '{$connectionEmail}')";
    } else {
        $query = "select * from studentAthlete where email='{$connectionEmail}'";
        $result = $db_connection->query($query);

        if (!$result) {
            $query = "insert into recruiterRecruiterConnection(recruiterEmail1, recruiterEmail2) values('{$currentEmail}', '{$connectionEmail}')";    
        } else {
            $query = "insert into studentRecruiterConnection(studentEmail, recruiterEmail) values('{$connectionEmail}', '{$currentEmail}')";
        }
    }

    if (!$db_connection->query($query))
        die("Retrieval failed: ". $db_connection->error);

    header("Location: loadHome.php");
?>