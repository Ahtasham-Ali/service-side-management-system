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
            <h3 class="text-center">Review Table</h3>
               <form id="form1">

                 <!-- booking join -->
                 <div class="mb-3">
            <label>Booking</label>
            <select name="b_name" class="form-control">
                <option>Select Booking</option>
                <?php
                $usql = "SELECT * FROM `booking`";
                $urun = mysqli_query($conn, $usql);
                while($ufetch = mysqli_fetch_assoc($urun)){  ?>
                    <option value="<?php echo $ufetch['booking_id']; ?>">
                        <?php echo $ufetch['booking_id']; ?>
                    </option>
                <?php } ?>
            </select>
            </div>

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
             <!-- Rating -->
              <div class="mb-3">
                <label>Rating</label>
       <input type="number" name="rating" class="form-control">
              </div>  
              <!-- comment -->
               <div class="mb-3">
               <label>comment</label>
      <input type="text" name="comment" class="form-control">
                </div>
               <!-- created_at -->
                <!-- <div class="mb-3">
                    <label>created_at</label>
        <input type="time" name="created_at" class="form-control">
                </div> -->
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
        url: "./rajax.php/ajax_insert.php",
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