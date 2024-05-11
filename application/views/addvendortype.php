<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Add Vendor Type</title>
	
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
							Add Vendor Types
						</li>
					</ol>
				</div>
			</div>
		<div class="card">
			<div class="card-header">
				<h4>Add Vendor Type</h4>
			</div>
			<div class="card-body">			
				<form action="<?php echo base_url();?>Vendor/savevendortype" method="POST" >
				
				<div class="form-group">
					<label for="vendor_type">Vendor Type<span style="color:red;">*<span> </label>
						<input type="text" name="vendor_type" id="vendor_type" class="form-control mb-3" placeholder="Enter the Vendor Type" required/>
				</div>
				
				<input type="submit" class="btn btn-primary mb-3" value="Add Vendor" />&nbsp;&nbsp;<input type="reset" class="btn btn-primary mb-3 " value="Reset" />
				
				</form>
			</div>
	  </div>
	</div>
		<link rel="stylesheet" href="<?php echo base_url();?>/assets/css/home.css">
		
</body>
