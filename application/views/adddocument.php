<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Add Document</title>
		<script>
			$(document).ready(function(){
				$('#issued_date').datetimepicker({ 
										format	:	'YYYY-MM-DD',
										icons: {
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
										icons: {
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
		<style>
.tooltip {
  position: relative;
  display: inline-block;
  border-bottom: 1px dotted black;
}

.tooltip .tooltiptext {
  visibility: hidden;
  width: 120px;
  background-color: #555;
  color: #fff;
  text-align: center;
  border-radius: 6px;
  padding: 5px 0;
  position: absolute;
  z-index: 1;
  bottom: 125%;
  left: 50%;
  margin-left: -60px;
  opacity: 0;
  transition: opacity 0.3s;
}

.tooltip .tooltiptext::after {
  content: "";
  position: absolute;
  top: 100%;
  left: 50%;
  margin-left: -5px;
  border-width: 5px;
  border-style: solid;
  border-color: #555 transparent transparent transparent;
}

.tooltip:hover .tooltiptext {
  visibility: visible;
  opacity: 1;
}
</style>
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
							View Documents
						</li>
					</ol>
				</div>
			</div>
		<div class="card">
			<div class="card-header"> <h4>Add Document</h4> </div>
			<div class="card-body">			
				<form action="<?php echo base_url();?>document/savedocument" method="POST" >
				
				<div class="form-group">
					<label for="doc_name">Document Name<span style="color:red;">*<span> </label>
						<input type="text" name="doc_name" id="doc_name" class="form-control mb-3" placeholder="Enter the document Name" required/>
				</div>
				
				<div class="form-group">
					<label for="issued_date">Document Issued Date<span style="color:red;">*<span> </label>
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
				
				
				<div class="form-group" >
					<label for="license_duration">License Duration<span style="color:red;">*<span> </label>
						<i class="fa fa-edit">
							<div class="tooltip">Hover over me
								<span class="tooltiptext">Tooltip text</span>
							</div>
						</i>
					
						<input type="number" class="form-control mb-3" name="license_duration" id="license_duration"   placeholder="Enter the License period" required/>	
					
				</div>	
					<input type="submit" class="btn btn-primary mb-3" value="Add Document" />&nbsp;&nbsp;<input type="reset" class="btn btn-primary mb-3 " value="Reset" />
				
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
