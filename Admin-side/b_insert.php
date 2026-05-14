<?php
include('./connection.php');
include('./include/header.php');
include('./include/sidebar.php');
?>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
</head>
<body>
<div class="container mt-5">
        <div class="col-md-6 mx-auto shadow p-4 rounded">
            <h3 class="text-center">Booking Table</h3>
               <form id="form1">

                <!-- user join -->
                 <div class="mb-3">
            <label>User</label>
            <select name="u_name" class="form-control">
                <option>Select User</option>
                <?php
                $usql = "SELECT * FROM `user`";
                $urun = mysqli_query($conn, $usql);
                while($ufetch = mysqli_fetch_assoc($urun)){  ?>
                    <option value="<?php echo $ufetch['user_id']; ?>">
                        <?php echo $ufetch['user_name']; ?>
                    </option>
                <?php } ?>
            </select>
            </div>

            <!-- service join -->
             <div class="mb-3">
                <label>Service</label>
                <select name="s_name" class="form-control">
                    <option>Select Service</option>
                    <?php
                    $ssql = "SELECT * FROM `service`";
                    $srun = mysqli_query($conn,$ssql);
                while($sfetch = mysqli_fetch_assoc($srun)){
                    ?>
                <option value="<?php echo $sfetch['service_id']; ?>">
                    <?php echo $sfetch['s_name'];?>
                </option>  
             <?php } ?>
                </select>
             </div>

              <!-- Technician join -->
             <div class="mb-3">
                <label>Technician</label>
                <select name="t_name" class="form-control">
                    <option>Select Technician</option>
                    <?php
                    $tsql = "SELECT * FROM `technician`";
                    $trun = mysqli_query($conn,$tsql);
                while($sfetch = mysqli_fetch_assoc($trun)){
                    ?>
                <option value="<?php echo $sfetch['technician_id']; ?>">
                    <?php echo $sfetch['name'];?>
                </option>  
             <?php } ?>
                </select>
             </div>
           
             <!-- Booking date -->
              <div class="mb-3">
                <label>Booking date</label>
       <input type="date" name="b_date" class="form-control">
              </div>
              
              <!-- service date -->
               <div class="mb-3">
               <label>Service date</label>
      <input type="date" name="s_date" class="form-control">
                </div>

               <!-- service time -->
                <div class="mb-3">
                    <label>Service time</label>
        <input type="time" name="s_time" class="form-control">
                </div>

               <!-- Total amount -->
                <div class="mb-3">
                    <label>Total amount</label>
            <input type="number" name="t_amount" class="form-control">
                </div>

               <!-- status -->
                <div class="mb-3">
            <label>Status</label> 
            <select name="status" class="form-control"> 
        <option value="Select status">Select Status</option>
            <option value="pending">Pending</option> 
            <option value="confirmed">Confirmed</option>
            <option value="completed">Completed</option>
            <option value="cancelled">Cancelled</option> 
             </select>
             </div>

              <!-- Address -->
            <div class="mb-3">
                <label>Address</label>
            <input type="text" name="address" class="form-control">
            </div>

              <!-- Submit Button -->
               <div class="mb-3">
              <button type="submit" id="btn-submit" class="btn btn-primary form-control">Submit</button>
               </div>
          </form>
        </div>
    </div>
</body>
</html>
<?php
include('./include/footer.php');
?>

<script>
$("#btn-submit").on("click", function(e){
    e.preventDefault();

    var formData = new FormData($("#form1")[0]);

    $.ajax({
        url: "./bajax/ajax_insert.php",
        method: "POST",
        contentType: false,
        processData: false,
        data: formData,

        success: function(res){
            if(res == 1){
                $("#form1").trigger("reset");
                alert("Data Insert");
            } else {
                alert("Data Not Insert");
            }
        }
    });
});
</script>