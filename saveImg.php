
<?php
require_once("dblogin.php");
    session_start();

    print_r($_SESSION);

    $db_connection = new mysqli($host, $user, $pass, $database);
    if ($db_connection->connect_error) {
        die($db_connection->connect_error);
    }

    $imagetmp = addslashes(file_get_contents($_FILES['file']['tmp_name']));

    $query = "insert into profileImage values('{$_SESSION['email']}','{$imagetmp}')";
    $result = $db_connection->query($query);


    if ($result) {
        echo("here");
    } else {
        echo(mysqli_error($db_connection));
    }

?>




