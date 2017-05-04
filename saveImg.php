<?php
require_once("dblogin.php");
    echo("top");
    echo($_FILES);
    session_start();

    $db_connection = new mysqli($host, $user, $pass, $database);
    if ($db_connection->connect_error) {
        die($db_connection->connect_error);
    }

        $imagename = $_FILES['file']['name'];
        echo($imagename);
        $imagetmp=addslashes (file_get_contents($_FILES['file']['tmp_name']));
        
        $insert_image = "insert into image values('{$imagename}','{$imagetmp}')";
        $result = $db_connection->query($insert_image);


        if ($result) {
            echo("here");

        } else {
            echo(mysqli_error($db_connection));
        }




?>