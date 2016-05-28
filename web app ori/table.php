<?php include 'class/connect.php'; ?>
<?php
//total table
$resulttot = mysql_query("SELECT COUNT(*) as total FROM  tables");
$data=mysql_fetch_assoc($resulttot);
//echo $data['total'];

//available table
$resultavb = mysql_query("SELECT COUNT(*) as available FROM  tables WHERE availability ='yes'");
$dataavb=mysql_fetch_assoc($resultavb);
//echo $dataavb['available'];

//not available

$not = $data['total'] - $dataavb['available'];
//echo $not
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<script src="js/jquery.js"></script>
	<script src="js/Bootstrap.js"></script>
	<script src="js/Bootstrap.min.js"></script>
<script src="http://templateplanet.info/tooltip.js"></script>
<script src="http://templateplanet.info/modal.js"></script>
<link href="css/dist/css/sb-admin-2.css" rel="stylesheet">
<link href="css/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
</head>
<body>

<div class="container">
	<div class="row">
		 
        
        <div class="col-md-10">
        <center><legend>Table List</legend></center>
		
		 <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-globe fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php  echo $data['total'];?></div>
                                    <div>Total </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-tasks fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $dataavb['available'];?></div>
                                    <div>Available </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-cutlery fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $not;?></div>
                                    <div>Not Available</div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
               
            </div>
            <!-- /.row -->
		
        
        <div class="table-responsive">
        
                
              <table id="mytable" class="table table-bordred table-striped">
                   
                   <thead>
                   
                   
                   <th>Table ID</th>
                   <th>Table Type</th>
                   <th>availability</th>
                   </thead>
    <tbody>
    
    
<?php 

$result = mysql_query("SELECT * FROM tables");

while($row  = mysql_fetch_array($result)){
 echo
								"<tr>
									
									<td>{$row['tableID']}</td>
                  <td>{$row['tableType']}</td>
                  <td>{$row['availability']}</td>
									<td>{$row['availableCount']}</td>
															
									
									</tr>";
								
}

?>
    
    </tbody>
        
</table>

<!--  php delete -->



    <script type="text/javascript">
        $(document).ready(function(){
        $("#mytable #checkall").click(function () {
                if ($("#mytable #checkall").is(':checked')) {
                    $("#mytable input[type=checkbox]").each(function () {
                        $(this).prop("checked", true);
                    });

                } else {
                    $("#mytable input[type=checkbox]").each(function () {
                        $(this).prop("checked", false);
                    });
                }
            });
        });

         $(function () {
                    $("[rel='tooltip']").tooltip();
                });

    </script>

</body>
</html>