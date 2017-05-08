<?php
    require_once("dblogin.php");

    session_start();

    $db_connection = new mysqli($host, $user, $pass, $database);
        if ($db_connection->connect_error) {
            die($db_connection->connect_error);
    }

    $currentEmail = $_SESSION['email'];
    $connectionEmail = $_GET['email'];
    $isStudent = $_SESSION['isStudent'];
    
    if ($isStudent) {
        $query = "insert into studentRecruiterConnection(studentEmail, recruiterEmail) values('{$currentEmail}', '{$connectionEmail}')";
    } else {
        $query = "select * from studentAthlete where email='{$connectionEmail}'";

        $result = $db_connection->query($query);

        if ($result->num_rows === 0) {
            $query = "insert into recruiterRecruiterConnection(recruiterEmail1, recruiterEmail2) values('{$currentEmail}', '{$connectionEmail}')";    
        } else {
            $query = "insert into studentRecruiterConnection(studentEmail, recruiterEmail) values('{$connectionEmail}', '{$currentEmail}')";
        }
    }
    

    if (!$db_connection->query($query))
        die("Retrieval failed: ". $db_connection->error);

    $query = "select * from studentImage where email={$connectionEmail}";
    $result = $db_connection->query($query);

    if ($result->num_rows === 0) {
        $query = "select * from recruiterImage where email={$connectionEmail}";    
        $result = $db_connection->query($query);
        $new = $result->fetch_assoc();
    } else {
        $new = $result->fetch_assoc();
    }

    $_SESSION['email'] = $new['email'];
    $_SESSION['name'] = $new['name'];

    header("Location: loadHome.php");
?>