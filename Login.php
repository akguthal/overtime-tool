<?php
session_start();

$body = <<<EOMID

<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="css/loginstyle.css">
    <script type="text/javascript" src="assets/js/bootstrap.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">


    <!-- Website Font style -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Passion+One' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Oxygen' rel='stylesheet' type='text/css'>
    <title>OverTimeLogin</title>
</head>
<body>

<div class="container">

    <div class="row main">
        <!--Logo from www.graphicsprings.com -->

        <div class="main-login main-center">
            <img src="img/OTLogo2.png" alt="ovetime2" height="100" width="230" align="center">
            <hr /><br/>

            <ul class="nav nav-tabs">
                  <li class="active"><a href="#login" data-toggle="tab">Login</a></li>
                  <li><a href="#create" data-toggle="tab">Create Account</a></li>
            </ul>
            <br/>
            <div id="myTabContent" class="tab-content">
                <div class="tab-pane active in" id="login">
                    <form class="form-horizontal" method="post" action="redirect.php">
                    <div class="form-group">
                        <label for="username" class="cols-sm-2 control-label">Username</label>
                    <div class="cols-sm-10">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                            <input type="text" class="form-control" name="username" id="username" required placeholder="Please enter your email"/>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="password" class="cols-sm-2 control-label">Password</label>
                    <div class="cols-sm-10">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                            <input type="password" class="form-control" id="password" name="password" required placeholder="Please enter your password"/>
                        </div>
                    </div>
                </div>
                <div  class="form-group">
                    <label>Login as:</label><br/>
                    <label class="radio-inline"><input type= radio name="user" required value="recruiter">Recruiter</label>
                    <label class="radio-inline"><input type= radio name="user" required value="student">Student</label>

                </div>
EOMID;
    if(isset($_SESSION["wrong"])) {
        $_SESSION["wrong"] = null;
        $body.="<span style=\"color:red;\">Incorrect username or password.</span>";
    }
    $rest = <<< EOBOD
                <div class="form-group ">                    
                        <input type="submit" name="login" value="Sign in" class="login-button"></input>        
                </div>
                </form>
            </div>
                <div class="tab-pane fade" id="create">

                    <form  action="redirect.php" method="post"  id="tab">
                        <div class="form-group">
                        <label>Full Name</label>
                            <div class="cols-sm-10">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                                    <input type="text" class="form-control" name="name" required  placeholder="Please enter your name"/>
                                </div>
                            </div>
                        <label>Email</label>
                            <div class="cols-sm-10">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-envelope" aria-hidden="true"></i></span>
                                    <input type="email" class="form-control" name="email"  required placeholder="Please enter your email"/>
                                </div>
                            </div>

                        <label>Password</label>
                        <div class="cols-sm-10">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                                <input type="password" class="form-control" name="password" required placeholder="Please enter your password"/>
                            </div>
                            <div style="text-align:center">
                                <button type="submit" class="regiter-student" name="student">Register as Student </button>
                                <button type="submit"  class="regiter-recruiter" name="recruiter">Register as Recruiter </button><br/>
                            </div>

                        </div>
                        </div>

                    </form>
                </div>
        </div>
    </div>
    </div>
</div>


</body>
</html>
EOBOD;
$body.=$rest;
echo($body);
?>
