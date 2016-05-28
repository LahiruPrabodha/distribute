<?php
session_start();
if(isset($_SESSION['user'])!="")
{
	header("Location: home.php");
}
include_once 'class/connect.php';

if(isset($_POST['btn-signup']))
{
	$tabletype = mysql_real_escape_string($_POST['tabletype']);
	$avble = mysql_real_escape_string($_POST['avble']);
	
	
	$tabletype = trim($tabletype);
	$avble = trim($avble);
	// email exist or not
	$query = "SELECT * FROM tables WHERE tableType='$tabletype'";
	$result = mysql_query($query);
	
	$count = mysql_num_rows($result); // if email not found then register
	
	if($count == 0){
		
		if(mysql_query("INSERT INTO tables(tableType,availability) VALUES('$tabletype','$avble')"))
		{
			?>
			<script>alert('successfully added table ');</script>
			<?php
		}
		else
		{
			?>
			<script>alert('error while adding  tables...');</script>
			<?php
		}		
	}
	else{
			?>
			<script>alert('Sorry User table added ...');</script>
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

<legend>Add Tables</legend>

<div id="login-form">
<form method="post"  class="form-horizontal">
<table align="center" width="50%" border="0">

<tr><td><br></td></tr>
<tr>

<tr>
<td><label  for="passwordinput">Table Type </label></td>
<td>
		<select id="tabletype" name="tabletype" class="form-control">
          <option value="cuple table">Cuple table</option>
          <option value="4 chair">4 chair</option>          
        </select>
</tr>
<tr><td><br></td></tr>
<tr>
<tr>
<td><label  for="passwordinput">Table Availability </label></td>
<td>
<select id="avble" name="avble" class="form-control">
          <option value="yes">Yes</option>
          <option value="no">No</option>          
        </select>
</td>
</tr>
<td><button type="submit" name="btn-signup" class="btn btn-primary">Add Table</button></td>
</tr>

</table>
</form>
</div>
</center>
<!--end form-->
</div><!--end row-->



</body>
</html>

