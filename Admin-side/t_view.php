<?php
include('./include/header.php');
include('./include/sidebar.php');
?>

<div class="container-fluid mt-5">
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">All Registered Technicians</h6>
            <a href="t_insert.php" class="btn btn-primary btn-sm">
                <i class="fas fa-plus"></i> Add New Technician
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover" id="techTable" width="100%" cellspacing="0">
                    <thead class="bg-dark text-white">
                        <tr>
                            <th>ID</th>
                            <th>Profile</th>
                            <th>Details (Name/CNIC)</th>
                            <th>Skill/Experience</th>
                            <th>Address</th>
                            <th>Charges</th>
                            <th>Portfolio</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="load-table">
                        <tr>
                            <td colspan="8" class="text-center">Loading data...</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php include('./include/footer.php'); ?>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<script>
$(document).ready(function(){
    
    // 1. Function: Table Data Load Karne ke Liye
    function loadTable(){
        $.ajax({
            url: "./tajax/ajax_view.php",
            type: "POST",
            success: function(data){
                $("#load-table").html(data);
            }
        });
    }
    loadTable(); // Page load par data call karein

    // 2. Logic: Approve Button (Pending -> Approved)
    $(document).on("click", ".approve-btn", function(){
        var id = $(this).data("id");
        var btn = $(this);

        if(confirm("Kya aap is technician ko approve karke public karna chahte hain?")){
            btn.prop('disabled', true).html('<i class="fas fa-spinner fa-spin"></i>');
            
            $.ajax({
                url: "./tajax/ajax_approve.php",
                type: "POST",
                data: {id: id},
                success: function(res){
                    if(res.trim() == "1"){
                        loadTable(); // Table refresh karein taake button change ho jaye
                    } else {
                        alert("Error: " + res);
                        loadTable();
                    }
                }
            });
        }
    });

    // 3. Logic: Disapprove Button (Approved -> Pending)
    $(document).on("click", ".disapprove-btn", function(){
        var id = $(this).data("id");
        var btn = $(this);

        if(confirm("Kya aap is profile ko hide (Disapprove) karna chahte hain?")){
            btn.prop('disabled', true).html('<i class="fas fa-spinner fa-spin"></i>');
            
            $.ajax({
                url: "./tajax/ajax_disapprove.php",
                type: "POST",
                data: {id: id},
                success: function(res){
                    if(res.trim() == "1"){
                        loadTable(); // Table refresh karein
                    } else {
                        alert("Error: " + res);
                        loadTable();
                    }
                }
            });
        }
    });

    // 4. Logic: Delete Button
    $(document).on("click", ".delete-btn", function(){
        if(confirm("Waqai delete karna chahte hain? Yeh wapis nahi aayega!")){
            var id = $(this).data("id");
            
            $.ajax({
                url: "./tajax/ajax_delete.php",
                type: "POST",
                data: {id: id},
                success: function(res){
                    if(res.trim() == "1"){
                        loadTable(); 
                    } else {
                        alert("Delete Error: " + res);
                    }
                }
            });
        }
    });

});
</script>