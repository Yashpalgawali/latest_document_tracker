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
		<script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
		<script src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap4.min.js"></script>

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
		
		//alert(tdate.getDate()+"-"+tdate.getMonth());
		setInterval(()=>{
				
		},5000);
	});
	
</script>
</head>

<body>
	<div class="container">
		<?php 
			if($this->session->flashdata('response'))
			{?> <div class="alert alert-success">	<?php echo $this->session->flashdata('response');?></div>
		<?php
			}
			if($this->session->flashdata('reserr'))
			{?> <div class="alert alert-danger">	<?php echo $this->session->flashdata('reserr');?></div>
			<?php	
			}	
			?>
		 <!-- start: PAGE HEADER -->
			<div class="row">
				<div class="col-sm-12">
					
					<!-- start: PAGE TITLE & BREADCRUMB -->
					<ol class="breadcrumb">
						<li class="breadcrumb-item">
							<a href="<?php echo base_url();?>"><i class="fa fa-home "></i> Home </a>
						</li>
						<li class="breadcrumb-item active" aria-current="page">View Documents </li>
					</ol>
				</div>
			</div>
		<div class="card">
			<div class="card-header">
				<h4>View Documents</h4>
			</div>
			<div class="card-body">			
				<table class="table table-striped table-bordered table-hover table-full-width dt-responsive nowrap" width="100%" id="doctable">
				<thead>
					<tr>
						<th>Sr No.</th>
						<th>Document </th>
						<th>Document<br> Issued Date</th>
						<th>Last Renewed <br>Date</th>
						<th>Next Renewal <br>Date</th>
						<th>Renewal <br>Period<sub>(in years)</sub></th>
						<th>Email</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
						<?php
							$cnt=1;
							foreach($docs as $doc)
							{
								?>
								<tr>
									<td> <?php echo $cnt++; ?> </td>
									<td> <?php echo $doc['doc_name'];?> </td>
								
									<td> <?php echo $doc['doc_issue_date'];?> </td>
									<td> <?php echo $doc['doc_last_renewed_date'];?></td>
									<?php 
											$date = strtotime($doc['doc_last_renewed_date']);
											$m = date("m",$date);
											$y = date("Y",$date);
											$d = date("d",$date);
											
											//$mnths = is_float($doc['license_duration']);

											$next_year = ($y+$doc['license_duration'])."-".$m."-".$d;
									?>
									
									<?php 
												$today  = date('Y-m-d');
												// creates DateTime objects
												$lrenew = date_create($next_year);
												$today  = date_create(date('Y-m-d'));
												
												$diff = date_diff($today,$lrenew);
												$days = $diff->format('%R%a');
												
												if($days<=(30) && $days>=0 )
												{
													?><td  style="color:red; "> <?php  echo $next_year."<sub> Due for Renewal</sub>";?></td>
												<?php
												}
												elseif($days<=(30) && $days<=(-1) )
												{
													?><td  style="color:red;"> <?php  echo $next_year."<sub> Expired</sub>";?></td>
												<?php
												}
												else
												{
													?><td style="color:black;"> <?php echo $next_year;?></td>
												<?php
												}
										
									?>
									<td><?php echo $doc['license_duration'];?></td>	
									<td> <?php echo $doc['email'];?> </td>									
									<td> <a href="<?php echo base_url('/document/editdocumentbyid/'.$doc['doc_id']); ?>"><i class="fa fa-edit"></i>&nbsp;Edit</a> </td>
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