<?php
include('../connection.php');
$upid = $_POST['category_id'];
$sql="SELECT * FROM `category` WHERE `category_id`='$upid'";
$run=mysqli_query($conn,$sql);
$fet=mysqli_fetch_assoc($run);

	$name=mysqli_real_escape_string($conn,$_POST['name']);
	$description=mysqli_real_escape_string($conn,$_POST['description']);
	$status=mysqli_real_escape_string($conn,$_POST['status']);
	$created_at=mysqli_real_escape_string($conn,$_POST['created_at']);
	if($name =="" || $description =="" || $status =="" || $created_at ==""){
		$msg="Fill all input fields";
	}else{
		$sql="UPDATE `category` SET `name`='$name',`description`='$description',`status`='$status',`created_at`='$created_at' WHERE `category_id`='$upid'";
		$run=mysqli_query($conn,$sql);
		if($run){
			echo "1";
		}else{
			echo "2";
		}
	}

?>
	