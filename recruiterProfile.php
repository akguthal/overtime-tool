<?php

session_start();



$body = <<<ENDOFDATA
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
    <script src="upload.js" type="text/javascript"></script>
    <link rel="stylesheet" type="text/css" href="css/profileStyle.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href='https://fonts.googleapis.com/css?family=Passion+One' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Oxygen' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
    <title>recruiterProfile</title>
</head>
<body>
<div>
    <nav class="navbar-inverse navbar-static-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <img class="logo-img" src="img/OTLogo2.png" width="120" height="50" align="top">

            </div>
            <ul class="nav navbar-nav">
                <li class="active"><a href="home.html">Home</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="Login.html"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
            </ul>
        </div>
    </nav>
</div>
<div class="container" >

    <div class="row">
        <h2><strong>Create Profile</strong></h2>
        <div class="col-sm-5" align="right">
            <div class="img-section"  >
                <input type="image" id='img-upload' src="http://s3.amazonaws.com/37assets/svn/765-default-avatar.png" width="200" height="200" />
                <span class="fake-icon-edit" id="PicUpload" style="color: #ffffff;"><span class="glyphicon glyphicon-camera camera"></span></span>
            </div>
            <div>
                <span class="btn  btn-file" >
                     <input type="file" id="imgInp" accept="image/*" style="visibility: hidden; display: block" >
                </span>

            </div>
        </div>
        <div class="col-sm-5" >
            <div class="info" >
                <label>Name</label>
                <input type="text" class="form-control" name="name" id="name" value="{$_SESSION['name']}" />
                <br/>
                <label>Company</label>
                <input type="text" class="form-control" name="employer" id="employer" " 
                <br/><br/>
                <label>University</label>
                <select name="school" size="5" class="form-control">
                    <option value="Michigan">University of Michigan</option>
                    <option value="Northwestern">Northwestern University</option>
                    <option value="Wisconsin">Wisconsin University</option>
                    <option value="Illinois">University of Illinois</option>
                    <option value="PennState">Penn State University</option>
                    <option value="Ohio"> Ohio State University</option>
                    <option value="MichiganState">Michigan State University </option>
                    <option value="Purdue">Purdue University</option>
                    <option value="Minnesota">University of Minnesota</option>
                    <option value="Indiana">Indiana University</option>
                </select>
                <br/>
                 <label>Sport</label>
                 <select name="sport" size="5" class="form-control">
                    <option value="Basketball">Basketball</option>
                    <option value="Baseball">Baseball</option>
                    <option value="Badminton">Badminton</option>
                    <option value="Football">Football</option>
                    <option value="Golf">Golf</option>
                    <option value="Lacrosse">Lacrosse</option>
                    <option value="Soccer">Soccer</option>
                    <option value="Softball">Softball</option>
                    <option value="Tennis">Tennis</option>
                    <option value="Volleyball">Volleyball</option>
                </select>
                <br/>
                 <label>Fields</label>
                 <select name="field" size="5" class="form-control">
                    <option value="PR">PR- Business, Communication</option>
                    <option value="Marketing">Marketing- Business, Communication</option>
                    <option value="Finance">Finance- Business</option>
                    <option value="Sales">Sales- Business, Communication</option>
                    <option value="Teacjer">Teacher- Education, Math, History</option>
                    <option value="SE">Software Engineer- Computer Science</option>
                    <option value="Engineer">Engineer- Engineering</option>
                    <option value="Trainer">Personal Trainer- Sport Science/option>
                    <option value="Counselor">Guidance Counselor- Sociology</option>
                    <option value="Police">Police- Criminal Justice</option>
                
                </select>
                <br/>
                <br/>
                <input type="submit" class="form-control" value="SAVE" name="submit" align="right" id="save">
            </div>


        </div>

    </div>

</div>

</body>
</html>
ENDOFDATA;
session_destroy();
echo ($body);