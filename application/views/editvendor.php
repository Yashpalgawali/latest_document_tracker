<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Edit Vendor</title>

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
				})
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
							<a href="<?php echo base_url();?>"><i class="fa fa-home "></i> Home </a>
						</li>
						<li class="breadcrumb-item active" aria-current="page">
							Update Vendor
						</li>
					</ol>
				</div>
			</div>
		<div class="card">
			<div class="card-header"> <h4>Update Vendor</h4> </div>
			<div class="card-body">
			<form action="<?php echo base_url();?>Vendor/updatevendor" method="POST" >
			<input type="hidden" name="vendor_id" id="vendor_id" value="<?php echo $vendor['vendor_id'] ;?>" />	
			
			<div class="form-group">
				<label for="vendor_name">Vendor Name</label>
					<input type="text" name="vendor_name" id="vendor_name" value="<?php echo $vendor['vendor_name'] ;?>" class="form-control" placeholder="Enter Name of Vendor">
			</div>
			<div class="form-group">
				<label for="vendor_email">Email<span style="color:red;">*<span> </label>
					<input type="email" name="vendor_email" id="vendor_email" class="form-control mb-3" value="<?php echo $vendor['vendor_email'] ;?>" placeholder="Enter Vendor E-mail" required/>
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
							<option disabled>Please Select Vendor Type</option>
						<?php foreach($vendortype as $vtype)
						{
							if($vtype['vendor_type_id']==$vendor['vendor_type_id'])
							{
								echo "<option selected value='".$vtype['vendor_type_id']."'>".$vtype['vendor_type']."</option>";
							}
							else {
								echo "<option value='".$vtype['vendor_type_id']."'>".$vtype['vendor_type']."</option>";
							}
						}
						?>
						</select>
			</div>
			
			<input type="submit" class="btn btn-primary mb-3" id="submit" value="Edit Vendor" />&nbsp;&nbsp;<input type="reset" class="btn btn-primary mb-3 " value="Reset" />
				
				</form>
			</div>
	  </div>
	</div>
	
	<link rel="stylesheet" href="<?php echo base_url();?>/assets/css/home.css">
		
</body>
