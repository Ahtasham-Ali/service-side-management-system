<?php
include('../connection.php');
    $name=mysqli_real_escape_string($conn,$_POST['name']);
    $email=mysqli_real_escape_string($conn,$_POST['email']);
    $phone=mysqli_real_escape_string($conn,$_POST['phone']);
    $password=mysqli_real_escape_string($conn,$_POST['password']);
    $address=mysqli_real_escape_string($conn,$_POST['address']);
    $city=mysqli_real_escape_string($conn,$_POST['city']);
    $created_at=mysqli_real_escape_string($conn,$_POST['created_at']);
    $updated_at=mysqli_real_escape_string($conn,$_POST['updated_at']);

if(empty($name) || empty($email) || empty($phone) || empty($password) || empty($address) || empty($city) || empty($created_at) || empty($updated_at)){
    $msg="fill all input fields";
}else{
 $sql="INSERT INTO `user`(`user_name`,`email`,`phone`,`password`,`address`,`city`,`created_at`,`updated_at`) VALUES ('$name','$email','$phone','$password','$address','$city','$created_at','$updated_at')";
 $run=mysqli_query($conn,$sql);
 if($run){
    echo "1";
 }else{
    echo "2";
 }
}
?>
