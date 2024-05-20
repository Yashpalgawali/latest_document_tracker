<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>View Documents</title>
	<link rel="stylesheet" href="<?php echo base_url();?>/assets/css/home.css">
	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/js/jquery.dataTables.min.js" ></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/css/dataTables.bootstrap.min.css"/>
	
		<!-- DataTable -->
		<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
		<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>
		<!-- <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
		<script src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap4.min.js"></script> -->

		<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css" />
		<!-- <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap4.min.css" /> -->
		
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css" />
<script>
	$(document).ready(function(){
		$('#doctable').DataTable();
		
		var date  = new Date();
		var tdate = date.getDate();
		var mnth  = date.getMonth();
		var year  = date.getFullYear();
		
		var today = tdate+"-"+mnth+"-"+year;
		
		//alert(tdate.getDate()+"-"+tdate.getMonth());
		setInterval(()=>{
				
		},5000);
	});
	
</script>
<style>
	table {
    display: block;
    overflow-x: auto;
    white-space: nowrap;
}
</style>
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
						<a href="<?php 
									if($this->session->userdata('vendor_type_id')==1) {
										echo base_url('Home');
									}
									if($this->session->userdata('vendor_type_id')==2) {
										echo base_url('Quality');
									}
									if($this->session->userdata('vendor_type_id')==3) {
										echo base_url('Social');
									}
									?>"><i class="fa fa-home "></i> Home </a>
					</li>
					<li class="breadcrumb-item active" aria-current="page">
						<?php echo $this->session->userdata('vendor_type'); ?> 
					</li>
					<li class="breadcrumb-item active" aria-current="page">View Regulations </li>
				</ol>
			</div>
		</div>
		<div class="card">
			<div class="card-header">
				<div>
					<h4>View Regulation 
						<a style ="float:right !important;" href="<?php echo base_url();?>Document" class="btn btn-primary">Add Regulation</a>
					</h4>
				</div>
			</div>
			<div class="card-body">			
				<table class="table table-striped table-bordered table-hover table-full-width dt-responsive nowrap" 
					id="doctable" width="100%" >
				<thead>
					<tr>
						<th>Sr No.</th>
						<th>Regulation Name </th>
						<th>Regulation Description </th>
						<th>Regulation Frequency </th>
						<th>Regulation Issued<br>Date</th>
						<th>Next Renewal <br>Date</th>
						<th>File </th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
						<?php
							$cnt=1;
							foreach($docs as $doc) {
								?>
								<tr>
									<td> <?php echo $cnt++; ?> </td>
									<td> <?php echo $doc['regulation_name'];?> </td>
									<td> <?php echo $doc['regulation_description'];?> </td>
									<td> <?php 
											if($doc['regulation_frequency']==1) {
												echo "Monthly";
											}
											if($doc['regulation_frequency']==2) {
												echo "Quarterly";
											}
											if($doc['regulation_frequency']==3) {
												echo "Yearly";
											}
										 ?>
									</td>
									<td><?php echo $doc['regulation_issued_date'];?></td>	
									<td>
										<?php 
										if($doc['regulation_frequency']==1) {
											$date = $doc['regulation_issued_date'];
											$newDate = date('Y-m-d', strtotime($date. ' + 1 months'));
											echo $newDate;
										}
										if($doc['regulation_frequency']==2) {
											$date = $doc['regulation_issued_date'];
											$newDate = date('Y-m-d', strtotime($date. ' + 3 months'));
											echo $newDate;
										}
										if($doc['regulation_frequency']==3) {
											$date = $doc['regulation_issued_date'];
											$newDate = date('Y-m-d', strtotime($date. ' + 12 months'));
											echo $newDate;
										}
										?>
									</td>
									<!-- <td><a href="<?php echo base_url();$doc['file_path'] ;?>"> <?php echo $doc['file_name']; ?></a></td> -->
									<td><a href="<?php echo base_url(''. $doc['file_path']);?>" target='_blank'><?php echo $doc['file_name']; ?></a></td>
									<td>
										<?php
											if($this->session->userdata('vendor_type_id')==1)
											{?>
												<a href="<?php echo base_url('/document/editdocumentbyid/'.$doc['regulation_id']); ?>"><i class="fa fa-edit"></i>&nbsp;Edit</a> </td>
											<?php }
											?>
										
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

</html>