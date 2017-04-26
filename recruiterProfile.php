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
    <link rel="stylesheet" type="text/css" href="profileStyle.css">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href='https://fonts.googleapis.com/css?family=Passion+One' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Oxygen' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
    <title>studentProfile</title>
</head>
<body>
<div>
    <nav class="navbar-inverse navbar-static-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <img class="logo-img" src="OTLogo2.png" width="120" height="50" align="top">

            </div>
            <ul class="nav navbar-nav">
                <li class="active"><a href="#">Home</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
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
               
                
                <label>Interests</label>
                <input type="text" class="form-control" name="interests" id="interests" />
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