<!DOCTYPE html>
<html>
<head>
	<title>BookHub Admin</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<script src="js/jquery.js"></script>
	<script src="js/Bootstrap.js"></script>
	<script src="js/Bootstrap.min.js"></script>
<script src="http://templateplanet.info/tooltip.js"></script>
<script src="http://templateplanet.info/modal.js"></script>
</head>
<body>
<div class="row">
	<?php
		include 'adminheader.php';
	?>
</div><!--end row-->
<div class="row">
	
	
	<div class="col-md-2">
					<br><br><br><br>
					<div class="row">
					</div>
					<div class="col-md-1"></div>
					
					<ul class="nav ">

                        <li class="active"><a href="admin.php"><p align="center">Users</p></a>
                        </li>                        
                        <li><a href="showbooks.php"><p align="center">Show tables</p></a>
                        </li>
                                                    
                    </ul>
                   
	</div><!--end catagory-->
	<div class="col-md-9"><br><br><br>
		<?php
		include 'table.php';
		?>
</div><!--end row-->
<div class="col-md-1"></div>
</div><!--end row-->
</body>
</html>