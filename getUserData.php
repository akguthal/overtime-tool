<?php
    require_once("dblogin.php");
    $db_connection = new mysqli($host, $user, $pass, $database);
    if ($db_connection->connect_error) {
        die($db_connection->connect_error);
    }
    $email = $_GET['email'];
    //echo($email);
    $sqlQuery = sprintf("select * from recruiter where email = '%s'", $email);
    $result = $db_connection->query($sqlQuery);
    if ($result) {
        $numberOfRows = mysqli_num_rows($result);
        if ($numberOfRows == 0) {
            echo("");
        } else {
            $recordArray = mysqli_fetch_array($result, MYSQLI_ASSOC);
            $records = implode($recordArray, ",");
            echo($records);
        }
    } else {
        die($db_connection->mysqli_error($db_connection));
    }
?>