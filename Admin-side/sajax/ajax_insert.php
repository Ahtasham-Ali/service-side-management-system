<?php
include('../connection.php');

$category = $_POST['name'];
$s_name = $_POST['s_name'];
$s_description = $_POST['s_description'];
$s_price = $_POST['s_price'];
$s_duration = $_POST['s_duration'];


if(empty($category) || empty($s_name) || empty($s_description) || empty($s_price) || empty($s_duration)){
    $msg="fill all input fields";
}else{
    $sql="INSERT INTO `service`(`category_name`,`s_name`,`s_description`,`s_price`,`s_duration`) VALUES ('$category','$s_name','$s_description','$s_price','$s_duration')";
$run=mysqli_query($conn,$sql);
if($run){
    echo "1";
}else{
    echo "0";
}
}
?>


                