<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Add Document</title>
		<script>
			$(document).ready(function(){
				$('#regulation_issued_date').datetimepicker({ 
									format : 'YYYY-MM-DD',
									//format : 'DD-MM-YYYY',
									icons  : {
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
						format	: 'YYYY-MM-DD',
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
			})

			function updateregulation(date)
			{
				let freq = $('#regulation_frequency').val();
				if(freq==1)
				{
					const d = new Date(""+date);
					let cur_month = d.getMonth()+1;
					let cur_date  = d.getDate();
					let cur_year  = d.getFullYear();
					
					if(cur_month==12)
					{
						cur_month=1;
							if(cur_month < 10) {
							cur_month =  "0"+cur_month;
						}
	
						if(cur_date < 10) {
							cur_date = "0"+cur_date;
						}
					
						let next_month_date = (d.getFullYear()+1)+"-"+(cur_month)+"-"+cur_date;
						$('#last_renewed_date').val(next_month_date);
					}
					else {
						cur_month+=1;
						if(cur_month<10) {
							cur_month =  "0"+cur_month;
						}
						if(cur_date<10) {
							cur_date = "0"+cur_date;
						}
						let next_month_date = d.getFullYear()+"-"+(cur_month)+"-"+cur_date;
						$('#last_renewed_date').val(next_month_date);
					}
				}	
				if(freq==2)
				{
					const d = new Date(""+date);
					let cur_month = d.getMonth()+1;
					let cur_date = d.getDate();
					alert('quarterly');
					if(cur_month==10) 
					{
						alert('Month ='+10)
						let next_month=1;

						if(next_month<10) {
							next_month =  "0"+next_month;
						}
	
						if(cur_date<10) {
							cur_date = "0"+cur_date;
						}
					
						let next_quarter_date = (d.getFullYear()+1)+"-"+(next_month)+"-"+cur_date;
						alert('Next quarter date is '+next_quarter_date)
						$('#last_renewed_date').val(next_quarter_date);
						return 0;
					}

					if(cur_month==11){

						cur_month=2;

						if(cur_month<10) {
							cur_month =  "0"+cur_month;
						}

						if(cur_date<10) {
							cur_date = "0"+cur_date;
						}

						let next_quarter_date = (d.getFullYear()+1)+"-"+(cur_month)+"-"+cur_date;
						$('#last_renewed_date').val(next_quarter_date);
						return 0;
					}
					if(cur_month==12){

						cur_month=3;

						if(cur_month<10) {
							cur_month =  "0"+cur_month;
						}

						if(cur_date<10) {
							cur_date = "0"+cur_date;
						}

						let next_quarter_date = (d.getFullYear()+1)+"-"+(cur_month)+"-"+cur_date;
						$('#last_renewed_date').val(next_quarter_date);
						return 0;
					}
					else {
					cur_month+=3;

					if(cur_month<10) {
						cur_month =  "0"+cur_month;
					}
 
					if(cur_date<10) {
						cur_date = "0"+cur_date;
					}
				
					let next_quarter_date = d.getFullYear()+"-"+(cur_month)+"-"+cur_date;
					$('#last_renewed_date').val(next_quarter_date);
				  }
				} 
				if(freq==3)
				{
					const d = new Date(""+date);
					let cur_month = d.getMonth()+1;
					let cur_date = d.getDate();
					
					if(cur_month<10) {
						cur_month =  "0"+cur_month;
					}
 
					if(cur_date<10) {
						cur_date = "0"+cur_date;
					}
				
					let next_year_date = (d.getFullYear()+1)+"-"+(cur_month)+"-"+cur_date;
					$('#last_renewed_date').val(next_year_date);
				}
			}

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
							Add Regulation
						</li>
					</ol>
				</div>
			</div>
		<div class="card">
			<div class="card-header"> <h4>Add Regulation</h4> </div>
			<div class="card-body">			
				<form action="<?php echo base_url();?>document/savedocument" method="POST" >
				
				<div class="form-group">
					<label for="regulation_name">Regulation Name<span style="color:red;">*<span> </label>
						<input type="text" name="regulation_name" id="regulation_name" class="form-control mb-3" placeholder="Enter the Regulation Name" required/>
				</div>

				<div class="form-group">
					<label for="regulation_description">Regulation Description<span style="color:red;">*<span> </label>
						<input type="text" name="regulation_description" id="regulation_description" class="form-control mb-3" placeholder="Enter the document Name" required/>
				</div>

				<div class="form-group">
					<label for="regulation_frequency">Regulation Frequency<span style="color:red;">*<span> </label>
						<select id="regulation_frequency" name="regulation_frequency" class="form-control">
							<option selected disabled>Please select Regulation updation Frequency</option>
							<option value="1">Monthly</option>
							<option value="2">Quarterly</option>
							<option value="3">Yearly</option>
						</select>
				</div>
				
				<div class="form-group">
					<label for="regulation_issued_date">Regulation Issued Date<span style="color:red;">*<span> </label>
						<div class="input-group">
							<input class="form-control border-right-0" id="regulation_issued_date" name="regulation_issued_date" onfocusout="updateregulation(this.value)" required>
								<span class="input-group-append bg-white border-left-0">
									<span class="input-group-text bg-transparent">
											<i class="fa fa-calendar fa-lg"></i>
									</span>
								</span>
						</div>
				</div>
				
				<div class="form-group">
					<label for="last_renewed_date">Next Renewal Date<span style="color:red;">*<span> </label>
						<div class="input-group">
							<input class="form-control border-right-0" id="last_renewed_date" name="last_renewed_date" required>
								<span class="input-group-append bg-white border-left-0">
									<span class="input-group-text bg-transparent">
											<i class="fa fa-calendar fa-lg"></i>
									</span>
								</span>
						</div>
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
