<?php
    session_start();
    if(isset($_POST['login'])) {
        require_once("dblogin.php");
        $db_connection = new mysqli($host, $user, $pass, $database);
        if ($db_connection->connect_error) {
            die($db_connection->connect_error);
        }        
        $sqlQuery = sprintf("select password from studentAthlete where email = '%s'", $_POST["username"]);
		$result = $db_connection->query($sqlQuery);
        if ($result) {
            $numberOfRows = mysqli_num_rows($result);
            if ($numberOfRows == 0) {
                $sqlQuery2 = sprintf("select password from recruiter where email = '%s'", $_POST["username"]);
                $result2 = $db_connection->query($sqlQuery2);
                if($result2) {
                    if(mysqli_num_rows($result2) == 0) {
						$_SESSION["wrong"] = "wrong";
                        header("Location: Login.php");
                    } else {
                        $recordArray = mysqli_fetch_array($result2, MYSQLI_ASSOC);
                        $password = $recordArray['password'];
                        if($password != $_POST["password"]) {
							$_SESSION["wrong"] = "wrong";
                            header("Location: Login.php");
                        } else header("Location: home.html");
                    }
                }
            } else {
                $recordArray = mysqli_fetch_array($result, MYSQLI_ASSOC);
                $password = $recordArray['password'];
                if($password != $_POST["password"]) {
					$_SESSION["wrong"] = "wrong";
                    header("Location: Login.php");
                } else {
					header("Location: home.html");
				}
            }
         } else {
            die($db_connection->mysqli_error($db_connection));
         }
        
    } else {
        $_SESSION['name'] = $_POST['name'];
        $_SESSION['email'] = $_POST['email'];
        $_SESSION['psw'] = $_POST['password'];
    
        if(isset($_POST['recruiter'])){
            header("Location: recruiterProfile.php");
        }else if(isset($_POST['student'])) {
            header("Location: studentProfile.php");
        }
    }
?>