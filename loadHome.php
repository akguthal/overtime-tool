<?php
    require_once("dblogin.php");

    print_r($_SESSION);

    $loginEmail = 'melotrimble@gmail.com';//$SESSION['loginEmail'];

    $db_connection = new mysqli($host, $user, $pass, $database);
        if ($db_connection->connect_error) {
            die($db_connection->connect_error);
    }

    $queryStudent = "select * from studentAthlete where email='$loginEmail'";
    $queryRecruiter = "select * from recruiter where email='$loginEmail'";
    
    $resultStudent = $db_connection->query($queryStudent);
    $num_rows = $resultStudent->num_rows;
    $isStudent;
    
    if ($num_rows > 0) {
        print 'student';        
        $current = $resultStudent->fetch_assoc();
        
        $currentInfo = <<<INFO
            <img src="img/profile.png">
            <p>{$current['name']}</p>
INFO;
        print $currentInfo;
        
        $queryConnections = "select *from recruiter where email in (select recruiterEmail from studentRecruiterConnection where studentEmail='$loginEmail')";
        $isStudent = true;
    } else {
        print 'recruiter';
        $resultRecrutier = $db_connection->query($queryRecruiter);
        $current = $resultRecruiter->fetch_assoc();
        $queryConnectionsRecruiter = "select studentEmail from studentRecruiterConnection where email='$loginEmail'
                                union select recruiterEmail1 from recruiterRecruiterConnection where email='$loginEmail'
                                union select recruiterEmail2 from recruiterRecruiterConnection where email='$loginEmail'";
        $isStudent = false;
    }

    //CONNECTIONS
    
    $resultConnections = $db_connection->query($queryConnections);
    $num_rows = $resultConnections->num_rows;
    $contacts = "";

    for ($row_index = 0; $row_index < $num_rows; $row_index++) {
        $resultConnections->data_seek($row_index);
        $entry = $resultConnections->fetch_array(MYSQLI_ASSOC);
        
        if ($isStudent) {  //////////////////change image
            $contacts += <<<CONTACT
            <div class="row leftRow" onclick="clickConnection()">
              <div class="col-sm-2">
                <img class="leftProfile" src="img/profile.png" /> 
              </div>
              <div class="col-sm-9">
                <h3>{$entry['name']}</h3>
                <p>{$entry['employer']}</p>
              </div>
            </div>
CONTACT;
        } else {
            $contacts += <<<CONTACT
            <div class="row leftRow" onclick="clickConnection()">
              <div class="col-sm-2">
                <img class="leftProfile" src="img/profile.png" /> 
              </div>
              <div class="col-sm-9">
                <h3>{$entry['name']}</h3>
                <p>{$entry['school']}</p>
              </div>
            </div>
CONTACT;
        }
    }

    //SEARCH    
?>

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
      <div class="navbar-header" style = "background-color: #181132">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">
            <img src = "img/profile.png"  />
          </a>
      </div>


      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" style = "background-color: #181132; border:0px">
          <div class="pull-right">
              <form class="navbar-form" role="search" id = "searchBar">
                  <div class="input-group">
                      <input id = "search-bar" type="text" class="form-control" placeholder="Search by name, major, etc." name="q">
                      <div class="input-group-btn">
                          <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                      </div>
                  </div>
              </form>
          </div>
      </div>
    </nav>

    <div class = "row full-content">
      <div class = "col-sm-3" id = "leftPanel">
        <div class = "row" id = "leftHeader">
          <h2>Contacts</h2>
        </div>
      </div>

      <div class = "col-sm-9" id = "rightPanel">
        <div class = "row" id = "rightHeader">
          <h2>Connect with People</h2>
        </div>
        <div class = "row">
          <div class = "col-md-3 rightBox">
            <img class = "rightProfile" src = "img/profile.png" />
            <h3>John Doe</h3>
            <p>Title</p>
            <p>Company</p>
            <p>Relation to Student</p>
          </div>
          <div class = "col-md-3 rightBox">
            <img class = "rightProfile" src = "img/profile.png" />
            <h3>John Doe</h3>
            <p>Title</p>
            <p>Company</p>
            <p>Relation to Student</p>
          </div>
          <div class = "col-md-3 rightBox">
            <img class = "rightProfile" src = "img/profile.png" />
            <h3>John Doe</h3>
            <p>Title</p>
            <p>Company</p>
            <p>Relation to Student</p>
          </div>
          <div class = "col-md-3 rightBox">
            <img class = "rightProfile" src = "img/profile.png" />
            <h3>John Doe</h3>
            <p>Title</p>
            <p>Company</p>
            <p>Relation to Student</p>
          </div>
          <div class = "col-md-3 rightBox">
            <img class = "rightProfile" src = "img/profile.png" />
            <h3>John Doe</h3>
            <p>Title</p>
            <p>Company</p>
            <p>Relation to Student</p>
          </div>
        </div>
      </div>
    </div>

  </body>
</html>
