<?php
    require_once("dblogin.php");
    
    $db_connection = new mysqli($host, $user, $pass, $database);
    if ($db_connection->connect_error) {
        die($db_connection->connect_error);
    } 
    $email = 'a@gmail.com';
    $getCurrent = "select * from recruiter where email='$email'";
    $getAll = "select * from studentAthlete where email not in (select studentEmail from studentRecruiterConnection where recruiterEmail='$email')"; 
    
    //  $getCurrent = "select * from studentAthlete where email='$email'";
    //  $getAll = "select * from recruiter where email not in (select recruiterEmail from studentRecruiterConnection where studentEmail='$email')"; 
    //  $getAll2 = "select * from recruiter where email not in (select recruiterEmail1 from recruiterRecruiterConnection where recruiterEmail2='$email' 
                                                            //union select recruiterEmail2 from recruiterRecruiterConnection where recruiterEmail1='$email')"; 
    //  array_merge($getAll, $getAll2);

    $resultCurrent = $db_connection->query($getCurrent);
    if (!$resultCurrent) {
        die("Retrieval failed: ". $db_connection->error);
    }
    $resultAll = $db_connection->query($getAll);
    if (!$resultAll) {
        die("Retrieval failed: ". $db_connection->error);
    }
    $current = $resultCurrent->fetch_assoc(); //recruiter
    $num_rows = $resultAll->num_rows;
    $values = array();
    $majorsFields = array("PR"=>["Business", "Communication"], "Marketing"=>["Business", "Communication"], "Finance"=>["Business"], "Sales"=>["Business", "Communication"],
                    "Teacher"=>["Education", "Math", "History"], "Software Engineer"=>["Computer Scince"], "Engineer"=>["Engineering"], "PR"=>["Business", "Communication"],
                    "Athletic Trainer"=>["Sport Science"], "Personal Trainer"=>["Sport Science"], "Guidance Counselor"=>["Sociology"], "Police"=>["Criminal Justice"]);
    $east = ["Maryland", "Penn State", "Rutgers", "Michigan", "Michigan State", "Ohio State", "Indiana"];
    $west = ["Iowa", "Wisonsin", "Nebraska", "Minnesota", "Northeastern". "Purdue", "Illinois"];
    
    
    for ($row_index = 0; $row_index < $num_rows; $row_index++) {
        $resultAll->data_seek($row_index);
        $entry = $resultAll->fetch_array(MYSQLI_ASSOC);
        $total = 0;
        
        if (in_array($entry["major"], $majorsFields[$current["profession"]]))
            $total = 30;
        if ($entry["school"] === $current["school"])
            $total += 20;
        else { 
            print $entry["school"];
            print $current["school"];
            print in_array($entry["school"], $west);
            print "<br>";
            if ((in_array($entry["school"], $east) && in_array($current["school"], $east)) || (in_array($entry["school"], $west) && in_array($current["school"], $west))) 
                $total += 8;
        }
        if ($entry["sport"] === $current["sport"])
            $total += 10;
        
        $values[$entry["email"]] = $total;
    }

    print_r($values);
?>