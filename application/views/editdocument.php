<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<head>
	<title>Edit Document</title>
	<script>
			$(document).ready(function(){
				$('#issued_date').datetimepicker({ 
										format	:	'YYYY-MM-DD',
										icons	: {
													time	: 'fa fa-clock-o',
													date	: 'fa fa-calendar',
													up		: 'fa fa-chevron-up',
													down	: 'fa fa-chevron-down',
													previous: 'fa fa-chevron-left',
													next	: 'fa fa-chevron-right',
													today	: 'fa fa-check',
													clear	: 'fa fa-trash',
													close	: 'fa fa-times'
												},
								});
					$('#last_renewed_date').datetimepicker({
							format	:	'YYYY-MM-DD',
							icons   :  {
											time	: 'fa fa-clock-o',
											date	: 'fa fa-calendar',
											up		: 'fa fa-chevron-up',
											down	: 'fa fa-chevron-down',
											previous: 'fa fa-chevron-left',
											next	: 'fa fa-chevron-right',
											today	: 'fa fa-check',
											clear	: 'fa fa-trash',
											close	: 'fa fa-times'
										},
					});
				})
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
							
							<a href="<?php echo base_url();?>"><i class="fa fa-home "></i>	Home </a>
						</li>
						<li class="breadcrumb-item active" aria-current="page">View Documents</li>
					</ol>
				</div>
			</div>
		<div class="card">
			<div class="card-header">
				<h4>Edit Document</h4>
			</div>
			<div class="card-body">			
				<form action="<?php echo base_url();?>document/updatedocument" method="POST" >
					<input type="hidden" id="doc_id" name="doc_id" value="<?php echo $doc['doc_id'];?>" readonly />
					<div class="form-group">
						<label for="doc_name">Document Name</label>
							<input type="text" name="doc_name" id="doc_name" class="form-control mb-3" placeholder="Enter the Document Name" value="<?php echo $doc['doc_name'];?>" required/>
					</div>
					<div class="form-group">
						<label for="email">Email</label>
							<input type="email" name="email" id="email" class="form-control mb-3" placeholder="Enter Your E-mail" value="<?php echo $doc['email'];?>" required/>
					</div>
					<div class="form-group">
					<label for="issued_date">Document Issued Date</label>
						<div class="input-group">
							<input class="form-control border-right-0" id="issued_date" name="issued_date" value="<?php echo $doc['doc_issue_date'];?>" required>
								<span class="input-group-append bg-white border-left-0">
									<span class="input-group-text bg-transparent">
											<i class="far fa-calendar fa-lg"></i>
									</span>
								</span>
						</div>
				</div>
				<div class="form-group">
					<label for="last_renewed_date">Last Renewed Date</label>
						<div class="input-group">
							<input class="form-control border-right-0" id="last_renewed_date" name="last_renewed_date"  value="<?php echo $doc['doc_last_renewed_date'];?>" required>
								<span class="input-group-append bg-white border-left-0">
									<span class="input-group-text bg-transparent">
											<i class="far fa-calendar fa-lg"></i>
									</span>
								</span>
						</div>
				</div>
					<div class="form-group">
						<label for="license_duration">License Duration</label>
							<input type="number" class="form-control mb-3" name="license_duration" id="license_duration" value="<?php echo $doc['license_duration'];?>"required/>	
					</div>
						<input type="submit" class="btn btn-primary mb-3" value="Update Document" />&nbsp;&nbsp;<input type="reset" class="btn btn-primary mb-3 " value="Reset" />
				</form>
			</div>
	  </div>
	</div>
	<link rel="stylesheet" href="<?php echo base_url();?>/assets/css/home.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css" />
		<!-- Include Moment.js CDN -->
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js">    </script>
	 
	    <!-- Include Bootstrap DateTimePicker CDN -->
		<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css"  rel="stylesheet">
		<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>
</body>
