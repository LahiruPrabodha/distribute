
<!DOCTYPE html>
<html>
<head>
	<title>White Rabbit Panel</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<script src="js/jquery.js"></script>
	<script src="js/Bootstrap.js"></script>
	<script src="js/Bootstrap.min.js"></script>


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
		<?php
		include 'search.php';
		?>
</div><!--end row-->
<div class="col-md-1"></div>
</div><!--end row-->
</body>
</html>