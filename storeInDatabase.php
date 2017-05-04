<?php
    echo("top");
    session_start();
    print_r($_SESSION);
    require_once("dblogin.php");
    $db_connection = new mysqli($host, $user, $pass, $database);
    if ($db_connection->connect_error) {
        die($db_connection->connect_error);
    }
    if(isset($_SESSION["studentProfile"])) {
        $table = "studentAthlete";
    } else $table = "recruiter";
    $_SESSION["studentProfile"] = null;
    print_r($_SESSION);
    if(isset($_SESSION["newProfile"])) {
        echo("here1");
        $_SESSION["newProfile"] = null;
        $name = $_SESSION["name"];
        $email = $_SESSION["email"];
        $year = $_SESSION["year"];
        $major = $_SESSION["major"];
        $sport = $_SESSION["sport"];
        $interests = $_SESSION["interests"];
        $password = $_SESSION["psw"];
        if($year == "freshman") {
            $year = 1;
        } elseif($year == "sophomore") {
            $year = 2;
        } elseif($year == "junior") {
            $year = 3;
        } else $year = 4;
        $sqlQuery = sprintf("insert into $table (name, email, yearsInSchool, major, sport, password) values ('%s', '%s', '%s', '%s', '%s', '%s')", 
				$name, $email, $year, $major, $sport, $password);
        
        $result = $db_connection->query($sqlQuery);
		
        if ($result) {
            echo("jere");
            header("Location: loadHome.php");
        } else {
            echo(mysqli_error($db_connection));
        }
    }
    
    
    
?>