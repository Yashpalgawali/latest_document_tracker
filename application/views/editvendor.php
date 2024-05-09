<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Edit Vendor</title>
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
							Edit Vendors
						</li>
					</ol>
				</div>
			</div>
		<div class="card">
			<div class="card-header">
				<h4>Edit Vendor</h4>
			</div>
			<div class="card-body">			
				<form action="<?php echo base_url();?>Vendor/updatevendor" method="POST" >
				
				<div class="form-group">
					<label for="doc_name">Vendor Name<span style="color:red;">*<span> </label>
						<input type="text" name="doc_name" id="doc_name" class="form-control mb-3" value="" placeholder="Enter the Vendor Name" required/>
				</div>
				
				<div class="form-group">
					<label for="email">Email<span style="color:red;">*<span> </label>
						<input type="email" name="email" id="email" class="form-control mb-3" placeholder="Enter Vendor E-mail" required/>
				</div>
				
				<div class="form-group">
					<label for="issued_date">Vendor Issued Date<span style="color:red;">*<span> </label>
						<div class="input-group">
							<input class="form-control border-right-0" id="issued_date" name="issued_date" required>
								<span class="input-group-append bg-white border-left-0">
									<span class="input-group-text bg-transparent">
											<i class="fa fa-calendar fa-lg"></i>
									</span>
								</span>
						</div>
				</div>
				
				<div class="form-group">
					<label for="last_renewed_date">Last Renewed Date<span style="color:red;">*<span> </label>
						<div class="input-group">
							<input class="form-control border-right-0" id="last_renewed_date" name="last_renewed_date" required>
								<span class="input-group-append bg-white border-left-0">
									<span class="input-group-text bg-transparent">
											<i class="fa fa-calendar fa-lg"></i>
									</span>
								</span>
						</div>
				</div>
				 
				<div class="form-group">
					<label for="vendor_type"></label>
						<select name="vendor_type" id="vendor_type" class="form-control">
							<option selected disabled>Please Select Vendor Type</option>
						<?php foreach($vendortype as $vtype)
						{
							echo "<option value='".$vtype['vendor_type_id']."'>".$vtype['vendor_type']."</option>";
						}
						?>
						</select>
				</div>
			
				<input type="submit" class="btn btn-primary mb-3" value="Edit Vendor" />&nbsp;&nbsp;<input type="reset" class="btn btn-primary mb-3 " value="Reset" />
				
				</form>
			</div>
	  </div>
	</div>
		<link rel="stylesheet" href="<?php echo base_url();?>/assets/css/home.css">
		<!-- Include Moment.js CDN -->
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"> </script>
	    <!-- Include Bootstrap DateTimePicker CDN -->
		<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css"  rel="stylesheet">
		<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>
</body>
