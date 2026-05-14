<?php
include('../connection.php');
$id=$_POST['delete'];
$sql="DELETE FROM `user`WHERE `user_id`='$id'";
$run=mysqli_query($conn,$sql);
if($run){
  echo " 1";
}else{
  echo "2";
}
?>