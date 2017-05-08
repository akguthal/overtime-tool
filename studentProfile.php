
<?php
session_start();

if(isset($_POST["submit"])) {
    $_SESSION["name"] = $_POST["name"];
    $_SESSION["year"] = $_POST["year"];
    $_SESSION["major"] = $_POST["major"];
    $_SESSION["sport"] = $_POST["sport"];
    $_SESSION["school"] = $_POST["school"];
    $_SESSION["isStudent"] =true;
    $_SESSION["newStudent"] = "new";
    $_SESSION["studentProfile"] = "student";
    //echo($_COOKIE["img"]);
    //echo("<img src=\"{$_COOKIE['img']}\" alt='image'>");
    $_SESSION["newProfile"] = "new";
    $_SESSION["studentProfile"] = "student";
    header("Location: storeInDatabase.php");
}

$body = <<<ENDOFDATA
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
    <script src="upload.js" type="text/javascript"></script>
    <link rel="stylesheet" type="text/css" href="css/profileStyle.css">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
       <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href='https://fonts.googleapis.com/css?family=Passion+One' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Oxygen' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
    <link rel="icon" href="img/OTLogo3.png" />
    <title>OverTime</title>
</head>
<body>
<div>
    <nav class="navbar-inverse navbar-static-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <img class="logo-img" src="img/OTLogo2.png" width="120" height="50" align="top">
            </div>
            <ul class="nav navbar-nav">
                <li class="active"><a href="loadHome.php">Home</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="Logout.php"><span class="glyphicon glyphicon-log-out"></span> Return to home</a></li>
            </ul>
        </div>
    </nav>
</div>
<div class="container" >
    <div class="row">
        <h2><strong>Create Profile</strong></h2>

        <div class="col-sm-5" align="right">

            <div class="img-section"  >
                <input type="image" id='img-upload' name="image" src="http://s3.amazonaws.com/37assets/svn/765-default-avatar.png" width="200" height="200"/>
                <span class="fake-icon-edit" id="PicUpload" style="color: #ffffff;"><span class="glyphicon glyphicon-camera camera"></span></span>
            </div>
            <div>
                <span class="btn  btn-file" >
                     <input type="file" name="profile" id="imgInp" accept="image/*" style="visibility: hidden; display: block" >
                </span>
            </div>

        </div>
        <div class="col-sm-5" >
            <div class="info" >
                <form action = "{$_SERVER['PHP_SELF']}" method = "post" >
                <label>Name</label>
                <input type="text" class="form-control" name="name" id="name" value="{$_SESSION['name']}" />
                <br/>
                <label>University</label>
                <select name="school" size="5" class="form-control">
                    <option value="Maryland">University of Maryland</option>
                    <option value="Michigan">University of Michigan</option>
                    <option value="Northwestern">Northwestern University</option>
                    <option value="Wisconsin">Wisconsin University</option>
                    <option value="Illinois">University of Illinois</option>
                    <option value="Penn State">Penn State University</option>
                    <option value="Ohio"> Ohio State University</option>
                    <option value="Michigan State">Michigan State University </option>
                    <option value="Purdue">Purdue University</option>
                    <option value="Minnesota">University of Minnesota</option>
                    <option value="Indiana">Indiana University</option>
                    <option value="Rutgers">Rutgers University</option>
                    <option value="Iowa">University of Iowa</option>
                    <option value="Nebraska">University of Nebraska</option>
                </select>
                <br/>
                <label>Major</label>
                <select name="major" size="5" class="form-control">
                    <option value="Business">Business</option>
                    <option value="Sociology">Sociology</option>
                    <option value="Communication">Communication</option>
                    <option value="History">History</option>
                    <option value="Sports Science">Sports Science</option>
                    <option value="Criminal Justice">Criminal Justice</option>
                    <option value="Education">Education</option>
                    <option value="Engineering">Engineering</option>
                    <option value="Math">Math</option>
                    <option value="Computer Science">Computer Science</option>
                </select>
                <br/>
                <label>Year</label><br/>
                <label class="radio-inline"><input type= radio name="year" value="freshman">Freshman</label>
                <label class="radio-inline"><input type= radio name="year" value="sophomore">Sophomore</label>
                <label class="radio-inline"><input type= radio name="year" value="junior">Junior</label>
                <label class="radio-inline"><input type= radio name="year" value="senior">Senior</label><br/>
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
                <input type="submit" class="form-control" value="SAVE" name="submit" align="right" id="save">
                </form>
            </div>
            </div>

        </div>
    </div>

</div>
</body>
</html>
ENDOFDATA;
echo ($body);
/*
 *<script>
    let img=document.getElementById("img-upload");
    img.onload = function() {
        let imgInp=document.getElementById("imgInp");
        //alert(document.getElementById("imgInp").value);
        //alert(typeof(imgInp.value));
        //let string = "img="+img.src;
        //alert(string);
        //document.cookie = string;
        //document.cookie = "img=" + imgInp.value + "; expires=Thu, 4 May 2017 20:47:11 UTC; path=/; domain=.studentProfile.php";
        //document.cookie = "img=asdffsad";
        //alert(document.cookie);
        //document.write(img.src);
        let str = imgInp.src;
        alert(str);
        document.write("<img src=\"" + str +"\" alt=\"image\">");
    }

</script>
*/
?>
