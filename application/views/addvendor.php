<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Add Vendor</title>

	<script>
		$(document).ready(function(){
				$("#cnfpassword").focusout(function(e){
					if($("#cnfpassword").val()!=$("#password").val())
					{
						e.preventDefault();
						alert('Passwords do not match');
						$("#password").focus();
					}
				});

				$("#submit").click(function(e){
						
					if($("#cnfpassword").val()!=$("#password").val())
					{
						e.preventDefault();
						$("#password").focus();
						alert('Passwords do not match');
					}
				});

				var base_url = "<?php echo base_url();?>";
				$("#vendor_email").focusout(function(e) {
				    var email = $("#vendor_email").val();
				  $.ajax({
				     url : base_url+'Vendor/checkvendorexists/',
				     type : "POST",
				     dataType : 'JSON',
				     data : {"email": email},
				     success : function(data){
				         alert(data)
				     },
				     error : function(err)
				     {
				         alert('error')
				     }		
				  });
				});
			});
	</script>
</head>

<body>
	<div class="container">
			 <!-- start: PAGE HEADER -->
			<div class="row">
				<div class="col-sm-12">
					<!-- start: PAGE TITLE & BREADCRUMB -->
					<ol class="breadcrumb">
						<li class="breadcrumb-item">
							<a href="<?php echo base_url('Home');?>"><i class="fa fa-home "></i> Home </a>
						</li>
						<li class="breadcrumb-item active" aria-current="page">
							View Vendors
						</li>
					</ol>
				</div>
			</div>
		<div class="card">
			<div class="card-header"> <h4>Add Vendor</h4> </div>
			<div class="card-body">
			<form action="<?php echo base_url();?>Vendor/savevendor" method="POST" >
				
			<div class="form-group">
				<label for="vendor_name">Vendor Name</label>
					<input type="text" name="vendor_name" id="vendor_name" class="form-control" placeholder="Enter Name of Vendor">
			</div>
			<div class="form-group">
				<label for="vendor_email">Email<span style="color:red;">*<span> </label>
					<input type="email" name="vendor_email" id="vendor_email" class="form-control mb-3" placeholder="Enter Vendor E-mail" required/>
			</div>
			<div class="form-group">
					<label for="vendor_username">User Name</label>
						<input type="text" name="vendor_username" id="vendor_username" class="form-control mb-3" placeholder="Enter username " />
			</div>
	
			<div class="form-group">
				<label for="password">Password<span style="color:red;">*<span> </label>
					<input type="password" name="password" id="password" class="form-control" required placeholder="Enter Password">
			</div>

			<div class="form-group">
				<label for="cnfpassword">Confirm Password<span style="color:red;">*<span> </label>
					<input type="password" name="cnfpassword" id="cnfpassword" required class="form-control" placeholder="Confirm Password">
			</div>
			 
			<div class="form-group">
					<label for="vendor_type_id">Select Vendor Type</label>
						<select name="vendor_type_id" id="vendor_type_id" class="form-control">
							<option selected disabled>Please Select Vendor Type</option>
						<?php foreach($vendortype as $vtype)
						{
							if($vtype['vendor_type_id']!=1)
								echo "<option value='".$vtype['vendor_type_id']."'>".$vtype['vendor_type']."</option>";
						}
						?>
						</select>
			</div>
			
			<input type="submit" class="btn btn-primary mb-3" id="submit" value="Add Vendor" />&nbsp;&nbsp;<input type="reset" class="btn btn-primary mb-3 " value="Reset" />
				
				</form>
			</div>
	  </div>
	</div>
	
	<link rel="stylesheet" href="<?php echo base_url();?>/assets/css/home.css">
		
</body>
