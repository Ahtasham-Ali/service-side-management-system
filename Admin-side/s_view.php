<?php
include('./connection.php');
include('./include/header.php');
include('./include/sidebar.php');
?>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

</head>
<body>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                 <th>category_name</th>
                 <th>service_name</th>
                 <th>s_description</th>
                 <th>s_price</th>
                 <th>s_duration</th>
                 
                 <th><button id="btnshow" class="btn btn-primary">Show Data</button></th>
            </tr>
        </thead>
        <tbody id="std_data">
        </tbody>
    </table>
</body>
</html>
<?php
include('./include/footer.php');
?>

<script>
$(document).ready(function() {

    // Show data
    $("#btnshow").on("click", function() {
        $.ajax({
            url: "./sajax/ajax_view.php",
            method: "GET",
            success: function(res) {
                $("#std_data").html(res);
            }
        });
    });

    // Delete button
    $(document).on("click", "#btn-del", function() {

        var del = $(this).data("del");
        var row = $(this).closest("tr");   // row store

        $.ajax({
            url: "./sajax/ajax_delete.php",
            method: "POST",
            data: { delete: del },
            success: function(res) {
                if (res == 1) {

                    row.remove();   // table row delete
                    alert("Data Deleted");

                } else {
                    alert("Data Not Deleted");
                }
            }
        });

    });

});
</script>