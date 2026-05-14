<?php
include('./include/header.php');
include('./include/sidebar.php');
?>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

	<div class="container mt-5">   
	<div class="col-md-6 mx-auto shadow p-4 rounded">
		<h3 class="text-center">category Insert</h3>
		<form id="form1">
<!-- 1 -->
<div class="mb-3">
	<label>Name</label>
	<input type="text" id="name" placeholder="Name" class="form-control mb-3" name="name">
		  </div>
<!-- 2 -->
 <div class="mb-3">
	<label>Description</label>
	<input type="text" id="description" placeholder="Description" class="form-control mb-3" name="description">
 </div>
 <!-- 3 -->
  <div class="mb-3">
	<label>Status</label>
	<input type="text" id="status" placeholder="Status" class="form-control mb-3" name="status">
  </div>
  <!-- 4
   <div class="mb-3">
   <label>Created_at</label>
<input type="text" id="created_at" placeholder="created_at" class="form-control mb-3" name="created_at">
</div> -->
 <!--submit Button -->
		
		<button type="submit" id="btn-submit" class="btn btn-primary w-100">Submit</button>
</form>
</div>     		
</div>
<?php
include('./include/footer.php');
?>
<script>
	$("#btn-submit").on("click",function(c){
		c.preventDefault();
var formData = new FormData($("#form1")[0])
$.ajax({
	url:"./cajax/ajax_insert.php",
	method:"POST",
	contentType:false,
	processData:false,
	data:formData,
success: function(res){
	if(res == 1){
		$("#form1").trigger("reset");
		alert("Data insert");
	}else{
		alert("Data not insert");
	}
}
});	
});
</script>