<?php
include('./connection.php');
include('./include/header.php');
include('./include/sidebar.php');
?>

<!DOCTYPE html>
<html>
<head>

<title>View Roles</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>

<body class="bg-light">

<div class="container mt-5">

<div class="card shadow">

<div class="card-header bg-primary text-white">

<div class="d-flex justify-content-between">

<h4>Role List</h4>

<a href="role_insert.php" class="btn btn-light btn-sm">Add Role</a>

</div>

</div>

<div class="card-body">
    <table class="table table-bordered table-striped text-center">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Role Name</th>
                <th>Access Type</th>
                <th>Permissions</th>
                <th>Action</th> </tr>
        </thead>
        <tbody id="roleData">
            </tbody>
    </table>
</div>

<tbody id="roleData">

</tbody>

</table>

</div>

</div>

</div>
<?php
include('./include/footer.php');
?>
    
<script>
$(document).ready(function(){
    loadRoles();

    function loadRoles() {
        $.ajax({
            url: "./roleajax/ajax_view.php",
            type: "GET",
            success: function(data) {
                $("#roleData").html(data);
            }
        });
    }

    // DELETE AJAX Code
    $(document).on("click", ".delete-btn", function(){
        if(confirm("Kya aap waqai ye role delete karna chahte hain?")) {
            var roleId = $(this).data("id");
            var element = this;

            $.ajax({
                url: "./roleajax/ajax_delete.php",
                type: "POST",
                data: { id: roleId },
                success: function(response) {
                    if(response == 1) {
                        $(element).closest("tr").fadeOut(); // Row ko gayab kar dega
                    } else {
                        alert("Delete nahi ho saka: " + response);
                    }
                }
            });
        }
    });
});
</script>
</body>
</html>