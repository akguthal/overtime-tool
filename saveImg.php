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
        $insert_image = "insert into image values('test1','{$imagename}')";
        $result = $db_connection->query($insert_image);


        if ($result1) {
            echo("jere");

        } else {
            echo(mysqli_error($db_connection));
        }




?>