<?php
include('../connection.php');

$u_name = $_POST['u_name'];
$s_name = $_POST['s_name'];
$t_name = $_POST['t_name'];
$b_date = $_POST['b_date'];
$s_date = $_POST['s_date'];
$s_time = $_POST['s_time'];
$t_amount = $_POST['t_amount'];
$status = $_POST['status'];
$address = $_POST['address'];
 
if(empty($u_name) || empty($s_name) || empty($t_name) || empty($b_date) || empty($s_date) || empty($s_time) || empty($t_amount) || empty($status) || empty($address)){
    $msg="Fill All fields";
}else{
    $sql="INSERT INTO `booking`(`user_name`,`service_name`,`technician_name`,`b_date`,`s_date`,`s_time`,`total_amount`,`status`,`address`) VALUES ('$u_name','$s_name','$t_name','$b_date','$s_date','$s_time','$t_amount','$status','$address')";
    $run=mysqli_query($conn,$sql);
    if($run){
        echo "1";
    }else{
        echo "0";
    }
}
?>