<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>View Vendor Type</title>
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
							View Vendor Types
						</li>
					</ol>
				</div>
			</div>
		<div class="card">
			<div class="card-header">
				<h4>View Vendor Type</h4>
			</div>
			<div class="card-body">
			<?php if($this->session->flashdata('response'))
				{
				?>
				<div class="alert alert-success">
					<h6><?php echo $this->session->flashdata('response');?> </h6>
				</div>
				<?php 
					}
				?>

				<?php if($this->session->flashdata('reserr'))
				{
				?>
				<div class="alert alert-danger">
					<h6><?php echo $this->session->flashdata('reserr');?> </h6>
				</div>
				<?php 
					}
				?>
				<table class="table table-hover table-striped">
					<thead>
						<tr>
							<th>Sr No.</th>
							<th>Vendor Type</th>
							<th>Edit</th>
							</tr>
					</thead>
					<tbody>
					<?php 
					$cnt=1;
					foreach($vendortype as $vtype)	
					{
					?>	<tr>
						<td> <?php echo $cnt++; ?></td>
						<td> <?php echo $vtype['vendor_type']; ?></td>
						<td> <a href="<?php echo base_url('Vendor/getVendorTypeByid/'.$vtype['vendor_type_id']);?>">Edit</a> </td>
						</tr>
					<?php 
					}
					?>	
					</tbody>
				</table>
			</div>
	  </div>
	</div>
		<link rel="stylesheet" href="<?php echo base_url();?>/assets/css/home.css">
		
</body>
