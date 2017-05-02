<?php
    require_once("dblogin.php");
    
    $db_connection = new mysqli($host, $user, $pass, $database);
    if ($db_connection->connect_error) {
        die($db_connection->connect_error);
    } 

    $query = "select * from recruiter";

    $result = $db_connection->query($query);
    if (!$result) {
        die("Retrieval failed: ". $db_connection->error);
    }
    $num_rows = $result->num_rows;
    for ($row_index = 0; $row_index < $num_rows; $row_index++) {
        $result->data_seek($row_index);
        $entry = $result->fetch_array(MYSQLI_ASSOC);
        print_r($entry);   
    }
?>