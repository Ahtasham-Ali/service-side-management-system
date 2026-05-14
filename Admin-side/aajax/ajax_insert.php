<?php
include('../connection.php');
$name=mysqli_real_escape_string($conn,$_POST['name']);
$email=mysqli_real_escape_string($conn,$_POST['email']);
$password=mysqli_real_escape_string($conn,$_POST['password']);
$role=mysqli_real_escape_string($conn,$_POST['role']);
// $created_at=mysqli_real_escape_string($conn,$_POST['created_at']);
if(empty($name) || empty($email) || empty($password) || empty($role)){
    $msg="fill all input fields";
}else{
    $sql="INSERT INTO `admin`(`name`,`email`,`password`,`role`)VALUES('$name','$email','$password','$role')";
    $run=mysqli_query($conn,$sql);
    if($run){
        echo "1";
    }else{
        echo "2";
    }
    
}

?>
