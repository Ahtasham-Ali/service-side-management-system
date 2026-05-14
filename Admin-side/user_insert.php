
<?php
include('./include/header.php');
include('./include/sidebar.php');
?>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

   
<div class="container mt-5">
    <div class="col-md-6 mx-auto shadow p-4 rounded">
        <h3 class="text-center"> Admin Insert</h3>

        <form id="form1">

            <div class="mb-3">
                <label>Name</label>
             <input type="text" class="form-control" id="name" placeholder="Name" name="name">
                    </div>

            <div class="mb-3">
                <label>Email</label>
             <input type="text" class="form-control" id="email" placeholder="Email" name="email">
                    </div>

			 <div class="mb-3">
                <label>phone</label>
             <input type="text" class="form-control" id="phone" placeholder="phone" name="phone">
                    </div>		

            <div class="mb-3">
                <label>Password</label>
             <input type="password" class="form-control" id="password" placeholder="password" name="password">
                    </div>

            <div class="mb-3">
                <label>address</label>
             <input type="text" class="form-control" id="address" placeholder="address" name="address">
                    </div>
			
		  <div class="mb-3">
                <label>city</label>
             <input type="text" class="form-control" id="city" placeholder="city" name="city">
                    </div>


            <div class="mb-3">
                <label>Created At</label>
             <input type="text" class="form-control" id="created_at" placeholder="created_at" name="created_at">
                    </div>

		
            <div class="mb-3">
                <label>updated At</label>
             <input type="text" class="form-control" id="updated_at" placeholder="updated_at" name="updated_at">
                    </div>

            <button type="button" id="btn-submit" class="btn btn-primary w-100">Submit</button>
        </form>
    </div>
</div>
<?php
include('./include/footer.php');
?>

<script>
  $("#btn-submit").on("click",function(e){
    e.preventDefault();
  var  formData = new FormData($("#form1")[0])
    $.ajax({
        url:"./uajax/ajax_insert.php",
        method:"POST",
        contentType:false,
        processData:false,
        data:formData,
    success: function(res){
        // alert(res);
        if(res == 1){
            $("#form1").trigger("reset");
            alert("Data has insert");
        }else{
            alert("Data hass not insert")
        }
    }

    });
  });
</script>