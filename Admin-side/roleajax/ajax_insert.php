<?php

include('../connection.php');

if(isset($_POST['role_name']))
{

$name = strtolower(mysqli_real_escape_string($conn,$_POST['role_name']));
$access = mysqli_real_escape_string($conn,$_POST['role_access']);

if($access=="custom")
{

$roles = $_POST['role'];
$role = serialize($roles);

}
else
{

$role = serialize([]);

}

$check = "SELECT * FROM role WHERE role_name='$name'";
$run = mysqli_query($conn,$check);

if(mysqli_num_rows($run)>0)
{

echo "<span class='text-danger'>Role already exists</span>";

}
else
{

$sql = "INSERT INTO role(role_name,role_access,role)
VALUES('$name','$access','$role')";

$query = mysqli_query($conn,$sql);

if($query)
{
echo "<span class='text-success'>Role Inserted Successfully</span>";
}
else
{
echo "<span class='text-danger'>Error inserting role</span>";
}

}

}

?>