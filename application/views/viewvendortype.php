<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>View Vendor Type</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/css/dataTables.bootstrap.min.css"/>
	
		<!-- DataTable -->
		<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
		<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>
		<script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
		<script src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap4.min.js"></script>

		<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css" />
		<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap4.min.css" />
		
	<script>
		$(document).ready(function() {
			$('#vendortable').DataTable();
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
<table class="table table-striped table-bordered table-hover table-full-width dt-responsive nowrap" width="100%" id="vendortable">					<thead>
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
