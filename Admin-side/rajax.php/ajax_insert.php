<?php
include('../connection.php');

$b_name = $_POST['b_name'];
$u_name = $_POST['u_name'];
$rating = $_POST['rating'];
$comment = $_POST['comment'];

if(empty($b_name) || empty($u_name) || empty($rating) || empty($comment)){
    echo "fill all input fields";
    exit;
}

$sql = "INSERT INTO `review` (`booking_name`,`user_name`,`rating`,`comments`) 
        VALUES ('$b_name','$u_name','$rating','$comment')";

if(mysqli_query($conn, $sql)){
    echo "1";
}else{
    echo "0 - Error: " . mysqli_error($conn);
}
?>