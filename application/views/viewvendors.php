<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>View Vendors</title>
	<link rel="stylesheet" href="<?php echo base_url();?>/assets/css/home.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/css/dataTables.bootstrap.min.css"/>
	<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css" />
	<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap4.min.css" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css" />
<script>
	$(document).ready(function(){
		$('#doctable').DataTable();
		
		var date  = new Date();
		var tdate = date.getDate();
		var mnth  = date.getMonth();
		var year  = date.getFullYear();
		
		var today = tdate+"-"+mnth+"-"+year;
		setInterval(()=>{
		},5000);
	});
	
</script>
</head>

<body>
	<div class="container">
		<?php 
			if($this->session->flashdata('response'))
			{?> <div class="alert alert-success"><h6><?php echo $this->session->flashdata('response');?></h6></div>
		<?php
			}
			if($this->session->flashdata('reserr'))
			{?> <div class="alert alert-danger"><h6><?php echo $this->session->flashdata('reserr');?></h6></div>
			<?php	
			}	
			?>
		 <!-- start: PAGE HEADER -->
			<div class="row">
				<div class="col-sm-12">
					<!-- start: PAGE TITLE & BREADCRUMB -->
					<ol class="breadcrumb">
						<li class="breadcrumb-item">
						<?php if($this->session->userdata('vendor_type_id')==1) 
						{
							?><a href="<?php echo base_url('Home');?>"><i class="fa fa-home "></i> Home </a>
						<?php } ?>
						</li>
						<li class="breadcrumb-item active" aria-current="page">View Vendors </li>
					</ol>
				</div>
			</div>
		<div class="card">
			<div class="card-header">
				<h4>View Vendors</h4>
			</div>
			<div class="card-body">			
				<table class="table table-striped table-bordered table-hover table-full-width dt-responsive nowrap" width="100%" id="doctable">
				<thead>
					<tr>
						<th>Sr No.</th>
						<th>Name </th>
						<th>Email</th>
						<th>Regulation Type</th>
						<th>Status</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
						<?php
							$cnt=1;
							foreach($vendors as $vendor) {
								?>
								<tr>
									<td> <?php echo $cnt++; ?> </td>
									<td> <?php echo $vendor['vendor_name'];?> </td>
									<td> <?php echo $vendor['vendor_email'];?> </td>
									<td> <?php echo $vendor['vendor_type'];?> </td>
									<td> <?php
									 	if($vendor['enabled']==1)
										{ echo "Active"; }
										if($vendor['enabled']==2)
										{ echo "Disabled"; }
										;?>
									</td>
									<td>
									 <a href="<?php echo base_url('Vendor/editvendorbyid/'.$vendor['vendor_id']);?>"><i class="fa fa-edit"></i> Edit</a>
									 <a href="<?php echo base_url('/document/viewregulationhistory/'.$vendor['vendor_id']); ?>"><i class="fa fa-eye"></i>&nbsp;History</a>
									</td>
								</tr>
							<?php
							}
						?>
				</tbody>
				</table>
			</div>
	  </div>
	</div>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/js/jquery.dataTables.min.js" ></script>
<!-- DataTable -->
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap4.min.js"></script>
