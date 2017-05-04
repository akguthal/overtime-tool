<?php
    session_start();
    require_once("dblogin.php");
    $db_connection = new mysqli($host, $user, $pass, $database);
    if ($db_connection->connect_error) {
        die($db_connection->connect_error);
    }
    if(isset($_SESSION["studentProfile"])) {
        $table = "studentAthlete";
    } else if(isset($_SESSION["recruiterProfile"])) {
        $table = "recruiter";
    }
    if(isset($_SESSION["newStudent"])) {
        $_SESSION["newStudent"] = null;
        $_SESSION["studentProfile"] = null;
        $name = $_SESSION["name"];
        $email = $_SESSION["email"];
        $year = $_SESSION["year"];
        $major = $_SESSION["major"];
        $sport = $_SESSION["sport"];
        $school = $_SESSION["school"];
        $password = $_SESSION["psw"];
        if($year == "freshman") {
            $year = 1;
        } elseif($year == "sophomore") {
            $year = 2;
        } elseif($year == "junior") {
            $year = 3;
        } else $year = 4;
        $sqlQuery = sprintf("insert into $table (name, email, school, yearsInSchool, major, sport, password) values ('%s', '%s', '%s', '%s', '%s', '%s', '%s')", 
				$name, $email, $school, $year, $major, $sport, $password);
        
        $result = $db_connection->query($sqlQuery);
		
        if ($result) {
            header("Location: home.html");
        } else {
            echo(mysqli_error($db_connection));
        }
    } else if(isset($_SESSION["newRecruiter"])) {
        $_SESSION["newRecruiter"] = null;
        $_SESSION["recruiterProfile"] = null;
        $name = $_SESSION["name"];
        $email = $_SESSION["email"];
        $employer = $_SESSION["employer"];
        $school = $_SESSION["school"];
        $sport = $_SESSION["sport"];
        $field = $_SESSION["field"];
        $password = $_SESSION["psw"];
        $sqlQuery = sprintf("insert into $table (name, email, profession, employer, school, sport, password) values ('%s', '%s', '%s', '%s', '%s', '%s', '%s')", 
				$name, $email, $field, $employer, $school, $sport, $password);
        
        $result = $db_connection->query($sqlQuery);
		
        if ($result) {
            header("Location: home.html");
        } else {
            echo(mysqli_error($db_connection));
        }
    }
    
    
?>