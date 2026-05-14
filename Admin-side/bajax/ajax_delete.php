<?php
include('../connection.php');

$id = $_POST['delete'];

$sql = "DELETE FROM `booking` WHERE `booking_id`='$id'";
$run = mysqli_query($conn, $sql);

if($run){
  echo "1";
}else{
  echo "0";
}
?>