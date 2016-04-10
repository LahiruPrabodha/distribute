	<?php
session_start();
$message="";
if(count($_POST)>0) {

Include('connect.php');

$result = mysql_query("SELECT * FROM tb_user WHERE u_name='" . $_POST["user"] . "' and u_pass = '". $_POST["pass"]."' and u_type = '". $_POST["utype"]."'");
$row  = mysql_fetch_array($result);
if(is_array($row)) {
$_SESSION["id"] = $row[u_id];
$_SESSION["adminuser"] = $row[u_name];
$_SESSION["utype"] = $row[u_type];
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
<link rel="stylesheet" type="text/css" href="style.css" />
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