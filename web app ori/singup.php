<?php
session_start();
if(isset($_SESSION['user'])!="")
{
	header("Location: home.php");
}
include_once 'class/connect.php';

if(isset($_POST['btn-signup']))
{
	$uname = mysql_real_escape_string($_POST['uname']);
	$email = mysql_real_escape_string($_POST['email']);
	$upass = md5(mysql_real_escape_string($_POST['pass']));
	$usertype = mysql_real_escape_string($_POST['usertype']);
	
	$uname = trim($uname);
	$email = trim($email);
	$upass = trim($upass);
	$usertype = trim($usertype);
	// email exist or not
	$query = "SELECT staffName FROM staff WHERE staffName='$uname'";
	$result = mysql_query($query);
	
	$count = mysql_num_rows($result); // if email not found then register
	
	if($count == 0){
		
		if(mysql_query("INSERT INTO staff(staffName,staffEmail,staffPassword,staffType) VALUES('$uname','$email','$upass','$usertype')"))
		{
			?>
			<script>alert('successfully registered ');</script>
			<?php
		}
		else
		{
			?>
			<script>alert('error while registering you...');</script>
			<?php
		}		
	}
	else{
			?>
			<script>alert('Sorry User name already taken ...');</script>
			<?php
	}
	
}
?>
<!DOCTYPE html >
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>White Rabbit Registration System</title>



<link rel="stylesheet" href="css/bootstrap.css">
<link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
<div class="row">
	<?php
		//include 'adminheader.php';
	?>
	
</div><!--end row-->
<div class="row">


		<?php
		include 'header.php';
	?>
	
	<div class="col-md-2">
					<br><br><br><br>
					<div class="row">
					</div>
					<div class="col-md-1"></div>
					
					<ul class="nav ">

                        <li class="active"><a href="index.php"><p align="center">Users</p></a>
                        </li>  
                        <li><a href="singup.php"><p align="center">Create New Account</p></a>
                        </li> 
                        <li><a href="addtables.php"><p align="center">Add Tables</p></a>
                        </li>                      
                        <li><a href="showtables.php"><p align="center">Show Tables</p></a>
                        </li> 
                                                 
                    </ul>
                   
	</div><!--end catagory-->
	<div class="col-md-9"><br><br><br>
<!--start form-->

<center>

<legend>Create Account</legend>

<div id="login-form">
<form method="post"  class="form-horizontal">
<table align="center" width="50%" border="0">
<tr>
<td><label  for="passwordinput">User Name </label></td>
<td><input type="text" name="uname" placeholder="User Name" class="form-control input-md" required /></td>
</tr>
<tr><td><br></td></tr>
<tr>
<td><label  for="passwordinput">User E-mail </label></td>
<td><input type="email" name="email" placeholder="Your Email" class="form-control input-md" required /></td>
</tr>
<tr><td><br></td></tr>
<tr>
<td><label  for="passwordinput">Password </label></td>
<td><input type="password" name="pass" placeholder="Your Password" class="form-control input-md" required /></td>
</tr>
<tr><td><br></td></tr>
<tr>
<td><label  for="passwordinput">User Type </label></td>
<td>
		<select id="usertype" name="usertype" class="form-control">
          <option value="adm">admin</option>
          <option value="mng">manager</option>          
        </select>
</tr>
<tr><td><br></td></tr>
<tr>
<td><button type="submit" name="btn-signup" class="btn btn-primary">Register</button></td>
</tr>

</table>
</form>
</div>
</center>
<!--end form-->
</div><!--end row-->



</body>
</html>

