<?php
    require_once("dblogin.php");

    session_start();

    $db_connection = new mysqli($host, $user, $pass, $database);
        if ($db_connection->connect_error) {
            die($db_connection->connect_error);
    }

    $loginEmail = $_SESSION['email'];
    $isStudent = $_SESSION['isStudent'];

    if ($isStudent) {
        $query = "select * from studentImage where email='$loginEmail'";
        $result = $db_connection->query($query);
        $current = $result->fetch_assoc();
        $queryConnections = "select * from recruiterImage where email in (select recruiterEmail from studentRecruiterConnection where studentEmail='$loginEmail')";

    } else {
        $query = "select * from recruiterImage where email='$loginEmail'";
        $result = $db_connection->query($query);
        $current = $result->fetch_assoc();
        $queryConnections = "select * from studentImage where email in (select studentEmail from studentRecruiterConnection where recruiterEmail='$loginEmail')";
    }

    $currentSrc = "data:image/jpeg;base64,".base64_encode($current['image']);

    $currentInfo = <<<INFO
      <a class="navbar-brand" href="#">
        <img src='{$currentSrc}'/>
      </a>
      <p>{$current['name']}</p>
INFO;

    //CONNECTIONS

    $resultConnections = $db_connection->query($queryConnections);
    $num_rows = $resultConnections->num_rows;
    $contacts = "";

    for ($row_index = 0; $row_index < $num_rows; $row_index++) {
        $resultConnections->data_seek($row_index);
        $entry = $resultConnections->fetch_array(MYSQLI_ASSOC);

        if ($entry['image'] === null)
            $src = "img/profile.png";
        else
            $src = "data:image/jpeg;base64,".base64_encode($entry['image']);

        if ($isStudent) {  //////////////////change image
            $contacts .= <<<CONTACT
                <div class="row leftRow" onclick="clickConnection(this, 'left')" data-toggle="modal" data-target="#contactLeft">
                  <div class="col-sm-2">
                    <img class="leftProfile" src="{$src}" /> {$current['name']}
                  </div>
                  <div class="col-sm-9" onclick="clickConnection(this)">
                    <h3>{$entry['name']}</h3>
                    <p>{$entry['employer']}</p>
                    <p hidden class="email">{$entry['email']}</p>
                  </div>
                </div>
CONTACT;
        } else {
            $contacts .= <<<CONTACT
                <div class="row leftRow" onclick="clickConnection(this, 'left')">
                  <div class="col-sm-2">
                    <img class="leftProfile" src="{$src}" />
                  </div>
                  <div class="col-sm-9" onclick="clickConnection(this)">
                    <h3>{$entry['name']}</h3>
                    <p>{$entry['school']}</p>
                    <p hidden class="email">{$entry['email']}</p>
                  </div>
                </div>
CONTACT;
        }
    }
    //SEARCH

    if ($isStudent) {
        $getAll = "select * from recruiterImage where email not in (select recruiterEmail from studentRecruiterConnection where studentEmail='$loginEmail')";
        $resultStudents = $db_connection->query($getAll);

        if (!$resultStudents) {
            die("Retrieval failed: ". $db_connection->error);
        }
        
        $num_rows = $resultStudents->num_rows;
        $num_rows_recruiter = 0;
    } else {
        $getStudents = "select * from studentImage where email not in (select studentEmail from studentRecruiterConnection where recruiterEmail='$loginEmail')";
        $getRecruiters = "select * from recruiterImage where email not in (select recruiterEmail1 from recruiterRecruiterConnection where recruiterEmail2='$loginEmail'
                                                            union select recruiterEmail2 from recruiterRecruiterConnection where recruiterEmail1='$loginEmail')";
        $resultStudents = $db_connection->query($getStudents);
        $resultRecruiters = $db_connection->query($getRecruiters);

        if (!$resultStudents || !$resultRecruiters) {
            die("Retrieval failed: ". $db_connection->error);
        }
        
        $num_rows = $resultStudents->num_rows;
        $num_rows_recruiter = $resultRecruiters->num_rows;
    }

    $values = array();
    $majorsFields = array("PR"=>["Business", "Communication"], "Marketing"=>["Business", "Communication"], "Finance"=>["Business"], "Sales"=>["Business", "Communication"],
                            "Teacher"=>["Education", "Math", "History"], "Software Engineer"=>["Computer Scince"], "Engineer"=>["Engineering"], 
                            "Athletic Trainer"=>["Sport Science"], "Personal Trainer"=>["Sport Science"], "Guidance Counselor"=>["Sociology"], "Police"=>["Criminal Justice"]);
    $east = ["Maryland", "Penn State", "Rutgers", "Michigan", "Michigan State", "Ohio State", "Indiana"];
    $west = ["Iowa", "Wisonsin", "Nebraska", "Minnesota", "Northwestern". "Purdue", "Illinois"];


    for ($row_index = 0; $row_index < $num_rows; $row_index++) {
        $resultStudents->data_seek($row_index);
        $entry = $resultStudents->fetch_array(MYSQLI_ASSOC);
        $total = 0;
        if (!$isStudent && in_array($entry["major"], $majorsFields[$current["profession"]]))
            $total = 30;
        else if ($isStudent && in_array($current["major"], $majorsFields[$entry["profession"]]))
            $total = 30;
        if ($entry["school"] === $current["school"])
            $total += 20;
        else {
            if ((in_array($entry["school"], $east) && in_array($current["school"], $east)) || (in_array($entry["school"], $west) && in_array($current["school"], $west)))
                $total += 8;
        }
        if ($entry["sport"] === $current["sport"])
            $total += 10;

        $values[$entry["email"]] = $total;
        $people[$entry["email"]] = $entry;
    }

    for ($row_index = 0; $row_index < $num_rows_recruiter; $row_index++) {
        $resultRecruiters->data_seek($row_index);
        $entry = $resultRecruiters->fetch_array(MYSQLI_ASSOC);
        $total = 0;

        if ($current['profession'] === $entry['profession'])
            $total = 30;
        if ($entry["school"] === $current["school"])
            $total += 20;
        else {
            if ((in_array($entry["school"], $east) && in_array($current["school"], $east)) || (in_array($entry["school"], $west) && in_array($current["school"], $west)))
                $total += 8;
        }
        if ($entry["sport"] === $current["sport"])
            $total += 10;

        $values[$entry["email"]] = $total;
        $people[$entry["email"]] = $entry;
    }


    arsort($values);
    $index = 0;
    $matches = "";

    foreach ($values as $email => $value) {
        if ($people[$email]['image'] === null)
            $src = "img/profile.png";
        else
            $src = "data:image/jpeg;base64,".base64_encode($people[$email]['image']);

        $matches .= <<<PEOPLE
            <div class = "col-md-2 rightBox" onclick="clickConnection(this, 'right')" data-toggle="modal" data-target="#contactRight">
                <img class = "rightProfile" src = "{$src}" />
                <p class="email" hidden>{$people[$email]['email']}</p>
                <h3>{$people[$email]['name']}</h3>
PEOPLE;
        if ($isStudent)
            $matches .= "<p>{$people[$email]['employer']}</p></div>";
        else
            $matches .= "<p>{$people[$email]['school']}</p></div>";

    }

    $html = <<<HTML
        <!DOCTYPE html>
        <html>
          <head>
            <title>OverTime</title>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
            <script src="main.js"></script>
            <link rel="stylesheet" type = "text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
            <link rel="stylesheet" type = "text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">
            <link rel="stylesheet" type = "text/css" href="css/style.css">
            <link rel="icon" href="img/OTLogo3.png" />
          </head>

          <body>
            <nav class="navbar navbar-default" role="navigation" style = "margin-bottom: 0px; border:0px;">
              <div class="navbar-header">
                {$currentInfo}
              </div>


              <div class="pull-right">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="Login.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
                </ul>
              </div>

            </nav>

            <div class = "row full-content">
              <div class = "col-sm-3" id = "leftPanel">
                <div class = "row" id = "leftHeader">
                  <h2>Contacts</h2>
                </div>
                {$contacts}
              </div>

              <div class = "col-sm-9" id = "rightPanel">
                <div class = "row" id = "rightHeader">
                  <h2>Connect with People</h2>
                </div>
                {$matches}
              </div>
            </div>

            <div class="modal fade" id="contactLeft" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header redbg">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h3>Contact Information</h3>
                  </div>
                  <div class="modal-body">
                    <h3 id = "contactLeftName"></h3>
                    <p>Recruiter at <span id = "contactLeftCompany">Company</span></p>
                    <p id = "contactLeftEmail"></p>
                    <p>Send an email:</p>
                    <textarea type = "text" style = "width: 100%; height: 10%"></textarea>
                    <button type="button" class="btn btn-default">Send Email</button>
                  </div>
                  <div class="modal-footer redbg">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  </div>
                </div>
              </div>
            </div>

            <div class="modal fade" id="contactRight" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header bluebg">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h3>Contact Information</h3>
                  </div>
                  <div class="modal-body">
                    <h3 id = "contactRightName"></h3>
                    <p>Recruiter at <span id = "contactRightCompany">Company</span></p>
                    <p id = "contactRightField">Field</p>
                    <p id = "contactRightCollege">College Name</p>
                    <p id = "contactRightSport">Sport</p>
                    <p><button type="button" class="btn btn-default">Connect</button></p>
                  </div>
                  <div class="modal-footer bluebg">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  </div>
                </div>
              </div>
            </div>

          </body>
          <script>
             $(document).ready(main);

function main() {
    console.log("main");
    let ajax = new XMLHttpRequest();
    ajax.open("GET", "loadHome.php", false);
}

function clickConnection(thing, side) {
    let email = $(thing).find(".email").text();
    let ajax = new XMLHttpRequest();
    let url = "getUserData.php?email=" + email;
    ajax.open("GET", url, true);
    ajax.onreadystatechange = function() {
        if (ajax.readyState === 4) {
            if (ajax.status === 200) {
                let results = ajax.responseText.split(",");
                if (side == "right"){
                  loadModalRight(results);
                }
                else{
                  loadModalLeft(results);
                }

            } else {
               alert("Request Failed.");
            }
        }
    };
    ajax.send(null);
}

function loadModalRight(info){
  document.getElementById("contactRightName").innerHTML = info[0];
  document.getElementById("contactRightField").innerHTML = info[2];
  document.getElementById("contactRightCompany").innerHTML = info[3];
  document.getElementById("contactRightCollege").innerHTML = info[4];
  document.getElementById("contactRightSport").innerHTML = info[5];
}

function loadModalLeft(info){
  document.getElementById("contactLeftName").innerHTML = info[0];
  document.getElementById("contactLeftEmail").innerHTML = info[1];
  document.getElementById("contactLeftCompany").innerHTML = info[3];
}

          </script>
        </html>
HTML;

    echo $html;
?>
