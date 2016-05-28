<?php
include 'connect.php';

if(isset($_POST['id'])){
$userID = $_POST['id'];
$sql = "DELETE FROM staff WHERE staffID ='$userID'";
mysql_query($sql);
echo 'Deleted'.$userID;
header("Location:index.php");
} else {  }
?>
