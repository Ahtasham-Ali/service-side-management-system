<?php
include('../connection.php');
    $name=mysqli_real_escape_string($conn,$_POST['name']);
    $description=mysqli_real_escape_string($conn,$_POST['description']);
    $status=mysqli_real_escape_string($conn,$_POST['status']);
if(empty($name) || empty($description) || empty($status)){
    $msg="fill all input fields";
}else{
 $sql="INSERT INTO `category`(`name`,`description`,`status`) VALUES ('$name','$description','$status')";
 $run=mysqli_query($conn,$sql);
 if($run){
   echo "1";
 }else{
   echo "2";
 }
}
?>