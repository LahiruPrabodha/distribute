	<?php
session_start();
$message="";
if(count($_POST)>0) {

Include('class/connect.php');
//$upass = md5(mysql_real_escape_string($_POST['pass']));
//$result = mysql_query("SELECT * FROM staff WHERE u_name='" . $_POST["user"] . "' and u_pass = '$upass' and u_type = '". $_POST["utype"]."'");
$result = mysql_query("SELECT * FROM staff WHERE staffName='" . $_POST["user"] . "' and staffPassword = '".$_POST['pass']."' and staffType = '". $_POST["utype"]."'");
$row  = mysql_fetch_array($result);
if(is_array($row)) {
$_SESSION["id"] = $row[staffID];
$_SESSION["adminuser"] = $row[staffName];
$_SESSION["utype"] = $row[staffType];
} else {
$message = "Invalid Username or Password!";
}
}
if(isset($_SESSION["id"])) {
header("Location:admin.php");
}
?>



<!DOCTYPE html>
<!--[if lt IE 7 ]> <html lang="en" class="ie6 ielt8"> <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="ie7 ielt8"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="ie8"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--> <html lang="en"> <!--<![endif]-->
<head>
<meta charset="utf-8">
<title>Paper Stack</title>
<link rel="stylesheet" type="text/css" href="css/indexstyle.css" />
</head>
<body>
<div class="container">
	<section id="content">
		<form  method="post" >
			<h1>Login Form</h1>
			<div>
				<input type="text" placeholder="Username" name="user" id="user" required="" id="username" />
			</div>
			<div>
				<input type="password" placeholder="Password" name="pass" id="pass" required="" id="password" />
			</div>
            <div>
                    <input type="radio" name="utype" id="utype" value="adm" checked> admin
                    <input type="radio" name="utype" id="utype" value="mng"> manager
                   
            </div>
			<div>
				<input type="submit" value="Log in" />
				
			</div>
		</form><!-- form -->
		
	</section><!-- content -->
</div><!-- container -->
</body>
</html>