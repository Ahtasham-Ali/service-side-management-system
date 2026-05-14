<?php
include('../connection.php');
$id=$_POST['delete'];
$sql="DELETE FROM `service` WHERE `service_id`='$id'";
$run=mysqli_query($conn,$sql);
if($run){
  echo "1";
}else{
  echo mysqli_error($conn); // error show karega
}
?>