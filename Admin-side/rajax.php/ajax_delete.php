<?php
// ajax_delete.php
include('../connection.php');  // DB connection

if(isset($_POST['delete'])) {
    $id = intval($_POST['delete']); // Security: convert to integer

    // Delete query
    $sql = "DELETE FROM review WHERE review_id = $id";
    $run = mysqli_query($conn, $sql);

    if($run){
        echo 1; // success
    } else {
        echo 0; // fail
    }
} else {
    echo 0; // no id provided
}
?>