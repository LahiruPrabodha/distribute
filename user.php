<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">

</head>
<body>

<div class="container">
	<div class="row">
		 
        
        <div class="col-md-10">
        
        <form method="post">
          <h4> Users</h4>
          <input type="radio" name="usertype" id="usertype" value="adm" checked> Admin  
          <input type="radio" name="usertype" id="usertype" value="mng"> Manager
          <input type="radio" name="usertype" id="usertype" value="cus"> Customer
          <input type="submit" value="Search" />
        </form>
		<!--
		<div class="col-md-3">
            <form action="#" method="get">
                <div class="input-group">
                    
                    <input class="form-control" id="system-search" name="q" placeholder="Search User" required>
                    <span class="input-group-btn">
                        <button type="submit" class="btn btn-default"><i class="glyphicon glyphicon-search"></i></button>
                    </span>
                </div>
            </form>
        </div>
		-->
        <br><hr>
        <div class="table-responsive">
        <?php include 'connect.php'; ?>
                
              <table id="mytable" class="table table-bordred table-striped">
                   
                   <thead>
                   
                   
                   <th>ID</th>
                    <th>User name</th>                    
                       <th>Email</th>
                       <th>Delete</th>
                   </thead>
    <tbody>
    
    
<?php 

$result = mysql_query("SELECT * FROM tb_user where='".$_POST["usertype"]."'");

while($row  = mysql_fetch_array($result)){
 echo
								"<tr>
									
									<td>{$row['u_id']}</td>
									<td>{$row['u_name']}</td>
									<td>{$row['email']}</td>
									
									
									<td><form action='delete.php' method='POST'>
                  <input type='text' value='".$row['u_id']."' name='id' hidden>
                  <input type='submit' class='btn btn-danger btn-xs' value='Delete'>
                  </form></td>
								
									
									</tr>";
								/***
echo '<tr>';	
echo "<td>{$row['user_id']}</td>";

echo '<td>'.$row['user_name'].'</td>';
echo '<td>'.$row['batch'].'</td>';
echo '<td>'.$row['email'].'</td>';
echo '<td>'.'<p><button class="btn btn-primary btn-xs" data-title="Edit" onclick="test();" data-target="#edit" data-placement="top" rel="tooltip"><span class="glyphicon glyphicon-pencil"></span></button></p>'.'</td>';
echo '<td><p><button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" data-placement="top" rel="tooltip"><span class="glyphicon glyphicon-trash"></span></button></p></td>';   
echo '</tr>';*/
}

?>
    
    </tbody>
        
</table>

<!--  php delete -->


<div class="clearfix"></div>

                
            </div>
            
        </div>
	</div>
</div>


<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
      <div class="modal-dialog">
    <div class="modal-content">
          <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title custom_align" id="Heading">Edit Your Detail</h4>
      </div>
          <div class="modal-body">
          <div class="form-group">
        <input class="form-control " type="text" placeholder="Mohsin">
        </div>
        <div class="form-group">
        
        <input class="form-control " type="text" placeholder="Irshad">
        </div>
        <div class="form-group">
        <textarea rows="2" class="form-control" placeholder="CB 106/107 Street # 11 Wah Cantt Islamabad Pakistan"></textarea>
    
        
        </div>
      </div>
          <div class="modal-footer ">
        <button type="button" class="btn btn-warning btn-lg" style="width: 100%;"><span class="glyphicon glyphicon-ok-sign"></span> Update</button>
      </div>
        </div>
    <!-- /.modal-content --> 
  </div>
      <!-- /.modal-dialog --> 
    </div>
    
    
    
    <!--Delete Modal-->
    <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
      <div class="modal-dialog">
    <div class="modal-content">
          <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title custom_align" id="Heading">Delete this entry</h4>
      </div>
          <div class="modal-body">
       
       <div class="alert alert-warning"><span class="glyphicon glyphicon-warning-sign"></span> Are you sure you want to delete this Record?</div>
       
      </div>
        <div class="modal-footer ">
        <button type="button" class="btn btn-warning" ><span class="glyphicon glyphicon-ok-sign"></span> Yes</button>
        <button type="button" class="btn btn-warning" ><span class="glyphicon glyphicon-remove"></span> No</button>
      </div>
        </div>
    <!-- /.modal-content --> 
  </div>
      <!-- /.modal-dialog --> 
    </div>



</body>
</html>